
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();
	//start with empty phase with no exercises
	$newProgId = $programs->createProgram("Test Program for Move Exercises");
	$newPhaseId = $programs->createPhase("Test Phase for Move Exercises", $newProgId);
	//add exercises to empty phase
	$exerciseOneId = $programs->createExerciseByName("Test Exercise 1 for Move Exercise", $newPhaseId);
	$highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
	$programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, $exerciseOneId);
	$programs = new program();
	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
	assert($exerciseOne->order_no == 1);
	//add a second exercise to a phase with one exercise to the end
	$exerciseTwoId = $programs->createExerciseByName("Test Exercise 2 for Move Exercise", $newPhaseId);
	$highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
	$programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, $exerciseTwoId);
	$programs = new program();
	$exerciseTwo = $programs->getAnExerciseById($exerciseTwoId);
	assert($exerciseTwo->order_no == 2);
	//add a third exercise to the first position of the phase - Ensure exercise 1 becomes order 2 and exercise 2 becomes order 3
	$exerciseThreeId = $programs->createExerciseByName("Test Exercise 3 for Move Exercise", $newPhaseId);
	$highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
	$programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, $exerciseThreeId);
	$programs = new program();
	$exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
	assert($exerciseThree->order_no == 3);
	//add 4th for further tests
	$exerciseFourId = $programs->createExerciseByName("Test Exercise 4 for Move Exercise", $newPhaseId);
	$highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
	$programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, $exerciseFourId);
	$programs = new program();
	$exerciseFour = $programs->getAnExerciseById($exerciseFourId);
	assert($exerciseFour->order_no == 4);
	
   		//remove exercise from end of phase
   	$programs->deleteExerciseUpdateOrder($newPhaseId, $exerciseFourId, 4);
   	$programs = new program();
   	$allExercises = $programs->getExercisesByPhaseId($newPhaseId);
   	$expectedIds = array($exerciseOneId,$exerciseTwoId,$exerciseThreeId);
   	$i = 0;
   	foreach($allExercises as $key){
   		echo $i;
   		assert($key->id == $expectedIds[$i]);
   		$i++;

   }

	
   

//Testing for Move Exercise/Phase Code
// $newProg = $programs->createProgram("Testphp Prog9");
// $newPhaseId = $programs->createPhase("Testphp Phase2", $newProg);

// $newExerciseId = $programs->createExercise(434, $newPhaseId);
// $highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
// echo "HO: " .  $highestOrder;
// $programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $newExerciseId);
// // Order the Exercise to the final order 
// $programs->moveExerciseOrder($newPhaseId,$newExerciseId,$highestOrder+1,1);

// // New Exercise
// $newExerciseId = $programs->createExercise(434, $newPhaseId);
// $highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
// echo "HO: " .  $highestOrder;
// $programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $newExerciseId);
// // Order the Exercise to the final order 
// $programs->moveExerciseOrder($newPhaseId,$newExerciseId,$highestOrder+1,2);


// // New Exercise
// $newExerciseId = $programs->createExercise(434, $newPhaseId);
// $highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
// echo "HO: " .  $highestOrder;
// $programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $newExerciseId);
// // Order the Exercise to the final order 
// $programs->moveExerciseOrder($newPhaseId,$newExerciseId,$highestOrder+1,3);

// // New Exercise
// $newExerciseId = $programs->createExercise(434, $newPhaseId);
// $highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
// echo "HO: " .  $highestOrder;
// $programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $newExerciseId);
// // Order the Exercise to the final order 
// $programs->moveExerciseOrder($newPhaseId,$newExerciseId,$highestOrder+1,2);

?>









