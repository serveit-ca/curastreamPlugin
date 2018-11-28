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
    	$programs2 = new program();
    	$newProg = $programs2->getProgramById(37);
    	 assert($ogProg->name != $newProg->name);
    	 assert($ogProg->description != $newProg->description);
    	 assert($ogProg->type == $newProg->type);
    	assert(!($ogProg == $newProg));
    	$this->reset_database();
    }

    public function test_update_phase(){
    	$programs = new program();
    	$ogPhase= $programs->getAPhaseById(60);
    	$programs->updatePhase("New Name", NULL, NULL, NULL, NULL, 60);
    	$programs2 = new program();
    	$newPhase = $programs2->getAPhaseById(60);
    	 assert($ogPhase->name != $newPhase->name);
    	 assert($ogPhase->duration == $newPhase->duration);
    	assert(!($ogPhase == $newPhase));
    	$this->reset_database();
    }

    public function test_update_exercise(){
    	$programs = new program();
    	$this->reset_database();
    	$ogExercise = $programs->getAnExerciseById(92);
    	$programs->updateExercise(NULL, NULL, NULL, "New Name", NULL, NULL, NULL, NULL,  NULL, NULL, NULL, NULL, NULL, 92);
    	$programs2 = new program();
    	$newExercise = $programs2->getAnExerciseById(92);
    	 assert($ogExercise->name != $newExercise->name);
    	 assert($ogExercise->rest == $newExercise->rest);
    	assert(!($ogExercise == $newExercise));
    	$this->reset_database();
    }

    public function test_duplicate_general_program(){
    	$programs = new program();
    	$ogProg = $programs->getProgramById(37);
    	$programs2 = new program();
    	$newProg = $programs2->getProgramById($programs2->duplicateGeneralProgram(37));

    	assert($ogProg->id != $newProg->id );
    	assert($ogProg->name != $newProg->name);
    	assert($ogProg->type == $newProg->type);
    	assert($ogProg->description == $newProg->description || $ogProg->description == '');
    	assert($ogProg->equipment == $newProg->equipment);
    	assert($ogProg->duration == $newProg->duration || $ogProg->duration == '');
    	assert($ogProg->weeklyPlan == $newProg->weeklyPlan || $ogProg->weeklyPlan == '');
    	assert($ogProg->lifeStyle == $newProg->lifeStyle || $ogProg->lifeStyle == '');
    	assert($ogProg->body_part == $newProg->body_part || $ogProg->body_part == '');
    	assert($ogProg->howItHappen == $newProg->howItHappen || $ogProg->howItHappen == '');
    	assert($ogProg->sportsOccupation == $newProg->sportsOccupation || $ogProg->sportsOccupation == '');
    	assert($ogProg->thumbnail == $newProg->thumbnail);
    	assert($ogProg->state == $newProg->state);
    	
    }

    public function test_get_phases_by_program_id(){
    	$programs = new program();
    	$allPhases = $programs->getPhasesByProgramId(37);
    	$expectedIds = array(60,61,62,63,64);
    	$i = 0;
    	foreach($allPhases as $key){
    		assert($key->id == $expectedIds['i']);
    		$i++;
    	}


    }



}

?>