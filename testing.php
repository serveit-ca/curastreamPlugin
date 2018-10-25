
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();
//$testing = $programs->getPhasesByProgramId(37);
//print_r($testing);
<<<<<<< HEAD
$testing = $programs->getAllExerciseVideos();
=======
$testing = $programs->getHighestPhaseOrder(58);
>>>>>>> f8bd845ea9db440f60d5529894a43d415c3b5b4c
print_r($testing);
//$testing = $programs->updatePhase("name", "duration", "intro", "notes", "updated_on", 408);
//echo $testing;
//$testing = $programs->getPhasesByProgramId(37);
//print_r($testing);


?>

