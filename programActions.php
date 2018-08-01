<?php 
$path = dirname(dirname(dirname(dirname(__FILE__))));
include_once $path . '/wp-config.php';
include_once $path . '/wp-load.php';
include_once $path . '/wp-includes/wp-db.php';
include_once $path . '/wp-includes/pluggable.php';

// deleting program and associated data

if (isset($_POST['deleteProgram']) && !empty($_POST['deleteProgram'])) {
	$progToDelete = $_POST['deleteProgram'];

	// getting all the phases assoc with this program
	$assocdPhases = $wpdb->get_results("SELECT * FROM `dev_cura_phases` WHERE program_id = $progToDelete", ARRAY_A);
	foreach ($assocdPhases as $key => $value) {		
		$phaseToDelete = $value['id'];
		// deleting exercises
		$wpdb->delete('dev_cura_exercises',array('phase_id'=> $phaseToDelete));		
		// deleting phases 
		$wpdb->delete('dev_cura_phases',array('id'=> $phaseToDelete));	
	}
	// deleting programs
	$deleteResult = $wpdb->delete('dev_cura_programs',array('id'=> $progToDelete));
	echo $deleteResult;
}

// Deleting individual phases

if (isset($_POST['deleteExercise']) && !empty($_POST['deleteExercise'])) {
	$exerciseToDelete = $_POST['deleteExercise'];
	 // Deleting Exercises 
	$result = $wpdb->delete('dev_cura_exercises',array('id'=> $exerciseToDelete));		
	echo $result;
}
 ?>