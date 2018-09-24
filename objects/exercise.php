<?php
class exercise
{
public $name;
public $description;
public $favorate;
public $videoId;
public $bodyPart;
public $category;
public $thumbnailUrl;


    public  function __construct() {
    }

    public function checkFavorite($userId, $exerciseId){
    	 global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_fav_videos";
    	$favorate = false;
  
	    $favResult = $wpdb->get_results("SELECT id FROM $tableName WHERE user_id = $userId AND exercise_id = $exerciseId");
	    if (count($favResult)> 0){
	    	$favorate = true;
		}
		return $favorate;
    }

}
?>

