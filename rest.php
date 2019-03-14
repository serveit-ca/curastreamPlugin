// Used to register all of the rest routes for the Curastream Plugin 

<?php

add_action('rest_api_init', function(){

	register_rest_route(
		'curastream', '/complete_a_program_by_user/',
			array(
			'methods'  => 'POST',
			'callback' => 'complete_a_program_by_user',
			)
		);

	register_rest_route(
		'curastream', '/get_list_all_completed_programs/',
			array(
			'methods'  => 'GET',
			'callback' => 'get_list_all_completed_programs',
			)
		);
	register_rest_route(
		'curastream', '/restart_a_program_by_user/',
			array(
			'methods'  => 'POST',
			'callback' => 'restart_a_program_by_user',
			)
		);
});

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
?>
