<?php
// Used to register all of the rest routes for the Curastream Plugin 
use \Firebase\JWT\JWT;


require_once("objects/phase.php");
require_once("objects/exercise.php");
require_once("objects/group.php");
require_once("objects/userTracking.php");

$programs = new program();

add_action('rest_api_init', function(){
	// API Calls for Curastream - No Version 
	register_rest_route('curastream', '/get_logged_in_user_id/',
	    array(
		    'methods'  => 'GET',
		    'callback' => 'get_logged_in_user_id',
	    ));
	register_rest_route('curastream', '/afl/',
	    array(
	        'methods'  => 'GET',
	        'callback' => 'authFromLink',
	    ));
	register_rest_route('curastream', '/add_program_to_user_saved_list_programs/',
    	array(
   			'methods'  => 'POST',
    		'callback' => 'add_program_to_user_saved_list_programs',
    	));   
	register_rest_route('curastream', '/get_list_all_programs_in_user_list/',
    	array(
    		'methods'  => 'GET',
    		'callback' => 'get_list_all_programs_in_user_list',
    	));
	register_rest_route('curastream', '/view_program_details/',
    	array(
   			'methods'  => 'POST',
  			'callback' => 'view_program_details',
    	));  
	register_rest_route('curastream', '/complete_a_program_by_user/',
			array(
			'methods'  => 'POST',
			'callback' => 'complete_a_program_by_user',
			));
	register_rest_route('curastream', '/get_list_all_completed_programs/',
			array(
			'methods'  => 'GET',
			'callback' => 'get_list_all_completed_programs',
			));
	register_rest_route('curastream', '/restart_a_program_by_user/',
			array(
			'methods'  => 'POST',
			'callback' => 'restart_a_program_by_user',
			));

	// API Calls for Curastream - Version 1 
	register_rest_route( 'curastream/v1', '/program/', 
		array(
        	'methods' => 'POST',
        	'callback' => 'get_program',
    	));
	register_rest_route( 'curastream/v1', '/program/', 
	 	array(
        	'methods' => 'POST',
       		'callback' => 'get_program_by_Id',
    	));
	register_rest_route( 'curastream/v1', '/programs/', 
		array(
	        'methods' => 'GET',
	        'callback' => 'get_programs',
    	));
	register_rest_route( 'curastream/v1', '/body-parts', 
		array(
	        'methods' => 'GET',
	        'callback' => 'get_body_parts',
    	));
    register_rest_route( 'curastream/v1', '/body-part/(?P<id>\d+)', 
    	array(
	        'methods' => 'GET',
	        'callback' => 'get_body_part',
    	));
    register_rest_route( 'curastream/v1', '/how-it-happened', 
    	array(
        	'methods' => 'GET',
        	'callback' => 'get_injury_causes',
    	));
    register_rest_route( 'curastream/v1', '/occupations', 
    	array(
	        'methods' => 'GET',
	        'callback' => 'get_occupation',
    	));
    register_rest_route( 'curastream/v1', '/sports', 
    	array(
        	'methods' => 'GET',
        	'callback' => 'get_sports',
    	));
    register_rest_route( 'curastream/v1', '/full_body_training/', 
    	array(
    		'methods' => 'POST',
    		'callback' => 'full_body_training',
		));
    register_rest_route( 'curastream/v1', '/occupation-program/', 
    	array(
	        'methods' => 'POST',
	        'callback' => 'get_function_by_occupation',
    	));
    register_rest_route( 'curastream/v1', '/prevention-program/', 
    	array(
        	'methods' => 'POST',
        	'callback' => 'get_prevention_program',
    	));
    register_rest_route( 'curastream/v1', '/rehab-program/', 
    	array(
        	'methods' => 'POST',
        	'callback' => 'get_rehab_program',
    	));
    register_rest_route( 'curastream/v1', '/sport-program/', 
    	array(
	        'methods' => 'POST',
	        'callback' => 'get_function_by_sport',
   		));
    register_rest_route( 'curastream/v1', '/ongoing_program/', 
    	array(
    		'methods' => 'POST',
    		'callback' => 'ongoing_program',
		));
    register_rest_route( 'curastream/v1', '/ongoing-programs/', 
    	array(
        	'methods' => 'GET',
        	'callback' => 'get_ongoing_programs',
    	));
    register_rest_route( 'curastream/v1', '/recent-activities/', 
    	array(
        	'methods' => 'GET',
        	'callback' => 'get_recent_activities',
    	));
    register_rest_route( 'curastream/v1', '/mark-phase-active/', 
    	array(
		    'methods' => 'POST',
		    'callback' => 'mark_phase_active',
		));
 

	// API Calls for Curastream - Version 2  - https://github.com/serveit-ca/curastreamPlugin/wiki/Curastream-API-Documents
	register_rest_route('curastream/v2', '/login/(?P<id>\d+)', 
		array(
            'methods' => 'GET',
            'callback' => 'userLoginHandler',
       	));
	register_rest_route('curastream/v2', '/viewprog/(?P<userid>\d+)/(?P<programid>\d+)', 
		array(
            'methods' => 'GET',
            'callback' => 'userViewProgramHandler',
        ));
	register_rest_route('curastream/v2', '/viewprogexercise/(?P<userid>\d+)/(?P<programid>\d+)/(?P<exerciseid>\d+)', 
		array(
            'methods' => 'GET',
            'callback' => 'userViewProgramExerciseHandler',
            ));
	register_rest_route('curastream/v2', '/viewexercise/(?P<userid>\d+)/(?P<exerciseid>\d+)', 
		array(
            'methods' => 'GET',
            'callback' => 'userViewExerciseHandler',
        ));
	register_rest_route('curastream/v2', '/userprogs/(?P<id>\d+)', 
		array(
            'methods' => 'POST',
            'callback' => 'getProgramsAssignedToUserHandler',
            'args' => [
                'id'],
            )); 
	register_rest_route('curastream/v2', '/bodyparts', 
		array(
            'methods' => 'GET',
            'callback' => array($programs, 'getAllBodyParts'),
            )); 
	register_rest_route('curastream/v2', '/sportoccs', 
		array(
            'methods' => 'GET',
            'callback' => array($programs, 'getAllSportsOccupations'),
            )); 
	register_rest_route('curastream/v2', '/howithappeneds', 
		array(
            'methods' => 'GET',
            'callback' => array($programs, 'getAllInjuries'),
            )); 
	register_rest_route('curastream/v2', '/userfavs/(?P<id>\d+)', 
		array(
            'methods' => 'POST',
            'callback' => 'getFavoriteExercisesHandler',
            'args' => [
                'id'],
        )); 
	register_rest_route('curastream/v2', '/progphases/(?P<id>\d+)', 
		array(
            'methods' => 'POST',
            'callback' => 'getPhasesByProgramIdHandler',
            'args' => [
                'id'],
        ));
    register_rest_route('curastream/v2', '/phaseexercises/(?P<id>\d+)', 
    	array(
            'methods' => 'POST',
            'callback' => 'getExercisesByPhaseIdHandler',
            'args' => [
                'id'],
        ));
    register_rest_route('curastream/v2', '/bodypart/(?P<id>\d+)', 
    	array(
            'methods' => 'POST',
            'callback' => 'getBodyPartByIdHandler',
            'args' => [
                'id'],
        ));
    register_rest_route('curastream/v2', '/mempr_new_sub_corp/', 
    	array(
            'methods' => 'POST',
            'callback' => 'mempr_add_new_sub_corp'
        ));
    register_rest_route('curastream/v2', '/mempr_remove_sub_corp/', 
    	array(
            'methods' => 'POST',
            'callback' => 'mempr_remove_sub_corp'
        ));
    register_rest_route('curastream/v2', '/mempr_new_corp/', 
    	array(
            'methods' => 'POST',
            'callback' => 'mempr_add_new_corp'
        ));

    register_rest_route('curastream/v2', '/new_corp_user/', 
        array(
            'methods' => 'POST',
            'callback' => 'new_corp_user'
        ));
    register_rest_route('curastream/v2', '/check_unique_user/', 
        array(
            'methods' => 'POST',
            'callback' => 'check_unique_user'
        ));
});

