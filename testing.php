
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
require_once ("objects/databaseManagement.php");
$database = new databaseManagement();
$programs = new program();

$database->updateNulls();
$programs->updateProgram(NULL, NULL, NULL, NULL, NULL, NULL, NULL, "No Body Part Assigned",  NULL, NULL, NULL, NULL, NULL, 179);
$database->fixProgramBodyParts();
$database->fixProgramSportsOcc();
$database->fixProgramHowItHappened();

?>









