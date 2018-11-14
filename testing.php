
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");

$newProg = $programs->createProgram("Testphp Prog1");
$newPhaseId = $programs->createPhase("New Phase1", $newProg);
$highestOrder = $programs->getHighestPhaseOrder($newProg);
$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder, $newPhaseId);
// Order the Phase to the final order 
$programs->movePhaseOrder($newProg,$newPhaseId,$highestOrder,1);

// New Phase
 $newPhaseId = $programs->createPhase("New Phase3", $newProg);
$highestOrder = $programs->getHighestPhaseOrder($newProg);
$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder, $newPhaseId);
// Order the Phase to the final order 
$programs->movePhaseOrder($newProg,$newPhaseId,$highestOrder,2);


// New Phase
 $newPhaseId = $programs->createPhase("New Phase4", $newProg);
$highestOrder = $programs->getHighestPhaseOrder($newProg);
$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder, $newPhaseId);
// Order the Phase to the final order 
$programs->movePhaseOrder($newProg,$newPhaseId,$highestOrder,3);

// New Phase
 $newPhaseId = $programs->createPhase("New Phase2", $newProg);
$highestOrder = $programs->getHighestPhaseOrder($newProg);
$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder, $newPhaseId);
// Order the Phase to the final order 
$programs->movePhaseOrder($newProg,$newPhaseId,$highestOrder,2);

?>









