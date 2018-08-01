<?php 
function prefix_enqueue() 
{       
    // JS
    wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    wp_register_script('loadUI', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js');
    wp_register_script('loadselect2', site_url('/wp-content/plugins/Curastream/select2/dist/js/select2.min.js'));
    wp_enqueue_script('prefix_bootstrap');
    wp_enqueue_script('loadUI');
    wp_enqueue_script('loadselect2');

    // CSS
    wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('prefix_bootstrap');
}

 ?>
<html>
<head>
	<title></title>
	<link href="<?php echo site_url(); ?>/wp-content/plugins/Curastream/select2/dist/css/select2.min.css" rel="stylesheet" />
	<style type="text/css">
	<?php if(isset($_POST['editprogram']) && isset($_POST['edit']) && $_POST['edit'] == 'Edit' ){?>
		#main_form
		{
			display: none;
		}
	<?php } ?>
	.edit_form, .main_form
	{
		width: 90%;
	}
	.left_form{
		width: 48%;
		float: left;
		margin-right: 30px; 
	}
	.right_form{
		width: 47%;
		float: left;
	}
	label{
		font-weight: bold;
		font-size: 16px;
		max-width: 100%;
		margin-bottom: 8px;
		display: inline-block;
	}
	.radio_btn{
		font-weight: normal;
	}
	.radio_btn+.radio_btn{
		margin-left: 10px;
	}
	span.select2-selection
	{
		border-color: rgb(221, 221, 221)
	}
	input:focus, span.select2-selection:focus, textarea:focus
	{
		border-color: #00b1b3!important; 
	}
	.selectThumb {
		background: #00b1b3!important;
		color: #fff!important;
		text-align: center!important;
		font-weight: 400!important;		
		border-color: #00b1b3!important;
	}
	.imgDisplay {
		position: fixed;
		width: 100vw;
		height: 100vh;
		background: rgba(0, 0, 0, 0.5);
		top: 0;
		left: 0;
		display: none;
		z-index: 1000000;
	}
	span.select2-selection.select2-selection--multiple {
		min-height: 34px;
		border-color: #ddd;
	}
	span.select2-selection.select2-selection--multiple:focus {		
		border-color: #00b1b3!important;
	}
	div[id*="phase"] {
		padding-top: 30px;
	}
	.add_phase, #add_multiple_phases, .add_exercise, input[type="submit"]{
		border: 0;
		padding: 10px 15px;
		background-color: #00b1b3;
		color: #fff;
	}
	input.form-control {
		height: 38px!important;
	}
	ul.sortable li {
    padding: 20px;
    background: rgba(125, 125, 125, 0.17);
    border-radius: 5px;
    margin-bottom: 20px;
    position: relative;
}


div[id*=phase] {
    background: aliceblue;
    padding: 20px;
    border-right: 1px solid rgb(214, 208, 208);
    border-left: 1px solid rgb(214, 208, 208);
    border-bottom: 1px solid rgb(214, 208, 208);
}
.phases {
    margin-top: 30px;
} 	
.form-group.addProgram {
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px solid darkgray;
}

span.deletePhaseEdit.glyphicon.glyphicon-trash, span.deleteExerciseEdit.glyphicon.glyphicon-trash,span.nameExerciseEdit.glyphicon.glyphicon-edit , span.deletePhase, span.deleteExercise {
    color: #555;
    font-size: 10px;
    display: inline-block;
    margin-left: 10px;
    padding: 5px;
    border-radius: 5px;
        cursor: pointer;
}
span.deleteExercise.glyphicon.glyphicon-trash, span.deleteExerciseEdit.glyphicon.glyphicon-trash {
    margin-bottom: 20px;
    cursor: pointer;
}
span.select2-selection.select2-selection--multiple {
    min-height: 38px;
}
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #999;
}
::-moz-placeholder { /* Firefox 19+ */
  color: #999;
}
.addVideo {
    width: 100%;
    height: 280px;
    border: 2px dashed #c3c3c3;
    position: relative;
}
.addVideo span.glyphicon {
    border: 3px solid #c3c3c3;
    padding: 13px;
    border-radius: 100%;
    position: absolute;
    top: -30px;
    left: 0;
    right: 0;
    bottom: 0;
    width: 45px;
    height: 45px;
    margin: auto;
    color: #c3c3c3;
        cursor: pointer;
        display: none;
}
span.showMessage {
    font-size: 15px;
    font-weight: 700;
    color: gray;
    position: absolute;
    left: 0;
    right: 0;
    margin: auto;
    text-align: center;
    top: 140px;
}
span.glyphicon.glyphicon-move {
    font-size: 19px;
    position: absolute;
    right: 29px;
    top: 16px;
    cursor: move;
}
span.move {
    position: absolute;
    right: 60px;
    top: 12px;
        border-bottom: 2px solid #00b1b3;
}
label[for="type"] {
    display: inline-block;
    margin: 0 20px 5px 0;
    border-bottom: 3px solid #00b1b3;
    padding-bottom: 5px;
}
select.exerciseVideoUrlSource, select.exerciseVideoUrl {
    height: 37px;
}
form#editForm {
    float: left;
    margin-right: 5px;
}

form#editForm input[type="submit"] {
    background-color: #efc227;
}
input[name="deleteProgram"]{
    background-color: #ff5e5e;
}
a.cancel {
    padding: 12px 10px;
    background: #FF5E5E;
    color: #fff!important;
    text-decoration: none!important
}

input#upload-btn, input.file-upload-btn {
    height: 37px!important;
    background-color: #00b1b3!important;
    border: 0!important;
    color: #fff!important;
    width: 108px!important;
}
.file-upload-area {
    margin-top: 10px;
}
div#imageWrapper {
    border: 1px solid #c7c7c7;
    border-radius: 4px;
    margin-top: 10px;
}
div#imageWrapper img {
    width: 100%;
}
input[type="radio"] {
    margin: -3px 5px 0 0!important;
}
select.form-control {
    height: 40px;
}

.searchVids {
    margin: 30px 0;
}
.searchVids label {
    color: #00b1b3;
    margin-bottom: 10px;
    font-size: 16px;
}
.fetchVideos {
    height: 80vh;
    width: 84%;
    position: fixed;
    top: 0;
    bottom: 0;
    margin: auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 30px grey;
    display: none;
    padding: 30px;

}
.closeModal {
    position: absolute!important;
    right: 20px;
    top: 20px!important;
    cursor: pointer;
}
table#videos {

    border: 1px solid #dedede;
    display: block;
    height: 67%;
    margin-top: 30px;
}
table#videos thead
{
	display: block
}
table#videos tbody
{
	display: block;
	height: 85% !important;
	overflow-y: scroll;

}
span.useButton {
    background-color: #00b1b3;
    padding: 10px;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}
#videos th {
    display: inline-block;
    width: 19%;
}
#videos tr {
    width: 100%;
display: block;
border-bottom: 1px solid #e9e9e9;
border-collapse: collapse;
}
table#videos td {
    padding: 10px 15px;
    display: inline-block;
    width: 19.25%;
    border: 0;
}
select[class*="exerciseVideoUrl"] {
    display: none;
}

.fetchVideos ul {
    margin-top: 50px;
    max-height: 320px;
    display: block;
    overflow-y: scroll;
}
.fetchVideos h3
{
	margin:0;
}
.fetchVideos li {
    display: block;
    height: 50px;
}
.select2-results__option[aria-selected=true] {
    display: none;
}
span.body-parts {
    display: inline-block;
    background-color: #00b3b3;
    color: #fff;
    padding: 5px;
    margin: 0 5px 5px 0;
    border-radius: 5px;
}
th#parts {
    width: 18%;
}
span.exerciseName {
    font-size: 18px;
    font-weight: bold;
}
.overlayAction {
    height: 100vh;
    position: fixed;
    width: 87vw;
    top: 0;
    left: 160px;
    background:rgb(255,255,255);
    z-index: 999;
    /*display: none;*/
}
.overlayAction img{
position: absolute;
left: 0;
right: 0;
margin: auto;
top: 0;
bottom: 0;
}
th#title {
    width: 15%;
}
th#cat {
    width: 20%;
}
th#title {
    width: 11%;
}
th#sports {
    width: 21%;
}
	</style>
</head>
<body>
	<div class="overlayAction">
		<img src="<?php echo site_url().'/wp-admin/images/spinner-2x.gif' ?>">
	</div>
	<?php 
		global $wpdb;
		include(dirname(dirname(dirname(__FILE__))).'/wp-inlcudes/media.php');
		$body_parts = $wpdb->get_results("SELECT * FROM `dev_cura_body_parts` WHERE id > 0");
		function cmp($a, $b)
		{
			return strcmp($a->name, $b->name);
		}
		usort($body_parts, "cmp");
		$howItHappened = $wpdb->get_results("SELECT * FROM `dev_cura_how_it_happened` WHERE id > 0");
		
		usort($howItHappened, "cmp");
		$sportsOccupation = $wpdb->get_results("SELECT * FROM `dev_cura_sport_occupation` WHERE id > 0");
		usort($sportsOccupation, "cmp");
		$videos = $wpdb->get_results("SELECT * FROM `dev_cura_exercise_videos` WHERE id > 0", ARRAY_A);
		$defaultProgram = 'dev_cura_default_program';
		// echo "<pre>";
		// print_r($videos);
		// echo "</pre>";
		// die();
		$programs = $wpdb->get_results("SELECT * FROM `dev_cura_programs` WHERE id > 0", ARRAY_A);
		foreach ($programs as $key => $row) {
		    $name[$key]  = $row['name'];
		}
		array_multisort($name, SORT_ASC, $programs);
		// print_r($programs);

		if (isset($_POST['setDefault']) && isset($_POST['defaultProgramId']) && !empty($_POST['defaultProgramId'])) {
			$data = array('program_id' => $_POST['defaultProgramId']);
			$wpdb->query("DELETE FROM $defaultProgram WHERE id > 0");
			$wpdb->insert($defaultProgram, $data);
		}
		if (isset($_POST['addProgram']) && $_POST['addProgram'] == 'Add Program') {
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			// die();
			$idsBody = implode(',', $_POST['associated_body_parts']);
			$idsHow = implode(',', $_POST['how_it_happened']);
			$idsSo = implode(',', $_POST['sports_and_occupations']);
			$tableProg = 'dev_cura_programs';
			$dataProg = array(
				'type' => ucfirst($_POST['type']),
				'name' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['programName'])),
				'description' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['progDesc'])),
				'duration' => str_replace(array('\"', "\'"),array('"', "'"), $_POST['duration']),
				'equipment' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['progEquip'])),
				'weekly_plan' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['progPlan'])),
				'life_style' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['progLifestyle'])),
				'assoc_body_part_id'=> $idsBody,
				'how_it_happen' => $idsHow,
				'sports_occupation' => $idsSo,
				'thumbnail' => $_POST['thumb'],
				);
						
			$wpdb->insert($tableProg, $dataProg);
			$lastId = $wpdb->get_results("SELECT id FROM `dev_cura_programs`");
			
			$programId =  end($lastId)->id;
			foreach ($_POST['phase'] as $key => $value) {
				$phaseBelongsTo = $programId;
				$phaseName = str_replace(array('\"', "\'"),array('"', "'"),$value['name']);
				$phaseIntro = str_replace(array('\"', "\'"),array('"', "'"),$value['intro']);
				$phaseDuration = $value['duration'];
				$phaseNotes = str_replace(array('\"', "\'"),array('"', "'"),$value['notes']);
				$tablePhase = 'dev_cura_phases';
				$dataPhase = array(
						'program_id' => $phaseBelongsTo,
						'name' => $phaseName,
						'duration' => $phaseDuration,
						'intro'=>$phaseIntro,
						'notes' => $phaseNotes
						);
				$wpdb->insert($tablePhase, $dataPhase);
				$lastId = $wpdb->get_results("SELECT id FROM `dev_cura_phases`");
				$phaseId =  end($lastId)->id;
				foreach ($value['exercise'] as $key_s => $value_s) {
					$exerciseBelongsTo = $phaseId;
					$exerciseOrderField = $value_s['orderField'];
					$exercisename = str_replace(array('\"', "\'"),array('"', "'"),$value_s['name']);
					$exerciserest = $value_s['rest'];
					$exerciseSets = $value_s['sets'];
					$exerciseVar = str_replace(array('\"', "\'"),array('"', "'"),$value_s['variation']);
					$exerciseEquip = str_replace(array('\"', "\'"),array('"', "'"),$value_s['equipment']);
					$exerciseIns = str_replace(array('\"', "\'"),array('"', "'"),$value_s['instructions']);
					$exerciseUrl = $value_s['exerciseUrl'];
					$exerciseFileUrl = $value_s['file_url'];
					$exerciseFileName = str_replace(array('\"', "\'"),array('"', "'"), $value_s['file_name']);
					$exerciseOrder = $value_s['order'];
					$tableExer = 'dev_cura_exercises';
					$dataExer = array(
							'phase_id' => $exerciseBelongsTo,
							'order_no' => $exerciseOrder,
							'order_field' => $exerciseOrderField,
							'name' => $exercisename,
							'rest' => $exerciserest,
							'sets_reps' => $exerciseSets,
							'variation' => $exerciseVar,
							'equipment' => $exerciseEquip,
							'special_instructions' => $exerciseIns,
							'exercise_video_url' => $exerciseUrl,
							'file_url' => $exerciseFileUrl,
							'file_name' => $exerciseFileName
						);
					$wpdb->insert($tableExer, $dataExer);
				}
			} ?>
			<script type="text/javascript">
				alert('Program Added Successfully.');
			</script>
			<script type="text/javascript">
				window.location.reload();
			</script>
