<?php 
require_once ("objects/program.php");
$programs = new program();
require_once ("objects/customProgramCreation.php");
$customCreation = new customProgramCreation();
require_once ("objects/phase.php");
require_once ("objects/exercise.php");


/* This fucntion is sued to copy, save and dispaly a custom program */
	      function createAndDisplayCustomProgram(){
	      	global $programs;
	      	global $customCreation;
	      	$status= "Success";
	      		// get the original program 
	      		$originalProgram = $programs->getProgramById($_POST['baseProgramId']);
	      		// create duplicate
	      		$customProgram = $programs->duplicateProgram($_POST['baseProgramId'], $_POST['userId']);
	      		$customProgramForm = $customCreation->createProgramMetaImputForm($customProgram);
	      		echo $customProgramForm;
	      		// get all of the phases 
	      		$phases = $programs->getPhasesByProgramId($_POST['baseProgramId']);
	      		foreach ($phases as $aPhase){
	      			echo $customCreation->addPhase();
	      			echo '<div class="phaseContainer">';
	      		    echo $customCreation->displayPhase($aPhase);
	      		    // Get the Exercise 
	      		    $exercises = $programs->getExercisesByPhaseId($aPhase->id);
	      		    // got through each exercise 
	      		    foreach ($exercises as $exercise){
	      		    // Print out the exercise 
	      		    	echo $customCreation->addExercise();
	      		    	echo $customCreation->displayExercise($exercise);
	      		    }
	      		   	 echo $customCreation->addExercise();
	      		 	echo '</div>';
	      		 }
	      		 echo $customCreation->addPhase();
	      		 	echo "<button>Assign Custom Progrm to User</button>";		
	      		// get all of the exercises 
	      		// copy all of the custom program 
	      		wp_die();	
	      }

	    add_action( 'wp_ajax_createAndDisplayCustomProgram', 'createAndDisplayCustomProgram' );
	    add_action( 'wp_ajax_nopriv_createAndDisplayCustomProgram', 'createAndDisplayCustomProgram' );

	     /* This fucntion is sued to copy, save and dispaly a custom program */
	      function addPhaseToProgram(){
	      	global $programs;
	      	global $customCreation;
	      	$status= "Success";
	      

	      	// create an empty phase
	      	// TODO Call Create Phase Function 
	      		// ID will be returned 
	      		// update Phase Put the info in there 
	      		// get Highest Order Number 
	      		// Move phase to ideal location 
	      	$newPhase = new phase();
	      		// get all of the phases 
	      			echo $customCreation->addPhase();
	      			echo '<div class="phaseContainer">';
	      		    echo $customCreation->displayPhase($newPhase);
	      		    // Add ability to Add an Exercise
	      		    	echo $customCreation->addExercise();
	      		 	echo '</div>';
	      		 echo $customCreation->addPhase();

	      		wp_die();	
	      }

	    add_action( 'wp_ajax_addPhaseToProgram', 'addPhaseToProgram' );
	    add_action( 'wp_ajax_nopriv_addPhaseToProgram', 'addPhaseToProgram' );

	     /* This fucntion is sued to copy, save and dispaly a custom program */
	      function addExerciseToPhase(){
	      	global $programs;
	      	global $customCreation;
	      	$status= "Success";
	      	// create an empty phase
	      	// TODO Call Create exercise
	      		// ID will be returned 
	      		// update exercise Put the info in there 
	      		// get Highest Order Number 
	      		// Move exercise to ideal location 
	      	$newExercise = new exercise();
	      		// get all of the phases 
	      		    echo $customCreation->addExercise();
	      			echo $customCreation->displayExercise($newExercise);
	      			echo $customCreation->addExercise();

	      		wp_die();	
	      }

	    add_action( 'wp_ajax_addExerciseToPhase', 'addExerciseToPhase' );
	    add_action( 'wp_ajax_nopriv_addExerciseToPhase', 'addExerciseToPhase' );

	    // This function loads the exercise chooser 
	    function addExerciseChooser(){
	      	global $programs;
	      	global $customCreation;
	      	$exerciseVideos = $programs->getAllExerciseVideos();
	   
	      	echo $customCreation->addExerciseChooser($exerciseVideos);

	      		wp_die();	
	      }

	    add_action( 'wp_ajax_addExerciseChooser', 'addExerciseChooser' );
	    add_action( 'wp_ajax_nopriv_addExerciseChooser', 'addExerciseChooser' );

	    // This function creates a new program

	    function createNewProgram(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$newProgramId = $programs->createProgram($_POST['programName']);
	    	$newProgram = $programs->getProgramById($newProgramId);
	    	$customProgramForm = $customCreation->createProgramMetaImputForm($customProgram);
	      		echo $customProgramForm;
	      		echo $customCreation->addPhase();
	      		echo $customCreation->addExercise();
	      		wp_die();
	    }

	    add_action( 'wp_ajax_createNewProgram', 'createNewProgram' );
	    add_action( 'wp_ajax_nopriv_createNewProgram', 'createNewProgram');

	    function modifyExisitngProgram(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$modifyProgram = $programs->getProgramById($_POST['programId']);
	    	$customProgramForm = $customCreation->createProgramMetaImputForm($modifyProgram);
	      		echo $customProgramForm;

	      		wp_die();
	    }

	    add_action( 'wp_ajax_modifyExisitngProgram', 'modifyExisitngProgram' );
	    add_action( 'wp_ajax_nopriv_modifyExisitngProgram', 'modifyExisitngProgram');

	    // This Function updates the meta data for a program
	    function updateAProgram(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->updateProgram($_POST['type'], $_POST['description'], $_POST['equipment'], $_POST['duration'], $_POST['weekly_plan'], $_POST['life_style'], $_POST['assoc_body_part_id'],  $_POST['how_it_happen'], $_POST['sports_occupation'], $_POST['thumbnail'], $_POST['state'], $_POST['programId']);
	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_updateAProgram', 'updateAProgram' );
	    add_action( 'wp_ajax_nopriv_updateAProgram', 'updateAProgram');

	    // This Function updates the meta data for a phase
	    function updateAPhase(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->updatePhase($_POST['name'], $_POST['duration'], $_POST['intro'], $_POST['notes'], $_POST['order_no'], $_POST['phaseId']);
	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_updateAPhase', 'updateAPhase' );
	    add_action( 'wp_ajax_nopriv_updateAPhase', 'updateAPhase');

	    // This Function updates the meta data for an exercise
	    function updateAnExercise(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->updateProgram($_POST['order_no'], $_POST['phase_id'], $_POST['order_field'], $_POST['name'], $_POST['rest'], $_POST['sets_reps'], $_POST['variation'],  $_POST['equipment'], $_POST['special_instructions'], $_POST['exercise_video_url'], $_POST['file_url'], $_POST['file_name'], $_POST['exerciseId']);
	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_updateAnExercise', 'updateAnExercise' );
	    add_action( 'wp_ajax_nopriv_updateAnExercise', 'updateAnExercise');

	    //This Function Deletes a Target Phase and all Exercises Under it
	    function deleteReorderPhase(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->deletePhaseUpdateOrder($_POST['programId'], $_POST['phaseId'], $_POST['initialOrder'])

	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_deleteReorderPhase', 'deleteReorderPhase' );
	    add_action( 'wp_ajax_nopriv_deleteReorderPhase', 'deleteReorderPhase');

	    //This Function Deletes a Target Exercise and Properly Reorders the remaining in the phase
	    function deleteReorderExercise(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->deletePhaseUpdateOrder($_POST['phaseId'], $_POST['exerciseId'], $_POST['initialOrder'])

	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_deleteReorderExercise', 'deleteReorderExercise' );
	    add_action( 'wp_ajax_nopriv_deleteReorderExercise', 'deleteReorderExercise');

	    //This Function Deletes a Target Program, and the phases and exercises underneath.

	    function deleteReorderProgram(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->deleteProgramUpdateOrder($_POST['programId']);

	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_deleteReorderProgram', 'deleteReorderProgram' );
	    add_action( 'wp_ajax_nopriv_deleteReorderProgram', 'deleteReorderProgram');


	    // This function moves a phase to a new position under a program.
	    function movePhase(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->movePhaseOrder($_POST['programId'], $_POST['phaseId'], $_POST['initialOrder'], $_POST['finalOrder'])

	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_movePhase', 'movePhase' );
	    add_action( 'wp_ajax_nopriv_movePhase', 'movePhase');

	    // This function moves an exercise to a new position under a phase
	    function moveExercise(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->moveExerciseOrder($_POST['phaseId'], $_POST['exerciseId'], $_POST['initialOrder'], $_POST['finalOrder'])

	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_moveExercise', 'moveExercise' );
	    add_action( 'wp_ajax_nopriv_moveExercise', 'moveExercise');

	    // This function assigns a program to a User for the App

	    function assignProgram(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->assignProgramToUser($_POST['programId'], $_POST['userId']);

	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_assignProgram', 'assignProgram' );
	    add_action( 'wp_ajax_nopriv_assignProgram', 'assignProgram');


    ?>