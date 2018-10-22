
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();
//$testing = $programs->getAllPrograms();
$testing = $programs->duplicateProgram(37, 79);
//$testing = $programs->updateDatabase();
//$testing = $programs->updatePhase("name", "duration", "intro", "notes", "updated_on", 408);
//echo $testing;
print_r($testing);


?>

