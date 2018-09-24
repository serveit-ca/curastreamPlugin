<?php 
/** 
Author @bigT
Purpose: This file is used to setup the functions used to create filters on the various pages of the site 
*/

// Using the Objects class 
require_once('objects/exercise.php');
require_once('objects/program.php');

/* Adding functionality for Filters */
    function get_all_body_parts(){
        global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_body_parts";
        
        $sql = "SELECT id, name FROM $tableName ORDER BY name;";
        $body_parts = $wpdb->get_results( $sql );
        return $body_parts;
    }
/* This function gets each of the categories for the filters of the exercises*/
    function get_all_categories(){
    	global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_body_parts";
        $sql = "SELECT DISTINCT(category_name) FROM dev_cura_exercise_videos ORDER BY category_name;";
        $categories = $wpdb->get_results( $sql );
        return $categories;
    }

/* This function gets all of the ways an individual can injury themselves*/
   function get_all_injury_reasons(){
    	global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_how_it_happened";
        $sql = "SELECT id, name FROM $tableName ORDER BY name;";
        $injuries = $wpdb->get_results( $sql );
        return $injuries;
    }

    
/* This function gets all of the sports an individual can train for */
   function get_all_sports(){
    	global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_sport_occupation";
        $sql = "SELECT id, name FROM $tableName WHERE type like 'sport' ORDER BY name;";
        $injuries = $wpdb->get_results( $sql );
        return $injuries;
    }

    /* This function gets all of the occupations an individual can work in */
   function get_all_occupations(){
    	global $wpdb; // this is how you get access to the database
        $tableName = $wpdb->prefix . "cura_sport_occupation";
        $sql = "SELECT id, name FROM $tableName WHERE type like 'occupation' ORDER BY name;";
        $injuries = $wpdb->get_results( $sql );
        return $injuries;
    }
/* This function gets each of the videos as an object for the exercise library*/

    function get_all_exercise_videos($userId){

	    global $wpdb;
		$tableName = $wpdb->prefix . "cura_exercise_videos'";

	    $allExercises = $wpdb->get_results("SELECT id, name, description, category_name, assoc_body_parts_name, url, videoThumbnail FROM dev_cura_exercise_videos ORDER BY name ");

	    $userid = get_current_user_id();

	    $exercises = array();
	    foreach ($allExercises as $aExercise ) {
	    	$x = new exercise();
	    		$x->id = $aExercise->id;
				$x->name = $aExercise->name;
				$x->description = $aExercise->description;
				$x->bodyPart = $aExercise->assoc_body_parts_name;
				$x->category = $aExercise->category_name;
				$x->videoId = explode('/', explode('.', $aExercise->url)[2])[2];
				$x->favorate = $x->checkFavorite($userId, $aExercise->id);
				$x->thumbnailUrl = $aExercise->videoThumbnail;
			$exercises[] = $x;
			   // check if the video is added as fav or not
	        //$isVideoFav = $wpdb->get_results("SELECT * FROM `dev_cura_user_fav_videos` WHERE user_id = $userid AND exercise_id = $value->id");
	        //$vimeoId =  explode('/', explode('.', $value->url)[2])[2];
 		}
 		 return $exercises;
	}
	/* This function gets each of the videos as an object for the exercise library*/

    function get_all_programs($userId){

	    global $wpdb;
		$tableName = $wpdb->prefix . "cura_programs";

	    $allPrograms = $wpdb->get_results("SELECT id, name, type, description, thumbnail, assoc_body_part_id, how_it_happen, sports_occupation FROM $tableName WHERE customProgram = 0 ORDER BY name ");

	    $userid = get_current_user_id();

	    $programs = array();
	    foreach ($allPrograms as $aProgram ) {
	    	$x = new program();
	    		$x->id = $aProgram->id;
				$x->name = $aProgram->name;
				$x->type = $aProgram->type;
				$x->description = $aProgram->description;
				$x->thumbnailUrl = $aProgram->thumbnail;
				$x->current = $x->checkCurrent($userId, $aProgram->id);
				$x->completed = $x->checkCompleted($userId, $aProgram->id);
				$x->body_part = $aProgram->assoc_body_part_id;
				$x->sport_occupation = $aProgram->sports_occupation;
				$x->injury_cause = $aProgram->how_it_happen;
			$programs[] = $x;

 		}
 		 return $programs;
	}
	/* The fuctnion updateThumbnailURL is used to ensure each vidoe has a proper vimeo thumbnail assinged to it. This ensure page loads do not need to query the API for each vidoe.  */
	function updateThumbnailURL(){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_exercise_videos";
	    $allExercises = $wpdb->get_results("SELECT id, url FROM dev_cura_exercise_videos WHERE videoThumbnail IS null ORDER BY name LIMIT 1,100");
	    // Assing a thumbnail for each image 
	    foreach ($allExercises as $aExercise ) {

	    $videoId = explode('/', explode('.', $aExercise->url)[2])[2];
	    // get the video from the api 
	    $apiQueryURL = "https://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/".$videoId;
		$response = wp_remote_get($apiQueryURL);
									            //echo wp_remote_retrieve_response_code($response);
			$data = json_decode(wp_remote_retrieve_body( $response )); 

		$wpdb->update( 
			$tableName, 
				array( 
					'videoThumbnail' => $data->thumbnail_url,	// string
					), 
					array( 'id' => $aExercise->id)
					);
	    }					            						        
	}
    ?>