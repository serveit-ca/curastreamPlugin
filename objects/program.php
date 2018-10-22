<?php

require_once("phase.php");
require_once("exercise.php");
class program
{
public $id;
public $name;
public $type;
public $description;
public $duration;
public $equipment;
public $weeklyPlan;
public $lifeStyle;
public $assocBodyPartId;
public $current;
public $completed;
public $thumbnailUrl;
public $body_part;
public $sport_occupation;
public $injury_cause;
public $howItHappen;
public $sportsOccupation;
public $thumbnail;
public $state;
public $createdOn;
public $updatedOn;
public $custom;
public $programId;
public $programName;
public $phases;
public $exercises;
public $dateCreated;
public $dateModified;




    public  function __construct() {
    }

    public function printError($wpdb){
    	
    	if($wpdb->last_error !== ''){
    		$error = "Error: " . $wpdb->last_error;
    	}
    	else{
    		$error = "No Error";
    	}
    	return $error;
    }

    	// Get Program By Id
	public function getProgramById($programId){
		global $wpdb;
		$program_table = 'dev_cura_programs';
		$programs = $wpdb->get_row("SELECT * FROM $program_table WHERE id = $programId" , ARRAY_A);

		$this->id = $programs["id"];
		$this->name = $programs["name"];
		$this->type = $programs["type"];
		$this->description = $programs["description"];
		$this->duration = $programs["duration"];
		$this->equipment = $programs["equipment"];
		$this->duration = $programs['duration'];
		$this->weeklyPlan = $programs['weekly_plan'];
		$this->lifeStyle = $programs['life_style'];
		$this->body_part = $programs['assoc_body_part_id'];
		$this->howItHappen = $programs['how_it_happen'];
		$this->sportsOccupation = $programs['sports_occupation'];
		$this->thumbnail = $programs['thumbnail'];
		$this->state = $programs['state'];
		$this->createdOn = $programs['created_on'];
		$this->updatedOn = $programs['updated_on'];
		$this->custom = $programs['customProgram'];
		return $this;
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

		$programResults = $wpdb->get_results("SELECT * FROM $tableName ORDER BY name", ARRAY_A);

		$programs = array();
        foreach ($programResults as $row) {
            $program = new program();
            $program->id = $row['id'];
			$program->name = $row['name'];
			$program->description = $row['description'];
			$program->equipment = $row['equipment'];
			$program->duration = $row['duration'];
			$program->weekly_plan = $row['weekly_plan'];
			$program->life_style = $row['life_style'];
			$program->assoc_body_part_id = $row['assoc_body_part_id'];
			$program->how_it_happen = $row['how_it_happen'];
			$program->sports_occupation = $row['sports_occupation'];
			$program->thumbnail = $row['thumbnail'];
			$program->state = $row['state'];
			$programs[] = $program;
        }
			return $programs;
    }

    // Get all Exercises From Database
    public function getAllExercises(){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_exercises";

		$exerciseResults = $wpdb->get_results("SELECT * FROM $tableName ORDER BY name", ARRAY_A);
		$exercies = array();
        foreach ($exerciseResults as $row) {
            $anExercise = new exercise();
			$anExercise->id = $row['id'];
			$anExercise->name = $row['name'];
			$anExercise->phase_id = $row['phase_id'];
			$anExercise->order_no = $row['order_no'];
			$anExercise->order_field = $row['order_field'];
			$anExercise->rest = $row['rest'];
			$anExercise->sets_reps = $row['sets_reps'];
			$anExercise->variation = $row['variation'];
			$anExercise->equipment = $row['equipment'];
			$anExercise->special_instructions = $row['special_instructions'];
			$anExercise->exercise_video_url = $row['exercise_video_url'];
			$anExercise->file_url = $row['file_url'];
			$anExercise->file_name = $row['file_name'];
			$exercies[] = $anExercise;
        }
			return $exercies;
    }


    // Gets a Single Exercise by That Exercises Id
    public function getAnExerciseById($exerciseId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_exercises";

		$exerciseResults = $wpdb->get_row("SELECT * FROM $tableName WHERE id = $exerciseId", ARRAY_A);
		
            $anExercise = new exercise();
			$anExercise->id = $exerciseResults['id'];
			$anExercise->name = $exerciseResults['name'];
			$anExercise->phase_id = $exerciseResults['phase_id'];
			$anExercise->order_no = $exerciseResults['order_no'];
			$anExercise->order_field = $exerciseResults['order_field'];
			$anExercise->rest = $exerciseResults['rest'];
			$anExercise->sets_reps = $exerciseResults['sets_reps'];
			$anExercise->variation = $exerciseResults['variation'];
			$anExercise->equipment = $exerciseResults['equipment'];
			$anExercise->special_instructions = $exerciseResults['special_instructions'];
			$anExercise->exercise_video_url = $exerciseResults['exercise_video_url'];
			$anExercise->file_url = $exerciseResults['file_url'];
			$anExercise->file_name = $exerciseResults['file_name'];
			
			return $anExercise;
        
			
    }

