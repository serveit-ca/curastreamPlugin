<?php 

/* The fuunction is used to add an exercise from a users favoriate */
	function saveExercise(){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_fav_videos";
	    // Assing a thumbnail for each image 


		$wpdb->insert( 
			$tableName, 
				array( 
					'user_id' => $_POST['user_id'], 'exercise_id'	=> $_POST['exercise_id']// string
					) 
					);
		 wp_die();	
	    }


	    add_action( 'wp_ajax_saveExercise', 'saveExercise' );
	    add_action( 'wp_ajax_nopriv_saveExercise', 'saveExercise' );					            			
	    
	    /*This function is used to delete a program from a users exercise Library  */
	    function deleteExercise(){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_fav_videos";
	    // Assing a thumbnail for each image 


		$wpdb->delete( 
			$tableName, 
				array( 
					'user_id' => $_POST['user_id'], 'exercise_id'	=> $_POST['exercise_id']// string
					) 
					);
		 wp_die();	
	    }


	    add_action( 'wp_ajax_deleteExercise', 'deleteExercise' );
	    add_action( 'wp_ajax_nopriv_deleteExercise', 'deleteExercise' );				
	
		/* This Function is used to save a prgraom for a user*/
		function saveProgram(){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_programs";
	    // Assing a thumbnail for each image 


		$wpdb->insert( 
			$tableName, 
				array( 
					'user_id' => $_POST['user_id'], 'saved_prog_id'	=> $_POST['program_id'], 'saved_prog_name' => $_POST['saved_prog_name'], 'saved_prog_type'=> $_POST['saved_prog_type'], 'saved_prog_dur' => $_POST['saved_prog_dur']// string
					) 
					);
		 wp_die();	
	    }


	    add_action( 'wp_ajax_saveProgram', 'saveProgram' );
	    add_action( 'wp_ajax_nopriv_saveProgram', 'saveProgram' );					            			
	    
	    /* This Function is used to delete a prgraom for a user*/
	    function deleteProgram(){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_programs";
	    // Assing a thumbnail for each image 


		$wpdb->delete( 
			$tableName, 
				array( 
					'user_id' => $_POST['user_id'], 'saved_prog_id'	=> $_POST['program_id']// string
					) 
					);
		 wp_die();	
	    }


	    add_action( 'wp_ajax_deleteProgram', 'deleteProgram' );
	    add_action( 'wp_ajax_nopriv_deleteProgram', 'deleteProgram' );

	     /* This Function is used to delete a prgraom for a user*/
	    function completeProgram(){
		global $wpdb;
		$tableName = $wpdb->prefix . "cura_user_programs";
	    // Assing a thumbnail for each image 


		$wpdb->update( 
			$tableName, 
				array( 
					'completed' => '1'
					), 
				array( 
					'user_id' => $_POST['user_id'], 'saved_prog_id'	=> $_POST['program_id']// string
					)
					);
		 wp_die();	
	    }


	    add_action( 'wp_ajax_completeProgram', 'completeProgram' );
	    add_action( 'wp_ajax_nopriv_completeProgram', 'completeProgram' );
    ?>