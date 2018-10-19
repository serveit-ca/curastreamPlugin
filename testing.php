
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();
//$testing = $programs->getAPhaseById(62);
$testing = $programs->createExercise("ErrorTest");
//$testing = $programs->updatePhase("name", "duration", "intro", "notes", "updated_on", 408);
//echo $testing;
print_r($testing);


?>

