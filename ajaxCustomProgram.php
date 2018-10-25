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

    ?>