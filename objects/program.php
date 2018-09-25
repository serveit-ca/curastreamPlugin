<?php
class program
{
public $id;
public $name;
public $type;
public $description;
public $duration;
public $current;
public $completed;
public $thumbnailUrl;
public $body_part;
public $sport_occupation;
public $injury_cause;


    public  function __construct() {
    }

    public function checkCurrent($userId, $programId){
    	 global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_programs";
    	$current = false;
  
	    $currentResult = $wpdb->get_results("SELECT id FROM $tableName WHERE user_id = $userId AND saved_prog_id = $programId AND completed = 0");
	    if (count($currentResult)> 0){
	    	$current = true;
		}
		return $current;
    }
      public function checkCompleted($userId, $programId){
    	 global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_programs";
    	$completed = false;
  
	    $completedResults = $wpdb->get_results("SELECT id FROM $tableName WHERE user_id = $userId AND saved_prog_id = $programId AND completed = 1");
	    if (count($completedResults)> 0){
	    	$completed = true;
		}
		return $completed;
    }

}
?>

