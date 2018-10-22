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
		$tableName = $wpdb->prefix . "cura_programs";
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
		$tableName = $wpdb->prefix . "cura_programs";

		$programResults = $wpdb->get_results("SELECT * FROM $tableName");
		if (count($programResults) > 0){ // If at least 1 Program then return the object
			return $programResults;
		} 
    }

    // Get all Exercises From Database
    public function getAllExercises(){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_exercises";

		$exerciseResults = $wpdb->get_results("SELECT * FROM $tableName");
		if (count($exerciseResults) > 0){ // If at least 1 Exercise then return the object
			return $exerciseResults;
		} 
    }


    // Gets a Single Exercise by That Exercises Id
    public function getAnExerciseById($exerciseId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_exercises";

		$exerciseResults = $wpdb->get_results("SELECT * FROM $tableName WHERE id = $exerciseId");
		if (count($exerciseResults) > 0){ // If at least 1 Exercise then return the object
			return $exerciseResults;
		} 
    }

    // Gets All Phases from Database
    public function getAllPhases(){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";

		$phaseResults = $wpdb->get_results("SELECT * FROM $tableName");
		if (count($phaseResults) > 0){ // If at least 1 Phase then return the object
			return $phaseResults;
		} 
    }

    //Gets All Phases for a Given Program
    public function getPhasesByProgramId($programId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";

		$phaseResults = $wpdb->get_results("SELECT * FROM $tableName WHERE program_id = $programId");
		if (count($phaseResults) > 0){ // If at least 1 Phase then return the object
			return $phaseResults;
		} 
    }

    public function getAPhaseById($phaseId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";

		$phaseResults = $wpdb->get_results("SELECT * FROM $tableName WHERE id = $phaseId");
		if (count($phaseResults) > 0){ // If at least 1 Phase then return the object
			return $phaseResults;
		} 
    }

    public function createProgram($progName){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_programs";

    	$wpdb->insert($tableName, array(
    		"name" => $progName));

    	return "Success: Program " . $progName . " Created";
    }

    public function createExercise($exerciseName){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_exercises";

    	$wpdb->insert($tableName, array(
    		"name" => $exerciseName));

    	return "Success: Exercise " . $exerciseName . " Created";
    }

    public function createPhase($phaseName){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_phases";

    	$wpdb->insert($tableName, array(
    		"name" => $phaseName));

    	return "Success: Phase " . $phaseName . " Created";
    }

    public function makeCustom($programId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_programs";

    	$wpdb->update($tableName, array(
    		"customProgram" => "1"
    	), array( // Where Clause
    	 	"id" => $programId));

    	return "Success: Program with Id: " . $programId . " Made Custom";
    }

    //Checks Each argument to see if it is set, and if so updates the program row in the database with this information
    public function updateProgram($type, $description, $equipment, $duration, $weekly_plan, $life_style, $assoc_body_part_id,  $how_it_happen, $sports_occupation, $thumbnail, $state, $updated_on, $programId){

    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_programs";

    	//Check and Update Type
	    if (isset($type) && !is_null($type)){
	    	$wpdb->update($tableName, array(
    		"type" => $type),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    //Check and Update description
	    if (isset($description) && !is_null($description)){
	    	$wpdb->update($tableName, array(
    		"description" => $description),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    //Check and Update equipment
	    if (isset($equipment) && !is_null($equipment)){
	    	$wpdb->update($tableName, array(
    		"equipment" => $equipment),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    //Check and Update duration
	    if (isset($duration) && !is_null($duration)){
	    	$wpdb->update($tableName, array(
    		"duration" => $duration),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    //Check and Update weekly_plan
	    if (isset($weekly_plan) && !is_null($weekly_plan)){
	    	$wpdb->update($tableName, array(
    		"weekly_plan" => $weekly_plan),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    //Check and Update life_style
	    if (isset($life_style) && !is_null($life_style)){
	    	$wpdb->update($tableName, array(
    		"life_style" => $life_style),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    //Check and Update assoc_body_part_id
	    if (isset($assoc_body_part_id) && !is_null($assoc_body_part_id)){
	    	$wpdb->update($tableName, array(
    		"assoc_body_part_id" => $assoc_body_part_id),
    		array( // Where Clause
    	 	"id" => $programId));
	    }


	    //Check and Update how_it_happen
	    if (isset($how_it_happen) && !is_null($how_it_happen)){
	    	$wpdb->update($tableName, array(
    		"how_it_happen" => $how_it_happen),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    //Check and Update sports_occupation
	    if (isset($sports_occupation) && !is_null($sports_occupation)){
	    	$wpdb->update($tableName, array(
    		"sports_occupation" => $sports_occupation),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    //Check and Update thumbnail
	    if (isset($thumbnail) && !is_null($thumbnail)){
	    	$wpdb->update($tableName, array(
    		"thumbnail" => $thumbnail),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    //Check and Update state
	    if (isset($state) && !is_null($state)){
	    	$wpdb->update($tableName, array(
    		"state" => $state),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

	    return "Success: Program with Id: " . $programId . " Updated";

    }

    //Checks Each argument to see if it is set, and if so updates the program row in the database with this information
    public function updateExercise($order_no, $order_field, $name, $rest, $sets_reps, $variation, $equipment, $special_instructions, $exercise_video_url, $file_url, $file_name, $exerciseId){

    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_exercises";

    	//Check and Update order_no
	    if (isset($order_no) && !is_null($order_no)){
	    	$wpdb->update($tableName, array(
    		"order_no" => $order_no),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }

	    //Check and Update order_field
	    if (isset($order_field) && !is_null($order_field)){
	    	$wpdb->update($tableName, array(
    		"order_field" => $order_field),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }

	    //Check and Update name
	    if (isset($name) && !is_null($name)){
	    	$wpdb->update($tableName, array(
    		"name" => $name),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }
	    //Check and Update rest
	    if (isset($rest) && !is_null($rest)){
	    	$wpdb->update($tableName, array(
    		"rest" => $rest),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }
	    //Check and Update sets_reps
	    if (isset($sets_reps) && !is_null($sets_reps)){
	    	$wpdb->update($tableName, array(
    		"sets_reps" => $sets_reps),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }
	    //Check and Update variation
	    if (isset($variation) && !is_null($variation)){
	    	$wpdb->update($tableName, array(
    		"variation" => $variation),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }
	    //Check and Update equipment
	    if (isset($equipment) && !is_null($equipment)){
	    	$wpdb->update($tableName, array(
    		"equipment" => $equipment),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }
	    //Check and Update special_instructions
	    if (isset($special_instructions) && !is_null($special_instructions)){
	    	$wpdb->update($tableName, array(
    		"special_instructions" => $special_instructions),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }
	    //Check and Update exercise_video_url
	    if (isset($exercise_video_url) && !is_null($exercise_video_url)){
	    	$wpdb->update($tableName, array(
    		"exercise_video_url" => $exercise_video_url),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }
	    //Check and Update file_url
	    if (isset($file_url) && !is_null($file_url)){
	    	$wpdb->update($tableName, array(
    		"file_url" => $file_url),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }
	    //Check and Update file_name
	    if (isset($file_name) && !is_null($file_name)){
	    	$wpdb->update($tableName, array(
    		"file_name" => $file_name),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }

	    return "Success: Exercise with Id: " . $exerciseId . " Updated";
    }

    public function updatePhase($name, $duration, $intro, $notes, $updated_on, $phaseId){

    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_phases";

    	//Check and Update name
	    if (isset($name) && !is_null($name)){
	    	$wpdb->update($tableName, array(
    		"name" => $name),
    		array( // Where Clause
    	 	"id" => $phaseId));
	    }

	    //Check and Update duration
	    if (isset($duration) && !is_null($duration)){
	    	$wpdb->update($tableName, array(
    		"duration" => $duration),
    		array( // Where Clause
    	 	"id" => $phaseId));
	    }

	    //Check and Update intro
	    if (isset($intro) && !is_null($intro)){
	    	$wpdb->update($tableName, array(
    		"intro" => $intro),
    		array( // Where Clause
    	 	"id" => $phaseId));
	    }

	    //Check and Update notes
	    if (isset($notes) && !is_null($notes)){
	    	$wpdb->update($tableName, array(
    		"notes" => $notes),
    		array( // Where Clause
    	 	"id" => $phaseId));
	    }

	    //Check and Update updated_on
	    if (isset($updated_on) && !is_null($updated_on)){
	    	$wpdb->update($tableName, array(
    		"updated_on" => $updated_on),
    		array( // Where Clause
    	 	"id" => $phaseId));
	    }

	    return "Success: Phase with Id: " . $phaseId . " Updated";
    }

    public function deleteExercise($exerciseId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_exercises";

    	$wpdb->delete($tableName, array(
    		"id" => $exerciseId
    	));

    	return "Success: Exercise with Id: " . $exerciseId . " Deleted";

    }

    public function deletePhase($phaseId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_phases";

    	$wpdb->delete($tableName, array(
    		"id" => $phaseId
    	));

    	return "Success: Phase with Id: " . $phaseId . " Deleted";

    }

    public function deleteProgram($programId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_programs";

    	$wpdb->delete($tableName, array(
    		"id" => $programId
    	));

    	return "Success: Program with Id: " . $programId . " Deleted";

    }

}
?>

