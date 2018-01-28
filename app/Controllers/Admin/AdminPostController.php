<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;
use App\Framework\Repository;
use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;
use App\Framework\ViewAdmin;

class AdminPostController extends Controller
{
  public function showPosts(){
  
   $posts=Repository::dateSortAdmin();
   
  /* $posts=Post::all();*/

      foreach ($posts as $key => $post) {

      $topic=Topic::getById($post->getTopic_id());
      $user=User::getById($post->getUser_id());

      $post->setTopic_title($topic[0]->getTitle());
      $post->setUser_name($user[0]->getName());

   } 

    ViewAdmin::show("admin/post", ['post'=>$posts]);
  }
 
  public function createPosts(){

    if(!empty($_POST['form'])){

     $post = new Topic();
     $post->setText($_POST['form']['text']);
     $post->setTopic_id($_POST['form']['topic_id']);
     $post->setUser_id($_POST['form']['user_id']);
     $date=date('Y-m-d');
     $post->setCrated_at($date);
     $post->save();
     header('location: /admin/post');
     exit();
   }
   ViewAdmin::show("admin/postCreate");
 }
 public function editPosts(){

  $id = explode('/', $_SERVER['REQUEST_URI'])[4];
  $post=Post::get($id);
  $topics=Topic::all();
  ViewAdmin::show("admin/postEdit",['post' => $post[0], 'topic'=>$topics]);

  if(!empty($_POST['edit'])){

    $post[0]->setText($_POST['edit']['text']);
    $post[0]->setTopic_id($_POST['edit']['topic_id']);
    $post[0]->save();
    header('location: /admin/post');
    exit();
  }

}
public function deletePost(){
  $id = explode('/', $_SERVER['REQUEST_URI'])[4];

  DB::delete("DELETE  FROM `posts` 
    WHERE `id`=".$id);
  header('location: /admin/post');
  exit();
}
}