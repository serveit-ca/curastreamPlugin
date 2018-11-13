
<?php
require_once ("objects/program.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
$programs = new program();

$active = $programs->getAllActiveGenericPrograms();
// Order the Phase to the final order 
print_r($active);



?>









