<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;

class User extends Authenticatable{
    use Notifiable;

    protected $table = "users";
    
    protected $fillable = ['User_ID','User_Name', 'User_Email', 'User_Password', 'User_RegisteredDatetime', 'User_Parent', 'User_Parents', 'User_Status', 'User_Level', 'User_Token', 'User_OTP', 'User_Pecent', 'User_Special'];

    public $timestamps = false;
	
	protected $primaryKey = 'User_ID';
	
    protected $hidden = [
        'User_Password', 'User_Token',
    ];
    
    public static function getF1($user){
	    $result = DB::table('users')
	    		->selectRaw("User_ID, User_Parents")
	    		->whereRaw('User_Parents LIKE "'.$user->User_Parents.'%" AND (CHAR_LENGTH(User_Parents)-CHAR_LENGTH(REPLACE(User_Parents, ",", "")))-' . substr_count($user->User_Parents, ",") . ' = 1')
	    		->where('User_IsBot',0)
	    		->get()->toArray();
		return $result;
    }

    public static function storeAccount($email){
        $result = DB::table('users')->where('User_IsBot',0)->where('User_Email',$email)->first();
        if($result){
            return $result;
        }
        return -1;
    }
	
	public static function GetAllUser($where = null){
		$result = DB::table('users')
					->where('User_IsBot',0)
					->whereRaw('1'.$where)
					->paginate(25);
		return $result;
	}
	public static function GetExportAllUser($where){
		$result = DB::table('users')
					->where('User_IsBot',0)
					->whereRaw('1'.$where)
					->get();
		return $result;
	}
	
	public static function GetAllUserExcel($where){
		$result = DB::table('users')
					->where('User_IsBot',0)
					->whereRaw('1'.$where)
					->get();
		return $result;
	}

    public static function GetUserInfo($id){

        $result = DB::table('users') ->where('User_ID', $id)->first();
        return $result;
    }

    public static function GetUserInfo_Email($email){
        $result = DB::table('users') ->where('User_Email', $email)->first();
        return $result;
    }

    public static function insertUser($post) {
        $result = DB::table('users')->insert($post);
    }
	
	public static function RandomID(){
        $id = rand(100000, 999999);
        $user = User::where('User_ID',$id)->first();
        if(!$user){
            return $id;
        }else{
            return RandomID();
        }
    }
	
	public static function insertBot($post){
		DB::table('users')->insert($post);
	}
	
	static function getBot(){
		$limit = rand(50, 100);
		$result = DB::table('users')
                        ->where('User_IsBot', 1)
                        ->select('User_ID')
                        ->orderByRaw('RAND()')
                        ->limit($limit)->get()->toArray();
        return $result;
	}
	
	
}
