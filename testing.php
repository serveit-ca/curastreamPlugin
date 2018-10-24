
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();
//$testing = $programs->getPhasesByProgramId(37);
//print_r($testing);
$testing = $programs->deleteExerciseUpdateOrder(60, 94, 2);
print_r($testing);
//$testing = $programs->updatePhase("name", "duration", "intro", "notes", "updated_on", 408);
//echo $testing;
//$testing = $programs->getPhasesByProgramId(37);
//print_r($testing);


?>

