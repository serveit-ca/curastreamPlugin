
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();
//$testing = $programs->getPhasesByProgramId(37);
//print_r($testing);
$testing = $programs->duplicateGeneralProgram(54);
print_r($testing);
//$testing2 = $programs->getAPhaseById(437);
//print_r($testing2);
//$testing = $programs->updatePhase("name", "duration", "intro", "notes", "updated_on", 408);
//echo $testing;
//$testing = $programs->getPhasesByProgramId(37);
//print_r($testing);


?>

