<?php 
$path = dirname(dirname(dirname(dirname(__FILE__))));
include_once $path . '/wp-config.php';
include_once $path . '/wp-load.php';
include_once $path . '/wp-includes/wp-db.php';
include_once $path . '/wp-includes/pluggable.php';
// adding programs to the db
	if (isset($_POST['saveProgram']) && $_POST['saveProgram'] == 'save') {
		// print_r($_POST);
		global $wpdb;
		$body_parts = $wpdb->get_results("SELECT * FROM `dev_cura_body_parts` WHERE id > 0");
		// print_r($body_parts);
		// die;
		$idsBody = implode(',', $_POST['associated_body_parts']);
		$idsHow = implode(',', $_POST['how_it_happened']);
		$idsSo = implode(',', $_POST['sports_and_occupations']);
		$table = 'dev_cura_programs';
		$data = array(
			'type' => ucfirst($_POST['type']),
			'name' => ucfirst($_POST['programName']),
			'description' => ucfirst($_POST['progDesc']),
			'duration' => $_POST['progDesc'],
			'weekly_plan' => ucfirst($_POST['progPlan']),
			'life_style' => ucfirst($_POST['progLifestyle']),
			'assoc_body_part_id'=> $idsBody,
			'how_it_happen' => $idsHow,
			'sports_occupation' => $idsSo,
			'thumbnail' => $_POST['thumb'],
			);

		$wpdb->insert($table, $data);
		echo "Successfull";
		die();
		// echo $_POST['form-data']['type'];
	}

	if (isset($_POST['savePhase'])) {
		print_r($_POST);
		$table = 'dev_cura_phases';
		$phaseName = $_POST['phase'][0]["'name'"];
		$phaseIntro = $_POST['phase'][0]["'intro'"];
		$phaseDuration = $_POST['phase'][0]["'duration'"];
		$phaseNotes = $_POST['phase'][0]["'notes'"];
		$programId = $_POST['programId'];
		$data = array(
				'program_id' => $programId,
				'name' => $phaseName,
				'duration' => $phaseDuration,
				'intro' => $phaseIntro,
				'notes' => $phaseNotes
				);
		$wpdb->insert($table, $data);
		$lastID = $wpdb->get_results("SELECT id FROM `dev_cura_phases`");
		echo end($lastID)->id;
		die();
	}
	if (isset($_POST['checkProgramId'])) {
		$lastID = $wpdb->get_results("SELECT id FROM `dev_cura_programs`");
		
			echo end($lastID)->id;
		
		die();
	}
	if (isset($_POST['checkPhaseId'])) {
		$lastID = $wpdb->get_results("SELECT id FROM `dev_cura_phases`");
		
			echo end($lastID)->id;
		
		die();
	}
 ?>