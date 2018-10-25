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
	      		// get the current custom program 
	      		$customProgram = $programs->getProgramById($_POST['baseProgramId']);
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

	    


    ?>