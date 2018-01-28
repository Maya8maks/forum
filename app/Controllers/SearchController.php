<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\{Section, Topic, Post};
use App\Framework\View;
use App\Framework\Routing;
use App\Framework\Repository;
use App\Database\DB;

class SearchController extends Controller
{
	public function searchText(){
		$searchPhrase = $_GET['search'];
		
		$query = Repository::searchSmth($searchPhrase);
		
		View::show('search', ['query' => $query]);
	}		
}







