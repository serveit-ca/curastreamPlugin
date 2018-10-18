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

public $programId;
public $programName;
public $phases;
public $exercises;
public $custom;
public $dateCreated;
public $dateModified;



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
    // Get all Programs From Database
    public function getAllPrograms(){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_programs";

		$programResults = $wpdb->get_results("SELECT * FROM $tableName");
		if (count($programResults) > 0){ // If at least 1 Program then return the object
			return $programResults;
		} 
    }

    // Get all Exercises From Database
    public function getAllExercises(){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_exercises";

		$exerciseResults = $wpdb->get_results("SELECT * FROM $tableName");
		if (count($exerciseResults) > 0){ // If at least 1 Exercise then return the object
			return $exerciseResults;
		} 
    }


    // Gets a Single Exercise by That Exercises Id
    public function getAnExerciseById($exerciseId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_exercises";

		$exerciseResults = $wpdb->get_results("SELECT * FROM $tableName WHERE id = $exerciseId");
		if (count($exerciseResults) > 0){ // If at least 1 Exercise then return the object
			return $exerciseResults;
		} 
    }

    // Gets All Phases from Database
    public function getPhases(){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_phases";

		$phaseResults = $wpdb->get_results("SELECT * FROM $tableName");
		if (count($phaseResults) > 0){ // If at least 1 Phase then return the object
			return $phaseResults;
		} 
    }

    //Gets All Phases for a Given Program
    public function getPhasesByProgramId($programId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_phases";

		$phaseResults = $wpdb->get_results("SELECT * FROM $tableName WHERE program_id = $programId");
		if (count($phaseResults) > 0){ // If at least 1 Phase then return the object
			return $phaseResults;
		} 
    }

    public function getAPhaseById($phaseId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_phases";

		$phaseResults = $wpdb->get_results("SELECT * FROM $tableName WHERE id = $phaseId");
		if (count($phaseResults) > 0){ // If at least 1 Phase then return the object
			return $phaseResults;
		} 
    }

    public function createProgram(){

    }

    public function createPhase(){

    }

    public function makeCustom(){

    }

    public function updateProgram(){

    }

    public function updateExercise(){

    }

    public function updatePhase(){

    }

    public function deleteExercise(){

    }

}
?>

