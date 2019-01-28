
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
require_once ("objects/databaseManagement.php");
$database = new databaseManagement();

$database->updateNulls();
$database->fixProgramBodyParts();
$database->fixProgramSportsOcc();
$database->fixProgramHowItHappened();

?>









