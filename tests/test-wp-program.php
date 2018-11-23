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
    	$this->reset_database();
    }


    public function test_get_all_programs(){
    	$programs = new program();
    	$allPrograms = $programs->getAllPrograms();
    	assert(count($allPrograms) == 5);
    	foreach ($allPrograms as $key) {
    		if($key->id != NULL){
    			$compareProg = $programs->getProgramById($key->id);
    			assert($key->id == $compareProg->id );
    			assert($key->name == $compareProg->name);
    			assert($key->type == $compareProg->type);
    			assert($key->description == $compareProg->description || $key->description == '');
    			assert($key->equipment == $compareProg->equipment);
    			assert($key->duration == $compareProg->duration || $key->duration == '');
    			assert($key->weeklyPlan == $compareProg->weeklyPlan || $key->weeklyPlan == '');
    			assert($key->life_style == $compareProg->life_style || $key->life_style == '');
    			assert($key->assoc_body_part_id == $compareProg->assoc_body_part_id || $key->assoc_body_part_id == '');
    			assert($key->how_it_happen == $compareProg->how_it_happen || $key->how_it_happen == '');
    			assert($key->sports_occupation == $compareProg->sports_occupation || $key->sports_occupation == '');
    			assert($key->thumbnail == $compareProg->thumbnail);
    			assert($key->state == $compareProg->state);
    		}
    		else{
    			assert(false);
    		}
    	}
    }



}

?>