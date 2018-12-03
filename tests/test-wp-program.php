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
    	assert($newProg->custom == 0);
    	
    }

    // public function test_duplicate_custom_program(){
    // 	$programs = new program();
    // 	$ogProg = $programs->getProgramById(37);
    // 	$programs2 = new program();
    // 	$newProg = $programs2->getProgramById($programs2->duplicateGeneralProgram(37));

    // 	assert($ogProg->id != $newProg->id );
    // 	assert($ogProg->name != $newProg->name);
    // 	assert($ogProg->type == $newProg->type);
    // 	assert($ogProg->description == $newProg->description || $ogProg->description == '');
    // 	assert($ogProg->equipment == $newProg->equipment);
    // 	assert($ogProg->duration == $newProg->duration || $ogProg->duration == '');
    // 	assert($ogProg->weeklyPlan == $newProg->weeklyPlan || $ogProg->weeklyPlan == '');
    // 	assert($ogProg->lifeStyle == $newProg->lifeStyle || $ogProg->lifeStyle == '');
    // 	assert($ogProg->body_part == $newProg->body_part || $ogProg->body_part == '');
    // 	assert($ogProg->howItHappen == $newProg->howItHappen || $ogProg->howItHappen == '');
    // 	assert($ogProg->sportsOccupation == $newProg->sportsOccupation || $ogProg->sportsOccupation == '');
    // 	assert($ogProg->thumbnail == $newProg->thumbnail);
    // 	assert($ogProg->state == $newProg->state);
    // 	assert($newProg->custom == 1);
    // }

    public function test_get_phases_by_program_id(){
    	$programs = new program();
    	$allPhases = $programs->getPhasesByProgramId(37);
    	$expectedIds = array(60,61,62,63,64);
    	$i = 0;
    	foreach($allPhases as $key){
    		assert($key->id == $expectedIds[$i]);
    		$i++;
    	}
    }

    public function test_get_exercises_by_phase_id(){
    	$programs = new program();
    	$allExercises = $programs->getExercisesByPhaseId(60);
    	$expectedIds = array(92,93,94,95,96,97,98,99,100);
    	$i = 0;
    	foreach ($allExercises as $key) {
    		assert($key->id == $expectedIds[$i]);
    		$i++;
    	}
    }

    // public function test_create_exercise_by_name(){
    // 	$programs = new program();
    // 	$newExId = $programs->createExerciseByNameByName("Travis Test Exercise", 60);
    // 	$programs2 = new program();
    // 	$newEx=$programs2->getAnExerciseById($newExId);
    // 	assert($newEx->phase_id==60);
    // 	$this->reset_database();
    // }

   public function test_move_phase_order(){
   	$programs = new program();
   	//start with an empty program with no phases
   	$newProgId = $programs->createProgram("Test Program for Move Phases");
   	//add a phase to an empty program
   	$phaseOneId = $programs->createPhase("Test Phase 1 for Move Phases", $newProgId);
   	$highestOrder = $programs->getHighestPhaseOrder($newProgId);
   	$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder+1, $phaseOneId);
   	$programs = new program();
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	assert($phaseOne->order_no == 1);
   	//Add a second phase to a program with one phase to the end
   	$phaseTwoId = $programs->createPhase("Test Phase 2 for Move Phases", $newProgId);
   	$highestOrder = $programs->getHighestPhaseOrder($newProgId);
   	$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder+1, $phaseTwoId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	assert($phaseTwo->order_no == 2);
   	//Add a third phase in the first position to the program - Ensure Phase 1 becomes Phase 2 and Phase 2 becomes phase three
   	$phaseThreeId = $programs->createPhase("Test Phase 3 for Move Phases", $newProgId);
   	$highestOrder = $programs->getHighestPhaseOrder($newProgId);
   	$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder+1, $phaseThreeId);
   	$phaseThree = $programs->getAPhaseById($phaseThreeId);
   	assert($phaseThree->order_no == 3);
   	$programs->movePhaseOrder($newProgId, $phaseThreeId, 3, 1);
   	$programs = new program();
   	$phaseThree = $programs->getAPhaseById($phaseThreeId);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	assert($phaseThree->order_no == 1);
   	assert($phaseOne->order_no == 2);
   	assert($phaseTwo->order_no == 3);
   	//Move Back
   	$programs->movePhaseOrder($newProgId, $phaseThreeId, 1, 3);
   	$programs = new program();
   	$phaseThree = $programs->getAPhaseById($phaseThreeId);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	assert($phaseThree->order_no == 3);
   	assert($phaseOne->order_no == 1);
   	assert($phaseTwo->order_no == 2);
   	//Add 4th for further tests
   	$phaseFourId = $programs->createPhase("Test Phase 4 for Move Phases", $newProgId);
   	$highestOrder = $programs->getHighestPhaseOrder($newProgId);
   	$programs->updatePhase(NULL, NULL, NULL, NULL, $highestOrder+1, $phaseFourId);
   	$phaseFour = $programs->getAPhaseById($phaseFourId);
   	assert($phaseFour->order_no == 4);
   	//Change phase order from 3 to 2
   	$programs->movePhaseOrder($newProgId, $phaseThreeId, 3, 2);
   	$phaseThree = $programs->getAPhaseById($phaseThreeId);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	$phaseFour = $programs->getAPhaseById($phaseFourId);
   	assert($phaseThree->order_no == 2);
   	assert($phaseOne->order_no == 1);
   	assert($phaseTwo->order_no == 3);
   	assert($phaseFour->order_no == 4);
   	//move back
   	$programs->movePhaseOrder($newProgId, $phaseThreeId, 2, 3);
   	$phaseThree = $programs->getAPhaseById($phaseThreeId);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	$phaseFour = $programs->getAPhaseById($phaseFourId);
   	assert($phaseThree->order_no == 3);
   	assert($phaseOne->order_no == 1);
   	assert($phaseTwo->order_no == 2);
   	assert($phaseFour->order_no == 4);
   	//Change phase order from 2 -4
   	$programs->movePhaseOrder($newProgId, $phaseTwoId, 2, 4);
   	$phaseThree = $programs->getAPhaseById($phaseThreeId);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	$phaseFour = $programs->getAPhaseById($phaseFourId);
   	assert($phaseThree->order_no == 2);
   	assert($phaseOne->order_no == 1);
   	assert($phaseTwo->order_no == 4);
   	assert($phaseFour->order_no == 3);
   	//move back
   	$programs->movePhaseOrder($newProgId, $phaseTwoId, 4, 2);
   	$phaseThree = $programs->getAPhaseById($phaseThreeId);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	$phaseFour = $programs->getAPhaseById($phaseFourId);
   	assert($phaseThree->order_no == 3);
   	assert($phaseOne->order_no == 1);
   	assert($phaseTwo->order_no == 2);
   	assert($phaseFour->order_no == 4);
   	// change phase order of 1 to 2
   	$programs->movePhaseOrder($newProgId, $phaseOneId, 1, 2);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	assert($phaseOne->order_no == 2);
   	assert($phaseTwo->order_no == 1);
   	// change phase order of 2 to 1
   	$programs->movePhaseOrder($newProgId, $phaseOneId, 2, 1);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
   	assert($phaseOne->order_no == 1);
   	assert($phaseTwo->order_no == 2);
   	//Remove a Phase from the end of the program
   	$programs->deletePhaseUpdateOrder($newProgId, $phaseFourId, 4);
   	$programs = new program();
    	$allPhases = $programs->getPhasesByProgramId($newProgId);
    	$expectedIds = array($phaseOneId,$phaseTwoId,$phaseThreeId);
    	$i = 0;
    	foreach($allPhases as $key){
    		assert($key->id == $expectedIds[$i]);
    		$i++;
    	}
    $phaseThree = $programs->getAPhaseById($phaseThreeId);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
   	$phaseTwo = $programs->getAPhaseById($phaseTwoId);
    assert($phaseThree->order_no == 3);
   	assert($phaseOne->order_no == 1);
   	assert($phaseTwo->order_no == 2);
   	//Remove a phase from the middle of the program
    $programs->deletePhaseUpdateOrder($newProgId, $phaseTwoId, 2);
   	$programs = new program();
    	$allPhases = $programs->getPhasesByProgramId($newProgId);
    	$expectedIds = array($phaseOneId,$phaseThreeId);
    	$i = 0;
    	foreach($allPhases as $key){
    		assert($key->id == $expectedIds[$i]);
    		$i++;
    	}
    $phaseThree = $programs->getAPhaseById($phaseThreeId);
   	$phaseOne = $programs->getAPhaseById($phaseOneId);
    assert($phaseOne->order_no == 1);
   	assert($phaseThree->order_no == 2);
   	//Remove a phase from the start of the program
   	$programs->deletePhaseUpdateOrder($newProgId, $phaseOneId, 1);
   	$programs = new program();
    	$allPhases = $programs->getPhasesByProgramId($newProgId);
    	$expectedIds = array($phaseThreeId);
    	$i = 0;
    	foreach($allPhases as $key){
    		assert($key->id == $expectedIds[$i]);
    		$i++;
    	}
    $phaseThree = $programs->getAPhaseById($phaseThreeId);
   	assert($phaseThree->order_no == 1);
   }

   public function test_move_exercise_order(){
	$programs = new program();
	//start with empty phase with no exercises
	$newProgId = $programs->createProgram("Test Program for Move Exercises");
	$newPhaseId = $programs->createPhase("Test Phase for Move Exercises", $newProgId);
	//add exercises to empty phase
	$exerciseOneId = $programs->createExerciseByName("Test Exercise 1 for Move Exercise", $newPhaseId);
	$highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
	$programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, $exerciseOneId);
	$programs = new program();
	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
	assert($exerciseOne->order_no == 1);
	//add a second exercise to a phase with one exercise to the end
	$exerciseTwoId = $programs->createExerciseByName("Test Exercise 2 for Move Exercise", $newPhaseId);
	$highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
	$programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, $exerciseTwoId);
	$programs = new program();
	$exerciseTwo = $programs->getAnExerciseById($exerciseTwoId);
	assert($exerciseTwo->order_no == 2);
	//add a third exercise to the first position of the phase - Ensure exercise 1 becomes order 2 and exercise 2 becomes order 3
	$exerciseThreeId = $programs->createExerciseByName("Test Exercise 3 for Move Exercise", $newPhaseId);
	$highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
	$programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, $exerciseThreeId);
	$programs = new program();
	$exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
	assert($exerciseThree->order_no == 3);
	$programs->moveExerciseOrder($newPhaseId, $exerciseThreeId, 3, 1);
	$programs = new program();
	$exerciseThree = $programs-> getAnExerciseById($exerciseThreeId);
	$exerciseOne = $programs-> getAnExerciseById($exerciseOneId);
	$exerciseTwo = $programs-> getAnExerciseById($exerciseTwoId);
	assert($exerciseThree->order_no == 1);
	assert($exerciseTwo->order_no == 3);
	assert($exerciseOne->order_no == 2);
	//Move Back
	$programs->moveExerciseOrder($newPhaseId, $exerciseThreeId, 1, 3);
	$programs = new program();
	$exerciseThree = $programs-> getAnExerciseById($exerciseThreeId);
	$exerciseOne = $programs-> getAnExerciseById($exerciseOneId);
	$exerciseTwo = $programs-> getAnExerciseById($exerciseTwoId);
	assert($exerciseThree->order_no == 3);
	assert($exerciseTwo->order_no == 2);
	assert($exerciseOne->order_no == 1);
	//add 4th for further tests
	$exerciseFourId = $programs->createExerciseByName("Test Exercise 4 for Move Exercise", $newPhaseId);
	$highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
	$programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, $exerciseFourId);
	$programs = new program();
	$exerciseFour = $programs->getAnExerciseById($exerciseFourId);
	assert($exerciseFour->order_no == 4);
	//change exercise order of 3 to 2
	$programs->moveExerciseOrder($newPhaseId, $exerciseThreeId, 3, 2);
	$exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
   	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
   	$exerciseTwo = $programs->getAnExerciseById($exerciseTwoId);
   	$exerciseFour = $programs->getAnExerciseById($exerciseFourId);
   	assert($exerciseThree->order_no == 2);
   	assert($exerciseOne->order_no == 1);
   	assert($exerciseTwo->order_no == 3);
   	assert($exerciseFour->order_no == 4);
   	//move back
   	$programs->moveExerciseOrder($newPhaseId, $exerciseThreeId, 2, 3);
	$exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
   	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
   	$exerciseTwo = $programs->getAnExerciseById($exerciseTwoId);
   	$exerciseFour = $programs->getAnExerciseById($exerciseFourId);
   	assert($exerciseThree->order_no == 3);
   	assert($exerciseOne->order_no == 1);
   	assert($exerciseTwo->order_no == 2);
   	assert($exerciseFour->order_no == 4);
   	//change 2 to 4
   	$programs->moveExerciseOrder($newPhaseId, $exerciseTwoId, 2, 4);
	$exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
   	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
   	$exerciseTwo = $programs->getAnExerciseById($exerciseTwoId);
   	$exerciseFour = $programs->getAnExerciseById($exerciseFourId);
   	assert($exerciseThree->order_no == 2);
   	assert($exerciseOne->order_no == 1);
   	assert($exerciseTwo->order_no == 4);
   	assert($exerciseFour->order_no == 3);
   	//move back
   	$programs->moveExerciseOrder($newPhaseId, $exerciseTwoId, 4, 2);
	$exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
   	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
   	$exerciseTwo = $programs->getAnExerciseById($exerciseTwoId);
   	$exerciseFour = $programs->getAnExerciseById($exerciseFourId);
   	assert($exerciseThree->order_no == 3);
   	assert($exerciseOne->order_no == 1);
   	assert($exerciseTwo->order_no == 2);
   	assert($exerciseFour->order_no == 4);
   	//1 to 2
   	$programs->moveExerciseOrder($newPhaseId, $exerciseOneId, 1, 2);
	$exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
   	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
   	$exerciseTwo = $programs->getAnExerciseById($exerciseTwoId);
   	$exerciseFour = $programs->getAnExerciseById($exerciseFourId);
   	assert($exerciseThree->order_no == 3);
   	assert($exerciseOne->order_no == 2);
   	assert($exerciseTwo->order_no == 1);
   	assert($exerciseFour->order_no == 4);
   	//2 to 1
   	$programs->moveExerciseOrder($newPhaseId, $exerciseOneId, 2, 1);
	$exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
   	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
   	$exerciseTwo = $programs->getAnExerciseById($exerciseTwoId);
   	$exerciseFour = $programs->getAnExerciseById($exerciseFourId);
   	assert($exerciseThree->order_no == 3);
   	assert($exerciseOne->order_no == 1);
   	assert($exerciseTwo->order_no == 2);
   	assert($exerciseFour->order_no == 4);
   		//remove exercise from end of phase
   	$programs->deleteExerciseUpdateOrder($newPhaseId, $exerciseFourId, 4);
   	$programs = new program();
   	$allExercises = $programs->getExercisesByPhaseId($newPhaseId);
   	$expectedIds = array($exerciseOneId,$exerciseTwoId,$exerciseThreeId);
   	$i = 0;
   	foreach($allExercises as $key){
   		assert($key->id == $expectedIds[$i]);
   		$i++;
   }
    $exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
   	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
   	$exerciseTwo = $programs->getAnExerciseById($exerciseTwoId);
    assert($exerciseThree->order_no == 3);
   	assert($exerciseOne->order_no == 1);
   	assert($exerciseTwo->order_no == 2);
   	//remove exercise from middle of phase
   	$programs->deleteExerciseUpdateOrder($newPhaseId,$exerciseTwoId, 2);
   	$programs = new program();
   	$allExercises = $programs->getExercisesByPhaseId($newPhaseId);
   	$expectedIds = array($exerciseOneId,$exerciseThreeId);
   	$i = 0;
   	foreach($allExercises as $key){
   		assert($key->id == $expectedIds[$i]);
   		$i++;
   }
   $exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
   	$exerciseOne = $programs->getAnExerciseById($exerciseOneId);
    assert($exerciseThree->order_no == 3);
   	assert($exerciseOne->order_no == 1);
   //remove exercise from middle of phase
   	$programs->deleteExerciseUpdateOrder($newPhaseId, $exerciseOneId, 1);
   	$programs = new program();
   	$allExercises = $programs->getExercisesByPhaseId($newPhaseId);
   	$expectedIds = array($exerciseThreeId);
   	$i = 0;
   	foreach($allExercises as $key){
   		assert($key->id == $expectedIds[$i]);
   		$i++;
   }
    $exerciseThree = $programs->getAnExerciseById($exerciseThreeId);
    assert($exerciseThree->order_no == 3);
}



}

?>