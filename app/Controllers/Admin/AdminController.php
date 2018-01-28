<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post, User};
use App\Database\DB;

use App\Framework\Auth\Auth;
use App\Framework\Auth\AuthInterface;
use App\Framework\View;
 
class AdminController extends Controller
{
	
public function showAdminmenu(){

View::show("admin/mainAdmin");

}

}