<?php
		}

		// updaing program
		if (isset($_POST['updateProgram']) && $_POST['updateProgram'] == 'Update Program') {
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			// die();
			$idsBody = implode(',', $_POST['associated_body_parts_update']);
			$idsHow = implode(',', $_POST['how_it_happened_update']);
			$idsSo = implode(',', $_POST['sports_and_occupations_update']);
			$tableProg = 'dev_cura_programs';
			$where = array('id' => $_POST['progIdupdate']);
			$dataProgUpdate = array(
				'type' => ucfirst($_POST['typeUpdate']),
				'name' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['progNameupdate'])),
				'description' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['progDescUpdate'])),
				'duration' => str_replace(array('\"', "\'"),array('"', "'"), $_POST['progDurationUpdate']),
				'equipment' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['progEquipUpdate'])),
				'weekly_plan' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['progPlanUpdate'])),
				'life_style' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['progLifestyleUpdate'])),
				'assoc_body_part_id'=> $idsBody,
				'how_it_happen' => $idsHow,
				'sports_occupation' => $idsSo,
				'thumbnail' => $_POST['thumbUpdate'],
				);
			$wpdb->update($tableProg, $dataProgUpdate, $where);
			// $lastId = $wpdb->get_results("SELECT id FROM `dev_cura_programs`");
			// $programId =  end($lastId)->id;
			foreach ($_POST['phase'] as $key_p => $value_p) {
				// $phaseBelongsTo = $_POST['progIdupdate'];
				if ($value_p['phaseDelete'] == 'delete'){
					$phaseId = $value_p['phaseId'];
					$wpdb->delete('dev_cura_phases', array('id' => $phaseId));
					$wpdb->delete('dev_cura_exercises', array('phase_id' => $phaseId));
				}
				elseif ($value_p['phaseId'] == '') { 
					$phaseName = str_replace(array('\"', "\'"),array('"', "'"),$value_p['nameUpdate']);
					$phaseIntro = str_replace(array('\"', "\'"),array('"', "'"),$value_p['introUpdate']);
					$phaseDuration = $value_p['durationUpdate'];
					$phaseNotes = str_replace(array('\"', "\'"),array('"', "'"),$value_p['notesUpdate']);
					$tablePhase = 'dev_cura_phases';
					$dataPhase = array(
							'program_id' => $_POST['progIdupdate'],
							'name' => $phaseName,
							'duration' => $phaseDuration,
							'intro'=>$phaseIntro,
							'notes' => $phaseNotes
							);
					$wpdb->insert($tablePhase, $dataPhase);
					$lastPhaseAdded = $wpdb->get_results("SELECT id FROM `dev_cura_phases`");
					$phaseNew = end($lastPhaseAdded)->id;	
					foreach ($value_p['exercise'] as $key_s => $value_s) {
						$exerciseBelongsTo = $phaseNew;
						// $exerciseId = $value_s['exerciseId'];
						$exerciseOrderField = $value_s['orderField'];
						$exerciserest = $value_s['rest'];
						$exerciseSets = $value_s['sets'];
						$exerciseName = str_replace(array('\"', "\'"),array('"', "'"),$value_s['name']);
						$exerciseVar = str_replace(array('\"', "\'"),array('"', "'"),$value_s['variation']);
						$exerciseEquip = str_replace(array('\"', "\'"),array('"', "'"),$value_s['equipment']);
						$exerciseIns = str_replace(array('\"', "\'"),array('"', "'"),$value_s['instructions']);
						$exerciseUrl = $value_s['exerciseUrl'];
						$exerciseOrder = $value_s['order'];
						$exerciseFileUrl = $value_s['file_url'];
						$exerciseFileName = str_replace(array('\"', "\'"),array('"', "'"), $value_s['file_name']);
						$tableExer = 'dev_cura_exercises';
						// $where = array('phase_id' => $exerciseBelongsTo, 'id' => $exerciseId);
						$dataExer = array(
								'phase_id' => $exerciseBelongsTo,
								'order_no' => $exerciseOrder,
								'order_field' => $exerciseOrderField,
								'name' => $exerciseName,
								'rest' => $exerciserest,
								'sets_reps' => $exerciseSets,
								'variation' => $exerciseVar,
								'equipment' => $exerciseEquip,
								'special_instructions' => $exerciseIns,
								'exercise_video_url' => $exerciseUrl,
								'file_url' => $exerciseFileUrl,
								'file_name' => $exerciseFileName
							);
						// echo "<pre>";
						// print_r($dataExer);
						// echo "</pre>";
						$wpdb->insert($tableExer, $dataExer);
					}
				} 
				else
				{
					$phaseId = $value_p['phaseId'];
					$phaseName = str_replace(array('\"', "\'"),array('"', "'"),$value_p['nameUpdate']);
					$phaseIntro = str_replace(array('\"', "\'"),array('"', "'"),$value_p['introUpdate']);
					$phaseDuration = $value_p['durationUpdate'];
					$phaseNotes = str_replace(array('\"', "\'"),array('"', "'"),$value_p['notesUpdate']);
					$tablePhase = 'dev_cura_phases';
					$where = array('program_id' => $_POST['progIdupdate'], 'id' => $phaseId);
					$dataPhase = array(
							'name' => $phaseName,
							'duration' => $phaseDuration,
							'intro'=>$phaseIntro,
							'notes' => $phaseNotes
							);
					$wpdb->update($tablePhase, $dataPhase, $where);

					foreach ($value_p['exercise'] as $key_s => $value_s) {
						$exerciseBelongsTo = $phaseId;
						$exerciseId = $value_s['id'];
						if($exerciseId == ''){
							$exerciseBelongsTo = $phaseId;
							$exerciseOrderField = $value_s['orderField'];
							$exerciserest = $value_s['rest'];
							$exerciseName = str_replace(array('\"', "\'"),array('"', "'"),$value_s['name']);
							$exerciseSets = $value_s['sets'];
							$exerciseVar = str_replace(array('\"', "\'"),array('"', "'"),$value_s['variation']);
							$exerciseEquip = str_replace(array('\"', "\'"),array('"', "'"),$value_s['equipment']);
							$exerciseIns = str_replace(array('\"', "\'"),array('"', "'"),$value_s['instructions']);
							$exerciseUrl = $value_s['exerciseUrl'];
							$exerciseOrder = $value_s['order'];
							$exerciseFileUrl = $values_s['file_url'];
							$exerciseFileName = str_replace(array('\"', "\'"),array('"', "'"), $values_s['file_name']);
							$tableExer = 'dev_cura_exercises';
							// $where = array('phase_id' => $exerciseBelongsTo, 'id' => $exerciseId);
							$dataExer = array(
									'phase_id' => $exerciseBelongsTo,
									'order_no' => $exerciseOrder,
									'order_field' => $exerciseOrderField,
									'name' => $exerciseName,
									'rest' => $exerciserest,
									'sets_reps' => $exerciseSets,
									'variation' => $exerciseVar,
									'equipment' => $exerciseEquip,
									'special_instructions' => $exerciseIns,
									'exercise_video_url' => $exerciseUrl,
									'file_url' => $exerciseFileUrl,
									'file_name' => $exerciseFileName
								);
							// echo "<pre>";
							// print_r($dataExer);
							// echo "</pre>";
							// die;
							$wpdb->insert($tableExer, $dataExer);
						}
						else
						{
							$exerciseId = $value_s['id'];
							$exerciseOrderField = $value_s['orderField'];
							$exerciserest = $value_s['rest'];
							$exerciseSets = $value_s['sets'];
							$exerciseName = str_replace(array('\"', "\'"),array('"', "'"),$value_s['name']);
							$exerciseVar = str_replace(array('\"', "\'"),array('"', "'"),$value_s['variation']);
							$exerciseEquip = str_replace(array('\"', "\'"),array('"', "'"),$value_s['equipment']);
							$exerciseIns = str_replace(array('\"', "\'"),array('"', "'"),$value_s['instructions']);
							$exerciseUrl = $value_s['exerciseUrl'];
							$exerciseOrder = $value_s['order'];
							$exerciseFileUrl = $value_s['file_url'];
							$exerciseFileName = str_replace(array('\"', "\'"),array('"', "'"), $value_s['file_name']);
							$tableExer = 'dev_cura_exercises';
							$where = array('phase_id' => $exerciseBelongsTo, 'id' => $exerciseId);
							$dataExer = array(
									'phase_id' => $exerciseBelongsTo,
									'order_no' => $exerciseOrder,
									'order_field' => $exerciseOrderField,
									'name' => $exerciseName,
									'rest' => $exerciserest,
									'sets_reps' => $exerciseSets,
									'variation' => $exerciseVar,
									'equipment' => $exerciseEquip,
									'special_instructions' => $exerciseIns,
									'exercise_video_url' => $exerciseUrl,
									'file_url' => $exerciseFileUrl,
									'file_name' => $exerciseFileName

								);
							// echo "<pre>";
							// print_r($dataExer);
							// echo "</pre>";
							$wpdb->update($tableExer, $dataExer, $where);
						}
					}
				}
				// $lastId = $wpdb->get_results("SELECT id FROM `dev_cura_phases`");
				// $phaseId =  end($lastId)->id;
				// die();
				
			}
			// echo $_POST['form-data']['type'];?>
			<script type="text/javascript">
				alert('Program Updated Successfully.');
			</script>
			<script type="text/javascript">
				window.location.reload();
			</script>
		<?php }
	?>
	<?php 
	if (isset($_POST['editprogram']) && isset($_POST['edit']) && $_POST['edit'] == 'Edit' ) {
		$progID = $_POST['editprogram'];
		$getProgramById = $wpdb->get_results("SELECT * FROM `dev_cura_programs` WHERE id = $progID", ARRAY_A);
		// echo "<pre>";
		// print_r($getProgramById);
		// echo "</pre>";

		$getPhaseByProgId = $wpdb->get_results("SELECT * FROM `dev_cura_phases` WHERE program_id = $progID", ARRAY_A);
		foreach ($getPhaseByProgId as $key => $value) {
			$phaseID = $value['id'];
			$getPhaseByProgId[$key]['exercise'] = $getExerByPhaseId = $wpdb->get_results("SELECT * FROM `dev_cura_exercises` WHERE phase_id = $phaseID ORDER BY `order_no` ASC", ARRAY_A);
		}
		// echo "<pre>";
		// print_r($getPhaseByProgId);
		// echo "</pre>";

		foreach ($getPhaseByProgId as $key => $value) {
			$phaseId = $value['id'];
			$getExerByPhaseId = $wpdb->get_results("SELECT * FROM `dev_cura_exercises` WHERE `phase_id` = $phaseId ORDER BY `order_no` ASC", ARRAY_A);
			// echo "<pre>";
			// print_r($getExerByPhaseId);
			// echo "</pre>";
		}

		$getProgramParts = $wpdb->get_results("SELECT assoc_body_part_id FROM `dev_cura_programs` WHERE id = $progID", ARRAY_A);
		$getProgramHow = $wpdb->get_results("SELECT how_it_happen FROM `dev_cura_programs` WHERE id = $progID", ARRAY_A);
		$getProgramSports = $wpdb->get_results("SELECT sports_occupation FROM `dev_cura_programs` WHERE id = $progID", ARRAY_A);
		$videos = $wpdb->get_results("SELECT sports_occupation FROM `dev_cura_programs` WHERE id = $progID", ARRAY_A);
		// echo "<pre>";
		// print_r($getProgramParts);
		// echo "</pre>";
		$assocparts = explode(',',$getProgramParts[0]['assoc_body_part_id']);
		$assochow = explode(',',$getProgramHow[0]['how_it_happen']);
		$assocsports = explode(',',$getProgramSports[0]['sports_occupation']);
		$assoc_parts = array();
		$assoc_how = array();
		$assoc_sports = array();
		foreach ($assocparts as $key => $value) {
			$assoc_parts[] = $value;
		}
		foreach ($assochow as $key => $value) {
			$assoc_how[] = $value;
		}
		foreach ($assocsports as $key => $value) {
			$assoc_sports[] = $value;
		}

		
	?>
	<h1 style="margin: 40px 0;">Update Program</h1>	
	<div class="edit_form">
		<form action="" method="POST" novalidate id="editForm">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="type">Type</label>
						<label class="radio_btn"><input required type="radio" name="typeUpdate" value="Rehab" id="rehab" <?php echo ($getProgramById[0]['type'] == 'Rehab') ? 'checked' : '' ?>>Rehab</label>
						<label class="radio_btn"><input required type="radio" name="typeUpdate" id="prevention" value="Prevention" <?php echo ($getProgramById[0]['type'] == 'Prevention') ? 'checked' : '' ?>>Prevention</label>
						<label class="radio_btn"><input required type="radio" name="typeUpdate" id="strength" value="Strength-Training" <?php echo ($getProgramById[0]['type'] == 'Strength-Training') ? 'checked' : '' ?>>Strength Training</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="hidden" name="progIdupdate" value="<?php echo $getProgramById[0]['id'] ?>">					
						<input type="text" name="progNameupdate" class="form-control" required="required" placeholder="Name" value="<?php echo $getProgramById[0]['name'] ?>">					
					</div>
					<div class="form-group">
						<input type="text" name="progDurationUpdate" class="form-control" required="required" placeholder="Duration" min="1" value="<?php echo $getProgramById[0]['duration'] ?>">									
					</div>
					<div class="form-group">
						<div>
						   	<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Choose Image">
						    <input type="text" name="thumbUpdate" required="required" id="image_url" class="regular-text form-control" value="<?php echo $getProgramById[0]['thumbnail'] ?>">
							<!-- <span id="imageWrapperPull" class="glyphicon glyphicon-triangle-bottom" data-toggle="collapse" data-target="#imageWrapper"></span>
							<div id="imageWrapper" class="collapse">
								<img src="">
							</div> -->
						</div>
						<!-- <input type="hidden" value="" name="thumbUpdate" class="form-control" required="required" placeholder="Duration" min="1">									 -->
						<!-- <div class="imgDisplay"></div> -->
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<select multiple="multiple" name="associated_body_parts_update[]" class="form-control multiple_parts" required="required">							
							<!-- 	<option disabled="disabled" selected="selected">Associated Body Parts</option> -->
							<?php foreach ($body_parts as $key => $value){ ?>
							<option value="<?php echo array_values((array)$value)[1]; ?>" <?php echo in_array(array_values((array)$value)[1], $assoc_parts) ? 'selected' : '' ?>><?php echo array_values((array)$value)[1]; ?></option>
							<?php } ?>
						</select>
			
					</div>
					<div class="form-group">
						<!-- <label for="duration">Duration</label><br> -->
						<select multiple="multiple" name="how_it_happened_update[]" id="howItHappened" class="form-control	 multiple_reasons" required="required">
							<?php foreach ($howItHappened as $key => $value){ ?>
							<option value="<?php echo array_values((array)$value)[1]; ?>" <?php echo in_array(array_values((array)$value)[1], $assoc_how) ? 'selected' : '' ?>><?php echo array_values((array)$value)[1]; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<select multiple="multiple" name="sports_and_occupations_update[]" id="sportsOccupation" class="form-control multiple_sports_occ" required="required">
							<?php foreach ($sportsOccupation as $key => $value){ ?>
							<option value="<?php echo array_values((array)$value)[1]; ?>"<?php echo in_array(array_values((array)$value)[1], $assoc_sports) ? 'selected' : '' ?>><?php echo array_values((array)$value)[1]; ?></option>
							<?php } ?>
						</select>
					</div>	
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<textarea name="progDescUpdate" class="form-control" required="required" placeholder="Description" ><?php echo $getProgramById[0]['description'] ?></textarea>
					</div>
					<div class="form-group">
						<textarea name="progEquipUpdate" class="form-control" required="required" placeholder="Equipment" ><?php echo $getProgramById[0]['equipment'] ?></textarea>
					</div>
					<div class="form-group" id="hideField1">					
						<textarea name="progPlanUpdate" class="form-control" required="required" placeholder="Weekly Plan" ><?php echo $getProgramById[0]['weekly_plan'] ?></textarea>
					</div>
					<div class="form-group" id="hideField2">
						<textarea name="progLifestyleUpdate" class="form-control" required="required" placeholder="Lifestyle"><?php echo $getProgramById[0]['life_style'] ?></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- <button class="add_phase">Add Phase</button> -->
					<div class="phases_edit">
						<ul class="nav nav-tabs">
							<?php foreach ($getPhaseByProgId as $key => $value) { ?>
								<li class="phase <?php echo ($key == 0) ? 'active' : '' ?>" id="<?php echo ($key + 1) ?>"><a data-toggle="tab" class="phase" data-tab-index="<?php echo $key +1 ?>" href="#phase<?php echo ($key + 1) ?>"><span class="order"><?php /*echo ($key + 1)*/echo $value['name'] ?></span><span class="deletePhaseEdit glyphicon glyphicon-trash" data-tab-index="1" data-phase-id="<?php echo $value['id'] ?>"></span></a></li>	
							<?php } ?>
							<!-- <li class="active phase" id="1"><a data-toggle="tab" class="phase" data-tab-index="1" href="#phase1"><span class="order">1</span><span class="deletePhase glyphicon glyphicon-trash" data-tab-index="1"></span></a></li> -->
							<button id="add_multiple_phases">Add Another Phase</button>
						</ul>
						<div class="tab-content">
							<?php foreach ($getPhaseByProgId as $key => $value) { ?>
								<div data-phase-id="<?php echo $value['id'] ?>" id="phase<?php echo ($key + 1) ?>" class="tab-pane fade in <?php echo ($key == 0) ? 'active' : '' ?> phase-info" data-tab-count="<?php echo $key +1 ?>">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input class="deletePhase" type="hidden" name="phase[<?php echo $key ?>][phaseDelete]" value="">
												<input type="hidden" name="phase[<?php echo $key ?>][phaseId]" value="<?php echo $value['id'] ?>">
												<input type="text" name="phase[<?php echo $key ?>][nameUpdate]" placeholder="Phase Name" required="required" class="form-control nameEdit" value="<?php echo $value['name'] ?>">
											</div>
											<div class="form-group">
												<textarea type="text" name="phase[<?php echo $key ?>][introUpdate]" placeholder="Phase Introduction" class="form-control intro"><?php echo $value['intro'] ?></textarea>								
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" required="required" name="phase[<?php echo $key ?>][durationUpdate]" placeholder="Phase Duration" class="form-control duration" value="<?php echo $value['duration'] ?>">
											</div>
											<div class="form-group">
												<textarea type="text" name="phase[<?php echo $key ?>][notesUpdate]" placeholder="Phase Notes" class="form-control notes"><?php echo $value['notes'] ?></textarea>
											</div>
										</div>
										<div class="col-md-12">										
											<div class="exercises">									
												<ul class="sortable">
													<?php  
														foreach ($value['exercise'] as $keys => $values) { ?>																
															<li>
																<input type="text" class="nameExerciseEdit" hidden value="<?php echo str_replace(array('\"', "\'"),array('"', "'"), $values['name']) ?>">
																<span class="exerciseName"><?php echo empty($values['name']) ? 'Exercise' : str_replace(array('\"', "\'"),array('"', "'"), $values['name']) ?></span> <!-- <span class="nameExerciseEdit glyphicon glyphicon-edit" data-tab-index="1" data-exercise-id="<?php //echo $values['id'] ?>"></span> --><span class="deleteExerciseEdit glyphicon glyphicon-trash" data-tab-index="1" data-exercise-id="<?php echo $values['id'] ?>"></span>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<input type="hidden" class="id" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][exerciseId]" value="<?php echo $values['id'] ?>">
																			<input type="hidden" class="order" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][order]" value="<?php echo $values['order_no'] ?>">
																			<input type="hidden" class="name" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][name]" value="<?php echo $values['name'] ?>">															
																		</div>
																		<div class="form-group">
																			<input required="required" class="form-control orderField" type="text"   name="phase[0][exercise][0][orderField]" value="<?php echo str_replace(array('\"', "\'"),array('"', "'"), $values['order_field']) ?>">														
																		</div>

																		<div class="form-group">
																			
																			<input required="required" class="form-control set" type="text" placeholder="Sets x Reps"  name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][sets]" value="<?php echo str_replace(array('\"', "\'"),array('"', "'"), $values['sets_reps'])?>">
																		</div>											
																		<div class="form-group">
																			<input required="required" class="form-control rest" type="text" placeholder="Rest"  name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][rest]" value="<?php echo str_replace(array('\"', "\'"),array('"', "'"), $values['rest']) ?>">
																		</div>
																		<div class="form-group">
																			<input required="required" class="form-control var" type="text"  placeholder="Variation" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][variation]" value="<?php echo str_replace(array('\"', "\'"),array('"', "'"),  $values['variation']) ?>">
																		</div>
																		<div class="form-group">
																			<textarea required="required" class="form-control equip"  placeholder="Equipment" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][equipment]"><?php echo str_replace(array('\"', "\'"),array('"', "'"), $values['equipment']) ?></textarea>
																		</div>
																		<div class="form-group">
																			<textarea required="required" class="form-control ins"  placeholder="Special Instructions" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][instructions]"><?php echo str_replace(array('\"', "\'"),array('"', "'"), $values['special_instructions']) ?></textarea>
																		</div>
																	</div>
																	<div class="col-md-6">
																				<?php $exercise_Id = $values['id'];
																				// echo $exercise_Id;	
																				?>
																		<select required="required" class="exerciseVideoUrlSource form-control">
																			<option>Select a Video</option>
																				<?php 
																				$videos = $wpdb->get_results("SELECT * FROM `dev_cura_exercise_videos` WHERE id > 0", ARRAY_A);
																				$getVideoForExer = $wpdb->get_col("SELECT exercise_video_url FROM `dev_cura_exercises` WHERE id = $exercise_Id");
																				print_r($getVideoForExer);
																					foreach ($videos as $key_v => $value_v) { ?>
																						<option value="<?php echo $value_v['url'] ?>" <?php echo ($value_v['url'] == $getVideoForExer[0]) ? 'selected' : '' ?>><?php echo $value_v['name'] ?></option>
																				<?php } ?>
																		</select>
																		<input type="hidden" class="exercise ex" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][exerciseUrl]" value="<?php echo $values['exercise_video_url'] ?>">
																		<span class="removeVideo glyphicon glyphicon-remove"></span>
																		<div class="addVideo">
																			<span class="glyphicon glyphicon-plus"></span>
																			<span class="showMessage">Click in this box to add Video</span>
																		</div>
																		<div class="file-upload-area">
																			<div class="row">
																				<div class="col-md-3">									
																		   			<input type="button" name="upload-btn" id="upload-file" class="button-secondary file-upload-btn" value="Choose File" data-exerFileUpload="0">
																				</div>
																				<div class="col-md-9">
																		    		<input type="hidden" placeholder="File URL" id="file_url" class="regular-text form-control file-upload-path" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][file_url]" data-exerFileName="0" value="<?php echo $values['file_url'] ?>">
																		    		<input type="text" placeholder="File Name" id="file_name" class="regular-text form-control file-upload-name" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][file_name]" data-exerFileName="0" value="<?php echo $values['file_name'] ?>">
																				</div>
																			</div>
																		</div>
																	</div>
																<span class="glyphicon glyphicon-move"></span>
																<span class="move"> Move this exercise to a desired order in the list</span>
															</li>
													<?php } ?>
													<button class="add_exercise">Add Exercise</button>
												</ul>											
											</div>
										</div>
									</div>
								</div>
							<?php } ?>							
						</div>	
					</div>
					<div class="form-group addProgram" style="clear: both;">
						<input type="submit" value="Update Program" name="updateProgram">
						<a href="" class="cancel">Cancel</a>
					</div>	
				</div>				
		</form>
	</div>
	<div class="fetchVideos"><span class="closeModal glyphicon glyphicon-remove"></span></div>
	<?php } 
	else{
	?>
	<div class="main_form">
	<h1 style="margin: 40px 0;">Add a Program</h1>	
		<form action="" method="POST" id="addProgram">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="type">Type</label>
						<label class="radio_btn"><input required type="radio" name="type" value="Rehab" id="rehab">Rehab</label>
						<label class="radio_btn"><input required type="radio" name="type" id="prevention" value="Prevention"> Prevention</label>
						<label class="radio_btn"><input required type="radio" name="type" id="strength" value="Strength-Training"> Strength Training</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="programName" class="form-control" required="required" placeholder="Name">					
					</div>
					<div class="form-group">
						<input type="text" name="duration" class="form-control" required="required" placeholder="Duration" min="1">									
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
						   		<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Choose Image">								
							</div>
							<div class="col-md-9">
						    	<input type="text" name="thumb" id="image_url" class="regular-text form-control" value="" required="required">								
							</div>
							<!-- <span id="imageWrapperPull" class="glyphicon glyphicon-triangle-bottom" data-toggle="collapse" data-target="#imageWrapper"></span>
							<div id="imageWrapper" class="collapse">
								<img src="">
							</div> -->
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<select multiple="multiple" name="associated_body_parts[]" class="form-control multiple_parts" required="required">							
							<!-- 	<option disabled="disabled" selected="selected">Associated Body Parts</option> -->
							<?php foreach ($body_parts as $key => $value){ ?>
							<option value="<?php echo array_values((array)$value)[1]; ?>"><?php echo array_values((array)$value)[1]; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<!-- <label for="duration">Duration</label><br> -->
						<select multiple="multiple" name="how_it_happened[]" id="howItHappened" class="form-control	 multiple_reasons" required="required">
							<?php foreach ($howItHappened as $key => $value){ ?>
							<option value="<?php echo array_values((array)$value)[1]; ?>"><?php echo array_values((array)$value)[1]; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<select multiple="multiple" name="sports_and_occupations[]" id="sportsOccupation" class="form-control multiple_sports_occ" required="required">
							<?php foreach ($sportsOccupation as $key => $value){ ?>
							<option value="<?php echo array_values((array)$value)[1]; ?>"><?php echo array_values((array)$value)[1]; ?></option>
							<?php } ?>
						</select>
					</div>	
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<textarea name="progDesc" class="form-control" required="required" placeholder="Description"></textarea>
					</div>
					<div class="form-group">
						<textarea name="progEquip" class="form-control" required="required" placeholder="Equipment"></textarea>
					</div>
					<div class="form-group" id="hideField1">					
						<textarea name="progPlan" class="form-control" required="required" placeholder="Weekly Plan"></textarea>
					</div>
					<div class="form-group" id="hideField2">
						<textarea name="progLifestyle" class="form-control" required="required" placeholder="Lifestyle"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Add Phase to this Program</h3>
					<!-- <button class="add_phase">Add Phase</button> -->
					<div class="phases">
						<ul class="nav nav-tabs">
							<li class="active phase" id="1"><a data-toggle="tab" class="phase" data-tab-index="1" href="#phase1"><span class="order">1</span><span class="deletePhase glyphicon glyphicon-trash" data-tab-index="1"></span></a></li>
							<button id="add_multiple_phases">Add Another Phase</button>
						</ul>
						<div class="tab-content">
							<div id="phase1" class="tab-pane fade in active" data-tab-count="1">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input required="required" type="text" name="phase[0][name]" placeholder="Phase Name" class="form-control name">
										</div>
										<div class="form-group">
											<textarea type="text" name="phase[0][intro]" placeholder="Phase Introduction" class="form-control intro"></textarea>								
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input required="required" type="text" name="phase[0][duration]" placeholder="Phase Duration" class="form-control duration">
										</div>
										<div class="form-group">
											<textarea type="text" name="phase[0][notes]" placeholder="Phase Notes" class="form-control notes"></textarea>
										</div>
									</div>
									<div class="col-md-12">										
										<div class="exercises">
											<!-- <ul class="nav nav-tabs">
												<li class="active exercise"><a data-toggle="tab" data-tab-index="1" href="#exercise1"><span class="order">1</span><span class="deleteExercise glyphicon glyphicon-trash" data-tab-index="1"></span></a></li>
												<button class="add_exercise">Add Exercise</button>
											</ul>
											<div class="tab-content">
												<div id="exercise1" class="tab-pane fade in active" data-tab-count="1">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<input class="form-control set" type="text" placeholder="Sets x Reps"  name="phase[0]['set']">
															</div>											
															<div class="form-group">
																<input class="form-control rest" type="text" placeholder="Rest"  name="phase[0]['rest']">
															</div>
															<div class="form-group">
																<input class="form-control var" type="text"  placeholder="Variation" name="phase[0]['variation']">
															</div>
															<div class="form-group">
																<textarea class="form-control equip"  placeholder="Equipment" name="phase[0]['equipment']"></textarea>
															</div>
															<div class="form-group">
																<textarea class="form-control ins"  placeholder="Special Instructions" name="phase[0]['instructions']"></textarea>
															</div>
														</div>
														<div class="col-md-6">
															<span class="message">Video</span>
														</div>
													</div>
												</div>
											</div> -->	
											<ul class="sortable">

												<li><span class="exerciseName">Exercise</span> <span class="deleteExercise glyphicon glyphicon-trash" data-tab-index="1"></span>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<input required="required" class="form-control orderField" type="text" placeholder="Order"  name="phase[0][exercise][0][orderField]" value="">														
															</div>
															<div class="form-group">
																<input type="hidden" class="id" name="phase[0][exercise][0][id]" value="">
																<input type="hidden" class="name" name="phase[0][exercise][0][name]" value="">
																<input type="hidden" class="order" name="phase[0][exercise][0][order]" value="">															
																<input required="required" class="form-control set" type="text" placeholder="Sets x Reps"  name="phase[0][exercise][0][sets]">
															</div>											
															<div class="form-group">
																<input required="required" class="form-control rest" type="text" placeholder="Rest"  name="phase[0][exercise][0][rest]">
															</div>
															<div class="form-group">
																<input required="required" class="form-control var" type="text"  placeholder="Variation" name="phase[0][exercise][0][variation]">
															</div>
															<div class="form-group">
																<textarea required="required" class="form-control equip"  placeholder="Equipment" name="phase[0][exercise][0][equipment]"></textarea>
															</div>
															<div class="form-group">
																<textarea required="required" class="form-control ins"  placeholder="Special Instructions" name="phase[0][exercise][0][instructions]"></textarea>
															</div>
														</div>
														<div class="col-md-6">
															<select class="exerciseVideoUrlSource form-control" required="required">
																<option>Select a Video</option>
																	<?php 
																		foreach ($videos as $key => $value) { ?>
																			<option value="<?php echo $value['url'] ?>"><?php echo $value['name'] ?></option>
																		<?php }
																	 ?>
															</select>
															<input type="hidden" class="exercise ex" name="phase[0][exercise][0][exerciseUrl]" value="">
															<div class="addVideo">
																<span class="glyphicon glyphicon-plus"></span>
																<span class="showMessage">Click in this box to add Video</span>
															</div>
															<div class="file-upload-area">
																<div class="row">
																	<div class="col-md-3">									
															   			<input type="button" name="upload-btn" id="upload-file" class="button-secondary file-upload-btn" value="Choose File" data-exerFileUpload="0">
																	</div>
																	<div class="col-md-9">
															    		<input type="hidden" placeholder="File URL" value="" id="file_url" class="regular-text form-control file-upload-path" name="phase[0][exercise][0][file_url]" data-exerFileName="0">
															    		<input type="text" placeholder="File Name" value="" id="file_name" class="regular-text form-control file-upload-name" name="phase[0][exercise][0][file_name]" data-exerFileName="0">
																	</div>
															</div>
														</div>
													</div>
													<span class="glyphicon glyphicon-move"></span>
													<span class="move"> Move this exercise to a desired order in the list</span>
												</li>
												<button class="add_exercise">Add Exercise</button>
											</ul>											
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="form-group addProgram" style="clear: both;">
						<input type="submit" value="Add Program" name="addProgram">
						<a href="" class="cancel">Cancel</a>
					</div>	
				</div>				
				</form>
			</div>
	</div>
	<div class="defaultProgramArea">
		<h1>Demo Program for free users</h1>
	<?php //print_r($programs); ?>
	 <form action="" method="POST" id="defaultProgram">
	 	<div class="row">
	 		<div class="col-md-6">
	 	<select class="form-control" name="defaultProgramId">
	 		<?php 
	 			// see if this program is in default program table
	 			global $wpdb;
	 			$defProgram = $wpdb->get_results("SELECT * FROM $defaultProgram", ARRAY_A)[0]['program_id'];
	 			foreach ($programs as $key => $value) { ?>
	 				<option <?php echo ($value['id'] == $defProgram) ? 'selected' : '' ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>	
	 			<?php } ?>
	 	</select>
	 	</div>
	 	<div class="col-md-6">
			<input type="submit" name="setDefault" value="Set program as default">					
		</div>
	 </form>
	</div>
	<?php 
		if (isset($_POST['searchSelect']) && !empty($_POST['searchSelect']) && isset($_POST['search'])) {
			$idToSearch = $_POST['searchSelect'];
			$searchResults = $wpdb->get_results("SELECT * FROM `dev_cura_exercise_videos` WHERE assoc_body_parts_name LIKE '%$idToSearch%'");
		
		}
	 ?>
	 <h1>All Programs</h1>
	<div class="searchVids">
		<form action="" method="post" id="searchProgram">
			<label>Filter Videos by Body Parts</label>
			<div class="row">
				<div class="col-md-6">
					<select class="form-control" name="searchSelect">
						<option value="">View All</option>
						<?php foreach ($body_parts as $key => $value){	?>
						<option value="<?php echo array_values((array)$value)[1] ?>"<?php echo (isset($_POST['search']) && $_POST['searchSelect'] == array_values((array)$value)[1]) ? 'selected' : '' ?>><?php echo array_values((array)$value)[1]; ?></option>
						<?php } ?>			
					</select>
				</div>
				<div class="col-md-6">
					<input type="submit" name="search" value="Search">					
				</div>
			</div>	
		</form>
	</div>
	<div class="tableProrgams">
		
		<div class="row">
			<div class="col-md-12">
				<table id="programs" class="table table-bordered">	
					<th id= "sr">Sr No.</th>
					<th id= "title">Program Name</th>
					<th id= "type">Program Type</th>
					<th id= "cat">Description</th>
					<th id= "sports">Sports &amp; Occupation</th>
					<th id= "parts">Body parts</th>
					<th id= "actions">Actions</th>
					<?php 
					$count = 0;
					if (isset($_POST['searchSelect']) && !empty($_POST['searchSelect']) && isset($_POST['search'])) {
						$_POST['search'] = $idToSearch;
						$programsSearch = $wpdb->get_results("SELECT * FROM `dev_cura_programs` WHERE assoc_body_part_id LIKE '%$idToSearch%'", ARRAY_A);
						foreach ($programsSearch as $keys => $rows) {
						    $names[$keys]  = $rows['name'];
						}
						array_multisort($names, SORT_ASC, $programsSearch);
						// print_r($programsSearch);
						foreach ($programsSearch as $key => $value) {
							$count++;						
							$progName = $value['name']; 
							$progDesc = $value['description']; 
							$partsAssoc = explode(',', $value['assoc_body_part_id']);
							$sports_occ = explode(',', $value['sports_occupation']);
							?>
							<tr>
								<td><?php echo $count ?></td>	
								<td><?php echo $progName ?></td>	
								<td><?php echo  $value['type'] ?></td>	
								<td><?php echo $progDesc ?></td>
								<td>	
									<?php
																				
											foreach ($sports_occ as $keys_sports => $value_sports) {
												echo "<span class='body-parts'>". $value_sports ."</span>";
											}
										
									?>
								</td>
								<td>	
									<?php
										foreach ($partsAssoc as $keys_parts => $value_parts) {
											echo "<span class='body-parts'>". $value_parts ."</span>";
										}
									?>
								</td>		
								<td id="actions">
									<form id ="editForm" action="" method="POST">					
										<input type="hidden"  name="editprogram" value="<?php echo $value['id']; ?>">
										<input type='submit' name="edit" value="Edit">
									</form>
									<input type="hidden" name="deleteprogram"  value="<?php echo $value['id']; ?>">							
									<input type='submit' name="deleteProgram" value="Delete" data-prog-id = "<?php echo $value['id']; ?>" class="deleteProgram">
								</td>
							</tr>
							<?php } 

						}
						else { 

							foreach ($programs as $key => $value) {
							$count++;						
							$progName = $value['name']; 
							$progDesc = $value['description']; 
							$partsAssoc = explode(',', $value['assoc_body_part_id']);
							$sports_occ = explode(',', $value['sports_occupation']);
							?>
							<tr>
								<td><?php echo $count ?></td>	
								<td><?php echo $progName ?></td>	
								<td><?php echo  $value['type'] ?></td>	
								<td><?php echo $progDesc ?></td>
								<td>	
									<?php
																				
											foreach ($sports_occ as $keys_sports => $value_sports) {
												echo "<span class='body-parts'>". $value_sports ."</span>";
											}
										
									?>
								</td>
								<td>	
									<?php
											foreach ($partsAssoc as $keys_parts => $value_parts) {
																			
												echo "<span class='body-parts'>". $value_parts ."</span>";
											}
										
									?>
								</td>			
								<td id="actions">
									<form id ="editForm" action="" method="POST">					
										<input type="hidden"  name="editprogram" value="<?php echo $value['id']; ?>">
										<input type='submit' name="edit" value="Edit">
									</form>
									<input type="hidden" name="deleteprogram"  value="<?php echo $value['id']; ?>">							
									<input type='submit' name="deleteProgram" value="Delete" data-prog-id = "<?php echo $value['id']; ?>" class="deleteProgram">
								</td>
							</tr>
						<?php } 
					}?>
				</table>
			</div>
		</div>
	</div>
	<div class="fetchVideos">
		<h3>Add video to exercise</h3>
		<span class="closeModal glyphicon glyphicon-remove"></span></div>
	<?php } ?>
	<?php 
		// if key is to edit program then this script will run, with 
			if (isset($_POST['editprogram']) && isset($_POST['edit']) && $_POST['edit'] == 'Edit') { ?>
				<script type="text/javascript">
					// alert(12313);
					jQuery('#add_multiple_phases').click(function(event){
						event.preventDefault();
						jQuery(this).before('<li class="phase" id=""><a data-toggle="tab" data-tab-index="" href=""><span class="order"></span><span class="deletePhase glyphicon glyphicon-trash" data-tab-index=""></span></a></li>');
						jQuery(this).prev('li').children('a').attr('data-tab-index',jQuery(this).prev('li').index()+1);
						jQuery(this).prev('li').children('a').attr('href','#phase' + (jQuery(this).prev('li').index() + 1));
						jQuery(this).prev('li').children('a').children('.order').html(jQuery(this).prev('li').index() + 1);					
						jQuery(this).prev('li').children('a').children('.deletePhase').attr('data-tab-index',jQuery(this).prev('li').index()+1);

						//tab-content
						jQuery(this).parent().siblings('.tab-content').append('<div id="phase'+ (jQuery(this).prev('li').index() + 1) +'" data-tab-count="'+(jQuery(this).prev('li').index() + 1)+'"class="tab-pane fade in"><div class="row"><div class="col-md-6"><div class="form-group"><input type="hidden" name="phase['+ (jQuery(this).prev('li').index()) +'][phaseId]" value=""><input type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][nameUpdate]" placeholder="Phase Name" class="form-control name"></div><div class="form-group"><textarea type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][introUpdate]" placeholder="Phase Introduction" class="form-control intro "></textarea></div></div><div class="col-md-6"><div class="form-group"><input type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][durationUpdate]" placeholder="Phase Duration" class="form-control duration"></div><div class="form-group"><textarea type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][notesUpdate]" placeholder="Phase Notes" class="form-control notes"></textarea></div></div><div class="col-md-12"><div class="exercises"><ul class="sortable"><li><span class="exerciseName">Exercise</span> <span class="deleteExercise glyphicon glyphicon-trash" data-tab-index="1"></span><div class="row"><div class="col-md-6"><div class="form-group"><input required="required" class="form-control orderField" type="text" placeholder="Order"  name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][orderField]"></div><div class="form-group"><input type="hidden" class="id" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][id]" value=""><input type="hidden" class="name" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][name]" value=""><input type="hidden" class="order" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][order]" value=""><input class="form-control set" type="text" placeholder="Sets x Reps" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][sets]"></div><div class="form-group"><input class="form-control rest" type="text" placeholder="Rest" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][rest]"></div><div class="form-group"><input class="form-control var" type="text" placeholder="Variation" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][variation]"></div><div class="form-group"><textarea class="form-control equip" placeholder="Equipment" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][equipment]"></textarea></div><div class="form-group"><textarea class="form-control ins" placeholder="Special Instructions" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][instructions]"></textarea></div></div><div class="col-md-6"><select class="exerciseVideoUrl form-control"><option>Select a Video</option></select><input type="hidden" class="exercise" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][exerciseUrl]" value=""><div class="addVideo"><span class="glyphicon glyphicon-plus"></span><span class="showMessage">Click in the box to add a video</span></div><div class="file-upload-area"><div class="row"><div class="col-md-3"><input type="button" name="upload-btn" id="upload-file" class="button-secondary file-upload-btn" value="Choose File" data-exerFileUpload="0"></div><div class="col-md-9"><input type="hidden" placeholder="File URL" value="" id="file_url" class="regular-text form-control file-upload-path" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][file_url]" data-exerFileName="0"><input type="text" placeholder="File Name" value="" id="file_name" class="regular-text form-control file-upload-name" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][file_name]" data-exerFileName="0"></div></div></div></div><span class="glyphicon glyphicon-move"></span><span class="move"> Move this exercise to a desired order in the list</span></li><button class="add_exercise">Add Exercise</button></ul></div></div></div></div>')
						jQuery('[data-tab-index="' + (jQuery(this).prev('li').index() + 1) + '"]').tab('show');
						jQuery('.order').attr('value', jQuery(this).parents('li').index() + 1);
						jQuery(this).parent().siblings('.tab-content').children('[data-tab-count="'+ jQuery('#add_multiple_phases').prev('li').children('a').attr('data-tab-index') +'"]').find('.exerciseVideoUrl').html(jQuery('.exerciseVideoUrlSource').html());					
					})
					
						jQuery('.ex').each(function(){
							if (jQuery(this).attr('value') != '') {
					 			jQuery(this).siblings('.addVideo').html('<video width="100%" height="100%" controls><source src="'+jQuery(this).attr('value')+'" type="video/mp4"><source src="'+jQuery(this).attr('value')+'" type="video/ogg">Your browser does not support the video tag.</video>');
							}
							else
							{
								jQuery(this).siblings('.removeVideo').remove();
							}
					//   jQuery(this).siblings('.exercise').attr('value', this.value);
					// // alert(this.value);
					//   jQuery(this).siblings('.addVideo').find('span').remove();
					//   jQuery(this).siblings('.addVideo').html('<video width="100%" height="100%" controls><source src="'+this.value+'" type="video/mp4"><source src="'+this.value+'" type="video/ogg">Your browser does not support the video tag.</video>')
					  // alert(this.value);

					 //  	if(jQuery('#image_url').attr('value') == ''){
					 //  		jQuery('#imageWrapperPull').display('none');
					 //  	}
					 //  	jQuery('#imageWrapperPull').click(function(){					  		
						//     jQuery('#imageWrapper').children('img').attr('src', jQuery('#image_url').attr('value'));
						// })
					})
				</script>		
			<?php }
				else
				{ ?>
					<script type="text/javascript">
						jQuery('#add_multiple_phases').click(function(event){
					event.preventDefault();
					jQuery(this).before('<li class="phase" id=""><a data-toggle="tab" data-tab-index="" href=""><span class="order"></span><span class="deletePhase glyphicon glyphicon-trash" data-tab-index=""></span></a></li>');
					jQuery(this).prev('li').children('a').attr('data-tab-index',jQuery(this).prev('li').index()+1);
					jQuery(this).prev('li').children('a').attr('href','#phase' + (jQuery(this).prev('li').index() + 1));
					jQuery(this).prev('li').children('a').children('.order').html(jQuery(this).prev('li').index() + 1);					
					jQuery(this).prev('li').children('a').children('.deletePhase').attr('data-tab-index',jQuery(this).prev('li').index()+1);

					//tab-content
					jQuery(this).parent().siblings('.tab-content').append('<div id="phase'+ (jQuery(this).prev('li').index() + 1) +'" data-tab-count="'+(jQuery(this).prev('li').index() + 1)+'"class="tab-pane fade in"><div class="row"><div class="col-md-6"><div class="form-group"><input type="hidden" name="phase['+ (jQuery(this).prev('li').index()) +'][phaseId] value=""><input type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][name]" placeholder="Phase Name" class="form-control name"></div><div class="form-group"><textarea type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][intro]" placeholder="Phase Introduction" class="form-control intro "></textarea></div></div><div class="col-md-6"><div class="form-group"><input type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][duration]" placeholder="Phase Duration" class="form-control duration"></div><div class="form-group"><textarea type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][notes]" placeholder="Phase Notes" class="form-control notes"></textarea></div></div><div class="col-md-12"><div class="exercises"><ul class="sortable"><li><span class="exerciseName">Exercise</span> <span class="deleteExercise glyphicon glyphicon-trash" data-tab-index="1"></span><div class="row"><div class="col-md-6"><div class="form-group"><input type="hidden" class="id" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][id]" value=""><input type="hidden" class="name" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][name]" value=""><input required="required" class="form-control orderField" type="text" placeholder="Order"  name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][orderField]"></div><div class="form-group"><input type="hidden" class="order" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][order]" value=""><input class="form-control set" type="text" placeholder="Sets x Reps" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][sets]"></div><div class="form-group"><input class="form-control rest" type="text" placeholder="Rest" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][rest]"></div><div class="form-group"><input class="form-control var" type="text" placeholder="Variation" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][variation]"></div><div class="form-group"><textarea class="form-control equip" placeholder="Equipment" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][equipment]"></textarea></div><div class="form-group"><textarea class="form-control ins" placeholder="Special Instructions" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][instructions]"></textarea></div></div><div class="col-md-6"><select class="exerciseVideoUrl form-control"><option>Select a Video</option></select><input type="hidden" class="exercise" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][exerciseUrl]" value=""><div class="addVideo"><span class="glyphicon glyphicon-plus"></span><span class="showMessage">Click in the box to add a video</span></div><div class="file-upload-area"><div class="row"><div class="col-md-3"><input type="button" name="upload-btn" id="upload-file-0" class="button-secondary file-upload-btn" value="Choose File" data-exerFileUpload="0"></div><div class="col-md-9"><input type="hidden" id="file_url" placeholder="File URL" class="regular-text form-control file-upload-path" name="phase['+ jQuery(this).prev('li').index() +'][exercise][0][file_url]" data-exerFileName="0"><input type="text" placeholder="File Name" value="" id="file_name" class="regular-text form-control file-upload-name" name="phase['+ jQuery(this).prev('li').index() +'][exercise][0][file_name]" data-exerFileName="0"></div></div></div></div><span class="glyphicon glyphicon-move"></span><span class="move"> Move this exercise to a desired order in the list</span></li><button class="add_exercise">Add Exercise</button></ul></div></div></div></div>')
					jQuery('[data-tab-index="' + (jQuery(this).prev('li').index() + 1) + '"]').tab('show');
					jQuery('.order').attr('value', jQuery(this).parents('li').index() + 1);
					jQuery(this).parent().siblings('.tab-content').children('[data-tab-count="'+ jQuery('#add_multiple_phases').prev('li').children('a').attr('data-tab-index') +'"]').find('.exerciseVideoUrl').html(jQuery('.exerciseVideoUrlSource').html());
					
				})
					</script>
				<?php }
			 ?>
			<!--<script src="<?php echo site_url(); ?>/wp-content/plugins/Curastream/select2/dist/js/jquery.min.js" type="text/javascript"></script>
			<script src="<?php echo site_url(); ?>/wp-content/plugins/Curastream/select2/dist/js/select2.min.js" type="text/javascript"></script>-->


			<script type="text/javascript">
				jQuery(document).ready(function() {
					makeSortable();	
					update_fields_ex();
					jQuery('.overlayAction').css('display','none');
				// adding value to input order
					// jQuery('.order').attr('value', jQuery(this).parents('li').index() + 1);

					// jQuery('.phases').slideUp();

					//making select fields select2
					jQuery('select[class*="multiple"]').select2();
					jQuery('select[class*="multiple"]').select2({
				         allowClear: true,
				         minimumResultsForSearch: -1,				        
				     });
					//putting placeholders in select2 fields
					jQuery(".multiple_parts").select2({
						placeholder: "Body Parts",

					});
					jQuery(".multiple_reasons").select2({
						placeholder: "How it happened",

					});
					jQuery(".multiple_sports_occ").select2({
						placeholder: "Sports & Occupations",

					});
					 jQuery('select[class*="multiple"]').on("select2:select", function(evt) {
				         var element = evt.params.data.element;
				         var $element = jQuery(element);
				         $element.detach();
				         jQuery(this).append($element);
				         jQuery(this).trigger("change");
				     });
					var selectList = jQuery('.multiple_parts option');
					function sort(a,b){
					    a = a.text.toLowerCase();
					    b = b.text.toLowerCase();
					    if(a > b) {
					        return 1;
					    } else if (a < b) {
					        return -1;
					    }
					    return 0;
					}
					selectList.sort(sort);
					jQuery('.multiple_parts').html(selectList);
					

					var selectList = jQuery('.multiple_reasons option');
					function sort(a,b){
					    a = a.text.toLowerCase();
					    b = b.text.toLowerCase();
					    if(a > b) {
					        return 1;
					    } else if (a < b) {
					        return -1;
					    }
					    return 0;
					}
					selectList.sort(sort);
					jQuery('.multiple_reasons').html(selectList)

					var selectList = jQuery('.multiple_sports_occ option');
					function sort(a,b){
					    a = a.text.toLowerCase();
					    b = b.text.toLowerCase();
					    if(a > b) {
					        return 1;
					    } else if (a < b) {
					        return -1;
					    }
					    return 0;
					}
					selectList.sort(sort);
					jQuery('.multiple_sports_occ').html(selectList);
				// 	showing phase area
				// 	jQuery('.add_phase').click(function(event){
				// 		event.preventDefault();
				// 		jQuery('.phases').slideDown();
				// 		jQuery(this).css('display','none');
				// 	})

					//adding new phases

					
					// jQuery('#add_multiple_phases').click(function(event){
					// 	event.preventDefault();
					// 	jQuery(this).before('<li class="phase" id=""><a data-toggle="tab" data-tab-index="" href=""><span class="order"></span><span class="deletePhase glyphicon glyphicon-trash" data-tab-index=""></span></a></li>');
					// 	jQuery(this).prev('li').children('a').attr('data-tab-index',jQuery(this).prev('li').index()+1);
					// 	jQuery(this).prev('li').children('a').attr('href','#phase' + (jQuery(this).prev('li').index() + 1));
					// 	jQuery(this).prev('li').children('a').children('.order').html(jQuery(this).prev('li').index() + 1);					
					// 	jQuery(this).prev('li').children('a').children('.deletePhase').attr('data-tab-index',jQuery(this).prev('li').index()+1);

					// 	//tab-content
					// 	jQuery(this).parent().siblings('.tab-content').append('<div id="phase'+ (jQuery(this).prev('li').index() + 1) +'" data-tab-count="'+(jQuery(this).prev('li').index() + 1)+'"class="tab-pane fade in"><div class="row"><div class="col-md-6"><div class="form-group"><input type="hidden" name="phase['+ (jQuery(this).prev('li').index()) +'][phaseId] value=""><input type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][name]" placeholder="Phase Name" class="form-control name"></div><div class="form-group"><textarea type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][intro]" placeholder="Phase Introduction" class="form-control intro "></textarea></div></div><div class="col-md-6"><div class="form-group"><input type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][duration]" placeholder="Phase Duration" class="form-control duration"></div><div class="form-group"><textarea type="text" name="phase['+ (jQuery(this).prev('li').index()) +'][notes]" placeholder="Phase Notes" class="form-control notes"></textarea></div></div><div class="col-md-12"><div class="exercises"><ul class="sortable"><li><span class="exerciseName">Exercise</span> <span class="deleteExercise glyphicon glyphicon-trash" data-tab-index="1"></span><div class="row"><div class="col-md-6"><div class="form-group"><input type="hidden" class="order" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][order]" value=""><input class="form-control set" type="text" placeholder="Sets x Reps" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][set]"></div><div class="form-group"><input class="form-control rest" type="text" placeholder="Rest" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][rest]"></div><div class="form-group"><input class="form-control var" type="text" placeholder="Variation" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][variation]"></div><div class="form-group"><textarea class="form-control equip" placeholder="Equipment" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][equipment]"></textarea></div><div class="form-group"><textarea class="form-control ins" placeholder="Special Instructions" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][instructions]"></textarea></div></div><div class="col-md-6"><select class="exerciseVideoUrl form-control"><option>Select a Video</option></select><input type="hidden" class="exercise" name="phase['+ jQuery(this).prev('li').index()+'][exercise][0][exerciseUrl]" value=""><div class="addVideo"><span class="glyphicon glyphicon-plus"></span><span class="showMessage">Click in the box to add a video</span></div></div></div><span class="glyphicon glyphicon-move"></span><span class="move"> Move this exercise to a desired order in the list</span></li><button class="add_exercise">Add Exercise</button></ul></div></div></div></div>')
					// 	jQuery('[data-tab-index="' + (jQuery(this).prev('li').index() + 1) + '"]').tab('show');
					// 	jQuery('.order').attr('value', jQuery(this).parents('li').index() + 1);
					// 	jQuery(this).parent().siblings('.tab-content').children('[data-tab-count="'+ jQuery('#add_multiple_phases').prev('li').children('a').attr('data-tab-index') +'"]').find('.exerciseVideoUrl').html(jQuery('.exerciseVideoUrlSource').html());
						
					// })

					// Adding Exercises
					jQuery(document).on('click','.add_exercise', function(event){
						event.preventDefault();
						// jQuery(this).before('li').children('.exerciseName').html('Exercise '+jQuery(this).prev('li').index());
						jQuery(this).before('<li><span class="exerciseName">Exercise</span><span class="deleteExercise glyphicon glyphicon-trash" data-tab-index="1"></span><div class="row"><div class="col-md-6"><div class="form-group"><input required="required" class="form-control orderField" type="text" placeholder="Order"  name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +	'][orderField]"></div><div class="form-group"><input class="id" type="hidden" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +'][id]" value=""><input class="name" type="hidden" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +'][name]" value=""><input class="order" type="hidden" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +'][order]" value=""><input class="form-control set" type="text" placeholder="Sets x Reps" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +	'][sets]"></div><div class="form-group"><input class="form-control rest" type="text" placeholder="Rest" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +'][rest]"></div><div class="form-group"><input class="form-control var" type="text" placeholder="Variation" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +	'][variation]"></div><div class="form-group"><textarea class="form-control equip" placeholder="Equipment" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +	'][equipment]"></textarea></div><div class="form-group"><textarea class="form-control ins" placeholder="Special Instructions" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +	'][instructions]"></textarea></div></div><div class="col-md-6"><select class="exerciseVideoUrl form-control"><option>Select a Video</option></select><input type="hidden" class="exercise" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +	'][exerciseUrl]" value=""><div class="addVideo">	<span class="glyphicon glyphicon-plus"></span><span class="showMessage">Click in this box to add Video</span></div><div class="file-upload-area"><div class="row"><div class="col-md-3"><input type="button" name="upload-btn" id="upload-file-0" class="button-secondary file-upload-btn" value="Choose File" data-exerFileUpload="'+ (jQuery(this).prev('li').index() + 1) +'"></div><div class="col-md-9"><input type="hidden" id="file_url_0" placeholder="File URL" class="regular-text form-control file-upload-path" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +'][file_url]" data-exerFileName="'+ (jQuery(this).prev('li').index() + 1) +'"><input type="text" placeholder="File Name" value="" id="file_name" class="regular-text form-control file-upload-name" name="phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ (jQuery(this).prev('li').index() + 1) +'][file_name]" data-exerFileName="0"></div></div></div></div><span class="glyphicon glyphicon-move"></span><span class="move"> Move this exercise to a desired order in the list</span></li>');
						jQuery(this).prev('li').find('.order').attr('value', jQuery(this).prev('li').index());
						jQuery(this).prev('li').find('.exerciseVideoUrl').html(jQuery(this).parent().find('[class*="exerciseVideoUrl"]').html());					
						makeSortable();
						// update_fields_ex();
						// jQuery(this).before('<li class="exercise"><a data-toggle="tab" data-tab-index="1" href="#exercise'+ (jQuery(this).prev('li').index() + 1 ) +'"><span class="order"></span><span class="deleteExercise glyphicon glyphicon-trash" data-tab-index="1"></span></a></li>')
						// jQuery(this).prev('li').children('a').attr('data-tab-index',jQuery(this).prev('li').index()+1);
						// jQuery(this).prev('li').children('a').attr('href','#exercise' + (jQuery(this).prev('li').index() + 1));
						// jQuery(this).prev('li').children('a').children('.order').html(jQuery(this).prev('li').index() + 1);					
						// jQuery(this).prev('li').children('a').children('.deleteExercise').attr('data-tab-index',jQuery(this).prev('li').index()+1);

						//tab-content
						// jQuery(this).parent().siblings('.tab-content').append('<div id="exercise' + (jQuery(this).prev('li').index() + 1 ) + '"class="tab-pane fade in" data-tab-count="' + (jQuery(this).prev('li').index() + 1) + '"><div class="row"><div class="col-md-6"><div class="form-group"><input class="form-control" type="text" placeholder="Sets x Reps" class="sets"  name="phase['+ (jQuery(this).prev('li').index()) +'][\'set\']"></div><div class="form-group"><input class="form-control" class="rest" type="text" placeholder="Rest"  name="phase['+ (jQuery(this).prev('li').index()) +'][\'rest\']"></div><div class="form-group"><input class="form-control" type="text" class="variation"  placeholder="Variation" name="phase['+ (jQuery(this).prev('li').index()) +'][\'variation\']"></div><div class="form-group"><textarea class="form-control" class="equipment"  placeholder="Equipment" name="phase['+ (jQuery(this).prev('li').index()) +'][\'equipment\']"></textarea></div><div class="form-group"><textarea class="form-control" class="instructions"  placeholder="Special Instructions" name="phase['+ (jQuery(this).prev('li').index()) +'][\'instructions\']"></textarea></div></div><div class="col-md-6"><span class="message">video' + (jQuery(this).prev('li').index() + 1) +'</span></div></div></div>');
						// jQuery('[data-tab-index="' + (jQuery(this).prev('li').index() + 1) + '"]').tab('show');	
						// update_fields_ex();			
					})
					// jQuery('#add_multiple_phases').click(function(event){
					// 	event.preventDefault();
					// 	jQuery(this).before('<li><a><span class="deletePhase glyphicon glyphicon-trash" data-tab-index=""></span></a></li>')
					// 	jQuery(this).parent().siblings('.tab-content').append('<div id="phase'+ jQuery(this).prev('li').children('a').data('tab-index') +'" data-tab-count="'+jQuery(this).prev('li').children('a').data('tab-index')+'"class="tab-pane fade in"><div class="row"><div class="col-md-6"><div class="form-group"><input type="text" name="phase['+ (jQuery(this).prev().children('a').data('tab-index') - 1) +'][\'name\']" placeholder="Phase Name" class="form-control"></div><div class="form-group"><textarea type="text" name="phase['+ (jQuery(this).prev().children('a').data('tab-index') - 1) +'][\'intro\']" placeholder="Phase Introduction" class="form-control"></textarea></div></div><div class="col-md-6"><div class="form-group"><input type="text" name="phase['+ (jQuery(this).prev().children('a').data('tab-index') - 1) +'][\'duration\']" placeholder="Phase Duration" class="form-control"></div><div class="form-group"><textarea type="text" name="phase['+ (jQuery(this).prev().children('a').data('tab-index') - 1) +'][\'notes\']" placeholder="Phase Notes" class="form-control"></textarea></div></div></div></div>')
					// 	jQuery('[data-tab-index="' + jQuery(this).prev('li').children('a').data('tab-index') + '"]').tab('show');
					// })
					// jQuery( function() {
					// 	jQuery('.sortable').sortable();
					// 	jQuery('.sortable').sortable({
					// 		stop: function (event, ui) {
					// 			// jQuery('.exercises ul li').each(function(){
					// 			// 	var index = jQuery(this).index() + 1;
					// 			// 	jQuery(this).find('.order').html(index);
					// 			// 	jQuery(this).attr('id', index);
					// 			// 	// var order = jQuery(this).children('a').attr('data-tab-index');
					// 			// });
					// 			// jQuery(this).parent().siblings().children('div[id*="exercise"]').attr('data-tab-count',)	
					// 			update_fields_ex();				
					// 		}
					// 	});
					// });


					// saving program

					//sorting exercises
					function makeSortable() {
					    jQuery(".sortable").sortable();
					    jQuery(".sortable").disableSelection();
					    jQuery(".sortable").sortable({
							stop: function (event, ui) {
								jQuery('.exercises ul li').each(function(){
									var index = jQuery(this).index();
									jQuery(this).find('.order').attr('value', index);
									jQuery(this).find('.order').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][order]');
									jQuery(this).find('.id').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][id]');
									jQuery(this).find('.name').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][name]');
									jQuery(this).find('.orderField').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][orderField]');
									jQuery(this).find('.set').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][sets]');
									jQuery(this).find('.rest').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][rest]');
									jQuery(this).find('.ex').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][exerciseUrl]');
									jQuery(this).find('.var').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][variation]');
									jQuery(this).find('.equip').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][equipment]');
									jQuery(this).find('.ins').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index()  +'][exercise]['+ index +'][instructions]');
									jQuery(this).find('.message').html(index);
								});
								// jQuery(this).parent().siblings().children('div[id*="exercise"]').attr('data-tab-count',)	
								update_fields_ex();				
							}
						});
					 }
					function update_fields_ex(){
						jQuery('.exercises li').each(function(){
							var index = jQuery(this).index();
							jQuery(this).find('.order').attr('value', index);
							jQuery(this).find('.order').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][order]');
							jQuery(this).find('.id').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][id]');
							jQuery(this).find('.name').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][name]');
							jQuery(this).find('.orderField').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][orderField]');
							jQuery(this).find('.set').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][sets]');
							jQuery(this).find('.rest').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][rest]');
							jQuery(this).find('.ex').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][exerciseUrl]');
							jQuery(this).find('.var').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][variation]');
							jQuery(this).find('.equip').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][equipment]');
							jQuery(this).find('.ins').attr('name', 'phase['+ jQuery(this).parents('[id*="phase"]').index() +'][exercise]['+ index +'][instructions]');
							jQuery(this).find('.message').html(index);
						});
					}


					// removing phase
					function update_index(){
						$ = jQuery;
						$.each($('.deletePhase'), function(index, ele){
							var $scope = $(this).parents('li');
				 				// $scope.find('.__label').text(index + 1);
				 				$scope.attr('id', index + 1);
				 				$scope.children().attr('data-tab-index', index + 1);
				 				$scope.children().attr('href', '#phase' + (index + 1));
				 				// $scope.find('.order').html(index + 1 );
				 				$scope.find('.deletePhase').attr('data-tab-index',index + 1 );
				 				update_fields_ex();
				 				//$scope.parent().siblings('.tab-content').children('[id*="phase"]').attr('id', 'phase'+ index)
				 			});
					}
					function update_tab(){
						$ = jQuery;
						$.each($('div[id*="phase"]'), function(index, ele){
							$(ele).attr('id', 'phase'+ (index + 1));
							$(ele).attr('data-tab-count', (index + 1));			 			
						});
					}
					function update_fields(){
						$ = jQuery;
						$.each($('div[id*="phase"]'), function(index, ele){
							$(ele).find('.name').attr('name', 'phase['+ (index) + '][name]');
							$(ele).find('.intro').attr('name', 'phase['+ (index) + '][intro]');
							$(ele).find('.duration').attr('name', 'phase['+ (index) + '][duration]');
							$(ele).find('.notes').attr('name', 'phase['+ (index) + '][notes]');
						});
					}

					jQuery(document).on('click','.deletePhase', function(){
						var index = jQuery(this).data('tab-index');
						if(jQuery(this).parents('li').index() == 0){
							alert('Do not delete the First Phase!');
						}
						else{	
						var prompt = confirm('Phase will be deleted');
						if (prompt == true) {
							jQuery(this).parents('li').prev().tab('show');
							jQuery('[data-tab-count="' + (index - 1)+ '"]').addClass('active');
							jQuery('[data-tab-count="' + (index - 1)+ '"]').addClass('in');													
						//jQuery('[data-tab-count="'+ jQuery(this).parents('li').prev().children('a').data('tab-index') +'"]').attr('class', 'active')
						jQuery(this).parents('li').remove();
						jQuery('[data-tab-count="' + index + '"]').remove();					
						update_index();
						update_tab();
						update_fields();
						update_fields_ex();
						}	
						}				
					})

					// updating exercise
					function update_index_ex(){
						$ = jQuery;
						$.each($('.deleteExercise'), function(index, ele){
							var $scope = $(this).parent();
				 				// $scope.find('.__label').text(index + 1);
				 				$scope.attr('id', index + 1);
				 				$scope.children().attr('data-tab-index', index + 1);
				 				$scope.children().attr('href', '#phase' + (index + 1));
				 				$scope.find('.order').html(index + 1 );
				 				$scope.find('.deletePhase').attr('data-tab-index',index + 1 );
				 				//$scope.parent().siblings('.tab-content').children('[id*="phase"]').attr('id', 'phase'+ index)
				 			});
					}

					// remove exercise
					jQuery(document).on('click','.deleteExercise', function(){
						// if(jQuery(this).parent('li').index() == 0 && jQuery(this).parent('li').next('li').length == 0){
						// 	alert('Can not delete the only exercise!');
						// }
						// else{
							var delExer = confirm('Exercise will be deleted');
							if(delExer == true){
								jQuery(this).parent().remove();	
						 		update_fields_ex();	
							}
						// } 				 	
					// 	//jQuery('[data-tab-count="'+ jQuery(this).parents('li').prev().children('a').data('tab-index') +'"]').attr('class', 'active')
					// 	// jQuery(this).parents('li').remove();
					// 	// var index = jQuery(this).data('tab-index');
					// 	// jQuery(this).parents('ul').siblings('.tab-content').find(jQuery('[data-tab-count="' + index + '"]')).remove();	
					// 	// update_index_ex();				
					})

					jQuery('#rehab').change(function () {
					    jQuery('#sportsOccupation, #hideField1 textarea, #hideField2 textarea').removeAttr('required');
					    jQuery('#howItHappened, input[name="duration"], .duration, .multiple_parts').attr('required', 'required');
				// 		if (jQuery("#rehab").is(":checked")) {
				// 			jQuery("#hideField1").css("display","none");
				// 			jQuery("#hideField2").css("display","none");
				// 		} else {
				// 			jQuery("#hideField1").css("display","block");
				// 			jQuery("#hideField2").css("display","block");
				// 		}
					});	

					jQuery('#prevention').change(function () { 
					    jQuery('#sportsOccupation, #howItHappened, input[name="duration"], .duration').removeAttr('required');
					    jQuery('#hideField1 textarea, #hideField2 textarea, .multiple_parts').attr('required', 'required');	
						// if (jQuery("#prevention").is(":checked")) {
						// 	jQuery("#hideField1").css("display","");
						// 	jQuery("#hideField2").css("display","");
						// } else {
						// 	jQuery("#hideField1").css("display","none");
						// 	jQuery("#hideField2").css("display","none");
						// }
					});		

					jQuery('#strength').change(function () { 
					    jQuery('#howItHappened, .multiple_parts, input[name="duration"], .duration').removeAttr('required');
					    jQuery('#hideField1 textarea, #hideField2 textarea, .sportsOccupation').attr('required', 'required');
						// if (jQuery("#strength").is(":checked")) {
						// 	jQuery("#hideField1").css("display","");
						// 	jQuery("#hideField2").css("display","");
						// } else {
						// 	jQuery("#hideField1").css("display","none");
						// 	jQuery("#hideField2").css("display","none");
						// }
					});
				});
				
				// Adding Video to the video area
					jQuery(document).on('change','[class*="exerciseVideoUrl"]', function() {
					  jQuery(this).siblings('.exercise').attr('value', this.value);
					// alert(this.value);
					  // jQuery(this).siblings('.addVideo').find('span').remove();
					  jQuery(this).siblings('.addVideo').html('<video width="100%" height="100%" controls><source src="'+jQuery(this).siblings('.exercise').attr('value')+'" type="video/mp4"><source src="'+jQuery(this).siblings('.exercise').attr('value')+'" type="video/ogg">Your browser does not support the video tag.</video>')
					  // alert(this.value);

					  // jQuery('.addVideo').html('<video width="100%" height="100%" controls><source src="'+jQuery(this).prev('input').attr('value')+'" type="video/mp4"><source src="'+jQuery(this).prev('input').attr('value')+'" type="video/ogg">Your browser does not support the video tag.</video>')
					  
					})

				// jQuery('.selectThumb').click(function(){
				// 	jQuery(this).siblings('.imgDisplay').append('<span class="closeVid">X</span><iframe class="adminIframe"  width="1024" height="768" src="" frameborder="0" allowfullscreen></iframe>');
				// 	jQuery(this).siblings('.imgDisplay').children('iframe body').data('url');
				// 	jQuery(this).siblings('.imgDisplay').css('display','block');
				// })					
				// jQuery('.imgDisplay').click(function(){
				// 	jQuery(this).empty();
				// 	jQuery(this).css('display', 'none');
				// 	// jQuery(window).volume = 0;
				// })

			</script>