    // Gets All Phases from Database and retrun an array of phase objects
    public function getAllPhases(){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";

		$phaseResults = $wpdb->get_results("SELECT * FROM $tableName");
		
		 $phases = array();
        foreach ($phaseResults as $row) {
            $phase = new phase();
            $phase->id = $row['id'];
			$phase->programId = $row['program_id'];
			$phase->name = $row['name'];
			$phase->duration = $row['duration'];
			$phase->intro = $row['intro'];
			$phase->notes = $row['notes'];
			$phases[] = $phase;
        }
			return $phases;
	}
    

    //Gets All Phases for a Given Program
    public function getPhasesByProgramId($programId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";

		$phaseResults = $wpdb->get_results("SELECT * FROM $tableName WHERE program_id = $programId", ARRAY_A);
		 $allPhases = array();
        foreach ($phaseResults as $row) {
            $aPhase = new phase();
            $aPhase->id = $row['id'];
			$aPhase->programId = $row['program_id'];
			$aPhase->name = $row['name'];
			$aPhase->duration = $row['duration'];
			$aPhase->intro = $row['intro'];
			$aPhase->notes = $row['notes'];
			$allPhases[] = $aPhase;
        }
			return $allPhases;
		}



    public function getAPhaseById($phaseId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";

		$phaseResults = $wpdb->get_results("SELECT * FROM $tableName WHERE id = $phaseId", ARRAY_A);
		
		foreach ($phaseResults as $row) {
			$aPhase = new phase();
            $aPhase->id = $row['id'];
			$aPhase->programId = $row['program_id'];
			$aPhase->name = $row['name'];
			$aPhase->duration = $row['duration'];
			$aPhase->intro = $row['intro'];
			$aPhase->notes = $row['notes'];
			return $aPhase;
		}
    }

    //Gets All Phases for a Given Program
    public function getExercisesByPhaseId($phaseId){
    	global $wpdb;
		$tableNameA = $wpdb->prefix . "cura_exercises e";
		$tableNameB = $wpdb->prefix . "cura_exercise_videos v";

		$exerciseResults = $wpdb->get_results("SELECT e.id, e.name, e.phase_id, e.order_no, e.order_field, e.rest, e.sets_reps, e.variation, e.equipment, e.special_instructions, e.exercise_video_url, e.file_url, e.file_name, e.customExercise, v.videoThumbnail FROM $tableNameA , $tableNameB WHERE phase_id = $phaseId AND v.id = e.exercise_video_id ORDER BY order_no", ARRAY_A);
		 $allExercises = array();
        foreach ($exerciseResults as $row) {
            $aExercise = new exercise();
            $aExercise->id = $row['id'];
			$aExercise->name = $row['name'];
			$aExercise->phase_id = $row['phase_id'];
			$aExercise->order_no = $row['order_no'];
			$aExercise->order_field = $row['order_field'];
			$aExercise->rest = $row['rest'];
			$aExercise->sets_reps = $row['sets_reps'];
			$aExercise->variation = $row['variation'];
			$aExercise->equipment = $row['equipment'];
			$aExercise->special_instructions = $row['special_instructions'];
			$aExercise->exercise_video_url = $row['exercise_video_url'];
			$aExercise->file_url = $row['file_url'];
			$aExercise->file_name = $row['file_name'];
			$aExercise->customExercise = $row['customExercise'];
			$aExercise->thumbnailUrl = $row['videoThumbnail'];
			$aExercise->videoId = explode('/', explode('.', $aExercise->exercise_video_url)[2])[2];

			$allExercises[] = $aExercise;
        }
			return $allExercises;
		}

