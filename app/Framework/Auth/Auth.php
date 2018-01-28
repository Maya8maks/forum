<?php
namespace App\Framework\Auth;

use \Exception;
use App\Database\DB;
use App\Models\User;
use App\Framework\Auth\AuthInterface;
class Auth implements AuthInterface
{

    private static $user;

    public static function login( Array $credentials ){

        $credentials['email'] ;
        $credentials['pass'];

        $arguments = [$credentials['email'],md5($credentials['pass'])];

        // DB select
       $res = DB::select("SELECT * FROM users WHERE `email` =? AND `pass` = ?",$arguments);
        if(!empty($res)) {
            $user = (new User())->hydrate($res);
             $_SESSION['user_id'] = $res[0]['id'];
             $_SESSION['user_name'] = $res[0]['name'];
             $_SESSION['user_role'] = $res[0]['is_admin'];
             self::$user = $user;
            return true;
        }
        else return false;

    }
    public static function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
    }

    public static function register( User $user ){
        $user->save();
    }

   public static function getLoggedUser() {
        if( isset($_SESSION['user_id']) && !self::$user ) {
            self::$user = User::get( $_SESSION['user_id'] );
        }
        return self::$user;
    }
    public static function setLoggedUser( User $user ) {
        self::$user = $user;
        $_SESSION['user_id'] = self::$user->getId();
    }
}