<script type="text/javascript">
	jQuery(document).on('focusout', '[class~="name"], [class~="nameEdit"]',function(){
		jQuery(this).parents('.tab-content').prev('ul').find('[data-tab-index="'+ jQuery(this).parents('[id*="phase"]').data('tab-count') +'"]').find('.order').html(jQuery(this).val())
	})
	jQuery('[class*="exerciseVideoUrl"]').on('change',function(){
		if (jQuery(this).find(':selected').val() != '') {
			// alert(jQuery(this).find(':selected').text())
			jQuery(this).parents('li').find('.exerciseName').html(jQuery(this).find(':selected').text());			
		};
	})
	jQuery(document).ready(function(){
		var videoContainer = jQuery('.fetchVideos');
		jQuery.ajax({
			url: "<?php echo plugin_dir_url(__FILE__).'fetchExercises.php'?>", 
			type:"post",
			data:{'getVideos': 'get'},
			success: function(result){	        
	        	videoContainer.append(result);
		    }
		});
	})
	jQuery(document).on('click','.closeModal',function(){
		jQuery(this).parent().css('display', 'none');
		jQuery(document).find('.addHere').removeClass('addHere');
	})
	jQuery(document).on('click', '.addVideo', function(e){
		if (e.target == this) {
			jQuery(this).addClass('addHere');
			jQuery('.fetchVideos').css('display', 'block');	
		};
	})
	jQuery(document).on('click','input[name="edit"], input[name="updateProgram"], .cancel',function(){
		jQuery('.overlayAction').css('display','block');
	})
	jQuery('#addProgram').submit(function(){ 	
		jQuery('.overlayAction').css('display','block');
	});	
	jQuery('#searchProgram').submit(function(){ 	
		jQuery('.overlayAction').css('display','block');
	});	
	jQuery('#defaultProgram').submit(function(){ 	
		jQuery('.overlayAction').css('display','block');
	});	
	jQuery(document).on('click','.useButton',function(){
		jQuery(document).find('.addHere').prev('input').attr('value', jQuery(this).data('video-url'));
		jQuery(document).find('.addHere').parents('li').find('.exerciseName').html(jQuery(this).data('part'));
		// jQuery(document).find('.addHere').parents('li').find('input[class="nameExerciseEdit"]').val(jQuery(this).data('part'));
		jQuery(document).find('.addHere').parents('li').find('input[class="name"]').val(jQuery(this).data('part'));
		jQuery(document).find('.addHere').before('<span class="removeVideo glyphicon glyphicon-remove"></span>')
		jQuery(document).find('.addHere').html('<video width="100%" height="100%" controls><source src="'+jQuery(this).data('video-url')+'" type="video/mp4"><source src="'+jQuery(this).data('video-url')+'" type="video/ogg">Your browser does not support the video tag.</video>')
		jQuery(this).parents('.fetchVideos').css('display', 'none');
		jQuery(document).find('.addHere').css('height', 260 + 'px');
		jQuery(document).find('.addHere').removeClass('addHere');

	})
	jQuery(document).on('click','.removeVideo',function(){
		jQuery(this).next('.addVideo').empty();
		jQuery(this).siblings('input[class="exercise ex"]').val('');
		jQuery(this).parents('li').find('.exerciseName').html('Exercise');
		jQuery(this).parents('li').find('input[class="name"]').val('');
		jQuery(this).next('.addVideo').css('height', 280+'px');
		jQuery(this).next('.addVideo').html('<span class="glyphicon glyphicon-plus"></span><span class="showMessage">Click in this box to add Video</span>');	
		jQuery(this).remove();
	})
	
