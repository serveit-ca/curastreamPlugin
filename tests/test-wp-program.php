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
    			assert($key->lifeStyle == $compareProg->lifeStyle || $key->lifeStyle == '');
    			assert($key->body_part == $compareProg->body_part || $key->body_part == '');
    			assert($key->howItHappen == $compareProg->howItHappen || $key->howItHappen == '');
    			assert($key->sportsOccupation == $compareProg->sportsOccupation || $key->sportsOccupation == '');
    			assert($key->thumbnail == $compareProg->thumbnail);
    			assert($key->state == $compareProg->state);
    		}
    		else{
    			assert(false);
    		}
    	}
    }

    public function test_get_all_phases(){
    	$programs = new program();
    	$allPhases = $programs->getAllPhases();
    	assert(count($allPhases) == 17);
    	foreach ($allPhases as $key) {
    		if($key->id != NULL){
    			$comparePhase = $programs->getAPhaseById($key->id);
    			assert($key->id == $comparePhase->id );
    			assert($key->programId == $comparePhase->programId);
    			assert($key->name == $comparePhase->name);
    			assert($key->duration == $comparePhase->duration || $key->duration == '');
    			assert($key->intro == $comparePhase->intro || $key->intro == '');
    			assert($key->notes == $comparePhase->notes || $key->notes == '');
    		}
    		else{
    			assert(false);
    		}
    	}
    }

    public function test_get_all_exercises(){
    	$programs = new program();
    	$allExercises = $programs->getAllExercises();
    	assert(count($allExercises) == 138);
    	foreach ($allExercises as $key) {
    		if($key->id != NULL){
    			$compareExercise = $programs->getAnExerciseById($key->id);
    			assert($key->id == $compareExercise->id );
    			assert($key->name == $compareExercise->name);
    			assert($key->phase_id == $compareExercise->phase_id);
    			assert($key->order_no == $compareExercise->order_no);
    			assert($key->order_field == $compareExercise->order_field);
    			assert($key->rest == $compareExercise->rest || $key->rest == '');
    			assert($key->sets_reps == $compareExercise->sets_reps || $key->sets_reps == '');
    			assert($key->variation == $compareExercise->variation || $key->variation == '');
    			assert($key->equipment == $compareExercise->equipment || $key->equipment == '');
    			assert($key->special_instructions == $compareExercise->special_instructions || $key->special_instructions == '');
    			assert($key->exercise_video_url == $compareExercise->exercise_video_url || $key->exercise_video_url == '');
    			assert($key->file_url == $compareExercise->file_url || $key->file_url == '');
    			assert($key->file_name == $compareExercise->file_name || $key->file_name == '');
    		}
    		else{
    			assert(false);
    		}
    	}
    }

    public function test_make_custom(){
    	$programs = new program();
    	$programs->makeCustom(37);
    	$isCustom = $programs->getProgramById(37);
    	assert($isCustom->custom == 1);
    }

     public function test_make_general(){
    	$programs = new program();
    	$programs->makeGeneral(37);
    	$isCustom = $programs->getProgramById(37);
    	assert($isCustom->custom == 0);
    	$this->reset_database();
    }

    public function test_update_program(){
    	$programs = new program();
    	$ogProg = $programs->getProgramById(37);
    	$programs->updateProgram("New Name", NULL, "Test description", NULL, NULL, NULL, NULL, NULL,  NULL, NULL, NULL, NULL, NULL, 37);
    	$newProg = $programs->getProgramById(37);
    	if($ogProg->name == $newProg->name){
    		echo "Name failed";
    		assert(false);
    	}
    	else{
    		assert(true);
    	}
    	if($ogProg->description == $newProg->description){
    		echo "description failed";
    		assert(false);
    	}
    	else{
    		assert(true);
    	}
    	if($ogProg == $newProg){
    		echo "object failed";
    		assert(false);
    	}
    	else{
    		assert(true);
    	}
    	
    	$this->reset_database();
    }



}

?>