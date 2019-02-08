
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
require_once ("objects/databaseManagement.php");
$database = new databaseManagement();
$programs = new program();


$custGroup = $programs->newCustomGroup("Custom Test Group");
$corpGroup = $programs->newCorpGroup("Corporate Test Group");
echo $custGroup . "<br>";
echo $corpGroup . "<br>";

$programs->assignProgramToGroup(37, 1);
$programs->assignProgramToGroup(45, 1);

$groupProgs = $programs->getProgramsByGroupId(1);
print_r($groupProgs);
echo "<br>";

$groupUserId = $programs->assignUserToGroup(1, 1);
$isAssigned = $programs->checkAssigned(37,1);
$isGroupAssigned = $programs->checkGroupAssigned(37,1);
echo $isAssigned . "<br>";
echo $isGroupAssigned . "<br>";

$programs->removeProgramFromGroup(37, 1);

$groupProgs = $programs->getProgramsByGroupId(1);
print_r($groupProgs);
echo "<br>";



$isAssigned = $programs->checkAssigned(37,1);
$isGroupAssigned = $programs->checkGroupAssigned(37,1);
echo $isAssigned . "<br>";
echo $isGroupAssigned . "<br>";




//echo "Status: " .$status;

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









