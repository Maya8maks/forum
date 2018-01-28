<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;

use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;
use App\Framework\ViewAdmin;

class AdminUserController extends Controller
{
    public function showUsersAdmin(){
        $users= User::all();
        
        ViewAdmin::show("admin/user", ['user'=>$users]);
    }
    public function createUsersAdmin(){

        if(!empty($_POST['form'])){

           $user = new User();
           $user->setName($_POST['form']['name']);
           $user->setEmail($_POST['form']['email']);
           $user->setPass(md5($_POST['form']['pass']));
           $user->setIs_id($_POST['form']['is_admin']);
           $user->setVk_id($_POST['form']['vk_id']);
           $user->save();
           header('location: /admin/user');
           exit();
       }
       ViewAdmin::show("admin/userCreate");
   }
   public function editUsersAdmin(){

    $id = explode('/', $_SERVER['REQUEST_URI'])[4];
    $user=User::getById($id);

    ViewAdmin::show("admin/userEdit",['user' => $user[0]]);

    if(!empty($_POST['edit'])){

        $user[0]->setName($_POST['edit']['name']);
        $user[0]->setEmail($_POST['edit']['email']);
        $user[0]->setPass(md5($_POST['edit']['pass']));
        $user[0]->setIs_admin($_POST['edit']['is_admin']);
        $user[0]->setVk_id($_POST['edit']['vk_id']);
        $user[0]->save();
        header('location: /admin/user');
        exit();
    }

}
public function deleteUsersAdmin(){
    $id = explode('/', $_SERVER['REQUEST_URI'])[4];

    DB::delete("DELETE  FROM `users` 
      WHERE `id`=".$id);
    header('location: /admin/user');
    exit();
}
}