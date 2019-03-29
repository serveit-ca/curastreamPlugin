<?php
class exercise
{
public $description;
public $favorate;
public $videoId;
public $bodyPart;
public $category;
public $thumbnailUrl;

public $id;     
public $name;              
public $phase_id;             
public $order_no;            
public $order_field;          
public $rest;                 
public $sets_reps;            
public $variation;           
public $equipment;           
public $special_instructions; 
public $exercise_video_url; 
public $exercise_video_id;  
public $file_url;             
public $file_name;                    
public $customExercise;

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