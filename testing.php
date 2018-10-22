
<?php
require_once ("objects/program.php");

$programs = new program();
$testing = $programs->getAllExercises();
//$testing = $programs->deleteExercise(2615);
//$testing = $programs->updatePhase("name", "duration", "intro", "notes", "updated_on", 408);
//echo $testing;
print_r($testing);
?>