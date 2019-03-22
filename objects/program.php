<?php
add_action( 'plugins_loaded', array( 'program', 'init' ));


 

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
public $status;
public $thumbnailUrl;
public $body_part;
public $howItHappen; 
public $sportsOccupation;
public $thumbnail; //dupe - check refs, thumnailUrl is gone.
public $state;
public $createdOn;
public $updatedOn;
public $custom;
public $phases;
public $exercises;
public $tempUserId;




    public  function __construct() {
    }

    public static function init() {
       $class = __CLASS__;
       new $class;
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
        $program_table =$wpdb->prefix . "cura_programs";
        $programs = $wpdb->get_row("SELECT id, name, type, description, duration, equipment, duration, weekly_plan, life_style, assoc_body_part_id, how_it_happen, sports_occupation, thumbnail, state, created_on, updated_on, customProgram, tempUserId FROM $program_table WHERE id = $programId" , ARRAY_A);
        $this->id = $programs["id"];
        $this->name = $programs["name"];
        $this->type = $programs["type"];
        $this->description = $programs["description"];
        $this->duration = $programs["duration"];
        $this->equipment = $programs["equipment"];
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
        $this->tempUserId = $programs['tempUserId'];
        $this->status = $this->checkAssigned($programs["id"], $programs['tempUserId']);
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
		$tableName = $wpdb->prefix . "cura_programs";

		$programResults = $wpdb->get_results("SELECT id, name, type, description, equipment, duration, weekly_plan, life_style, assoc_body_part_id, how_it_happen, sports_occupation, thumbnail, state FROM $tableName ORDER BY name", ARRAY_A);

		$programs = array();
        foreach ($programResults as $row) {
            $program = new program();
            $program->id = $row['id'];
			$program->name = $row['name'];
            $program->type = $row['type'];
			$program->description = $row['description'];
			$program->equipment = $row['equipment'];
			$program->duration = $row['duration'];
			$program->weeklyPlan = $row['weekly_plan'];
			$program->lifeStyle = $row['life_style'];
			$program->body_part = $row['assoc_body_part_id'];
			$program->howItHappen = $row['how_it_happen'];
			$program->sportsOccupation = $row['sports_occupation'];
			$program->thumbnail = $row['thumbnail'];
			$program->state = $row['state'];
			$programs[] = $program;
        }
			return $programs;
    }

       // Get all Programs From Database
    public function getAllCustomPrograms(){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_programs";

        $programResults = $wpdb->get_results("SELECT * FROM $tableName WHERE customProgram = 1 ORDER BY name", ARRAY_A);

        $programs = array();
        foreach ($programResults as $row) {
            $program = new program();
            $program->id = $row['id'];
            $program->name = $row['name'];
            $program->type = $row['type'];
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

    public function getAllActiveGenericPrograms($userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_programs";

        $programResults = $wpdb->get_results("SELECT id, name, type, description, equipment, duration, weekly_plan, life_style, assoc_body_part_id, how_it_happen, sports_occupation, thumbnail, state FROM $tableName WHERE customProgram = 0 AND state = 0 ORDER BY name", ARRAY_A);

        $programs = array();
        foreach ($programResults as $row) {
            $program = new program();
            $program->id = $row['id'];
            $program->name = $row['name'];
            $program->type = $row['type'];
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
            $program->current = $program->checkCurrent($userId, $row['id']);
            $program->completed = $program->checkCompleted($userId, $row['id']);
            $programs[] = $program;
        }
            return $programs;
    }

    public function getAllGenericPrograms(){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_programs";

        $programResults = $wpdb->get_results("SELECT id, name, type, description, equipment, duration, weekly_plan, life_style, assoc_body_part_id, how_it_happen, sports_occupation, thumbnail, state FROM $tableName WHERE customProgram = 0 ORDER BY name", ARRAY_A);

        $programs = array();
        foreach ($programResults as $row) {
            $program = new program();
            $program->id = $row['id'];
            $program->name = $row['name'];
            $program->type = $row['type'];
            $program->description = $row['description'];
            $program->equipment = $row['equipment'];
            $program->duration = $row['duration'];
            $program->weeklyPlan = $row['weekly_plan'];
            $program->lifeStyle = $row['life_style'];
            $program->body_part = $row['assoc_body_part_id'];
            $program->howItHappen = $row['how_it_happen'];
            $program->sportsOccupation = $row['sports_occupation'];
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

		$exerciseResults = $wpdb->get_results("SELECT id, name, phase_id, order_no, order_field, rest, sets_reps, variation, equipment, special_instructions, exercise_video_url, file_url, file_name FROM $tableName ORDER BY name", ARRAY_A);
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

    	// Gets all Body Parts returns as assoc array

    public function getAllBodyParts(){
    	global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_body_parts";
        
        
        $body_parts = $wpdb->get_results("SELECT id, name FROM $tableName ORDER BY name");
        return $body_parts;
    }

    function getAllInjuries(){
    	global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_how_it_happened";
        $injuries = $wpdb->get_results( "SELECT id, name FROM $tableName ORDER BY name");
        return $injuries;
    }

    function getAllSports(){
    	global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_sport_occupation";
        $sports = $wpdb->get_results("SELECT id, name FROM $tableName WHERE type like 'sport' ORDER BY name");
    
        return $sports;
    }

    function getAllOccupations(){
    	global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_sport_occupation";
        $occupations = $wpdb->get_results("SELECT id, name FROM $tableName WHERE type like 'occupation' ORDER BY name");
    
        return $occupations;
    }

    function getAllSportsOccupations(){
    	global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_sport_occupation";
        $sports_occupations = $wpdb->get_results("SELECT id, name, type FROM $tableName ORDER BY name");
    
        return $sports_occupations;
    }

    function getAllCategories(){
        global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_body_parts";
        $sql = "SELECT DISTINCT(category_name) FROM dev_cura_exercise_videos ORDER BY category_name;";
        $categories = $wpdb->get_results( $sql );
        return $categories;
    }


      
    
 // Get all Exercises From Database
    public function getAllExerciseVideos($userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_exercise_videos";

        $exerciseResults = $wpdb->get_results("SELECT id, name, description, assoc_body_parts_name, category_name, url, videoThumbnail  FROM $tableName ORDER BY name");
        $exercies = array();
        foreach ($exerciseResults as $row) {
            $anExercise = new exercise();
            $anExercise->id = $row->id;
            $anExercise->name = $row->name;
            $anExercise->description = $row->description;
            $anExercise->bodyPart = $row->assoc_body_parts_name;
            $anExercise->category = $row->category_name;
            $anExercise->videoId = explode('/', explode('.', $row->url)[2])[2];
            $anExercise->thumbnail = $row->videoThumbnail;
            $anExercise->favorate = $anExercise->checkFavorite($userId, $anExercise->id);
            $exercies[] = $anExercise;
        }
            return $exercies;
    }

    public function getExerciseVideoById($videoId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_exercise_videos";

        $exerciseResults = $wpdb->get_row("SELECT id, name, description, assoc_body_parts_name, category_name, url, videoThumbnail  FROM $tableName WHERE id = $videoId");
       
            $anExercise = new exercise();
            $anExercise->id = $exerciseResults->id;
            $anExercise->name = $exerciseResults->name;
            $anExercise->description = $exerciseResults->description;
            $anExercise->bodyPart = $exerciseResults->assoc_body_parts_name;
            $anExercise->category = $exerciseResults->category_name;
            $anExercise->thumbnail = $exerciseResults->videoThumbnail;
            return $anExercise;
    }



    // Get all Exercises From Database without user favorites.
    public function getAllExerciseVideosNoFavorite(){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_exercise_videos";

        $exerciseResults = $wpdb->get_results("SELECT id, name, description, assoc_body_parts_name, category_name, url, videoThumbnail  FROM $tableName ORDER BY name");
        $exercies = array();
        foreach ($exerciseResults as $row) {
            $anExercise = new exercise();
            $anExercise->id = $row->id;
            $anExercise->name = $row->name;
            $anExercise->description = $row->description;
            $anExercise->bodyPart = $row->assoc_body_parts_name;
            $anExercise->category = $row->category_name;
            $anExercise->videoId = explode('/', explode('.', $row->url)[2])[2];
            $anExercise->thumbnail = $row->videoThumbnail;
            $anExercise->url = $row->url;
            $exercies[] = $anExercise;
        }
            return $exercies;
    }


    // Gets a Single Exercise by That Exercises Id
    public function getAnExerciseById($exerciseId){
    	global $wpdb;
    	$tableNameA = $wpdb->prefix . "cura_exercises e";
		$tableNameB = $wpdb->prefix . "cura_exercise_videos v";

		$exerciseResults = $wpdb->get_row("SELECT e.id, e.name, e.phase_id, e.order_no, e.order_field, e.rest, e.sets_reps, e.variation, e.equipment, e.special_instructions, e.exercise_video_url, e.file_url, e.file_name, v.videoThumbnail FROM $tableNameA , $tableNameB WHERE e.id = $exerciseId AND v.id = e.exercise_video_id", ARRAY_A);
		  
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
            list($vc0,$vc1,$vc2) = array_pad(explode('.', $exerciseResults['exercise_video_url'],4),4,null);
            list($vcId0,$vcId1,$vcId2) = array_pad(explode('/', $vc2,4),4,null);
            $anExercise->videoId = $vcId2;
			$anExercise->file_url = $exerciseResults['file_url'];
			$anExercise->file_name = $exerciseResults['file_name'];
			$anExercise->thumbnail = $exerciseResults['videoThumbnail'];
			
			return $anExercise;
        
			
    }
     public function getAnExerciseByVideoId($exerciseId){
        global $wpdb;
        $tableNameA = $wpdb->prefix . "cura_exercises e";
        $tableNameB = $wpdb->prefix . "cura_exercise_videos v";

        $exerciseResults = $wpdb->get_row("SELECT e.id, e.name, e.phase_id, e.order_no, e.order_field, e.rest, e.sets_reps, e.variation, e.equipment, e.special_instructions, e.exercise_video_url, e.file_url, e.file_name, v.videoThumbnail FROM $tableNameA , $tableNameB WHERE v.id = $exerciseId AND v.id = e.exercise_video_id", ARRAY_A);
          
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
            list($vc0,$vc1,$vc2) = array_pad(explode('.', $exerciseResults['exercise_video_url'],4),4,null);
            list($vcId0,$vcId1,$vcId2) = array_pad(explode('/', $vc2,4),4,null);
            $anExercise->videoId = $vcId2;
            $anExercise->file_url = $exerciseResults['file_url'];
            $anExercise->file_name = $exerciseResults['file_name'];
            $anExercise->thumbnailUrl = $exerciseResults['videoThumbnail'];
            
            return $anExercise;
        
            
    }

    // Gets All Phases from Database and retrun an array of phase objects
    public function getAllPhases(){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";
		$phaseResults = $wpdb->get_results("SELECT id, program_id, name, duration, intro, notes FROM $tableName", ARRAY_A);

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

		$phaseResults = $wpdb->get_results("SELECT id, program_id, name, duration, intro, notes, order_no FROM $tableName WHERE program_id = $programId", ARRAY_A);
		 $allPhases = array();
        foreach ($phaseResults as $row) {
            $aPhase = new phase();
            $aPhase->id = $row['id'];
			$aPhase->programId = $row['program_id'];
			$aPhase->name = $row['name'];
			$aPhase->duration = $row['duration'];
			$aPhase->intro = $row['intro'];
			$aPhase->notes = $row['notes'];
			$aPhase->order_no = $row['order_no'];
			$allPhases[] = $aPhase;
        }
			return $allPhases;
		}



    public function getAPhaseById($phaseId){
    	global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";

		$row = $wpdb->get_row("SELECT id, program_id, name, duration, intro, notes, order_no FROM $tableName WHERE id = $phaseId", ARRAY_A);
		
			$aPhase = new phase();
            $aPhase->id = $row['id'];
			$aPhase->programId = $row['program_id'];
			$aPhase->name = $row['name'];
			$aPhase->duration = $row['duration'];
			$aPhase->intro = $row['intro'];
			$aPhase->notes = $row['notes'];
			$aPhase->order_no = $row['order_no'];
			return $aPhase;
    }

    //Gets All Phases for a Given Program
    public function getExercisesByPhaseId($phaseId){
    	global $wpdb;
		$tableNameA = $wpdb->prefix . "cura_exercises e";
		$tableNameB = $wpdb->prefix . "cura_exercise_videos v";

		$exerciseResults = $wpdb->get_results("SELECT e.id, e.name, e.phase_id, e.order_no, e.order_field, e.rest, e.sets_reps, e.variation, e.equipment, e.special_instructions, e.exercise_video_url, e.file_url, e.file_name, e.exercise_video_id, v.videoThumbnail FROM $tableNameA , $tableNameB WHERE phase_id = $phaseId AND v.id = e.exercise_video_id ORDER BY order_no", ARRAY_A);
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
			$aExercise->thumbnail = $row['videoThumbnail'];
			$aExercise->exercise_video_id = $row['exercise_video_id'];
			list($vc0,$vc1,$vc2) = array_pad(explode('.', $row['exercise_video_url'],4),4,null);
            list($vcId0,$vcId1,$vcId2) = array_pad(explode('/', $vc2,4),4,null);
            $aExercise->videoId = $vcId2;
			$allExercises[] = $aExercise;
        }
			return $allExercises;
		}

    public function createProgram($progName){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_programs";

    	$wpdb->insert($tableName, array(
    		"name" => $progName,
    		"state"=> 0));
    	$lastId = $wpdb->insert_id;

    	if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
   		 	return $lastId;
   		 
   		 }
    }

    
public function createExerciseByName($name, $phaseId){
	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_exercises";
    	$wpdb->insert($tableName, array(
    		"name" => $name,
    		"phase_id" => $phaseId,
    		));
    	  $lastId = $wpdb->insert_id;

    	if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
			  return $lastId;
   		 
         
   		 }
}
    public function createExercise($exerciseId, $phaseId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_exercise_videos";
    	$exerciseVid = $wpdb->get_row("SELECT id, name, url FROM $tableName WHERE id = $exerciseId", ARRAY_A);

    	$tableName = $wpdb->prefix . "cura_exercises";

    	$wpdb->insert($tableName, array(
    		"name" => $exerciseVid['name'],
    		"phase_id" => $phaseId,
    		"exercise_video_id" => $exerciseVid['id'],
    		"exercise_video_url" => $exerciseVid['url']
    		));
    	  $lastId = $wpdb->insert_id;

    	if($this->printError($wpdb) != "No Error"){
    		$error = $this->printError($wpdb);
    		return $error;
   		 }
   		 else{
			  return $lastId;
   		 
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
   		 	// get the latest phase 
   		 	$newPhase = $wpdb->get_row("SELECT id FROM $tableName ORDER BY id DESC LIMIT 0,1");
			return $newPhase->id;
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

    public function makeGeneral($programId){
    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_programs";

    	$wpdb->update($tableName, array(
    		"customProgram" => "0",
            "tempUserId" => ""
    	), array( // Where Clause
    	 	"id" => $programId));

    	return "Success: Program with Id: " . $programId . " Made Custom";
    }

    //Checks Each argument to see if it is set, and if so updates the program row in the database with this information
    public function updateProgram($name, $type, $description, $equipment, $duration, $weekly_plan, $life_style, $assoc_body_part_id,  $how_it_happen, $sports_occupation, $thumbnail, $state, $tempUserId, $programId){

    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_programs";

    	//Check and Update Type
	    if (isset($name) && !is_null($name)){
	    	$wpdb->update($tableName, array(
    		"name" => $name),
    		array( // Where Clause
    	 	"id" => $programId));
	    }

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

        //Check and Update tempUserId
        if (isset($tempUserId) && !is_null($tempUserId)){
            $wpdb->update($tableName, array(
            "tempUserId" => $tempUserId),
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
    public function updateExercise($order_no, $phase_id, $order_field, $name, $rest, $sets_reps, $variation, $equipment, $special_instructions, $exercise_video_url, $file_url, $file_name, $exercise_video_id, $exerciseId){

    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_exercises";

    	//Check and Update order_no
	    if (isset($order_no) && !is_null($order_no)){
	    	$wpdb->update($tableName, array(
    		"order_no" => $order_no),
    		array( // Where Clause
    	 	"id" => $exerciseId));
	    }

	    //Check and Update phase_id
	    if (isset($phase_id) && !is_null($phase_id)){
	    	$wpdb->update($tableName, array(
    		"phase_id" => $phase_id),
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
	    //Check and Update exercise Video id 
	    if (isset($exercise_video_id) && !is_null($exercise_video_id)){
	    	$wpdb->update($tableName, array(
    		"exercise_video_id" => $exercise_video_id),
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

    public function updatePhase($name, $duration, $intro, $notes, $order_no, $phaseId){

    	global $wpdb;
    	$tableName = $wpdb->prefix . "cura_phases";

    	//Check and Update name
	    if (isset($name) && !is_null($name)){
	    	$wpdb->update($tableName, array(
    		"name" => $name),
    		array( // Where Clause
    	 	"id" => $phaseId));
	    }

	    //Check and Update duratio
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

	    //Check and Update order_no
	    if (isset($order_no) && !is_null($order_no)){
	    	$wpdb->update($tableName, array(
    		"order_no" => $order_no),
    		array( // Where Clause
    	 	"id" => $phaseId));
            //echo "<br> Order No Updated";
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

public function duplicateGeneralProgram($existingProgram){
    	global $wpdb;
    	//Get Original Program
    	$originalProgram = $this->getProgramById($existingProgram);
    	// get the username based on the program id 
    	$newProgramName = $originalProgram->name . " - Copy";
    	//create a new program with the new name 
    	// get the new program id 
    	$newProgramId = $this->createProgram($newProgramName);
    	$this->updateProgram($newProgramName, $this->type, $this->description, $this->equipment, $this->duration, $this->weeklyPlan, $this->lifeStyle, $this->body_part, $this->howItHappen, $this->sportsOccupation, $this->thumbnail, $this->state, $this->tempUserId, $newProgramId);
    	// get all of the phases of the old program 
    	$phases = $this->getPhasesByProgramId($existingProgram);
    		// Iterate through each phase
    	foreach ($phases as $row) {
    		// create a new phase based on the new program id
    		 $recentPhase = $this->createPhase($row->name , $newProgramId);
    		// assign the meta data using updatePhase
    		$this->updatePhase($row->name, $row->duration, $row->intro, $row->notes, $row->order_no,  $recentPhase);
    		// get each exercise from the old phase 
    		$exercises = $this->getExercisesByPhaseId($row->id);
    		// create a new exercise based on the new phoase id
    		foreach ($exercises as $exrow) {
			$recentExercise = $this->createExerciseByName($exrow->name , $recentPhase);
                $this->updateExercise($exrow->order_no,$recentPhase, $exrow->order_field, $exrow->name, $exrow->rest, $exrow->sets_reps, $exrow->variation, $exrow->equipment, $exrow->special_instructions, $exrow->exercise_video_url, $exrow->file_url, $exrow->file_name, $exrow->exercise_video_id, $recentExercise);
    		 } 
    	}
    	return $newProgramId;
    }
    public function duplicateCustomProgram($oldProgId, $userId){
    	global $wpdb;
    	//Get Original Program
    	$originalProgram = $this->getProgramById($oldProgId);
    	// get the username based on the program id 
    	$user = get_user_by("ID" , $userId);
    	$userName = $user->first_name." ".$user->last_name;
    	// create a new name with CP - Old Program Name - Username 
    	$newProgramName = "CP - " . $originalProgram->name . " - " . $userName;
    	//create a new program with the new name 
    	$newProgramId = $this->createProgram($newProgramName);
    	// get the new program id 
    	$this->makeCustom($newProgramId);
    	// assign the meta data using updateProgram
    	$this->updateProgram($newProgramName, $this->type, $this->description, $this->equipment, $this->duration, $this->weeklyPlan, $this->lifeStyle, $this->body_part, $this->howItHappen, $this->sportsOccupation, $this->thumbnail, 1,  $userId, $newProgramId);
    	// get all of the phases of the old program 
    	$phases = $this->getPhasesByProgramId($oldProgId);
    		// Iterate through each phase
    	foreach ($phases as $row) {
    		// create a new phase based on the new program id
    		$recentPhase = $this->createPhase($row->name , $newProgramId);
    		// Now we update It 
    		$this->updatePhase($row->name, $row->duration, $row->intro, $row->notes, $row->order_no,  $recentPhase);
    		// get each exercise from the old phase 
    		$exercises = $this->getExercisesByPhaseId($row->id);
    		// create a new exercise based on the new phoase id
    		foreach ($exercises as $exrow) {
			$recentExercise = $this->createExerciseByName($exrow->name , $recentPhase);
    		 	$this->updateExercise($exrow->order_no,$recentPhase, $exrow->order_field, $exrow->name, $exrow->rest, $exrow->sets_reps, $exrow->variation, $exrow->equipment, $exrow->special_instructions, $exrow->exercise_video_url, $exrow->file_url, $exrow->file_name, $exrow->exercise_video_id, $recentExercise);
    		 } 
    	}
    	return $newProgramId;
    }

	public function movePhaseOrder($programId, $phaseId, $initialOrder, $finalOrder){
        //Get All Phases By Prod Id
        $phases = $this->getPhasesByProgramId($programId);
        // Determine Direction Final - Initial; Positive = Moving Forward, Negative = moving backward
        $currentMaxPhase = $this->getHighestPhaseOrder($programId);
        if($finalOrder > $currentMaxPhase){
            //echo "No Need to Move phases - Adding to End";
        }else{
            $direction = $finalOrder - $initialOrder;
            //If Forward
            if(is_numeric($direction) && $direction > 0){
                // Loop Order[Initial +1 ] To Order[Final]
                foreach ($phases as $row) {
                    // If Order is Between Initial +1 and Final Inclusive
                    if($row->order_no > $initialOrder && $row->order_no < $finalOrder+1){
                        // Current Phase Order_no -1
                        $this->updatePhase(NULL, NULL, NULL, NULL, $row->order_no-1, $row->id);

                        //echo "Phase: " . $row->name . " Moved Backward.";
                    }//End If   
                }// End Loop
            }// End If
            //Elseif Backward
            elseif (is_numeric($direction) && $direction < 0) {
                //Loop Order[Final] to Order [Initial-1]
                foreach ($phases as $row) {
                    // If Order is Between Initial -1  and Final Inclusive
                    if($row->order_no < $initialOrder && $row->order_no >= $finalOrder){
                     //   echo "<br>Move Backwards If Order No : ";
                       // echo $row->order_no;
                        // Current Phase Order_no 
                        $newOrder = $row->order_no + 1;
                        $this->updatePhase(NULL, NULL, NULL, NULL, $newOrder, $row->id);
                        $orderTest = $this->getAPhaseById($row->id);
                        // echo "<br>Phase: " . $row->name . " Moved Forward." . "To: " . $orderTest->order_no;
                    }//End If   
                }// End Loop
            }//End Elseif
        }
        //Assign Phase to be Moved Final Order_No
        $this->updatePhase(NULL, NULL, NULL, NULL, $finalOrder, $phaseId);
        return "Success Phase Moved"; 
    }

	public function moveExerciseOrder($phaseId, $exerciseId, $initialOrder, $finalOrder){
		//Get All Exercises By Prod Id
		$exercises = $this->getExercisesByPhaseId($phaseId);
		// Determine Direction Final - Initial; Positive = Moving Forward, Negative = moving backward
		$direction = $finalOrder - $initialOrder;
		//If Forward
		if(is_numeric($direction) && $direction > 0){
			// Loop Order[Initial +1 ] To Order[Final]
			foreach ($exercises as $row) {
				// If Order is Between Initial +1 and Final Inclusive
				if($row->order_no > $initialOrder && $row->order_no < $finalOrder+1){
					// Current exercise Order_no -1
					$this->updateExercise($row->order_no-1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $row->id);
					//echo "exercise: " . $row->name . " Moved Backward.";
				}//End If
				else{
					//echo "exercise: " . $row->name . " Not Changed.";
				}	
			}// End Loop
		}// End If

		//Elseif Backward
		elseif (is_numeric($direction) && $direction < 0) {
			//Loop Order[Final] to Order [Initial-1]
			foreach ($exercises as $row) {
				// If Order is Between Initial -1  and Final Inclusive
				if($row->order_no < $initialOrder && $row->order_no >= $finalOrder){
					// Current exercise Order_no -1
					$this->updateExercise($row->order_no+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $row->id);
					//echo "exercise: " . $row->name . " Moved Forward.";
				}//End If	
				else{
					//echo "exercise: " . $row->name . " Not Changed.";
				}
			}// End Loop
		}//End Elseif

		//Assign exercise to be Moved Final Order_No
		$this->updateExercise($finalOrder, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $exerciseId);
		return "Success exercise Moved"; 
	}

	public function moveExerciseToNewPhase($exerciseId, $targetPhaseId, $targetPosition){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_exercises";
		// Get Exercise to be Moved
		$exercise = $this->getAnExerciseById($exerciseId);
		// Get Highest Order Number
		$highestNewOrder = $this->getHighestExerciseOrder($targetPhaseId); 
		// Get the Highest Order Number From Old Phase
		$highestOldOrder = $this->getHighestExerciseOrder($exercise->phase_id); 
		//Reorder Old Phase's Exercises This Exercise to the top to be "popped"
		$this->moveExerciseOrder($exercise->phase_id, $exerciseId, $exercise->order_no, $highestOldOrder);
		// Apply New Phase and Order to Exercise
		$this->updateExercise($highestNewOrder+1, $targetPhaseId, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $exerciseId);
		// Move Exercise if Needed 
		$this->moveExerciseOrder($targetPhaseId, $exerciseId, $highestNewOrder+1, $targetPosition);
		return $exercise;
	}

	public function deletePhaseUpdateOrder($programId, $phaseId, $initialOrder){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";
        $tableNameB = $wpdb->prefix . "cura_exercises";
		// Reorder This Phase to The Top
		$finalOrder = $this->getHighestPhaseOrder($programId);
		echo $finalOrder;
		$this->movePhaseOrder($programId, $phaseId, $initialOrder, $finalOrder);
		// Delete all Exercises in Phase
		$wpdb->delete($tableNameB, array(
    		"phase_id" => $phaseId
    	));
		// Delete Phase
		$wpdb->delete($tableName, array(
    		"id" => $phaseId
    	));
    	return "Phase Id: " . $phaseId . " Deleted";
	}

	public function deleteExerciseUpdateOrder($phaseId, $exerciseId, $initialOrder){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_exercises";
		// Reorder This Exercise to the Top
		$finalOrder = $this->getHighestExerciseOrder($phaseId);
		$this->moveExerciseOrder($phaseId, $exerciseId, $initialOrder, $finalOrder);
		// Deleted This Exercise
		$wpdb->delete($tableName, array(
    		"id" => $exerciseId
    	));
	}

	public function deleteProgramUpdateOrder($programId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_programs";
		// Get the phases under that program
		$phases = $this->getPhasesByProgramId($programId);
		// Delete Each of those phases and the exercise under them.
		foreach ($phases as $row) {
			$this->deletePhaseUpdateOrder($programId, $row->id, $row->order_no);
		}

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


	public function getHighestPhaseOrder($programId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_phases";
		// Reorder This Phase to The Top
		$finalOrder = $wpdb->get_row("SELECT order_no FROM $tableName WHERE program_id = $programId ORDER BY order_no DESC LIMIT 1");
		return $finalOrder->order_no;
	}

	public function getHighestExerciseOrder($phaseId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_exercises";
		// Reorder This Exercise to the Top
		$finalOrder = $wpdb->get_row("SELECT order_no FROM $tableName WHERE phase_id = $phaseId ORDER BY order_no DESC LIMIT 1", ARRAY_A);
		return $finalOrder['order_no'];
	}

	public function assignProgramToUser($programId, $userId){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_programs";
		$program = $this->getProgramById($programId);
		$wpdb->insert($tableName, array(
    		"user_id" => $userId,
    		"saved_prog_type" => $program->type,
    		"saved_prog_dur" => $program->duration,
    		"saved_prog_id" => $programId,
    		"saved_prog_name" => $program->name
    		));
		return "Success: Program with Id: " . $programId . " Assigned to user with Id " . $userId;
	}
    public function removeProgramFromUser($programId, $userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";
        $wpdb->delete($tableName, array(
            "saved_prog_id" => $programId,
            "user_id" => $userId
        ));
        
        return "Success: Program with Id: " . $programId . " removed from user with Id " . $userId;
    }

    public function getProgramStatus($programId, $userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_programs";
        $progCustom = $wpdb->get_row("SELECT customProgram FROM $tableName WHERE id = $programId");
        if(!is_null($progCustom)){
            if($progCustom->customProgram == 1){ // Program is Custom Check for Assigned and Completed

                $tableName = $wpdb->prefix . "cura_user_programs";
                $progStatus = $wpdb->get_row("SELECT completed FROM $tableName WHERE saved_prog_id = $programId AND user_id = $userId");

                if(is_null($progStatus)){
                    return "Error: All Custom Programs Should Be Assigned";
                }

                else{

                    if($progStatus->completed == 1){
                        return "Custom Completed";
                    }
                    else{
                        return "Custom Assigned";
                    }
                }

            }
            else{ // Program is General Check for non-assigned, assigned and completed
                $tableName = $wpdb->prefix . "cura_user_programs";
                $progStatus = $wpdb->get_row("SELECT completed FROM $tableName WHERE saved_prog_id = $programId AND user_id = $userId");

                if(is_null($progStatus)){ // An entry with that user id and program id doesnt exist, therefore is at least assigned

                    return "General Non-Assigned";
                    
                }
                else{
                    
                    if($progStatus->completed == 1){
                        return "General Completed";
                    }
                    else{ // Not Completed
                        return "General Assigned";
                    }
                }
            }
        }
        else{
            return "Error: This Program Does Not Exist";
        }
        
    }

    public function getGeneralProgramsAssignedToUser($userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";

        $programResults = $wpdb->get_results("SELECT saved_prog_id FROM $tableName WHERE user_id = $userId AND completed = 0");

        $programs = array();
        $tableName = $wpdb->prefix . "cura_programs";
        foreach ($programResults as $row) {

            $aProgram = $wpdb->get_row("SELECT id, name, type, description, equipment, duration, weekly_plan, life_style, assoc_body_part_id, how_it_happen, sports_occupation, thumbnail, state FROM $tableName WHERE id = $row->saved_prog_id AND customProgram = 0", ARRAY_A);
                  if (is_null($aProgram)){

            } else{
            $program = new program();
            $program->id = $aProgram['id'];
            $program->name = $aProgram['name'];
            $program->type = $aProgram['type'];
            $program->description = $aProgram['description'];
            $program->equipment = $aProgram['equipment'];
            $program->duration = $aProgram['duration'];
            $program->weekly_plan = $aProgram['weekly_plan'];
            $program->life_style = $aProgram['life_style'];
            $program->assoc_body_part_id = $aProgram['assoc_body_part_id'];
            $program->how_it_happen = $aProgram['how_it_happen'];
            $program->sports_occupation = $aProgram['sports_occupation'];
            $program->thumbnail = $aProgram['thumbnail'];
            $program->state = $aProgram['state'];
            $program->current = $program->checkCurrent($userId, $aProgram['id']);
            $program->completed = $program->checkCompleted($userId, $aProgram['id']);
            $programs[] = $program;
        }
        }
            return $programs;

    }

    public function getCustomProgramsAssignedToUser($userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";

        $programResults = $wpdb->get_results("SELECT saved_prog_id FROM $tableName WHERE completed = 0 AND user_id = $userId");

        $programs = array();
        $tableName = $wpdb->prefix . "cura_programs";
        foreach ($programResults as $row) {

            $aProgram = $wpdb->get_row("SELECT id, name, type, description, equipment, duration, weekly_plan, life_style, assoc_body_part_id, how_it_happen, sports_occupation, thumbnail, state FROM $tableName WHERE id = $row->saved_prog_id AND customProgram = 1", ARRAY_A);
            if (is_null($aProgram)){

            } else{
            $program = new program();
            $program->id = $aProgram['id'];
            $program->name = $aProgram['name'];
            $program->type = $aProgram['type'];
            $program->description = $aProgram['description'];
            $program->equipment = $aProgram['equipment'];
            $program->duration = $aProgram['duration'];
            $program->weekly_plan = $aProgram['weekly_plan'];
            $program->life_style = $aProgram['life_style'];
            $program->assoc_body_part_id = $aProgram['assoc_body_part_id'];
            $program->how_it_happen = $aProgram['how_it_happen'];
            $program->sports_occupation = $aProgram['sports_occupation'];
            $program->thumbnail = $aProgram['thumbnail'];
            $program->state = $aProgram['state'];
            $program->current = $program->checkCurrent($userId, $aProgram['id']);
            $program->completed = $program->checkCompleted($userId, $aProgram['id']);
            $programs[] = $program;
         }
        }
            return $programs;

    }

    public function getGeneralCompletedProgramsAssignedToUser($userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";

        $programResults = $wpdb->get_results("SELECT saved_prog_id FROM $tableName WHERE completed = 1 AND user_id = $userId");

        $programs = array();
        $tableName = $wpdb->prefix . "cura_programs";
        foreach ($programResults as $row) {

            $aProgram = $wpdb->get_row("SELECT id, name, type, description, equipment, duration, weekly_plan, life_style, assoc_body_part_id, how_it_happen, sports_occupation, thumbnail, state FROM $tableName WHERE id = $row->saved_prog_id AND customProgram = 0", ARRAY_A);
            if (is_null($aProgram)){

            } else{
           $program = new program();
            $program->id = $aProgram['id'];
            $program->name = $aProgram['name'];
            $program->type = $aProgram['type'];
            $program->description = $aProgram['description'];
            $program->equipment = $aProgram['equipment'];
            $program->duration = $aProgram['duration'];
            $program->weekly_plan = $aProgram['weekly_plan'];
            $program->life_style = $aProgram['life_style'];
            $program->assoc_body_part_id = $aProgram['assoc_body_part_id'];
            $program->how_it_happen = $aProgram['how_it_happen'];
            $program->sports_occupation = $aProgram['sports_occupation'];
            $program->thumbnail = $aProgram['thumbnail'];
            $program->state = $aProgram['state'];
            $program->current = $program->checkCurrent($userId, $aProgram['id']);
            $program->completed = $program->checkCompleted($userId, $aProgram['id']);
            $programs[] = $program;
        }
        }
            return $programs;

    }

    public function getCustomCompletedProgramsAssignedToUser($userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";

        $programResults = $wpdb->get_results("SELECT saved_prog_id FROM $tableName WHERE completed = 1 AND user_id = $userId");

        $programs = array();
        $tableName = $wpdb->prefix . "cura_programs";
        foreach ($programResults as $row) {

            $aProgram = $wpdb->get_row("SELECT id, name, type, description, equipment, duration, weekly_plan, life_style, assoc_body_part_id, how_it_happen, sports_occupation, thumbnail, state FROM $tableName WHERE id = $row->saved_prog_id AND customProgram = 1", ARRAY_A);
            if (is_null($aProgram)){

            } else{
           $program = new program();
            $program->id = $aProgram['id'];
            $program->name = $aProgram['name'];
            $program->type = $aProgram['type'];
            $program->description = $aProgram['description'];
            $program->equipment = $aProgram['equipment'];
            $program->duration = $aProgram['duration'];
            $program->weekly_plan = $aProgram['weekly_plan'];
            $program->life_style = $aProgram['life_style'];
            $program->assoc_body_part_id = $aProgram['assoc_body_part_id'];
            $program->how_it_happen = $aProgram['how_it_happen'];
            $program->sports_occupation = $aProgram['sports_occupation'];
            $program->thumbnail = $aProgram['thumbnail'];
            $program->state = $aProgram['state'];
            $program->current = $program->checkCurrent($userId, $aProgram['id']);
            $program->completed = $program->checkCompleted($userId, $aProgram['id']);
            $programs[] = $program;
        }
        }
            return $programs;

    }

    public function getFavoriteExercises($userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_fav_videos";

        $favorites = $wpdb->get_results("SELECT exercise_id FROM $tableName WHERE user_id = $userId");

        $exercises = array();
        $tableName = $wpdb->prefix . "cura_exercises";
        foreach ($favorites as $row) {
           $exercise = $this->getAnExerciseByVideoId($row->exercise_id);
           $exercise->favorate = true;
           $exercises[] = $exercise;
        }
        return $exercises;
    }

    public function updateProgramAssignedToUser($programObj, $userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";

        $updateInfo = $wpdb->get_row("SELECT saved_prog_name, saved_prog_dur, saved_prog_type, completed FROM $tableName WHERE user_id = $userId AND saved_prog_id = $programObj->id", ARRAY_A);
        if (is_null($updateInfo)){

        } else{
        $programObj->name = $updateInfo['saved_prog_name'];
        $programObj->duration = $updateInfo['saved_prog_dur'];
        $programObj->type = $updateInfo['saved_prog_type'];
        $programObj->completed = $updateInfo['completed'];
    }
        return $programObj;
    }
    public function checkAssigned($programId, $userId){
        global $wpdb;
        $status = "notAssigned";
    if (isset($programId) && !is_null($programId) && isset($userId) && !is_null($userId)){
        $tableName = $wpdb->prefix . "cura_user_programs";

        $updateInfo = $wpdb->get_row("SELECT saved_prog_name, saved_prog_dur, saved_prog_type, completed FROM $tableName WHERE user_id = $userId AND saved_prog_id = $programId", ARRAY_A);
        if (is_null($updateInfo)){
            $status="notAssigned";
        } else{
            $status="Assigned";
        }
    }
        return $status;
    }

    public function getAssignedCountByProgramId($programId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";
        $assignedProgs = $wpdb->get_results("SELECT id FROM $tableName WHERE saved_prog_id = $programId", ARRAY_A);
        $assignedCount = 0;
        foreach ($assignedProgs as $key) {
            $assignedCount++;
        }
        return $assignedCount;
    }

    public function getAssignedNotCompletedCountByProgramId($programId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";
        $assignedProgs = $wpdb->get_results("SELECT id FROM $tableName WHERE saved_prog_id = $programId AND completed = 0", ARRAY_A);
        $assignedCount = 0;
        foreach ($assignedProgs as $key) {
            $assignedCount++;
        }
        return $assignedCount;
    }


    public function getAssignedCompletedCountByProgramId($programId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";
        $assignedProgs = $wpdb->get_results("SELECT id FROM $tableName WHERE saved_prog_id = $programId AND completed = 1", ARRAY_A);
        $assignedCount = 0;
        foreach ($assignedProgs as $key) {
            $assignedCount++;
        }
        return $assignedCount;
    }

    public function getProgramStateById($programId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_programs";
        $programState = $wpdb->get_row("SELECT state FROM $tableName WHERE id = $programId", ARRAY_A);
        if($programState['state'] == 0){
            return "Production";
        }
        elseif($programState['state'] == 1){
            return "Development";
        }
        else{
            return "Program State Unknown";
        }
    }

    public function checkStaleness($programId){
        global $wpdb;
        $assignedCount = $this->getAssignedCountByProgramId($programId);
        return $assignedCount;
    }

    public function getProgramUsersById($programId){
        global $wpdb;
        $tableNameA = $wpdb->prefix . "cura_user_programs";
        $programUsers = $wpdb->get_results("SELECT DISTINCT user_id FROM $tableNameA WHERE saved_prog_id = $programId", ARRAY_A);
        $usersArray = array();
        foreach($programUsers as $key){
            $userObj = get_user_by('ID', $key['user_id']);
           if (isset($userObj->first_name) && !is_null($userObj->first_name) && isset($userObj->last_name) && !is_null($userObj->last_name)){
                //print_r($userObj);
                $userName = $userObj->first_name . " " . $userObj->last_name;
                //echo "User Name " . $userName;
                $usersArray[] = $userName;
            }
            else{
                $userName = $userObj->display_name;
            }
        }
        return $usersArray;
    }

    public function recordUserDeletion($userId, $programId){
        global $wpdb;
        $tableNameA = $wpdb->prefix . "cura_user_programs";
        $userProg = $wpdb->get_row("SELECT id FROM $tableNameA WHERE saved_prog_id = $programId AND user_id = $userId", ARRAY_A);
        if (!is_null($userProg)){
            $tableNameB = $wpdb->prefix . "cura_deleted";
            $wpdb->insert($tableNameB, array(
                "program_id" => $programId,
                "user_id" => $userId,
                ));
        }
        else{
            echo "This user does not have that program assigned";
        }
    }

    public function getProgramDeletionById($programId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_deleted";
        $numDeleted = $wpdb->get_results("SELECT DISTINCT user_id FROM $tableName WHERE program_id = $programId", ARRAY_A);
        $count = 0;
        foreach ($numDeleted as $key) {
            $count++;
        }
        if(!is_null($count) && $count > 0){
            return $count;
        }
        else{
            return 0;
        }
    }

    public function getProgramUserDeletionById($programId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_deleted";
        $userDeletedId = $wpdb->get_results("SELECT DISTINCT user_id FROM $tableName WHERE program_id = $programId", ARRAY_A);
        $usersArray = array();
        foreach ($userDeletedId as $key) {
            $userObj = get_user_by('ID', $key['user_id']);
            if (isset($userObj->first_name) && !is_null($userObj->first_name) && isset($userObj->last_name) && !is_null($userObj->last_name)){
                //print_r($userObj);
                $userName = $userObj->first_name . " " . $userObj->last_name;
                //echo "User Name " . $userName;
                $usersArray[] = $userName;
            }
            else{
                $userName = $userObj->display_name;
            }
        }
        return $usersArray;

    }

    public function checkUserExistsForUserPrograms(){
        global $wpdb;
        $tableNameA = $wpdb->prefix . "cura_user_programs";
        $tableNameB = $wpdb->prefix . "users";
        // get all users Id's
        $users = $wpdb->get_results("SELECT DISTINCT ID FROM $tableNameB", ARRAY_A);
        
        //get all user programs
        $userProgs = $wpdb->get_results("SELECT user_id FROM $tableNameA", ARRAY_A);
        //foreach user program check if user_id exists in Ids
        $toBeDeleted = array();
        foreach ($userProgs as $progkey) {
            $exists = 0;
            foreach ($users as $userkey) {
                if($progkey['user_id'] == $userkey['ID']){
                    $exists++;
                }
            }
            //if not put id into "to be deleted" array
            if($exists <= 0){
                $toBeDeleted[] = $progkey['user_id'];
            }
        } //end userProgs loop

        //remove dulpicated from toBeDeleted Array
        $fixedDeleted = array();
        $fixedDeleted = array_unique($toBeDeleted);

        //foreach to be deleted, delete all user_programs
        foreach ($fixedDeleted as $key) {
            $wasDeleted = $this->deleteUserProgram($key);
            echo $wasDeleted;
        }
        return count($fixedDeleted);
    }
    public function deleteUserProgram($userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";

        $wpdb->query("DELETE FROM $tableName WHERE user_id = $userId");

        if($this->printError($wpdb) != "No Error"){
            $error = $this->printError($wpdb);
            return $error;
         }
         else{
            return "Success: User Programs with User Id: " . $userId . " Deleted";
         
         }

    }

    public function updateBodyPart($name, $partId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_body_parts";

        //Check and Update name
        if (isset($name) && !is_null($name)){
            $wpdb->update($tableName, array(
            "name" => $name),
            array( // Where Clause
            "id" => $partId));
        }
    }

    public function updateSportsAndOccupation($name, $type, $sportId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_sport_occupation";

        //Check and Update name
        if (isset($name) && !is_null($name)){
            $wpdb->update($tableName, array(
            "name" => $name),
            array( // Where Clause
            "id" => $sportId));
        }

        //Check and Update type
        if (isset($name) && !is_null($name)){
            $wpdb->update($tableName, array(
            "type" => $type),
            array( // Where Clause
            "id" => $sportId));
        }
    }

    public function updateHowItHappened($name, $causeId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_how_it_happened";

        //Check and Update name
        if (isset($name) && !is_null($name)){
            $wpdb->update($tableName, array(
            "name" => $name),
            array( // Where Clause
            "id" => $causeId));
        }
    }

    public function newBodyPart($name){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_body_parts";
        if (isset($name) && !is_null($name)){
            $wpdb->insert($tableName, array(
            "name" => $name));
        }
    }

    public function newSport($name){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_sport_occupation";
        if (isset($name) && !is_null($name)){
            $wpdb->insert($tableName, array(
            "name" => $name,
            "type" => "sport"));
        }
    }

    public function newOccupation($name){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_sport_occupation";
        if (isset($name) && !is_null($name)){
            $wpdb->insert($tableName, array(
            "name" => $name,
            "type" => "occupation"));
        }
    }

    public function newHowItHappened($name){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_how_it_happened";
        if (isset($name) && !is_null($name)){
            $wpdb->insert($tableName, array(
            "name" => $name));       }
    }

    

    public function getProgramsByBodyPart($bodyPartId){
        global $wpdb;
        $programs = $this->getAllPrograms();
        $programsIncluded = array();
        foreach ($programs as $key) {
            $programParts = explode(',' , $key->body_part);
            foreach ($programParts as $value) {
                if ($bodyPartId == $value){
                    $aProgram = new program();
                    $aProgram->name = $key->name;
                    $aProgram->id = $key->id;
                    $programsIncluded[] = $aProgram;
                }
            }
        }
        return $programsIncluded;
    }

    public function getSportOccById($sportId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_sport_occupation";    
        
        $sport_occ = $wpdb->get_row("SELECT name FROM $tableName WHERE id = $sportId");
        
        return $sport_occ;

    }

    public function getProgramsBySportOcc($sportId){
        global $wpdb;
        
        $programs = $this->getAllPrograms();
        $programsIncluded = array();
        foreach ($programs as $key) {
            $programParts = explode(',' , $key->sportsOccupation);
            foreach ($programParts as $value) {
                if ($sportId == $value){
                    $aProgram = new program();
                    $aProgram->name = $key->name;
                    $aProgram->id = $key->id;
                    $programsIncluded[] = $aProgram;
                }
            }
        }
        return $programsIncluded;
    }

    public function getHowItHappenedById($injuryId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_how_it_happened";    
        
        $injury = $wpdb->get_row("SELECT name FROM $tableName WHERE id = $injuryId");
        
        return $injury;

    }

    public function getProgramsByHowItHappened($injuryId){
        global $wpdb;
       
        $programs = $this->getAllPrograms();
        $programsIncluded = array();
        foreach ($programs as $key) {
            $programParts = explode(',' , $key->howItHappen);
            foreach ($programParts as $value) {
                if ($injuryId == $value){
                    $aProgram = new program();
                    $aProgram->name = $key->name;
                    $aProgram->id = $key->id;
                    $programsIncluded[] = $aProgram;
                }
            }
        }
        return $programsIncluded;
    }

    public function getExerciseVideoCount($videoId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_exercises";
        $exercises = $wpdb->get_results("SELECT id FROM $tableName WHERE exercise_video_id = $videoId");
        $count = 0;

        foreach ($exercises as $key) {
            $count++;
        }

        return $count;

    }

    public function getProgramsByExerciseVideo($videoId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_exercises";
        $exercises = $wpdb->get_results("SELECT id, phase_id FROM $tableName WHERE exercise_video_id = $videoId", ARRAY_A);
        $tableName = $wpdb->prefix . "cura_phases";
        $progNames = array();
        foreach ($exercises as $key) {
            $phaseId = $key['phase_id'];
            $phases = $wpdb->get_results("SELECT id, program_id FROM $tableName WHERE id = $phaseId", ARRAY_A);
            foreach ($phases as $progkey) {
                $program = $this->getProgramById($progkey['program_id']);
                $progNames[] = $program;
            }
        }
        return $progNames;
    }

    public function createExerciseVideo($name, $url){
       global $wpdb;
       $tableName = $wpdb->prefix . "cura_exercise_videos";

       if (isset($name) && !is_null($name) && isset($url) && !is_null($url)){
           $wpdb->insert($tableName, array(
           "name" => $name,
           "url" => $url));
           $lastid = $wpdb->insert_id;
           return $lastid;
        }
    }

    public function updateExerciseVideo($name, $url, $videoId){
        global $wpdb;
         $tableName = $wpdb->prefix . "cura_exercise_videos";

        //Check and Update name
        if (isset($name) && !is_null($name)){
            $wpdb->update($tableName, array(
            "name" => $name),
            array( // Where Clause
            "id" => $videoId));
        }
        //Check and Update url
        if (isset($url) && !is_null($url)){
            $wpdb->update($tableName, array(
            "url" => $url),
            array( // Where Clause
            "id" => $videoId));
        }
    }

    public function getBodyPartIdByName($partName){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_body_parts";
        $partName = trim($partName);
        $partId = $wpdb->get_row("SELECT id FROM $tableName WHERE name LIKE \"$partName\"");
        if (isset($partId->id) && !is_null($partId->id)){
            return $partId->id;
        }
        else{
            echo "That Part is Null or Doesn't Exist";
        }
    }

    public function getSportOccIdByName($sportName){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_sport_occupation";
        $sportName = trim($sportName);
        $sportId = $wpdb->get_row("SELECT id FROM $tableName WHERE name LIKE \"$sportName\"");
        return $sportId->id;
    }
    public function deleteExerciseVideo($exerciseVideoId){
       global $wpdb;
       $tableName = $wpdb->prefix . "cura_exercise_videos";

       $wpdb->delete($tableName, array(
           "id" => $exerciseVideoId
       ));

       if($this->printError($wpdb) != "No Error"){
           $error = $this->printError($wpdb);
           return $error;
        }
        else{
           return "Success: Exercise with Id: " . $exerciseId . " Deleted";
        }
    }

    public function getHowItHappenedIdByName($injuryName){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_how_it_happened";
        $injuryName = trim($injuryName);
        $injuryId = $wpdb->get_row("SELECT id FROM $tableName WHERE name LIKE \"$injuryName\"");
        return $injuryId->id;
    }

     public function getBodyPartById($bodyPartId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_body_parts";    
        
        $body_part = $wpdb->get_row("SELECT name FROM $tableName WHERE id = $bodyPartId");
        
        return $body_part;

    }

    

    






    







}
?>