</script>
<script type="text/javascript">
	jQuery(document).ready(function($){
	    $('#upload-btn').click(function(e) {
	        e.preventDefault();
	        var image = wp.media({ 
	            title: 'Upload Image',
	            // mutiple: true if you want to upload multiple files at once
	            multiple: false
	        }).open()
	        .on('select', function(e){
	            // This will return the selected image from the Media Uploader, the result is an object
	            var uploaded_image = image.state().get('selection').first();
	            // We convert uploaded_image to a JSON object to make accessing it easier
	            // Output to the console uploaded_image
	            //console.log(uploaded_image);
	            var image_url = uploaded_image.toJSON().url;
	            // Let's assign the url value to the input field
	            $('#image_url').val(image_url);
	        });

	    });
	    $(document).on('click', '.file-upload-btn', function(e) {
	        e.preventDefault();
	        var element = this;
	        var image = wp.media({ 
	            title: 'Upload Image',
	            // mutiple: true if you want to upload multiple files at once
	            multiple: false
	        }).open()
	        .on('select', function(e){
	            // This will return the selected image from the Media Uploader, the result is an object
	            var uploaded_image = image.state().get('selection').first();
	            // We convert uploaded_image to a JSON object to make accessing it easier
	            // Output to the console uploaded_image
	            //console.log(uploaded_image);
	            var file_url = uploaded_image.toJSON().url;
	            var file_name = uploaded_image.toJSON().title;
	            // Let's assign the url value to the input field
	            $(element).parent().siblings().find('input[class*="file-upload-path"]').val(file_url);
	            $(element).parent().siblings().find('input[class*="file-upload-name"]').val(file_name);
	        });	   
	    });
	});
