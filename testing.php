
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
require_once ("objects/databaseManagement.php");
// $database = new databaseManagement();
 $programs = new program();
// New Corp
    error_log("Testing Php New Log");

    //echo phpinfo();



//echo "Status: " .$status;

//Testing for Move Exercise/Phase Code
// $newProg = $programs->createProgram("Testphp Prog9");
// $newPhaseId = $programs->createPhase("Testphp Phase2", $newProg);

// $newExerciseId = $programs->createExercise(434, $newPhas eId);
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









