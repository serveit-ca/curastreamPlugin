
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();

$newProgId = $programs->createProgram("Test Program for Move Phases");
   	$phaseOneId = $programs->createPhase("Test Phase 1 for Move Phases", $newProgId);
   	$highestOrder = $programs->getHighestPhaseOrder($newProgId);
   	$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder+1, $phaseOneId);
   	$programs = new program();
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	//assert($phaseOne->order_no == 1);
   	$phaseTwoId = $programs->createPhase("Test Phase 2 for Move Phases", $newProgId);
   	$highestOrder = $programs->getHighestPhaseOrder($newProgId);
   	$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder+1, $phaseTwoId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	//assert($phaseTwo->order_no == 2);
   	$phaseThreeId = $programs->createPhase("Test Phase 3 for Move Phases", $newProgId);
   	$highestOrder = $programs->getHighestPhaseOrder($newProgId);
   	$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder+1, $phaseThreeId);
   	$phaseThree = $programs->getAPhaseById($phaseThreeId);
   	assert($phaseThree->order_no == 3);
   	$programs->movePhaseOrder($newProgId, $phaseOneId, 1, 3);
   	//assert($phaseThree->order_no == 1);
   	//assert($phaseOne->order_no == 2);
   	//assert($phaseTwo->order_no == 3);
   	print_r($phaseThree);
   	print_r($phaseTwo);
   	print_r($phaseOne);


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









