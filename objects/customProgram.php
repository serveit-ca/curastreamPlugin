<?php


class customProgram {


	// Variable Declaration
	public $progID;
	public $body_parts;
	public $progType;

	// For Populate Form Function
	public $program;
	public $type;
	public $name;
	public $description;
	public $equipment;
	public $duration;
	public $weeklyPlan;
	public $lifeStyle;
	public $assocBodyPartId;
	public $howItHappen;
	public $sportsOccupation;
	public $thumbnail;

	// Phase Variables
	public $phaseName;
	public $phaseIntro;
	public $phaseDur;
	public $phaseNotes;

	//Phase Exercise
	public $exerciseOrder;
	public $exerciseSets;
	public $exerciseRest;
	public $exerciseVariation;
	public $exerciseEquipment;
	public $exerciseSpecial;
	public $exerciseFile;



	
	

	
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

	function test($progID){
		global $wpdb;
		$program_table = 'dev_cura_programs';
		$programs = $wpdb->get_row("SELECT * FROM $program_table WHERE id = $progID" , ARRAY_A);
		return $programs;
	}

	function populateFormById($programID){
		// SQL call based on ProgID
		$program = test($programID);
		$custom =  new customProgram();
		//$program = json_decode($data, true);
		$custom->progType = $program["type"];
		$custom->type = $program["type"];
		$custom->name = $program["name"];
		$custom->description = $program["description"];
		$custom->equipment = $program["equipment"];
		$custom->duration = $program['duration'];
		$custom->weeklyPlan = $program['weekly_plan'];
		$custom->lifeStyle = $program['life_style'];
		$custom->assocBodyPartId = $program['assoc_body_part_id'];
		$custom->howItHappen = $program['how_it_happen'];
		$custom->sportsOccupation = $program['sports_occupation'];
		$custom->thumbnail = $program['thumbnail'];
		return $custom;
		// jquery to change value of all fields
		//echo($description);
	}
	function createForm($aProgram) {
		global $wpdb;

		
			
			?>
		<style>
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
			
				<div class="edit_form">
		<form action="" method="POST" novalidate id="editForm">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="type">Type :</label>
						<label class="radio_btn radio_btn_type"><input required type="radio" name="typeUpdate" value="Rehab" id="rehab" <?php if($aProgram->progType == 'Rehab'){echo 'checked ="checked"';} ?> >Rehab</label>
						<label class="radio_btn radio_btn_type"><input required type="radio" name="typeUpdate" id="prevention" value="Prevention" <?php if($aProgram->progType == 'Prevention'){echo 'checked ="checked"';} ?> >Prevention</label>
						<label class="radio_btn radio_btn_type"><input required type="radio" name="typeUpdate" id="strength" value="Strength-Training" <?php if($aProgram->progType == 'Strength-Training'){echo 'checked ="checked"';} ?> >Strength Training</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="hidden" name="progIdupdate">					
						<input id="nameBox" type="text" name="progNameupdate" class="form-control" required="required" placeholder="Name" <?php if($name){echo 'value ="$name"';} ?> >					
					</div>
					<div class="form-group">
						<input id="durBox" type="text" name="progDurationUpdate" class="form-control" required="required" placeholder="Duration" min="1" <?php if($duration){echo 'value ="$duration"';} ?>>									
					</div>
					<div class="form-group">
						<div>
						   	<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Choose Image">
						    <input type="text" name="thumbUpdate" required="required" id="image_url" class="regular-text form-control">
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
							<h3> Body Parts </h3>
							<?php $body_parts = get_all_body_parts(); 
							 foreach ($body_parts as $body_part){
							 ?><input type="checkbox" name="bodypart" value="<?php echo $body_part->name;?>"> <?php echo $body_part->name;?></input>
							<?php } ?>
					</div>
					<div class="form-group">
						<!-- <label for="duration">Duration</label><br> -->
							<h3> How It Happened </h3>
							<?php $howItHappeneds = get_all_injury_reasons();
							 foreach ($howItHappeneds as $howItHappened){ 
							?><input type="checkbox" name="bodypart" value="<?php echo $howItHappened->name;?>"> <?php echo $howItHappened->name;?></input>
							<?php } ?>
					</div>
					<div class="form-group">
						<h3> Sports and Occupations </h3>
						<?php $sportsOccupations = get_all_occupations();
							foreach ($sportsOccupations as $sportsOccupation){
								?><input type="checkbox" name="bodypart" value="<?php echo $sportsOccupation->name;?>"> <?php echo $sportsOccupation->name;?></input>	
							<?php } ?>
					</div>	
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<textarea id="descBox" name="progDescUpdate" class="form-control" required="required" placeholder="Description" <?php if($description){echo 'value ="$description"';} ?> ></textarea>
					</div>
					<div class="form-group">
						<textarea id="equipBox" name="progEquipUpdate" class="form-control" required="required" placeholder="Equipment" <?php if($equipment){echo 'value ="$equipment"';} ?> ></textarea>
					</div>
					<div class="form-group" id="hideField1">					
						<textarea id="weekBox" name="progPlanUpdate" class="form-control" required="required" placeholder="Weekly Plan" <?php if($weeklyPlan){echo 'value ="$weeklyPlan"';} ?> ></textarea>
					</div>
					<div class="form-group" id="hideField2">
						<textarea id="lifeBox" name="progLifestyleUpdate" class="form-control" required="required" placeholder="Lifestyle" <?php if($lifeStyle){echo 'value ="$lifeStyle"';} ?> > </textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- <button class="add_phase">Add Phase</button> -->
					<div class="phases_edit">
						<ul class="nav nav-tabs">
							<li class="active phase" id="1"><a data-toggle="tab" class="phase" data-tab-index="1" href="#phase1"><span class="order">1</span><span class="deletePhase glyphicon glyphicon-trash" data-tab-index="1"></span></a></li> -->
							<button id="add_multiple_phases">Add Another Phase</button>
						</ul>
						<div class="tab-content">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input class="deletePhase" type="hidden" name="" value="">
												<input type="hidden" name="" value="">
												<input id="phaseName" type="text" name="" placeholder="Phase Name" required="required" class="form-control nameEdit" <?php if($phaseName){echo 'value ="$phaseName"';} ?> >
											</div>
											<div class="form-group">
												<textarea id="phaseIntro" type="text" name="" placeholder="Phase Introduction" class="form-control intro" <?php if($phaseIntro){echo 'value ="$phaseIntro"';} ?>></textarea>								
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input id="phaseDur" type="text" required="required" name="" placeholder="Phase Duration" class="form-control duration" <?php if($phaseDur){echo 'value ="$phaseDur"';} ?>>
											</div>
											<div class="form-group">
												<textarea id="phaseNotes" type="text" name="" placeholder="Phase Notes" class="form-control notes" <?php if($phaseNotes){echo 'value ="$phaseNotes"';} ?>></textarea>
											</div>
										</div>
										<div class="col-md-12">										
											<div class="exercises">									
												<ul class="sortable">												
															<li>
																<input type="text" class="nameExerciseEdit" hidden value="">
																<span class="exerciseName"><?php echo empty($values['name']) ? 'Exercise' : str_replace(array('\"', "\'"),array('"', "'"), $values['name']) ?></span> <!-- <span class="nameExerciseEdit glyphicon glyphicon-edit" data-tab-index="1" data-exercise-id="<?php //echo $values['id'] ?>"></span> --><span class="deleteExerciseEdit glyphicon glyphicon-trash" data-tab-index="1" data-exercise-id="<?php echo $values['id'] ?>"></span>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<input type="hidden" class="id" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][exerciseId]" value="<?php echo $values['id'] ?>">
																			<input type="hidden" class="order" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][order]" value="<?php echo $values['order_no'] ?>">
																			<input type="hidden" class="name" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][name]" value="<?php echo $values['name'] ?>">															
																		</div>
																		<div class="form-group">
																			<input required="required" class="form-control orderField" type="text"   name="orderField" <?php if($exerciseOrder){echo 'value ="$exerciseOrder"';} ?> placeholder="Order">														
																		</div>
																		<div class="form-group">	
																			<input required="required" class="form-control set" type="text" placeholder="Sets x Reps"  name="setsReps" <?php if($exerciseSets){echo 'value ="$exerciseSets"';} ?>>
																		</div>											
																		<div class="form-group">
																			<input required="required" class="form-control rest" type="text" placeholder="Rest"  name="rest" <?php if($exerciseRest){echo 'value ="$exerciseRest"';} ?>>
																		</div>
																		<div class="form-group">
																			<input required="required" class="form-control var" type="text"  placeholder="Variation" name="variation" <?php if($exerciseVariation){echo 'value ="$exerciseVariation"';} ?>>
																		</div>
																		<div class="form-group">
																			<textarea required="required" class="form-control equip"  placeholder="Equipment" name="equipmentText" <?php if($exerciseEquipment){echo 'value ="$exerciseEquipment"';} ?>></textarea>
																		</div>
																		<div class="form-group">
																			<textarea required="required" class="form-control ins"  placeholder="Special Instructions" name="specialInstructionsText" <?php if($exerciseSpecial){echo 'value ="$exerciseSpecial"';} ?>></textarea>
																		</div>
																	</div>
																	<div class="col-md-6">		
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
																		    		<input type="text" placeholder="File Name" id="file_name" class="regular-text form-control file-upload-name" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][file_name]" data-exerFileName="0" value="">
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
			
			<?php
		}
		
}

		