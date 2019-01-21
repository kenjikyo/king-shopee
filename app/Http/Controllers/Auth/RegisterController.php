<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Model\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getRegister(){
        return view('System.Auth.Register');
    }

    public function postRegister(Request $request){
		
        $this->validate($request,[
            'Email' => 'required|email|unique:users,User_Email',
            'Link' => 'required',
            'Password' => 'required|min:6',
            'ConfirmPassword' => 'required|same:Password|min:6'
            
        ],[

        ]);
		$root = null;
        if(Input::get('ref')){
		    $root = Input::get('ref');
	    }
	    // kiểm tra member có tồn tại hay không ?
	    // $user = User::GetUserInfo($root);

	    // if(!$user){
		//     return redirect()->route('getLogin')->with(['flash_type'=>'error', 'flash_message'=>'Account does not exist']);
	    // }
        
        $token = Crypt::encryptString($request->input('Email').':'.time());
        
        $ID = User::RandomID();
        
        $input = array(
			'User_ID'   => $ID,
			'User_Email' => $request->input('Email'),
			'User_Name'  => $request->Name,
			'User_Password'  => Hash::make($request->Password),
			'User_RegisteredDatetime' => time(),
			'User_EmailActive'  => '0',
			'User_Parent'    => $root,
			'User_Status'    => '1',
			'User_Level'     => '0',
            'User_OTP'       => '0',
            'User_Link'      => $request->Link,
			'User_Token'      => $token
        );
        User::insert($input);
        
        //dữ liệu gửi sang mailtemplate
        // $data = array('User_Email'=>$request->input('Email'), 'User_Token'=>$token, 'User_ID'=>$input['User_ID']);
        // gửi mail thông báo
        // Mail::send('mailtemplate.register_active', $data, function($msg) use ($input){
        //     $msg->from('do-not-reply@adcgame.club','ADC Game Club');
        //     $msg->to($input['User_Email'])->subject('Activate Account');
        // });
        
        return redirect()->route('getLogin')->with(['flash_type'=>'success','flash_message'=>'Register Success']);
    }

    public function getActive($token){
        try {
            $decrypted = Crypt::decryptString($token);
        } catch (DecryptException $e) {
            return redirect()->route('getLogin')->with(['flash_type'=>'error', 'flash_message'=>'Token does not exist']);
        }

        $ex = explode(':',$decrypted);

        $user = User::where(['User_Email'=>$ex[0],'User_Token'=>$token])->first();

        if(!$user){
            return redirect()->route('getLogin')->with(['flash_type'=>'error', 'flash_message'=>'Account does not exist']);
        }

        if ($user->User_EmailActive==0){
            //điều hướng sang trang update password
            return redirect()->route('getUpdatePassword',$token)->with(['flash_type'=>'success', 'flash_message'=>'Please Press Your New Password']);
        }
        else{
            //Báo lỗi tài khoản đã được active
            return redirect()->route('getLogin')->with(['flash_type'=>'error', 'flash_message'=>'Account was Actived']);
        }
        
    }
	
    public function postChangePassword(Request $request) {
        $this->validate($request, 
            [
                'User_Email'         =>  'required',
                'User_Old_Password'      =>  'required',
                'User_Password'      =>  'required',
                'Confirm_User_Password'    =>  'required|same:User_Password'
            ],
            [
                'User_Email.required'     =>   'Email is Required',
                'User_Password.required'   =>  'Password is Required',
                'Confirm_User_Password.required'   =>  'Confirm Password is Required',
                'Confirm_User_Password.same'   =>  'The Passwords do not same'
            ]
        );
        $User_Email = $request->input('User_Email');
        $User_Password = Hash::make($request->input('User_Password'));

        // kiểm tra mail có tồn tại trong hệ thống
        $user = User::GetUserInfo_Email($User_Email);
        if(!$user){
            return redirect()->route('getLogin')->with(['flash_type'=>'error', 'flash_message'=>'The Email does not exist']);
        }
		//check password cũ 
        if (Hash::check($request->input('User_Old_Password'),$user->User_Password)){
			$update = User::where('User_ID',$user->User_ID)->update(['User_Password' => $User_Password,'User_EmailActive'=>1]);
			if($update){
				// $user = User::where('User_Email',$ex[0])->where('User_Status',0)->first();
				// Session::put('user', $user);
				
				return redirect()->route('getLogin')->with(['flash_type'=>'success', 'flash_message'=>'Change Password complete!']);
			}
		}
		return redirect()->route('getLogin')->with(['flash_type'=>'error', 'flash_message'=>'Old Password is incorrect!']);
    }

}