// API Functions for Curastream - No Version 
function get_logged_in_user_id(){
    header('Content-Type:application/json;charset=utf8');
    header('Access-Control-Allow-Origin: *');

    $current_user = wp_get_current_user();  
    if($current_user->ID!=0){     
    $u = new MeprUser($current_user->ID);
    $tmpActive = array();
    $membership_utils = MpdtUtilsFactory::fetch('membership');
    $memberships = $u->active_product_subscriptions('products');
    $image_profile = get_user_meta($current_user->ID, 'member-profile', true);
    $result["user_id"] =$current_user->ID;
    $result["display_name"] =$current_user->display_name;
    $result["user_email"] =$current_user->user_email;
    $result["user_login"] =$current_user->user_login;
    $result["status"] ='success';
    $result['active_memberships'] = []; 
    foreach($memberships as $membership) {
        $data = $membership_utils->map_vars((array)$membership->rec);
        $result['active_memberships'][]= array_intersect_key((array)$membership_utils->trim_obj((array)$data),array_flip(['id','title']));
    }
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse;
    die();
    }
    else
    {   
    $result["status"] ='fail';
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse;  
    die();          
    }
}
function authFromLink(){
    $secret_key = defined('JWT_AUTH_SECRET_KEY') ? JWT_AUTH_SECRET_KEY : false;
    $error=false;

    if (!$secret_key) {
        //JWT is not configurated properly
        $error="JWT is not configurated properly";
    }
    if(isset($_GET['token'])){
            $token = $_GET['token'];
            $token = str_replace(['Bearer ','bearer '," "],"",$token);

            if(isset($_GET['intended_to'])){
                $intended_to=esc_url($_GET['intended_to']);
            }else{
                $intended_to=site_url();
            }
            $token = JWT::decode($token, $secret_key, array('HS256'));
            
            if ($token->iss != get_bloginfo('url')) {
                //The iss do not match with this server
                $error="The iss do not match with this server";
            }
            if (isset($token->data->user->id)) {
                wp_set_auth_cookie($token->data->user->id);
            }else{
                //User ID not found in the token
                $error="User ID not found in the token";
            }
            if ( wp_redirect( $intended_to ) ) {
                exit;
            }
    }

    return false;
}
function add_program_to_user_saved_list_programs($request){
    $data = headerRest($request);
    $current_user = wp_get_current_user();
    $saved_prog_id = $data['program_id'];
    if($current_user->ID!=0 && isset($saved_prog_id)){
    
        global $wpdb; // this is how you get access to the database
        $cura_user_programs = $wpdb->prefix . "cura_user_programs";
        $cura_programs = $wpdb->prefix . "cura_programs";
        $saved_prog_info = $wpdb->get_results("SELECT * FROM $cura_programs where id = $saved_prog_id");
        $saved_prog_name = $saved_prog_info[0]->name;
        $saved_prog_type = $saved_prog_info[0]->type;
        $saved_prog_dur = $saved_prog_info[0]->duration;
	    $sql = "SELECT count(id) FROM $cura_user_programs where  USER_ID = '".$current_user->ID."' AND saved_prog_id ='".$saved_prog_id."' ";
        $rowcount = $wpdb->get_var($sql);
        if($rowcount == 0){
        $last_id = $wpdb->get_var( "SELECT MAX(ID) FROM $cura_user_programs" ) + 1 ;    
        $program_data = $wpdb->get_row( "SELECT type,name,duration FROM $cura_programs WHERE id = '".$saved_prog_id."'" );        
        $sql = "INSERT INTO $cura_user_programs SET  ID = '".$last_id."' , USER_ID = '".$current_user->ID."' , saved_prog_id ='".$saved_prog_id."' , saved_prog_name ='".mysqli_real_escape_string($program_data->name)."' , saved_prog_type ='".$program_data->type."' , saved_prog_dur ='".$program_data->duration."' , completed='0' ";
        $del = $wpdb->query( $sql );
        if($del)
        {
    $content = array('message' => 'Successfully added prorgam to programs list.');
    $result["status"] ='success';
    $result["data"] = $content;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse;die();
        }
        else
        {
        $content = array('message' => 'Failed to add record.');
    $result["status"] ='success';
    $result["data"] = $content;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse;  
	die();
        }
        }
        else
        {
    $content = array('message' => 'Already exits.');
    //$result["sql"] =$sql;
    //$result["user_id"] =$current_user->ID;
    $result["status"] ='fail';
    $result["data"] = $content;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse;  
	die();  
        }

    
    }
    else
    {
    $content = array('message' => 'All fields are required.');
    $result["status"] ='fail';
    $result["data"] = $content;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
     echo $respnse; die();
    }   
}
function get_list_all_programs_in_user_list(){
    header('Content-Type:application/json;charset=utf8');
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);    
    
    $current_user = wp_get_current_user();
    if($current_user->ID!=0)
    {
    
        global $wpdb; // this is how you get access to the database
        $cura_user_programs = $wpdb->prefix . "cura_user_programs";
        //$dev_cura_exercise_videos = $wpdb->prefix . "cura_exercise_videos";
        $sql = "SELECT id,saved_prog_type,saved_prog_dur,saved_prog_id,saved_prog_name,completed FROM $cura_user_programs  where user_id='".$current_user->ID."' and completed='0'";
        $body_parts = $wpdb->get_results( $sql );
        $i = 1; 
        foreach ( $body_parts as $item ) 
        {
        $progDetails = getProgramInfo($item->saved_prog_id);
        if(empty($item->saved_prog_name)){
            $item->saved_prog_name = $progDetails->name;
        }

        $content[] = array(
            "id"                =>$item->id,
            //"user_id"             =>$item->user_id,
            "saved_prog_type"       =>$item->saved_prog_type,
            'saved_prog_dur'        =>$item->saved_prog_dur,
            "program_id"        =>$item->saved_prog_id,
            'prog_name'=>   $item->saved_prog_name,
            "program_details"       =>$progDetails,
            "completed"=>$item->completed
            );
        }
    $result["status"] ='success';
    $result["data"] = $content;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse; 
    die();
    
    }
}
function view_program_details($request){  
    $data = headerRest($request);
    $id = $data['id'];
    if(isset($id)){
        $programs = new program();
        $program = $programs->getProgramById($id);
    if(isset($program) && !is_null($program))
    {
            $phases = array();            
            $progPhases = $programs->getPhasesByProgramId($program->id);            
            foreach ($progPhases as $phase) {
                $exerciseArray = array();
                $exercises = $programs->getExercisesByPhaseId($phase->id);
                   foreach ($exercises as $exercise) {
                        $jsonExercise = new exercise();
                            $jsonExercise->id = $exercise->id;
                            $jsonExercise->phase_id = $exercise->phase_id;
                            $jsonExercise->order_no = $exercise->order_no;
                            $jsonExercise->order_field = $exercise->order_field;
                            $jsonExercise->name = $exercise->name;
                            $jsonExercise->rest = $exercise->rest;
                            $jsonExercise->sets_reps = $exercise->sets_reps;
                            $jsonExercise->variation = $exercise->variation;
                            $jsonExercise->equipment = $exercise->equipment;
                            $jsonExercise->special_instructions>$exercise->special_instructions;
                            $jsonExercise->exercise_video_url = $exercise->exercise_video_url;
                            $jsonExercise->file_url = $exercise->file_url;
                            $jsonExercise->file_name = $exercise->file_name;
                        $exerciseArray[] = $jsonExercise;
                    }
                    $jsonPhase = new phase();
                    $jsonPhase->id=$phase->id;
                    $jsonPhase->name=$phase->name;
                    $jsonPhase->intro=$phase->intro;
                    $jsonPhase->notes=$phase->notes;
                    $jsonPhase->exercise=$exerciseArray;
                    $phases[] = $jsonPhase;
            }
            $partIdString = $program->body_part;
            $sportIdString = $program->sportsOccupation;
            $howIdString = $program->howItHappen;
            $partIdArray = array();
            $sportIdArray = array();
            $howIdArray = array();
            $partIdArray = explode(',', $partIdString);
            $sportIdArray = explode(',', $sportIdString);
            $howIdArray = explode(',', $howIdString);
            $partNameArray = array();
            $sportNameArray = array();
            $howNameArray = array();
            foreach ($partIdArray as $key ) {
                $part = $programs->getBodyPartById($key);
                $partName = $part->name;
                $partNameArray[] = $partName;
            }
            $partNameString = implode(",", $partNameArray);
            foreach ($sportIdArray as $key ) {
                $sport = $programs->getSportOccById($key);
                $sportName = $sport->name;
                $sportNameArray[] = $sportName;
            }
            $sportNameString = implode(",", $sportNameArray);
            foreach ($howIdArray as $key ) {
                $how = $programs->getHowItHappenedById($key);
                $howName = $how->name;
                $howNameArray[] = $howName;
            }
            $howNameString = implode(",", $howNameArray);
            $programContent = array(
                "id"=>$program->id,
                "type"=>$program->type,
                "name"=>$program->name,
                "description"=>$program->description,
                "equipment"=>$program->equipment,
                "duration"=>$program->duration,
                "weekly_plan"=>$program->weeklyPlan,
                "life_style"=>$program->lifeStyle,
                "assoc_body_part_id"=>$partNameString,
                "how_it_happen"=>$howNameString,
                "sports_occupation"=>$sportNameString,
                "thumbnail"=>$program->thumbnail,
                "phases" => $phases  
            );
        
    //$content = array('message' => 'Successfully removed program from user list.');
    //$result["user_id"] =$current_user->ID;
    $result["status"] ='success';
    $result["data"] = $programContent;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse;die();
    }
        else
        {
    $content = array('message' => 'Failed to display program.');
    //$result["sql"] =$sql;
    //$result["user_id"] =$current_user->ID;
    $result["status"] ='success';
    $result["data"] = $programContent;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse;  
    die();
        
    }
    }
    else
    {
    $content = array('message' => 'All fields are required.');
    $result["status"] ='fail';
    $result["data"] = $programContent;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse; 
    die();
    }
}
function complete_a_program_by_user($request){
	$data = headerRest($request);

	$current_user = wp_get_current_user();
	//$id = $data['id'];

		$program_id = $data['program_id'];
	
	//$saved_prog_id = $data['saved_prog_id'];
	$user_id = $current_user->ID;

		
	
	if($current_user->ID!=0 && isset($program_id)){
	   	
			global $wpdb; // this is how you get access to the database
			$cura_user_programs = $wpdb->prefix . "cura_user_programs";
			//// Already added or not in favourite List
			$sql = "SELECT count(id) FROM $cura_user_programs where USER_ID = '".$user_id."' AND saved_prog_id ='".$program_id."' AND completed ='0'   ";
			
			$rowcount = $wpdb->get_var($sql);
			//$rowcount = $ipquery->num_rows;
			if($rowcount > 0)
			{
			
			
			$sql = "UPDATE $cura_user_programs SET completed='1' WHERE user_id = '".$user_id."' and completed = '0' and saved_prog_id='".$program_id."' ";
		//$del =	$wpdb->delete( $dev_cura_user_fav_videos , array( 'id' => $fav_video_id , 'user_id' => $current_user->ID , 'exercise_id' => $exercise_id ) );

			$del = $wpdb->query( $sql );
			if($del)
			{
		$content = array('message' => 'Successfully completed this prorgam.');
	//	$result["user_id"] =$current_user->ID;
		$result["status"] ='success';
		$result["data"] = $content;
		$respnse = json_encode($result,JSON_PRETTY_PRINT);
		echo $respnse;die();
			}
			else
			{
			$content = array('message' => 'Failed to complete this program.');
		//$result["sql"] =$sql;
	//	$result["user_id"] =$current_user->ID;
		$result["status"] ='success';
		$result["data"] = $content;
		$respnse = json_encode($result,JSON_PRETTY_PRINT);
		echo $respnse;	
	die();
			}
			}
			else
			{
		$content = array('message' => 'This program is not avaliable in your list.');
		//$result["sql"] =$sql;
		//$result["user_id"] =$current_user->ID;
		$result["status"] ='fail';
		$result["data"] = $content;
		$respnse = json_encode($result,JSON_PRETTY_PRINT);
		echo $respnse;	
	die();	
			}

		
		}
		else
		{
		$content = array('message' => 'All fields are required.');
		$result["status"] ='fail';
		$result["data"] = $content;
		$respnse = json_encode($result,JSON_PRETTY_PRINT);
		 echo $respnse; die();
		}	
}

