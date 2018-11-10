
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();
$newProg = $programs->createProgram("Test Prog1");
$newPhaseId = $programs->createPhase("New Phase1", $newProg);
$highestOrder = $programs->getHighestPhaseOrder($newProg);
$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder, $newPhaseId);
// Order the Phase to the final order 
$programs->movePhaseOrder($newProg,$newPhaseId,$highestOrder,1);

$newPhaseId = $programs->createPhase("New Phase2", $newProg);
$highestOrder = $programs->getHighestPhaseOrder($newProg);
$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder, $newPhaseId);
// Order the Phase to the final order 
$programs->movePhaseOrder($newProg,$newPhaseId,$highestOrder,2);
//$testing2 = $programs->getAPhaseById(437);
//print_r($testing2);
//$testing = $programs->updatePhase("name", "duration", "intro", "notes", "updated_on", 408);
//echo $testing;
//$testing = $programs->getPhasesByProgramId(37);
//print_r($testing);


?>









