<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Framework\Routing;
use App\Framework\Config;
use App\Models\{Section, Topic, Post};
use App\Models\User;
use App\Framework\View;
use App\Database\DB;
use App\Framework\Auth\Auth;


class VkController extends Controller
{
    public function vkCallback()
    {
        $config=Config::init();

        $code = isset($_GET['code']) ? $_GET['code'] : null;


        $client_id=$config->get('vk_info.client_id');
        $client_url=$config->get('vk_info.client_url');
        $client_secret=$config->get('vk_info.client_secret');
        $url = "https://oauth.vk.com/access_token?client_id=$client_id&client_secret=$client_secret&redirect_uri=http://$client_url/vk-callback&code=".$code;

        /*var_dump( file_get_contents($url) );*/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $res = json_decode(curl_exec($ch), true);
        
        curl_close($ch);
        
        $accessToken =  $res['access_token'];
        $userId =  $res['user_id'];
        $userEmail =  $res['email'];

        $url = "https://api.vk.com/method/users.get?user_id=".$userId."&fields=first_name,last_name&token=".$accessToken."&v=5.52";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $res = json_decode(curl_exec($ch), true)['response'][0];

        curl_close($ch);
        $user = new User();
        $user->setVk_id($userId);
        $user->setEmail($userEmail);
        $user->setName($res['first_name'] .' '. $res['last_name']);
        
        $checkUser = User::getByEmail( $userEmail );

        if( !isset( $checkUser[0] ) ) {
           
            $url = "https://api.vk.com/method/users.get?user_id=" . $userId . "&fields=first_name,last_name&token=" . $accessToken . "&v=5.52";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $res = json_decode(curl_exec($ch), true)['response'][0];
            curl_close($ch);
            $user = new User();
            $user->setVk_id($userId);
            $user->setEmail($userEmail);
            $user->setName($res['first_name'] . ' ' . $res['last_name']);
            $pass = rand(100, 999);
            $user->setPass( md5( $pass ) );
            $user->save();
            /*Mailer::sendEmail( $userEmail, 'Ваш пароль: '.$pass );*/
        }
        Auth::setLoggedUser( $checkUser[0] );
        header('location: /');
        exit();
        
    }
}