function get_list_all_completed_programs(){
	header('Content-Type:application/json;charset=utf8');
	header('Access-Control-Allow-Origin: *');
	$data = file_get_contents("php://input");
	$data = json_decode($data,TRUE);	
	
	$current_user = wp_get_current_user();
	if($current_user->ID!=0)
	{
   	
		global $wpdb; // this is how you get access to the database
		$cura_user_programs = $wpdb->prefix . "cura_user_programs";
		//$dev_cura_exercise_videos = $wpdb->prefix . "cura_exercise_videos";
		$sql = "SELECT id,saved_prog_type,saved_prog_dur,saved_prog_id,saved_prog_name,completed FROM $cura_user_programs  where user_id='".$current_user->ID."' and completed='1'";
		$body_parts = $wpdb->get_results( $sql );
		$i = 1; 
		foreach ( $body_parts as $item ) {
			$program_thumbnail = get_program_thumnail($item->saved_prog_id);	
			$content[] = array(
			"id"				=>$item->id,
			//"user_id"				=>$item->user_id,
			"saved_prog_type"		=>$item->saved_prog_type,
			'saved_prog_dur'		=>$item->saved_prog_dur,
			"program_id"		=>$item->saved_prog_id,
			'prog_name'=>$item->saved_prog_name,
			'program_thumbnail' => $program_thumbnail,
			"completed" => $item->completed	
			);
		}
		
	$result["status"] ='success';
	$result["data"] = $content;
	$respnse = json_encode($result,JSON_PRETTY_PRINT);
	echo $respnse; 
	die();
	}
}