    public function createProgram($progName){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_programs";

    	$wpdb->insert($tableName, array(
    		"name" => $progName));

    	if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return "Success: Program with Name: " . $progName . " Created";
   		 
   		 }
    }

    public function createExercise($exerciseName, $phaseId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_exercises";

    	$wpdb->insert($tableName, array(
    		"name" => $exerciseName,
    		"phase_id" => $phaseId));

    	if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return "Success: Exercise with Name: " . $exerciseName . " Created";
   		 
   		 }
    }

    public function createPhase($phaseName, $progId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_phases";

    	$wpdb->insert($tableName, array(
    		"name" => $phaseName,
    		"program_id" => $progId));

    	if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return "Success: Phase with Name: " . $phaseName . " Created";
   		 
   		 }
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

	    if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return "Success: Program with Id: " . $programId . " Updated";
   		 
   		 }

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

	    if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return "Success: Exercise with Id: " . $exerciseId . " Update";
   		 
   		 }
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

	    if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return "Success: Phase with Id: " . $phaseId . " Deleted";
   		 
   		 }
    }

    public function deleteExercise($exerciseId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_exercises";

    	$wpdb->delete($tableName, array(
    		"id" => $exerciseId
    	));

    	if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return "Success: Exercise with Id: " . $exerciseId . " Deleted";
   		 
   		 }

    }

    public function deletePhase($phaseId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_phases";

    	$wpdb->delete($tableName, array(
    		"id" => $phaseId
    	));

    	if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return "Success: Phase with Id: " . $phaseId . " Deleted";
   		 
   		 }

    }

    public function deleteProgram($programId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_programs";

    	$wpdb->delete($tableName, array(
    		"id" => $programId
    	));

    	if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return "Success: Program with Id: " . $programId . " Deleted";
   		 
   		 }

    }

    public function duplicateProgram($oldProgId, $userId){
    	global $wpdb;
    	$program = new program();
    	//Get Original Program
    	$originalProgram = $program->getProgramById($oldProgId);
    	// get the username based on the program id 
    	$user = get_user_by("ID" , $userId);
    	$userName = $user['first_name'] . " " . $user['last_name'];
    	// create a new name with CP - Old Program Name - Username 
    	$newProgName = "CP - " . $originalProgram->name . " - " . $userName;
    	//create a new program with the new name 
    	$program->createProgram($newProgName);
    	// get the new program id 
    	$newProgramId = $wpdb->insert_id;
    	// assign the meta data using updateProgram
    	foreach ($originalProgram as $progrow) {
			$program->type = $progrow['type'];
			$program->description = $progrow['description'];
			$program->duration = $progrow['duration'];
			$program->equipment = $progrow['equipment'];
			$program->weeklyPlan = $progrow['weekly_plan'];
			$program->lifeStyle = $progrow['life_style'];
			$program->assocBodyPartId = $progrow['assoc_body_part_id'];
			$program->howItHappen = $progrow['how_it_happen'];
			$program->sportsOccupation = $progrow['sports_occupation'];
			$program->thumbnail = $progrow['thumbnail'];
			$program->state = $progrow['state'];
			$program->updatedOn = $progrow['updated_on'];

    	}
    	$program->updateProgram($program->type, $program->description, $program->equipment, $program->duration, $program->weeklyPlan, $program->lifeStyle, $program->assocBodyPartId, $program->howItHappen, $program->sportsOccupation, $program->thumbnail, $program->state, $program->updatedOn, $newProgId);
    	// get all of the phases of the old program 
    	$phases = $program->getPhasesByProgramId($oldProgId);
    		// Iterate through each phase
    	foreach ($phase as $row) {
    		// create a new phase based on the new program id
    		$program->createPhase($row['name'] , $newProgramId);
    		// assign the meta data using updatePhase
    		$recentPhase = $wpdb->insert_id;
    		$program->updatePhase($row['name'], $row['duration'], $row['intro'], $row['notes'], $row['updated_on'], $recentPhase);
    		// get each exercise from the old phase 
    		$exercises = $program->getExercisesByPhaseId($recentPhase);
    		// create a new exercise based on the new phoase id
    		foreach ($exercises as $exrow) {
    		 	$program->createExercise($exrow['name'] , $recentPhase);
    		 	// assign the meta data using updateExercise
    		 	$recentExercise = $wpdb->insert_id;
    		 	$program->updateExercise($exrow['order_no'], $exrow['order_field'], $exrow['name'], $exrow['rest'], $exrow['sets_reps'], $exrow['variation'], $exrow['equipment'], $exrow['special_instructions'], $exrow['exercise_video_url'], $exrow['file_url'], $exrow['file_name'], $recentExercise);
    		 } 
    	}
    	return $newProgramID;
    

    	/* //Get That Program's Phases
    	$originalPhases = getPhasesByProgramId($oldProgId);
    	//Get Those Phases Exercises
    	$originalExercises = array();
    	$i = 0;
    	foreach($originalPhases as $row){
    		$originalExercises[i] = getExercisesByPhaseId($row['id']);
    		$i++;
    	}

    	//Make New Program with Same Name
    	createProgram($orignalProgram['name']);
    	$newProgId = $wpdb->insert_id;
    	//Update that program using inputs from the old programs outputs
    	updateProgram($originalProgram['type'], $originalProgram['description'], $originalProgram['equipment'], $originalProgram['duration'], $originalProgram['weekly_plan'], $originalProgram['life_style'], $originalProgram['assoc_body_part_id'],  $originalProgram['how_it_happen'], $originalProgram['sports_occupation'], $originalProgram['thumbnail'], $originalProgram['state'], $originalProgram['updated_on'], $newProgId);
    	//Copy the same for phases.
    	//Copy the same for exercises
		*/
    }

    public function updateDatabase(){
     	$allExercises = $this->getAllExercises();
     	$log = "";
	    foreach ($allExercises as $exercise){
	    		global $wpdb;
			$tableName = $wpdb->prefix . "cura_exercise_videos";

			$exerciseResults = $wpdb->get_row("SELECT * FROM $tableName WHERE url like '$exercise->exercise_video_url'",ARRAY_A);
			$log.= "New Exercise";
			$log.= $exerciseResults['id'];
			$log.= $exerciseResults['url'];
			$log.= $exercise->exercise_video_url;
	
			$value = array('exercise_video_id'=>$exerciseResults['id']);
			$where = array('exercise_video_url'=>$exercise->exercise_video_url);
			$log.=implode("",$value);
			$log.=implode("",$where);
			$log.="<br /><br />";
			$update = $wpdb->update("dev_cura_exercises",$value,$where);
	    }
	    return $log;
	}
}

?>

