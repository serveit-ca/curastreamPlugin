<?php 

class WP_Program_Test extends WP_UnitTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->class_instance = new WP_Program_Test();
    }

    public function reset_database(){
    	$command = "mysql --user='root' --password='' "
 		. " -D 'wordpress_test' < 'tests/travis.sql'";

		$output = shell_exec($command);
    }

    public function test_get_program_by_id()
    {
    	$programs = new program();
    	$program37 = $programs->getProgramById(37);
    	assert($program37->id == 37, "getProgramById");
    	//$this->reset_database();
    }

    public function test_get_phase_by_id(){
    	$programs = new program();
    	$phase60 = $programs->getAPhaseById(60);
    	assert($phase60->id == 60, "getPhaseById");
    	//$this->reset_database();
    }

    public function test_get_exercise_by_id(){
    	$programs = new program();
    	$exercise92 = $programs->getAnExerciseById(92);
    	assert($exercise92->id == 92, "getExerciseById");
    	//$this->reset_database();
    }




}

?>