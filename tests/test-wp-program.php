<?php 


class WP_Program_Test extends WP_UnitTestCase{
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
      	assert($program37->id == 37);
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
      	echo count($allPhases);
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
     	$this->reset_database();
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
      assert($exerciseThree->order_no == 2);
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
      assert($exerciseThree->order_no == 1);
      $this->reset_database();
  }

  public function test_get_assigned_count_by_program_id(){
    $programs = new program();
    $assignedCount = $programs->getAssignedCountByProgramId(37);
    $expectedCount = 6;
    echo $assignedCount;
    assert($assignedCount == $expectedCount);
  }

  public function test_get_assigned_not_completed_count_by_program_id(){
    $programs = new program();
    $assignedCount = $programs->getAssignedNotCompletedCountByProgramId(37);
    $expectedCount = 5;
    echo $assignedCount;
    assert($assignedCount == $expectedCount);
  }

  public function test_get_completed_count_by_program_id(){
    $programs = new program();
    $assignedCount = $programs->getAssignedCompletedCountByProgramId(37);
    $expectedCount = 1;
    assert($assignedCount == $expectedCount);
  }

  public function test_get_program_state_by_id(){
    $programs = new program();
    $programState = $programs->getProgramStateById(37);
    assert($programState == "Production");
    $programs = new program();
    $programState = $programs->getProgramStateById(48);
    assert($programState == "Development");
  }

  public function test_check_staleness(){
    $programs = new program();
    $stale = $programs->checkStaleness(37);
    assert($stale == 6);
    $programs = new program();
    $stale = $programs->checkStaleness(144);
    assert($stale == 0);
  }

  // public function test_get_program_users_by_id(){
  //   $programs = new program();
  //   $users = $programs->getProgramUsersById(15);
  //   $usersExpected = array("Mike Friesen");
  //   assert($users = $usersExpected);
  // }

  public function test_record_user_deletion(){
    $programs = new program();
    $programs->recordUserDeletion(7, 15);
    $deletedCount = $programs->getProgramDeletionById(15);
    assert($deletedCount == 1); 
  }

  //42 for assert
  public function test_check_user_exists_for_user_programs(){
    $programs = new program();
    $expectedCount = $programs->checkUserExistsForUserPrograms();
    assert($expectedCount == 42);
    $this->reset_database();
  }

  public function test_delete_user_program(){
    $programs = new program();
    $deleted = $programs->deleteUserProgram(7);
    assert($deleted == "Success: User Programs with User Id: 7 Deleted");
    $this->reset_database();
  }

  public function test_update_body_part(){
    $programs = new program();
    $programs->updateBodyPart("Test Name", 1);
    $programs = new program();
    $bodyPart = $programs->getBodyPartById(1);
    assert($bodyPart->name == "Test Name");
    $this->reset_database();
  }

  public function test_update_sports_and_occupation(){
    $programs = new program();
    $programs->updateSportsAndOccupation("Test Name", "Sport", 1);
    $programs = new program();
    $sport = $programs->getSportOccById(1);
    assert($sport->name == "Test Name");
    $this->reset_database();
  }

  public function test_update_how_it_happened(){
    $programs = new program();
    $programs->updateHowItHappened("Test Name", 1);
    $programs = new program();
    $how = $programs->getHowItHappenedById(1);
    assert($how->name == "Test Name");
    $this->reset_database();
  }

  public function test_new_body_part(){
    global $wpdb;
    $programs = new program();
    $programs->newBodyPart("Test Name");
    $lastid = $wpdb->insert_id;
    $programs = new program();
    $newPart = $programs->getBodyPartById($lastid);
    assert($newPart->name == "Test Name");
    $this->reset_database(); 
  }

  public function test_new_sport(){
    global $wpdb;
    $programs = new program(); 
    $programs->newSport("Test Name");
    $lastid = $wpdb->insert_id;
    $programs = new program();
    $newPart = $programs->getSportOccById($lastid);
    assert($newPart->name == "Test Name");
    $this->reset_database(); 
  }

  public function test_new_occupation(){
    global $wpdb;
    $programs = new program(); 
    $programs->newOccupation("Test Name");
    $lastid = $wpdb->insert_id;
    $programs = new program();
    $newPart = $programs->getSportOccById($lastid);
    assert($newPart->name == "Test Name");
    $this->reset_database(); 
  }

  public function test_new_how_it_happened(){
    global $wpdb;
    $programs = new program(); 
    $programs->newHowItHappened("Test Name");
    $lastid = $wpdb->insert_id;
    $programs = new program();
    $newPart = $programs->getHowItHappenedById($lastid);
    assert($newPart->name == "Test Name");
    $this->reset_database(); 
  }

  public function test_get_programs_by_body_part(){
    $programs = new program();
    $partsProgram = $programs->getProgramsByBodyPart(1);
    $expectedProgs = array(37,45);
    $count = 0;
    //id 37 and 45 expected
    foreach ($partsProgram as $key) {
      assert($key->id == $expectedProgs[$count]);
      $count++;
    }
  }  

