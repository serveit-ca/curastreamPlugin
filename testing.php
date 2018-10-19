
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();
$testing = $programs->getExercisesByPhaseId("60");
//$testing = $programs->deleteExercise(2615);
//$testing = $programs->updatePhase("name", "duration", "intro", "notes", "updated_on", 408);
//echo $testing;
print_r($testing);
?>