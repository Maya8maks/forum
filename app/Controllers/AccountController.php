<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;

use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;

class AccountController extends Controller
{
public function showAccount()
   {
$posts=Post::get($_SESSION['user_id']);

View::show("account");
}
public function showProfilAccount(){
	
$user=User::get($_SESSION['user_id']);
	if(!empty($_POST['form'])){
		
		$user[0]->setName($_POST['form']['name']);
		$user[0]->setEmail($_POST['form']['email']);
		$user[0]->setPass(md5($_POST['form']['pass']));
		$user[0]->save();
	
		$_SESSION['flash_msg'] = "Змінено";
        header('location: /');
        exit();
	}
View::show("profil", ['user' => $user[0]]);
}
public function showTopicAccount(){

	$topics=Topic::getByUser_id($_SESSION['user_id']);

View::show("topicAccount", ['topic' => $topics]);
}
public function showPostAccount(){

	$posts=Post::getByUser_id($_SESSION['user_id']);

View::show("postAccount", ['post' => $posts]);
}
}