public function test_get_Body_Part_Names_By_Ids(){
    $programs = new program();
    $body_parts = $programs->getBodyPartNamesByIds("1,15,5,13");
    assert($body_parts == "knee,shoulder,elbow,ankle-foot");
    }

  public function test_get_programs_by_sport_occ(){
    $programs = new program();
    $sportsProgram = $programs->getProgramsBySportOcc(1);
    $expectedProgs = array(47);
    $count = 0;
    //id 47 expected
    foreach ($sportsProgram as $key) {
      assert($key->id == $expectedProgs[$count]);
      $count++;
    }
  }

  public function test_get_programs_by_how_it_happened(){
    $programs = new program();
    $injuryProgram = $programs->getProgramsByHowItHappened(1);
    $expectedProgs = array(45,46);
    $count = 0;
    //id 37 and 45 expected
    foreach ($injuryProgram as $key) {
      assert($key->id == $expectedProgs[$count]);
      $count++;
    }
  }

  public function test_get_exercise_video_count(){
    $programs = new program();
    $expectedCount = 7;
    $resultsCount = $programs->getExerciseVideoCount(277);
    assert($expectedCount == $resultsCount);
  }

  public function test_get_programs_by_exercise_video(){
    $programs = new program();
    $resultsPrograms = $programs->getProgramsByExerciseVideo(277);
    $count = 0;
    $expectedProgNames = array("Hip Injury Prevention Program", "Hip Injury Prevention Program", "Hip Injury Prevention Program", "Hip Injury Prevention Program", "Hip Injury Prevention Program", "Hip Injury Prevention Program", "Hip Injury Prevention Program");
    foreach ($resultsPrograms as $key) {
      assert($expectedProgNames[$count] == $key->name);
      $count++;
    }
  }

  public function test_update_exercise_video(){
    $programs = new program();
    $programs->updateExerciseVideo("Test Name", NULL, 1);
    $programs = new program();
    $video = $programs->getExerciseVideoById(1);
    assert($video->name == "Test Name");
    $this->reset_database();
  }

  public function test_create_exercise_video(){
    global $wpdb;
    $programs = new program();
    $programs->createExerciseVideo("Test Name", "Fake URL");
    $lastid = $wpdb->insert_id;
    $programs = new program();
    $newVideo = $programs->getExerciseVideoById($lastid);
    assert($newVideo->name == "Test Name");
  }


  public function test_user_login_recording(){
    $tracking = new userTracking();
    $tracking->userLoginRecording(1);
    $numLogin = $tracking->getAllUserLogin(1);
    assert($numLogin == 1);
  }

  public function test_user_view_program_recording(){
    $tracking = new userTracking();
    $tracking->userViewProgramRecording(1, 37);
    $lastViewedId = $tracking->getLastViewedProgram(1);
    assert($lastViewedId == 37);
    $this->reset_database();

  }

  public function test_user_view_exercise_recording(){
    $tracking = new userTracking();
    $tracking->userViewExerciseRecording(1, 37);
    $lastViewedId = $tracking->getLastViewedExercise(1);
    assert($lastViewedId == 37);
    $this->reset_database();

  }

  public function test_user_view_program_exercise_recording(){
    $tracking = new userTracking();
    $tracking-> userViewProgramExerciseRecording(1, 37, 38);
    $lastViewedId = $tracking->getLastViewedExercise(1);
    assert($lastViewedId == 38);
    $lastViewedId = $tracking->getLastViewedProgram(1);
    assert($lastViewedId == 37);
    $this->reset_database();

  }

  public function test_last_user_login(){
    $tracking = new userTracking();
    $lastLog = $tracking->getLastUserLogin(1);
    assert($lastLog == "No Login Recorded");
    $this->reset_database();
  }

  // public function test_get_all_user_login(){
  //   $tracking = new userTracking();
  //   $tracking->userLoginRecording(1);
  //   sleep(2);
  //   $tracking->userLoginRecording(1);
  //   sleep(2);
  //   $tracking->userLoginRecording(1);
  //   sleep(2);
  //   $tracking = new userTracking();
  //   $numLogin = $tracking->getAllUserLogin(1);
  //   echo $numLogin;
  //   assert($numLogin == 3);
  // }

  public function get_last_viewed_program(){
    $tracking = new userTracking();
    $lastLoginNone = $tracking->getLastViewedProgram(1);
    assert($lastLoginNone == "No Program Viewed");
    $tracking->userViewProgramRecording(1,1);
    $lastLog = $tracking->getLastViewedProgram(1);
    assert($lastLog == 1);
    $this->reset_database();
  }

  public function get_last_viewed_exercise(){
    $tracking = new userTracking();
    $lastLoginNone = $tracking->getLastViewedExercise(1);
    assert($lastLoginNone == "No Exercise Viewed");
    $tracking->userViewExerciseRecording(1,1);
    $lastLog = $tracking->getLastViewedExercise(1);
    assert($lastLog == 1);
  }

  public function test_new_custom_group(){
    global $wpdb;
    $groups = new group();
    $groups->newCustomGroup("Test Custom");
    $tableName = $wpdb->prefix . "cura_groups";
    $lastId = $wpdb->insert_id;
    $newGroup = $wpdb->get_row("SELECT name, type FROM $tableName WHERE id = $lastId");
    assert($newGroup->name == "Test Custom");
    assert($newGroup->type == 2);
  }

  public function test_new_corp_group(){
    global $wpdb;
    $groups = new group();
    $groups->newCorpGroup("Test Corp", 1);
    $tableName = $wpdb->prefix . "cura_groups";
    $lastId = $wpdb->insert_id;
    $newGroup = $wpdb->get_row("SELECT name, type FROM $tableName WHERE id = $lastId");
    assert($newGroup->name == "Test Corp");
    assert($newGroup->type == 1);
  }

  public function test_assign_user_to_group(){
    global $wpdb;
    $groups = new group();
    $groups->assignUserToGroup(1, 1);
    $user = $groups->getUsersByGroupId(1);
    //assert($user[0] == 1);
  }

  public function test_remove_user_from_group(){
    global $wpdb;
    $groups = new group();
    $groups->removeUserFromGroup(1,1);
    $user = $groups->getUsersByGroupId(1);
    assert($user == NULL);
  }

  public function test_assign_program_to_group(){
    global $wpdb;
    $groups = new group();
    $groups->assignProgramToGroup(37,1);
    $groupProgs = $groups->getProgramsByGroupId(1);
    assert($groupProgs[0] == 37); 
  }

  public function test_remove_program_from_group(){
    global $wpdb;
    $groups = new group();
    $groups->removeProgramFromGroup(37,1);
    $groupProgs = $groups->getProgramsByGroupId(1);
    assert($groupProgs == NULL); 
  }

  public function test_change_group_user_privilege(){
    global $wpdb;
    $groups = new group();
    $groups->assignUserToGroup(1,1);
    $groups->changeGroupUserPrivilege(1,1,2);
    $pLevel = $groups->checkUserPrivilege(1,1);
    assert($pLevel == "Owner Level"); 
  }

  public function test_new_pricing_tier(){
    global $wpdb;
    $groups = new group();
    $newTier = $groups->newPricingTier(0,2,5);
    $userLimits = $groups->checkTierUserLimits($newTier);
    assert($userLimits->min_users == 0);
    assert($userLimits->max_users == 2);


  }

  public function test_new_default_pricing_tier(){
    global $wpdb;
    $groups = new group();
    $newTier = $groups->newDefaultPricingTier(0,2,5);
    $userLimits = $groups->checkTierUserLimits($newTier);
    assert($userLimits->min_users == 0);
    assert($userLimits->max_users == 2);
  }

  public function test_update_pricing_tier(){
    global $wpdb;
    $groups = new group();
    $newTier = $groups->newDefaultPricingTier(0,2,5);
    $groups->updatePricingTier(1, 3, 10, $newTier);
    $userLimits = $groups->checkTierUserLimits($newTier);
    assert($userLimits->min_users == 1);
    assert($userLimits->max_users == 3);
  }

  public function test_get_current_price_per_tier(){
    global $wpdb;
    $groups = new group();
    $newTier = $groups->newDefaultPricingTier(0,2,5);
    $groups->updatePricingTier(1, 3, 10, $newTier);
    $tierPrice = $groups->getCurrentPricePerUser($newTier);
    assert($tierPrice == 10.00);
  }

  public function test_check_valid_tier(){
    global $wpdb;
    $groups = new group();
    $isValid = $groups->checkValidTier(1, 2, 3, 4);
    $isNotValid = $groups->checkValidTier(1,1,2,3);
    $isAlsoNotValid = $groups->checkValidTier(1,2,3,3);
    assert($isValid == "Valid Tier");
    assert($isNotValid == "Tier Not Valid");
    assert($isAlsoNotValid == "Tier Not Valid");
    $this->reset_database();
  }

  public function test_corporate_pricing_functions(){ // This Function Will Test Many Functions, Due to the Nature of their workflow.
    echo "Testing the test_corporate_pricing_fucntions";
    global $wpdb;
    $groups = new group();
    //Building Corp For Tests
    $authToken = $groups->random_str(16);
    $newCorp = $groups->newCorp("Pricing Test Corp", "Go Workout", "testlogo.ca", "testemail@test.ca", "12345678901", $authToken);
    $newGroup = $groups->newCorpGroup("Pricing Test Group", $newCorp);
    $groups->assignUserToGroup($newGroup, 1);
    $groups = new group();
    $groups->assignUserToGroup($newGroup, 2);
    $groups = new group();
    $groups->assignUserToGroup($newGroup, 3);
    $groups = new group();
    $groups->assignUserToGroup($newGroup, 4);
    $groups = new group();
    $groups->assignUserToGroup($newGroup, 5);
    $groups = new group();
    $newTierLow = $groups->newPricingTier(0,2,5);
    $groups = new group();
    $newTierMid = $groups->newPricingTier(3,5,10);
    $groups = new group();
    $newTierHigh = $groups->newPricingTier(6,10,15);
    $groups = new group();
    $groups->assignTierToCorp($newTierLow, $newCorp);
    $groups = new group();
    $groups->assignTierToCorp($newTierMid, $newCorp);
    $groups = new group();
    $groups->assignTierToCorp($newTierHigh, $newCorp);
    $groups = new group();
    $pricePerUser = $groups->getCurrentPricePerUserByCorp($newCorp);
    assert($pricePerUser == 10.00);
    $groups = new group();
    $totalPrice = $groups->getTotalSubscriptionPrice($newCorp);
    assert($totalPrice == 50);
    $groups = new group();
    $groups->assignUserToGroup($newGroup, 6);
    $groups = new group();
    $groups->assignUserToGroup($newGroup, 7);
    $groups = new group();
    $pricePerUser = $groups->getCurrentPricePerUserByCorp($newCorp);
    assert($pricePerUser == 15.00);
    $groups = new group();
    $numUsers = $groups->getNumberOfCorpSubAccounts($newCorp);
    assert($numUsers == 7);
    $corpLink = $groups->getCorpSignUpLinkById($newCorp);
    assert($corpLink == get_site_url() . "/c/?c=" . "Pricing Test Corp" . "&auth=" . $suthToken);
    $this->reset_database();


  }

  public function test_get_corp_by_tier_id(){
    global $wpdb;
    $groups = new group();
    $authToken = $groups->random_str(16);
    $newCorp = $groups->newCorp("Pricing Test Corp", "Go Workout", "testlogo.ca", "testemail@test.ca", "12345678901", $authToken);
    $newTier = $groups->newPricingTier(0,2,5);
    $groups->assignTierToCorp($newTier, $newCorp);
    $corp = $groups->getCorpByTierId($newTier);
    assert($corp->corp_id==$newCorp);

  }


}
?>