</script>
<script type="text/javascript">
jQuery('.deleteProgram').on('click', function(){
	event.preventDefault();
	var deleteConfirm = confirm("Are you sure you want to delete the program and all its data");
	if (deleteConfirm == true) {
		jQuery('.overlayAction').css('display','block');
		var deleteID = jQuery(this).data('prog-id');
		jQuery.ajax({
			url: "<?php echo plugin_dir_url(__FILE__).'programActions.php'?>", 
			type:"post",
			data:{'deleteProgram': deleteID},
			success: function(result){
	        	if (result == true) {
	        		alert('Prorgam and all associated data is deleted');
	        		window.location.reload();
	        		jQuery('.overlayAction').css('display','none');
	        	};
		    }
		});
	};
})

jQuery('.deletePhaseEdit').on('click', function(){
	event.preventDefault();
	var message = confirm('Phase and its associated exercises will be deleted from the database, continue?');
	if (message == true) {
		jQuery(this).parent().css('background-color','#ffc0c0');
		jQuery(this).parents('ul').siblings('.tab-content').find('div[data-phase-id="'+ jQuery(this).attr('data-phase-id') +'"]').find('.deletePhase').attr('value', 'delete');
		jQuery(this).parents('ul').siblings('.tab-content').find('div[data-phase-id="'+ jQuery(this).attr('data-phase-id') +'"]').css('background-color', '#ffc0c0');
		alert('Changes saved! Update Program to continue.');
	}
})

