<?php
add_action( 'plugins_loaded', array( 'program', 'init' ));


 

require_once("phase.php");
require_once("exercise.php");
require_once("program.php");
class userTracking
{
	//Function for login recording
	public function userLoginRecording($userId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		if (isset($userId) && !is_null($userId)){
	            $wpdb->insert($tableName, array(
	            "user_id" => $userId,
	        	"event_type" => 0));
	        }
	}


	//Function for program view recording
	public function userViewProgramRecording($userId, $programId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		if (isset($userId) && !is_null($userId) && isset($programId) && !is_null($programId)){
	            $wpdb->insert($tableName, array(
	            "user_id" => $userId,
	            "program_id" => $programId,
	        	"event_type" => 1));
	        }
	}



	//Function for excercise view recording
	public function userViewExerciseRecording($userId, $exerciseId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		if (isset($userId) && !is_null($userId) && isset($programId) && !is_null($programId)){
	            $wpdb->insert($tableName, array(
	            "user_id" => $userId,
	            "exercise_id" => $exerciseId,
	        	"event_type" => 2));
	        }
	}


	//Function for prog/exercise view recording
	public function userViewProgramExerciseRecording($userId, $programId, $exerciseId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		if (isset($userId) && !is_null($userId) && isset($programId) && !is_null($programId)){
	            $wpdb->insert($tableName, array(
	            "user_id" => $userId,
	            "program_id" => $programId,
	            "exercise_id" => $exerciseId,
	        	"event_type" => 3));
	        }
	}


	//Get last user login function
	function getLastUserLogin($userId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		$lastTime = $wpdb->get_results("SELECT event_timestamp FROM $tableName WHERE event_type = 0 AND user_id = $userId ORDER BY event_timestamp DESC LIMIT 1");
		foreach ($lastTime as $key) {
			$time = $key->event_timestamp;
		}
		return $time;
	}


	//Get total user logins
	function getAllUserLogin($userId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		$userLog = $wpdb->get_results("SELECT id FROM $tableName WHERE user_id = $userId");
		$count = 0;
		foreach ($userLog as $key) {
			$count++;
		}
		return $count;
	}

	//Get Last Viewed Program
	function getLastViewedProgram($userId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		$programLog = $wpdb->get_results("SELECT program_id FROM $tableName WHERE user_id = $userId ORDER BY event_timestamp DESC LIMIT 1");
		foreach ($programLog as $key) {
			$progId = $key->program_id;
		}
		return $progId;
	}


	//Get Last Viewed Exercise
	function getLastViewedExercise($userId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		$exerciseLog = $wpdb->get_results("SELECT exercise_id FROM $tableName WHERE user_id = $userId ORDER BY event_timestamp DESC LIMIT 1");
		foreach ($exerciseLog as $key) {
			$exerciseId = $key->exercise_id;
		}
		return $exerciseId;
	}

	//Get last program view function
	function getLastProgramView($programId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		$programLog = $wpdb->get_results("SELECT event_timestamp FROM $tableName WHERE program_id = $programId ORDER BY event_timestamp DESC LIMIT 1");
		foreach ($programLog as $key) {
			$time = $key->event_timestamp;
		}
		return $time;
	}


	//Get last exercise viewed function
	function getLastExerciseView($exerciseId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_tracking";
		$exerciseLog = $wpdb->get_results("SELECT event_timestamp FROM $tableName WHERE exercise_id = $exerciseId ORDER BY event_timestamp DESC LIMIT 1");
		foreach ($exerciseLog as $key) {
			$time = $key->event_timestamp;
		}
		return $time;
	}
}



