<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Model\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin(){
        return view('System.Auth.Login');
    }

    public function postLogin(Request $request){
        // dd($request);
        $user = User::where('User_Email',$request->Email)->first();
        if (!$user){
            return redirect()->route('getLogin')->with(['flash_type'=>'error','flash_message'=>'Email does not exsist!']);
        }

        if (Hash::check($request->Password,$user->User_Password)){
            
            Session::put('account', $user);
            
            if (Session::has('account')){
                return redirect()->route('getDashboard')->with(['flash_type'=>'success','flash_message'=>'Login Success']);
            }
        }
        else {
            return redirect()->route('getLogin')->with(['flash_type'=>'error','flash_message'=>'Password is wrong']);
        }
    }

    public function getLogout(){
	    
	    if(session('userTemp')){

            $sessionOld = session('userTemp');

            // bỏ session củ
            Session::forget('account');
            Session::forget('userTemp');

            // tạo session mới
            Session::put('account', $sessionOld);

            return redirect()->route('getDashboard')->with(['flash_type'=>'success','flash_message'=>'Login Success']);
        }
        
        Session::forget('account');
        return redirect()->route('getLogin');

    }

}