jQuery('.deleteExerciseEdit').on('click', function(){
	event.preventDefault();
	// if(jQuery(this).parent('li').index() == 0 && jQuery(this).parent('li').next('li').length == 0){
	// 	alert('Cannot delete the only exercise in this phase!');
	// }
	// else
	// {
		var message = confirm('Exercise will be deleted from the database, continue?');
		var exerciseRemove = jQuery(this).parents('li');
		if (message == true) {
			jQuery('.overlayAction').css('display','block');
			var deleteID = jQuery(this).data('exercise-id');
			jQuery.ajax({
				url: "<?php echo plugin_dir_url(__FILE__).'programActions.php'?>", 
				type:"post",
				data:{'deleteExercise': deleteID},
				success: function(result){
		        	if (result == true) {
		        		alert('Exercise Deleted');
		        		exerciseRemove.remove();
		        		jQuery('.overlayAction').css('display','none');
		        	};    		
			    }
			});
		}
	// }

})
jQuery('.nameExerciseEdit').on('click', function(){
	event.preventDefault();
})
</script>

</body>
</html>
<?php 
 if (isset($_POST['searchSelect']) && !empty($_POST['searchSelect'])) { ?>
 	    <script type="text/javascript">
 	    	jQuery("body, html").animate({ 
      scrollTop: jQuery('.searchVids').offset().top - 500 
    }, 600);
 	    </script>
 <?php }
  ?>
<?php prefix_enqueue(); ?>