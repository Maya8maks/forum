<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;

use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;
use App\Framework\ViewAdmin;

class AdminSectionController extends Controller
{
public function showSections(){
$sections= Section::all();
ViewAdmin::show("admin/section", ['section'=>$sections]);
}
public function createSections(){
	
if(!empty($_POST['form'])){

	$section = new Section();
        $section->setTitle($_POST['form']['title']);
        $section->setSlug($_POST['form']['slug']);
        $section->save();
        header('location: /admin/section');
        exit();
}
ViewAdmin::show("admin/sectionCreate");
}
public function editSections(){

$id = explode('/', $_SERVER['REQUEST_URI'])[4];
$section=Section::get($id);

ViewAdmin::show("admin/sectionEdit",['section' => $section[0]]);

if(!empty($_POST['edit'])){

        $section[0]->setTitle($_POST['edit']['title']);
        $section[0]->setSlug($_POST['edit']['slug']);
        $section[0]->save();
        header('location: /admin/section');
        exit();
}

}
public function deleteSection(){
$id = explode('/', $_SERVER['REQUEST_URI'])[4];

DB::delete("DELETE  FROM `sections` 
  WHERE `id`=".$id);
 header('location: /admin/section');
        exit();
}
}