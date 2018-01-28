<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;

use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;
use App\Framework\ViewAdmin;

class AdminTopicController extends Controller
{
    public function showTopics(){
        $topics= Topic::all();
        foreach ($topics as $key => $topic) {


            $section=Section::getById($topic->getSection_id());
            $user=User::getById($topic->getUser_id());


            $topic->setSection_title($section[0]->getTitle());
            $topic->setUser_name($user[0]->getName());

           
        }

        ViewAdmin::show("admin/topic", ['topic'=>$topics]);
    }
    public function createTopics(){

        if(!empty($_POST['form'])){

           $topic = new Topic();
           $topic->setTitle($_POST['form']['title']);
           $topic->setSection_id($_POST['form']['section_id']);
           $topic->setUser_id($_POST['form']['user_id']);
           $topic->save();
           header('location: /admin/topic');
           exit();
       }
       ViewAdmin::show("admin/topicCreate");
   }
   public function editTopics(){

    $id = explode('/', $_SERVER['REQUEST_URI'])[4];
    $topic=Topic::get($id);
    
$section=Section::all();


    ViewAdmin::show("admin/topicEdit",['topic' => $topic[0], 'section'=>$section]);

    if(!empty($_POST['edit'])){

        $topic[0]->setTitle($_POST['edit']['title']);
        $topic[0]->setSection_id($_POST['edit']['section_id']);
        $topic[0]->save();
        header('location: /admin/topic');
        exit();
    }

}
public function deleteTopic(){
    $id = explode('/', $_SERVER['REQUEST_URI'])[4];

    DB::delete("DELETE  FROM `topics` 
      WHERE `id`=".$id);
    header('location: /admin/topic');
    exit();
}
}