function restart_a_program_by_user($request){
	$data = headerRest($request);
	
	$current_user = wp_get_current_user();
	$id = $data['id'];
	$program_id = $data['program_id'];
	//$saved_prog_id = $data['saved_prog_id'];
	$user_id = $current_user->ID;

		
	
	if($current_user->ID!=0 && isset($id) && isset($program_id))
	{
   	
		global $wpdb; // this is how you get access to the database
		$cura_user_programs = $wpdb->prefix . "cura_user_programs";
		$cura_user_phases = $wpdb->prefix . "cura_user_phases";
		//// Already added or not in favourite List
		$sql = "SELECT count(id) FROM $cura_user_programs where   ID = '".$id."' and  USER_ID = '".$user_id."' AND saved_prog_id ='".$program_id."' AND completed ='1'   ";
		
		$rowcount = $wpdb->get_var($sql);
		//$rowcount = $ipquery->num_rows;
		if($rowcount > 0)
		{
		
		
		$sql = "UPDATE $cura_user_programs SET completed='0' WHERE user_id = '".$user_id."' and completed = '1' and saved_prog_id='".$program_id."' ";
	//$del =	$wpdb->delete( $dev_cura_user_fav_videos , array( 'id' => $fav_video_id , 'user_id' => $current_user->ID , 'exercise_id' => $exercise_id ) );
		$updateQuery = "DELETE FROM $cura_user_phases WHERE user_id = $user_id AND prog_id = $program_id";
		$updatePhaseInfo = $wpdb->query($updateQuery);
		$del = $wpdb->query( $sql );
		if($del)
		{
	$content = array('message' => 'Successfully restart prorgam to programs list.');
	//$result["user_id"] =$current_user->ID;
	$result["status"] ='success';
	$result["data"] = $content;
	$respnse = json_encode($result,JSON_PRETTY_PRINT);
	echo $respnse;die();
		}
		else
		{
		$content = array('message' => 'Failed to retart program.');
	//$result["sql"] =$sql;
	//$result["user_id"] =$current_user->ID;
	$result["status"] ='success';
	$result["data"] = $content;
	$respnse = json_encode($result,JSON_PRETTY_PRINT);
	echo $respnse;	
	die();
			}
			}
			else
			{
		$content = array('message' => 'This program is not avaliable for restart.');
		$result["status"] ='fail';
		$result["data"] = $content;
		$respnse = json_encode($result,JSON_PRETTY_PRINT);
		echo $respnse;	
	die();	
			}
		}
		else
		{
		$content = array('message' => 'All fields are required.');
		$result["status"] ='fail';
		$result["data"] = $content;
		$respnse = json_encode($result,JSON_PRETTY_PRINT);
		 echo $respnse; die();
	}	
}
// API Functions for Curastream - Version 1 
function get_program($data) {
    global $wpdb;
    $table = 'dev_cura_programs';
    $program_id = $data['program-id'];
    $programs = $wpdb->get_results("SELECT * FROM $table WHERE id = $program_id");        
    
    if ( empty($programs)) {
        $data = array('Status' => 'failed', 'programs' => null);
        return $data;
    }
    $data = array('Status' => 'success', 'programs' => $programs);
    return $data;
}
function get_program_by_Id($prog_id) {
    global $wpdb;
    $table = 'dev_cura_programs';
    $program_id = $prog_id;
    $programs = $wpdb->get_results("SELECT * FROM $table WHERE id = $program_id");        
    
    if ( empty($programs)) {
        $data = array('Status' => 'failed', 'programs' => null);
        return $data;
    }
    $data = array('Status' => 'success', 'programs' => $programs);
    return $data;
}
function get_programs() {
    global $wpdb;
    $table = 'dev_cura_programs';
    $programs = $wpdb->get_results("SELECT * FROM $table");        
    
    if ( empty($programs)) {
        $data = array('Status' => 'failed', 'programs' => null);
        return $data;
    }
    $data = array('Status' => 'success', 'programs' => $programs);
    return $data;
}
function get_body_parts() {
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $table = $wpdb->prefix . 'cura_body_parts';
    $body_parts = $wpdb->get_results("SELECT id, name FROM $table");    
    if ( empty($body_parts)) {
        $response = array('status' => 'success', 'body_parts' => null);
        return $response;
    }
    $response = array('status' => 'success', 'body_parts' => $body_parts);
    return $response;
}

function get_body_part() {
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $table = $wpdb->prefix . 'cura_body_parts';
    $body_part_id = $data['id'];
    $body_parts = $wpdb->get_results("SELECT * FROM $table WHERE id = $body_part_id");        
    if (empty($body_parts)) {
        $response = array('status' => 'success', 'body_parts' => null);
        return $response;
    }
    $response = array('status' => 'success', 'body_parts' => $body_parts);
    return $response;
}

function get_injury_causes(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $table = $wpdb->prefix .'cura_how_it_happened';
    $how_it_happened = $wpdb->get_results("SELECT id, name FROM $table ORDER BY name");
    if (empty($how_it_happened)) {
        $response = array('status' => 'success', 'how_it_happened' => null);
        return $response;
    }
    $response = array('status' => 'success', 'how_it_happened' => $how_it_happened);
    return $response;
}

function get_occupation(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $table = $wpdb->prefix .'cura_sport_occupation';
    $occupation = $wpdb->get_results("SELECT id, name FROM $table WHERE type LIKE '%Occupation%' ORDER BY name");
    if (empty($occupation)) {
        $response = array('status' => 'success', 'occupations' => null);
        return $response;
    }
    $response = array('status' => 'success', 'occupations' => $occupation);
    return $response;
}

function get_sports(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $table = $wpdb->prefix .'cura_sport_occupation';
    $sport = $wpdb->get_results("SELECT id, name FROM $table WHERE type LIKE '%Sport%' ORDER BY name");
    if (empty($sport)) {
        $response = array('status' => 'success', 'sports' => null);
        return $response;
    }
    $response = array('status' => 'success', 'sports' => $sport);
    return $response;
}

function full_body_training(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;

    $sportId = $data['sport'];
    $occId = $data['occupation'];
    $dev_cura_sport_occupation = $wpdb->prefix . 'cura_sport_occupation';
    $dev_cura_programs = $wpdb->prefix . 'cura_programs';
    $sport = $wpdb->get_var("SELECT name FROM $dev_cura_sport_occupation WHERE id = $sportId AND type LIKE '%sport%'");
    $occ = $wpdb->get_var("SELECT name FROM $dev_cura_sport_occupation WHERE id = $occId AND type LIKE '%occupation%'");
    if (empty($sport) && empty($occ)) {
         $response = array(
            'status' => 'success',
            'program' => 'null'
            );
        return $response;
    }
    // get the program that has the supplied sport or occ or both
    if (!empty($sportId) && empty($occId)) {
        // return "sport";
        $program = $wpdb->get_results("SELECT id, name, duration, description, equipment, thumbnail FROM $dev_cura_programs WHERE type LIKE '%strength%' AND sports_occupation LIKE '%$sport%'");
        $response = array(
            'status' => 'success',
            'program' => $program
            );
    }
    elseif (!empty($occId) && empty($sportId)) {
        // return "occ";
        $program = $wpdb->get_results("SELECT id, name, duration, description, equipment, thumbnail FROM $dev_cura_programs WHERE type LIKE '%strength%' AND  sports_occupation LIKE '%$occ%'");
        $response = array(
            'status' => 'success',
            'program' => $program
            );
    }
    elseif (!empty($occId) && !empty($sportId)) {
        $program = $wpdb->get_results("SELECT id, name, duration, description, equipment, thumbnail FROM $dev_cura_programs WHERE type LIKE '%strength%' AND sports_occupation LIKE '%$sport%' AND sports_occupation LIKE '%$occ%'");   
        $response = array(
            'status' => 'success',
            'program' => $program
            );
    }

    return $response;
}

