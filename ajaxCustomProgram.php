<?php 
require_once ("objects/program.php");
$programs = new program();
require_once ("objects/customProgramCreation.php");
$customCreation = new customProgramCreation();
require_once ("objects/phase.php");
require_once ("objects/exercise.php");


/* This fucntion is sued to copy, save and dispaly a general program */
	      function copyAndEditGeneralExisting(){
	      	global $programs;
	      	global $customCreation;
	      	$status= "Success";
	      		// get the original program 
	      		$newProgramId = $programs->duplicateGeneralProgram($_POST['existingProgram']);
	      		$programs->updateProgram(null, null, null, null, null, null, null, null, null, null, null, 1,null, $newProgramId);
	      		$modifyProgram = $programs->getProgramById($newProgramId);
	    	$customProgramForm = $customCreation->createProgramMetaImputForm($modifyProgram);
	      		echo $customProgramForm;
	      	$phases = $programs->getPhasesByProgramId($newProgramId);
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
	      		wp_die();	      
	      	}

	    add_action( 'wp_ajax_copyAndEditGeneralExisting', 'copyAndEditGeneralExisting' );
	    add_action( 'wp_ajax_copyAndEditGeneralExisting', 'copyAndEditGeneralExisting' );

    /* This fucntion is sued to copy, save and dispaly a custom program */
      function copyAndEditCustomExisting(){
      	global $programs;
      	global $customCreation;
      	$status= "Success";
      		// get the original program 
      		$newProgramId = $programs->duplicateCustomProgram($_POST['existingProgram'],$_POST['temp_user_id']);
      			$programs->makeCustom($newProgramId);
      		$modifyProgram = $programs->getProgramById($newProgramId);
    	$customProgramForm = $customCreation->createProgramMetaImputForm($modifyProgram);
      		echo $customProgramForm;
      	$phases = $programs->getPhasesByProgramId($newProgramId);
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
      		wp_die();	      
      	}

	    add_action( 'wp_ajax_copyAndEditCustomExisting', 'copyAndEditCustomExisting' );
	    add_action( 'wp_ajax_copyAndEditCustomExisting', 'copyAndEditCustomExisting' );

	     /* This fucntion is sued to copy, save and dispaly a custom program */
	      function addPhaseToProgram(){
	      	global $programs;
	      	global $customCreation;
	      	// create a new phase
	      	$newPhaseId = $programs->createPhase("New Phase", $_POST['programId']);
	      	$highestOrder = $programs->getHighestPhaseOrder($_POST['programId']);
	      	$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder+1, $newPhaseId);
	      	// Order the Phase to the final order 
	      	$programs->movePhaseOrder($_POST['programId'],$newPhaseId,$highestOrder+1,$_POST['finalOrder']);

	      	 
	      	$newPhase = $programs->getAPhaseById($newPhaseId);
	      		// get all of the phases 
	      			echo $customCreation->addPhase();
	      			echo '<div class="phaseContainer" data-phase-order="'.$newPhase->order_no.'">';
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
	      	// create an new exercisec
	      	$newExerciseId = $programs->createExercise($_POST['exerciseId'],$_POST['phaseId']);
	      	$highestOrder = $programs->getHighestExerciseOrder($_POST['phaseId']);
	      	$programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $newExerciseId);
	      	$programs->moveExerciseOrder($_POST['phaseId'],$newExerciseId,$highestOrder+1,$_POST['finalOrder']);
	      	// order the exercise
	      		// update exercise Put the info in there 
	      		// get Highest Order Number 
	      		// Move exercise to ideal location 
	      	$newExercise =  $programs->getAnExerciseById($newExerciseId);
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
	    	$newProgramId = $programs->createProgram($_POST['programName']);
	    	$programs->updateProgram(null, null, null, null, null, null, null, null, null, null, null, 1,null, $newProgramId);
	    	$newProgram = $programs->getProgramById($newProgramId);
	    	$customProgramForm = $customCreation->createProgramMetaImputForm($newProgram);
	      		echo $customProgramForm;
	      		echo $customCreation->addPhase();
	      		wp_die();
	    }

	    add_action( 'wp_ajax_createNewProgram', 'createNewProgram' );
	    add_action( 'wp_ajax_nopriv_createNewProgram', 'createNewProgram');

	    function createNewCustomProgram(){
	    	global $programs;
	    	global $customCreation;
	    	$newProgramId = $programs->createProgram($_POST['programName']);
	    	$programs->makeCustom($newProgramId);
	    	$programs->updateProgram(null, null, null, null, null, null, null, null, null, null, null, 1,$_POST['temp_user_id'], $newProgramId);
	    	$newProgram = $programs->getProgramById($newProgramId);
	    	$customProgramForm = $customCreation->createProgramMetaImputForm($newProgram);
	      		echo $customProgramForm;
	      		echo $customCreation->addPhase();
	      		wp_die();
	    }

	    add_action( 'wp_ajax_createNewCustomProgram', 'createNewCustomProgram' );
	    add_action( 'wp_ajax_nopriv_createNewCustomProgram', 'createNewCustomProgram');

	    function modifyExisitngProgram(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$modifyProgram = $programs->getProgramById($_POST['programId']);
	    	$customProgramForm = $customCreation->createProgramMetaImputForm($modifyProgram);
	      		echo $customProgramForm;
	      	$phases = $programs->getPhasesByProgramId($_POST['programId']);
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
	      		wp_die();
	    }

	    add_action( 'wp_ajax_modifyExisitngProgram', 'modifyExisitngProgram' );
	    add_action( 'wp_ajax_nopriv_modifyExisitngProgram', 'modifyExisitngProgram');

	    // This Function updates the meta data for a program
	    function updateAProgram(){
	    	global $programs;
	    	global $customCreation;
	    	$programs->updateProgram($_POST['name'], $_POST['type'], $_POST['description'], $_POST['equipment'], $_POST['duration'], $_POST['weekly_plan'], $_POST['life_style'], $_POST['assoc_body_part_id'],  $_POST['how_it_happen'], $_POST['sports_occupation'], $_POST['thumbnail'], $_POST['state'],$_POST['temp_user_id'], $_POST['programId']);
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

	    	$programs->updateExercise($_POST['order_no'], $_POST['phase_id'], $_POST['order_field'], $_POST['name'], $_POST['rest'], $_POST['sets_reps'], $_POST['variation'],  $_POST['equipment'], $_POST['special_instructions'], $_POST['exercise_video_url'], $_POST['file_url'], $_POST['file_name'], $_POST['exercise_video_id'], $_POST['exerciseId']);
	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_updateAnExercise', 'updateAnExercise' );
	    add_action( 'wp_ajax_nopriv_updateAnExercise', 'updateAnExercise');

	    //This Function Deletes a Target Phase and all Exercises Under it
	    function deleteReorderPhase(){
	    	global $programs;
	    	global $customCreation;

	    	$programs->deletePhaseUpdateOrder($_POST['programId'], $_POST['phaseId'], $_POST['initialOrder']);

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

	    	$programs->deleteExerciseUpdateOrder($_POST['phaseId'], $_POST['exerciseId'], $_POST['initialOrder']);

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

	    	$programs->movePhaseOrder($_POST['programId'], $_POST['phaseId'], $_POST['initialOrder'], $_POST['finalOrder']);

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

	    	$programs->moveExerciseOrder($_POST['phaseId'], $_POST['exerciseId'], $_POST['initialOrder'], $_POST['finalOrder']);

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
	    	$programs->makeCustom($_POST['programId']);
	    	$programs->updateProgram(null, null, null, null, null, null, null, null, null, null, null, 0,null, $_POST['programId']);
	    	$programs->assignProgramToUser($_POST['programId'], $_POST['userId']);

	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_assignProgram', 'assignProgram' );
	    add_action( 'wp_ajax_nopriv_assignProgram', 'assignProgram');

	    function deleteCustomProgram(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";
	    	$programs->updateProgram(null, null, null, null, null, null, null, null, null, null, null, 1,null, $_POST['programId']);
	    	$programs->removeProgramFromUser($_POST['programId'], $_POST['userId']);

	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_deleteCustomProgram', 'deleteCustomProgram' );
	    add_action( 'wp_ajax_nopriv_deleteCustomProgram', 'deleteCustomProgram');
	    // This function makes a custom program a general program

	    function makeProgGeneral(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->makeGeneral($_POST['programId']);

	    	echo "Success";
	    	wp_die();
	    }

	    add_action( 'wp_ajax_makeProgGeneral', 'makeProgGeneral');
	    add_action( 'wp_ajax_nopriv_makeProgGeneral', 'makeProgGeneral');


	    //This Program returns all body parts as an assoc array
	    function getBodyParts(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->getAllBodyParts();

	    	echo "Success";
	    	wp_die();	
	    }

	    add_action( 'wp_ajax_getBodyParts', 'getBodyParts');
	    add_action( 'wp_ajax_nopriv_getBodyParts', 'getBodyParts');

	    function getInjuries(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->getAllInjuries();

	    	echo "Success";
	    	wp_die();	
	    }

	    add_action( 'wp_ajax_getInjuries', 'getInjuries');
	    add_action( 'wp_ajax_nopriv_getInjuries', 'getInjuries');

	    function getSports(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->getAllSports();

	    	echo "Success";
	    	wp_die();	
	    }

	    add_action( 'wp_ajax_getSports', 'getSports');
	    add_action( 'wp_ajax_nopriv_getSports', 'getSports');

	    function getOccupations(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->getAllOccupations();

	    	echo "Success";
	    	wp_die();	
	    }

	    add_action( 'wp_ajax_getOccupations', 'getOccupations');
	    add_action( 'wp_ajax_nopriv_getOccupations', 'getOccupations');

	    function getSportsOccupations(){
	    	global $programs;
	    	global $customCreation;
	    	$status = "Success";

	    	$programs->getAllSportsOccupations();

	    	echo "Success";
	    	wp_die();	
	    }

	    add_action( 'wp_ajax_getSportsOccupations', 'getSportsOccupations');
	    add_action( 'wp_ajax_nopriv_getSportsOccupations', 'getSportsOccupations');
    ?>