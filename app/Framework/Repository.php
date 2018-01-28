<?php
namespace App\Framework;
use App\Database\DB;
use App\Framework\Routing;
use App\Framework\Config;
use App\Models\{Section, Topic, Post, User};
class Repository
{
	public static function  searchSmth($searchPhrase){
		$query = DB::select("SELECT t.title, t.id, s.slug, s.id, u.name FROM `posts` p
			LEFT JOIN   topics t ON p.topic_id=t.id
			LEFT JOIN sections s ON t.section_id=s.id
			LEFT JOIN users u ON p.user_id=u.id
			WHERE p.`text` LIKE '%$searchPhrase%'
			GROUP BY t.id");

		return $query; 
	}

	public static function dateSortAdmin(){
		$model = new Post;
		return $model->hydrate(DB::select("SELECT * FROM `posts` ORDER BY `crated_at` DESC"));
		return $query;
	}

	public static function dateSort($topicId){
		$model = new Post;
		return $model->hydrate(DB::select("SELECT * FROM `posts` WHERE `topic_id`= $topicId  ORDER BY `crated_at` DESC"));
		return $query;
	}

	public function hydrate(Array $data) {
		$res = [];
		foreach( $data as $item ) {
			$res[] = $model = new $this;

            // mapping...
			foreach ($item as $key => $val) {

				$vars = get_object_vars($model);

				if (array_key_exists($key, $vars)) {
					$setVarMethod = 'set' . ucfirst($key);
					$model->$setVarMethod($val);
				}

			}
		}
	}
}