function get_function_by_occupation(){
    if (!is_user_logged_in()) {
        return null;
    }
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $progType = $data['program_type'];
    $occ_id = (int)$data['id'];
    $occTable =  $wpdb->prefix . 'cura_sport_occupation';
    $occ = $wpdb->get_var("SELECT name FROM $occTable WHERE id = $occ_id AND type LIKE '%occupation%'");
    if (empty($occ)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $table = $wpdb->prefix . 'cura_programs';
    $occProgram = $wpdb->get_results("SELECT id, name, description, equipment, thumbnail FROM $table WHERE type LIKE '%$progType%' AND sports_occupation LIKE '%$occ%' ORDER BY name");
    if (empty($occProgram)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $response = array('status' => 'success', 'program' => $occProgram);
    return $response;
}

function get_prevention_program(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    // prog-type
    $progType = $data['program_type'];
    // body part id
    $body_part_id = $data['body_part'];    
    // getting name of the body part
    $body_part_table = $wpdb->prefix . 'cura_body_parts';
    $queriedBodyPart = $wpdb->get_var("SELECT name FROM $body_part_table WHERE id = $body_part_id");
    if (empty($body_part_id)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    if (empty($queriedBodyPart)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $table = $wpdb->prefix . 'cura_programs';
    $program = $wpdb->get_results("SELECT id, name, description, equipment, thumbnail FROM $table WHERE type LIKE '%$progType%' AND assoc_body_part_id LIKE '%$queriedBodyPart%' ORDER BY name");
    if (empty($program)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $response = array('status' => 'success', 'program' => $program);
    return $response;
}
function get_rehab_program(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    // prog-type
    $progType = $data['program_type'];
    // body part id
    $body_part_id = (int)$data['body_part'];
    // get the cause
    $cause_id = (int)$data['how_it_happened'];
    // getting name of the body part
    $body_part_table = $wpdb->prefix . 'cura_body_parts';
    $cause_table = $wpdb->prefix . 'cura_how_it_happened';
    $queriedBodyPart = $wpdb->get_var("SELECT name FROM $body_part_table WHERE id = $body_part_id");
    $queriedCause = $wpdb->get_var("SELECT name FROM $cause_table WHERE id = $cause_id");
    $table = $wpdb->prefix . 'cura_programs';
    if (empty($body_part_id) || empty($cause_id)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    if (empty($queriedBodyPart) || empty($queriedCause)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $program = $wpdb->get_results("SELECT id, name, description, equipment, thumbnail FROM $table WHERE type LIKE '%$progType%' AND assoc_body_part_id LIKE '%$queriedBodyPart%' AND how_it_happen LIKE '%$queriedCause%' ORDER BY name");
    if (empty($program)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $response = array('status' => 'success', 'program' => $program);
    return $response;
}

function get_function_by_sport(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $progType = $data['program_type'];
    $sport_id = (int)$data['id'];
    $sportsTable = $wpdb->prefix . 'cura_sport_occupation';
    $sport = $wpdb->get_var("SELECT name FROM $sportsTable WHERE id = $sport_id AND type LIKE '%sport%'");
     if (empty($sport_id)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    if (empty($sport)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $table = $wpdb->prefix . 'cura_programs';
    $sportsProgram = $wpdb->get_results("SELECT id, name, description, duration, equipment, thumbnail FROM $table WHERE type LIKE '%$progType%' AND sports_occupation LIKE '%$sport%'");
    if (empty($sportsProgram)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $response = array('status' => 'success', 'program' => $sportsProgram);
    return $response;
}

function ongoing_program(){
    // check if the program is saved as user's program or not
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    // declaring all the variables here:

    // program id
    $progId = $data['program_id'];

    // current user's id
    $userId = wp_get_current_user()->ID;

    // tables
    $dev_cura_programs = $wpdb->prefix . 'cura_programs';
    $dev_cura_phases = $wpdb->prefix . 'cura_phases';
    $dev_cura_user_programs = $wpdb->prefix . 'cura_user_programs';
    $dev_cura_user_phases = $wpdb->prefix . 'cura_user_phases';
    $dev_cura_exercises = $wpdb->prefix . 'cura_exercises';

    // run query here to get the id of the program in the users_program table with current user id and program id
    $isProgramSaved = $wpdb->get_var("SELECT * FROM $dev_cura_user_programs WHERE user_id = $userId AND saved_prog_id = $progId");

    // run query here to get the the type of the program
    $program = $wpdb->get_results("SELECT * FROM $dev_cura_programs WHERE id = $progId");
    if (empty($program)) {
        $response = array(
            'status' => 'success',
            'program' => 'null'
            );
        return $response;
    }
    // if the program is saved as user's program, then check if it is of rehab type
    if ($isProgramSaved) {
        // check if the prog type is rehab, because restrictions only apply for rehab program type
        if ($program[0]->type == 'rehab' || $program[0]->type == 'Rehab') {
            // phase restrictions will be applied here
            // check how many phases are there for the current program in the user_phases table for the current user
            $noOfPhases = $wpdb->get_results("SELECT * FROM $dev_cura_user_phases WHERE user_id = $userId AND prog_id = $progId");
            // return count($noOfPhases);
            // if only one phase or no phase is stored in the user_phases table yet, then get the id of the phase and show the info for that phase from the phase table
            if (count($noOfPhases) <= 1) {
                // show only first phase and its exercises
                // return "only one phase";
                $phases = get_phase_for_program(1, $progId);
                $phase_tabs = get_phase_tab_info($progId);
                $content = array(
                        'id' => $program[0]->id,
                        'type' => $program[0]->type,
                        'name' => $program[0]->name,
                        'description' => $program[0]->description,
                        'equipment' => $program[0]->equipment,
                        'duration' => $program[0]->duration,
                        'weekly_plan' => $program[0]->weekly_plan,
                        'thumbnail' => $program[0]->thumbnail,
                        'life_style' => $program[0]->life_style,
                        'phase_tabs' => $phase_tabs,
                        'phases' => $phases,
                        );
                $response = array();
                $response['user_id'] = $userId;
                $response['status'] = 'success';
                $response['program'] = $content;
                return $response;
                die();
            }


            // else get the ids of more than one phases and show the info for that phase from the phase table
            else
            {
                // show the number of phases that are stored in the user phase table for the current user
                $phases = get_phase_for_program(null, $progId);
                $phase_tabs = get_phase_tab_info($progId);
                $content =  array(
                        'id' => $program[0]->id,
                        'type' => $program[0]->type,
                        'name' => $program[0]->name,
                        'description' => $program[0]->description,
                        'equipment' => $program[0]->equipment,
                        'duration' => $program[0]->duration,
                        'weekly_plan' => $program[0]->weekly_plan,
                        'thumbnail' => $program[0]->thumbnail,
                        'life_style' => $program[0]->life_style,
                          'phase_tabs' => $phase_tabs,
                        'phases' => $phases,
                        );
                $response = array();
                $response['user_id'] = $userId;
                $response['status'] = 'success';
                $response['program'] = $content;
                return $response;
                die();
            }
        }
        else
        {
            // this will work if the prog type is not rehab and no restrictions will be applied
            // return "ALL PHASES";
            $phases = get_phase_for_program(null, $progId);
             $phase_tabs = get_phase_tab_info($progId);
                $content =  array(
                        'id' => $program[0]->id,
                        'type' => $program[0]->type,
                        'name' => $program[0]->name,
                        'description' => $program[0]->description,
                        'equipment' => $program[0]->equipment,
                        'duration' => $program[0]->duration,
                        'weekly_plan' => $program[0]->weekly_plan,
                        'thumbnail' => $program[0]->thumbnail,
                        'life_style' => $program[0]->life_style,
                          'phase_tabs' => $phase_tabs,
                        'phases' => $phases,
                        );
                $response = array();
                $response['user_id'] = $userId;
                $response['status'] = 'success';
                $response['program'] = $content;
                return $response;
                die();
        }
    }
    else
    {   
        // continue to show the program details with all the phases and exercises
        $phases = get_phase_for_program(null, $progId);
          $phase_tabs = get_phase_tab_info($progId);
                $content =  array(
                        'id' => $program[0]->id,
                        'type' => $program[0]->type,
                        'name' => $program[0]->name,
                        'description' => $program[0]->description,
                        'equipment' => $program[0]->equipment,
                        'duration' => $program[0]->duration,
                        'weekly_plan' => $program[0]->weekly_plan,
                        'thumbnail' => $program[0]->thumbnail,
                        'life_style' => $program[0]->life_style,
                          'phase_tabs' => $phase_tabs,
                        'phases' => $phases,
                        );
                $response = array();
                $response['user_id'] = $userId;
                $response['status'] = 'success';
                $response['program'] = $content;
                return $response;
                die();
    }
}

function get_ongoing_programs(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);    
    
    $current_user = wp_get_current_user();
    if($current_user->ID!=0)
    {
    
        global $wpdb; // this is how you get access to the database
        $dev_cura_user_programs = $wpdb->prefix . "cura_user_programs";
        $dev_cura_programs = $wpdb->prefix . "cura_programs";
        $dev_cura_user_phases = $wpdb->prefix . "cura_user_phases";
        $sql = "SELECT * FROM $dev_cura_user_programs where user_id = $current_user->ID AND completed = 0";
        $ongoing = $wpdb->get_results($sql);
        // return $ongoing;
        if ($ongoing) {
            $response = array();
            foreach ($ongoing as $key => $value) {
                // check if the program id is in program table as a program
                $program = $wpdb->get_results("SELECT * FROM $dev_cura_programs where id = $value->saved_prog_id");
                if ($program) { // if program exists 
                    // $response[] = 'yes';
                    $completedDaysFromProg = $wpdb->get_var("SELECT sum(completed_days) FROM $dev_cura_user_phases where user_id = $current_user->ID AND prog_id = $value->saved_prog_id group by user_id");
                    // if ($completedDaysFromProg == null) {
                    //     $completedDays = 0;   
                    // }
                    // else
                    // {
                    //     $completedDays = $completedDaysFromProg;
                    // }
                    $response[] = array(
                        'program_id' => $value->saved_prog_id,
                        'program_type' => $program[0]->type,
                        'program_name' => $program[0]->name,
                        'program_duration' => $program[0]->duration,
                        'program_thumbnail' => $program[0]->thumbnail,
                        'completed_days' => $completedDaysFromProg,
                        'progress' => $completedDaysFromProg
                        );
                }
            }
            $data = array('status' => 'success', 'programs' => $response);
            return $data;
        } 
        else{
            $data = array('status' => 'success', 'programs' => null);
            return $data;
        }      
    }
}

function get_recent_activities(){
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);    
    $current_user = wp_get_current_user();
    if($current_user->ID!=0)
    {
        global $wpdb; // this is how you get access to the database
        $dev_cura_user_recent = $wpdb->prefix . "cura_user_recent";
        $dev_cura_programs = $wpdb->prefix . "cura_programs";
        $recent = $wpdb->get_results("SELECT program_id FROM $dev_cura_user_recent WHERE user_id = $current_user->ID");
        $allActivity = array();
        foreach ($recent as $key => $value) {
            $recentProgramMeta = $wpdb->get_results("SELECT id, name,thumbnail, description, equipment, duration FROM $dev_cura_programs WHERE  id = $value->program_id", ARRAY_A);
            $allActivity[] = array(
                "id" => $recentProgramMeta[0]['id'],
                "name" => $recentProgramMeta[0]['name'], 
                "thumbnail" => $recentProgramMeta[0]['thumbnail'],
                "description" => $recentProgramMeta[0]['description'],
                "equipment" => $recentProgramMeta[0]['equipment'],
                "duration" => $recentProgramMeta[0]['duration']
                );
        }     
        if (empty($recent)) {
            $response = array('status' => 'success', 'activity' => null);
        }
        else{
            $response = array('status' => 'success', 'activity' => $allActivity);        
        }
        return $response;     
    }  
    else{
        $response = array('status' => 'success', 'message' => "User is not signed-in");  
        return $response;
    }  
}

function mark_phase_active(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;

    // id of the current program
    $progId = $data['program_id'];

    //  id of the current phase
    $phaseId = $data['phase_id'];

    // the current user
    $current_user = wp_get_current_user();

    // tables involved in this operation
    $table = $wpdb->prefix . 'cura_user_phases';
    $phaseTable = $wpdb->prefix . 'cura_phases';
    $recent = $wpdb->prefix . 'cura_user_recent';

    if($current_user->ID != 0)
    {
        // check if the phase already exists for the current user in the user phase table
        $phase = $wpdb->get_results("SELECT * FROM $table WHERE user_id = $current_user->ID AND prog_id = $progId AND phase_id = $phaseId");

        // get the phase info from the phases table, duration of the phase
        $phaseMeta = $wpdb->get_results("SELECT * FROM $phaseTable WHERE id = $phaseId", ARRAY_A);
        $phaseDuration = $phaseMeta[0]['duration'];

        // if this phase is not stored as the user's current phase yet
        if (empty($phase)){
            // return array($progId, $phaseId);

            $dataInsert = array(
                'user_id' => $current_user->ID, 
                'prog_id' => $progId,
                'phase_id' => $phaseId,
                'phase_duration' =>  $phaseDuration,
                'completed_days' => 1,
                'is_completed' => 0
                );

            $insert = $wpdb->insert($table, $dataInsert); //query for inserting record in the table

            $latest_insert = $wpdb->insert_id; // get the id of the latest record

            $latestPhaseCompletedDays = $wpdb->get_var("SELECT completed_days FROM $table WHERE id = $latest_insert"); // get the count of completed days

            $duration = $wpdb->get_var("SELECT phase_duration FROM $table WHERE id = $latest_insert"); // total duration of the phase

            $phaseInfo = $wpdb->get_results("SELECT * FROM $table WHERE prog_id = $progId AND phase_id = $phaseId AND user_id = $current_user->ID"); // 

            $response = array(
                "status" => "success", 
                "message" => "Phase Completed for today", 
                "completed_days" => $latestPhaseCompletedDays, 
                "duration" => $duration
                );


            // adding this phase info in the recent activity for the user
            $activity = $wpdb->get_results("SELECT * FROM $recent WHERE user_id = $current_user->ID AND program_id = $progId", ARRAY_A);
            $activityCount = $wpdb->get_var("SELECT COUNT(id) FROM $recent WHERE user_id = $current_user->ID");
            // oldest activity
            $oldActivityId = $wpdb->get_var("SELECT id FROM $recent WHERE user_id = $current_user->ID ORDER BY created_at LIMIT 1");
            $replace = $wpdb->get_var("SELECT id FROM $recent WHERE user_id = $current_user->ID AND program_id = $progId");
            $activityAdd = array('user_id' => $current_user->ID, 'program_id' => $progId);
            $activityUpdate = array('user_id' => $current_user->ID, 'program_id' => $progId);
            $whereReplace = array('user_id' => $current_user->ID, 'id' => $replace);
            $where = array('user_id' => $current_user->ID, 'id' => $oldActivityId);
            if ($activityCount < 3) {
                // if activity is true delete the older activity for this user and progid
                if ($activity == false) {
                    // $newActivity = $wpdb->replace($recent, $activityAdd);
                    $wpdb->insert($recent, $activityAdd);                    
                }
                else{
                    $wpdb->delete($recent, $whereReplace); 
                    $wpdb->insert($recent, $activityAdd); 
                    // return $whereReplace;
                }
            }
            else
            {
                $wpdb->update($recent, $activityUpdate, $where);
            }
            return $response;  
        }

        else
        {
            // if this phase is already stored in user phase table for this user, get the phase info

            $phaseInfo = $wpdb->get_results("SELECT * FROM $table WHERE prog_id = $progId AND phase_id = $phaseId AND user_id = $current_user->ID", ARRAY_A);
            $phaseLastUpdatedAt = strtotime($phaseInfo[0]['updated_at']); // get the updated at info for the phase

            // check if the phase was udpated less than a day ago
            $currentTime = time();

            if ($currentTime - $phaseLastUpdatedAt >= 86400) {
                // if the phase was updated more than a day ago
                $completed_days = $phaseInfo[0]['completed_days'];

                $duration = $phaseInfo[0]['phase_duration'];

                $completedDays = $wpdb->get_var("SELECT completed_days FROM $table WHERE prog_id = $progId AND phase_id = $phaseId AND user_id = $current_user->ID");

                $dataUpdate = array('completed_days' => $completedDays + 1);

                $where = array('user_id' => $current_user->ID, 'phase_id' => $phaseId, 'prog_id' => $progId);

                if ($completed_days < $duration) {
                    $update = $wpdb->update($table, $dataUpdate, $where); 
                    $latestPhaseCompletedDays = $wpdb->get_var("SELECT completed_days FROM $table WHERE prog_id = $progId AND phase_id = $phaseId AND user_id = $current_user->ID");
                    if ($latestPhaseCompletedDays == $duration) {
                        $statusUpdate = array('is_completed' => 1);
                        $update = $wpdb->update($table, $statusUpdate, $where);
                    }
                       
                    // adding this phase info in the recent activity for the user
                        $activity = $wpdb->get_results("SELECT * FROM $recent WHERE user_id = $current_user->ID AND program_id = $progId", ARRAY_A);
                        $activityCount = $wpdb->get_var("SELECT COUNT(id) FROM $recent WHERE user_id = $current_user->ID");
                        // oldest activity
                        $oldActivityId = $wpdb->get_var("SELECT id FROM $recent WHERE user_id = $current_user->ID ORDER BY created_at LIMIT 1");
                        $replace = $wpdb->get_var("SELECT id FROM $recent WHERE user_id = $current_user->ID AND program_id = $progId");
                        $activityAdd = array('user_id' => $current_user->ID, 'program_id' => $progId);
                        $activityUpdate = array('user_id' => $current_user->ID, 'program_id' => $progId);
                        $whereReplace = array('user_id' => $current_user->ID, 'id' => $replace);
                        $where = array('user_id' => $current_user->ID, 'id' => $oldActivityId);
                        if ($activityCount < 3) {
                            // if activity is true delete the older activity for this user and progid
                            if ($activity == false) {
                                // $newActivity = $wpdb->replace($recent, $activityAdd);
                                $wpdb->insert($recent, $activityAdd);                    
                            }
                            else{
                                $wpdb->delete($recent, $whereReplace); 
                                $wpdb->insert($recent, $activityAdd); 
                                // return $whereReplace;
                            }
                        }
                        else
                        {
                            $wpdb->update($recent, $activityUpdate, $where);
                        }
                        $response = array("status" => "success", "message" => "Phase Completed for today", "completed_days" => $latestPhaseCompletedDays, "duration" => $duration);
                        return $response;
                }/*here*/
                else
                {
                    $response = array("status" => "success" , "message" => "Phase Completed", "completed_days" => $duration, "duration" => $duration);
                    return $response;
                }
            }
            else
            {
                $response = array("status" => "success", "message" => "Please come back tomorrow", "completed_days" => $phaseInfo[0]['completed_days'], "duration" => $phaseInfo[0]['phase_duration']);
                return $response;
            }
        }
    }
}

// API Functions for Curastream - Version 2

function new_corp_user($request){
    $data = file_get_contents('php://input');
    echo ("Starting new_corp_user function");
    var_dump($data);

    //Check user email Unique
    $tracking = new userTracking();
    $programs = new program();
    $userExist = $tracking->checkUserEmailExists($data['email']);

    if($userExist == 0){
        //New Memberpress ???
        $memUrl = get_site_url() . "/wp-json/mp/v1/members";
        $memprResponse = wp_remote_post($memUrl, array(
            'method' => 'POST',
            'username' => $data['email'],
            'email' => $data['email'],
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'mepr-address-one' => '123 Test St.',
            'mepr-address-city' => 'Kamloops',
            'mepr-address-state' => 'BC',
            'mepr-address-country' => 'Canada'
            ));
        $memprData = json_decode(wp_remote_retrieve_body($memprResponse));

        // Add programs based on select
        if($data['workoutTypes'] == 'general'){

            $programs->assignProgramToUser(37, $memprData->id);
            $programs->assignProgramToUser(66, $memprData->id);
            $programs->assignProgramToUser(51, $memprData->id);
        }

        else if($data['workoutTypes'] == 'weight'){

            $programs->assignProgramToUser(37, $memprData->id);
            $programs->assignProgramToUser(66, $memprData->id);
            $programs->assignProgramToUser(51, $memprData->id);
        }

        else if($data['workoutTypes'] == 'injury'){

            $programs->assignProgramToUser(37, $memprData->id);
            $programs->assignProgramToUser(66, $memprData->id);
            $programs->assignProgramToUser(51, $memprData->id);
        }
        else if($data['workoutTypes'] == 'sport'){

            $programs->assignProgramToUser(37, $memprData->id);
            $programs->assignProgramToUser(66, $memprData->id);
            $programs->assignProgramToUser(51, $memprData->id);
        }

        //Send Welcome Email
    }
    return "End of Function";
}

function check_unique_user($request){
    $data = headerRest($request);
    $tracking = new userTracking();
    $userExist = $tracking->checkUserEmailExists($data['email']);
    return $userExist;
}


function userLoginHandler($data){
    $tracking = new userTracking();
    $user_id = $data['id'];
    echo "<br> </br>" . $user_id;
    $tracking->userLoginRecording($user_id);
}

function userViewProgramHandler($data){
    $tracking = new userTracking();
    $user_id = $data['userid'];
    $program_id = $data['programid'];
    $tracking->userViewProgramRecording($user_id, $program_id);
}

function userViewProgramExerciseHandler($data){
    $tracking = new userTracking();
    $user_id = $data['userid'];
    $exercise_id = $data['exerciseid'];
    $program_id = $data['programid'];
    $tracking->userViewProgramExerciseRecording($user_id, $program_id, $exercise_id);
}

function userViewExerciseHandler($data){
    $tracking = new userTracking();
    $user_id = $data['userid'];
    $exercise_id = $data['exerciseid'];
    $tracking->userViewExerciseRecording($user_id, $exercise_id);
}
function getProgramsAssignedToUserHandler($data){
    $programs = new program();
    echo "<br> ID: " . $data['id'];
    $user_id = $data['id'];
    $userProgs = $programs->getProgramsAssignedToUser($user_id);
    return $userProgs;
}

function getFavoriteExercisesHandler($data){
    $programs = new program();
    echo "<br> ID: " . $data['id'];
    $user_id = $data['id'];
    $userFavs = $programs->getFavoriteExercises($user_id);
    return $userFavs;
}

function getPhasesByProgramIdHandler($data){
    $programs = new program();
    echo "<br> ID: " . $data['id'];
    $user_id = $data['id'];
    $userFavs = $programs->getPhasesByProgramId($user_id);
    return $userFavs;
}

function getExercisesByPhaseIdHandler($data){
    $programs = new program();
    echo "<br> ID: " . $data['id'];
    $user_id = $data['id'];
    $userFavs = $programs->getExercisesByPhaseId($user_id);
    return $userFavs;
}

function getBodyPartByIdHandler($data){
    $programs = new program();
    echo "<br> ID: " . $data['id'];
    $part_id = $data['id'];
    $bodyPart = $programs->getBodyPartById($part_id);
    return $bodyPart;
}

function mempr_add_new_corp($request){
    $json = file_get_contents('php://input');
    $input = json_decode($json);
    $groups = new group();


    // New Corp
    //$corpName = $data['']
    $newCorpId = $groups->newCorp("Corp Name");
    // Add mepr Id to Corp
    $groups->updateMemprIdToCorp($input->data->membership->id, $newCorpId);
    // New Group
    $newGroupId = $groups->newCorpGroup("Corp Name - Default", $newCorpId);
    // Assign Group Owner   
    $groups->assignUserToGroup($newGroupId, $input->data->member->id);
    $groups->changeGroupUserPrivilege($newGroupId, $input->data->member->id, 2);
    // Assign Default Pricing Tiers to Corp
    $groups->assignAllDefaultsToCorp($newCorpId);
}

function mempr_add_new_sub_corp($request){
    $json = file_get_contents('php://input');
    $input = json_decode($json);
    $groups = new group();
    error_log("--------------------Add Sub Account ----------------------------------");
    //Get Mempr Corp Id From Json
    $memprId = $input->data->membership->id;
    
    error_log($memprId);    
    //Get Curastream database Corp Id From memprId
    $corpId = $groups->getCorpIdByMemprId($memprId);
    //Get Current Pricing Tier For That Corp
    $currentTier = $groups->getCurrentPricePerUserByCorp($corpId);
    $groupId = $groups->getGroupIdByCorpId($corpId);
    // Assign User To Corp Group
    $groups->assignUserToGroup($groupId, $input->data->member->id);
    $newTier = $groups->getCurrentPricePerUserByCorp($corpId);
    if($newTier == "No Pricing Tier Found"){
        //This is a Problem, Defaults should be assigned.
        $groups->assignAllDefaultsToCorp($corpId);
    }
    elseif($newTier >= $corpId){
        //The New Tier is Higher, Update Stripe
    }
    else{
        //Tiers are equal, do nothing
    }
}

function mempr_remove_sub_corp($request){
    $json = file_get_contents('php://input');
    $input = json_decode($json);
    $groups = new group();
    error_log("--------------------Remove Sub Account ----------------------------------");
    //Get Mempr Corp Id From Json
    $memprId = $input->data->membership->id;
    //Get Curastream database Corp Id From memprId
    $corpId = $groups->getCorpIdByMemprId($memprId);
    //Get Current Pricing Tier For That Corp
    $currentTier = $groups->getCurrentPricePerUserByCorp($corpId);
    $groupId = $groups->getGroupIdByCorpId($corpId);
    // Remove User From Corp Group
    $groups->removeUserFromGroup($groupId, $input->data->member->id);
    $newTier = $groups->getCurrentPricePerUserByCorp($corpId);
    if($newTier == "No Pricing Tier Found"){
        //This is a Problem, Defaults should be assigned.
        $groups->assignAllDefaultsToCorp($corpId);
    }
    elseif($newTier <= $corpId){
        //The New Tier is Lower, Update Stripe
    }
    else{
        //Tiers are equal, do nothing
    }
}

// Other Fuctions 
function checkDeviceToken($device,$token){
	$d['ios']='BSg&v:ShSB/VCAT]/7Y?[106xO]63IOYpq>d?hs%clOvuFF^7#v6J=lqOSjpPb{w';
        $d['android']='P+D1M)P8Wa[nh8q{(s$5s[zhkeqi($Cm74~tnGzm$@#5;4c&Qsh6.@Q|n=7*D+Y<';
        $d['web']='aP^gx|7Z+|P:SOg-`DiW#|FHZ:YbKaHYCcXsg|u.-,)d52(3@tayO(yR>e7m@iT.';
        if($d[$device] == $token){
        	return true;
        }
    return false;
}

function get_phase_for_program($phases, $program){
    // this function gets the no. of phases ($phases) for the given program id($program)
    global $wpdb;
    $dev_cura_programs = $wpdb->prefix . 'cura_programs';
    $dev_cura_phases = $wpdb->prefix . 'cura_phases';
    $dev_cura_user_phases = $wpdb->prefix . 'cura_user_phases';
    $userId = wp_get_current_user()->ID;
    // if (!empty($phases) && $phases != null) {
        // $phase = $wpdb->get_results("SELECT * FROM $dev_cura_phases WHERE program_id = $program ORDER BY id LIMIT $phases");
    // }
    // else
    // {
        $phase = $wpdb->get_results("SELECT * FROM $dev_cura_phases WHERE program_id = $program ORDER BY id");   
    // }
    $phases = array();
    $phaseNum = 0;
    foreach ($phase as $key => $value) {
        $phaseNum++;
        $phase_status = $wpdb->get_results("SELECT * FROM $dev_cura_user_phases WHERE user_id = $userId AND prog_id = $program AND phase_id = $value->id");
        if (!empty($phase_status) && $phase_status[0]->is_completed == 1) {
            $status = 'completed';
        }
        elseif (!empty($phase_status) && time()-strtotime((string)$phase_status[0]->updated_at) > 86400) {
            $status = 'ongoing';
        }
        elseif (!empty($phase_status) && time() - strtotime((string)$phase_status[0]->updated_at) <= 86400) {
            $status = 'marked_active';
        }
        elseif(empty($phase_status)){  
            if ($phaseNum == 1) {
                $status = 'ongoing';
            }          
            else{
                $phaseCompleted = $wpdb->get_var("SELECT is_completed FROM $dev_cura_user_phases WHERE user_id = $userId AND prog_id = $program AND phase_id = ($value->id - 1)");
                if ($phaseCompleted == 1) {
                    $status = 'ongoing';
                }
                else
                {
                    $status = null;
                }
            }
        }
        $exercises = get_exercise_for_phase($value->id);
        $phases[] = array(
            "id"=>$value->id,
            "name"=>$value->name,
            "intro"=>$value->intro,
            "notes"=>$value->notes,
            "duration" => $phase_status[0]->phase_duration,/*duration of the phase*/
            "completed_days" => $phase_status[0]->completed_days,/*completed days from the current phase*/
            "is_completed" => (int)$phase_status[0]->is_completed,/*status of the program 0 for incomplete and 1 for complete*/
            "status" => $status,
            "exercise"=>$exercises
        );
        if ((int)$phase_status[0]->is_completed == 0) {
            //break;
        }
    }
    return $phases;
}

function get_phase_tab_info($program){
    global $wpdb;
    $dev_cura_phases = $wpdb->prefix . 'cura_phases';
    $phase_tabs = $wpdb->get_results("SELECT id, name FROM $dev_cura_phases WHERE program_id = $program ORDER BY id");
    return $phase_tabs;
}

function get_exercise_for_phase($phase){
    // this function gets the exercises for the given phase id($phase);
    global $wpdb;
    $dev_cura_exercises = $wpdb->prefix . 'cura_exercises';
    $exercises = $wpdb->get_results("SELECT id, phase_id, order_field, name, rest, sets_reps, variation, equipment, special_instructions, exercise_video_url, file_name, file_url FROM $dev_cura_exercises WHERE phase_id = $phase ORDER BY id");
    return $exercises;
}        

function headerRest($request){
    header('Content-Type:application/json;charset=utf8');
    header('Access-Control-Allow-Origin: *');

    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);    
    if(empty($data)){

        if(isset($request) && !empty($request->get_params())){
            $data = $request->get_params();
        }
    }
    return $data;
}

function getProgramInfo($id){
    global $wpdb; // this is how you get access to the database
    $dev_cura_programs = $wpdb->prefix . "cura_programs";
    $sql = "select name,description,thumbnail FROM ".$dev_cura_programs."  where  id='".$id."'";
    //return    $sql;
        
     $result = $wpdb->get_row( $sql );
     //return $result->thumbnail;
     
    if(!empty($result))
    {
        return $result;
    }else{
        return 'n/a';
    }
}
?>
