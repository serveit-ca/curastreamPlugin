<?php


class customProgramCreation {

	// Variable Declaration
	public $progID; // id 
	public $progType; // type

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

 /*This function is used to generate the Program Meta Data  */
	public function createProgramMetaImputForm($programObject){
		?>
		<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="labelTxt"> Type </div>
						<label class="radio_btn radio_btn_type"><input required type="radio" name="typeUpdate" value="Rehab" id="rehab" <?php if($programObject->type == 'Rehab'){echo 'checked ="checked"';} ?> >Rehab</label>
						<label class="radio_btn radio_btn_type"><input required type="radio" name="typeUpdate" id="prevention" value="Prevention" <?php if($programObject->type == 'Prevention'){echo 'checked ="checked"';} ?> >Prevention</label>
						<label class="radio_btn radio_btn_type"><input required type="radio" name="typeUpdate" id="strength" value="Strength-Training" <?php if($programObject->type == 'Strength-Training'){echo 'checked ="checked"';} ?> >Strength Training</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="labelTxt">Name </div>
						<input id="nameBox" type="text" name="progNameupdate" class="form-control" required="required" placeholder="Name" <?php if($programObject->name){echo 'value ="'.$programObject->name.'"';} ?> />	
									
					</div>
					<div class="form-group">
						<div class="labelTxt">Duration </div>
						<input id="durBox" type="text" name="progDurationUpdate" class="form-control" required="required" placeholder="Duration" min="1" <?php if($programObject->duration){echo 'value ="'.$programObject->duration.'"';} ?> />									
					</div>
					<div class="form-group">
						<div>
							<div class="labelTxt">Thumbnail </div>
						 	<img class="imageThumb"<?php if($programObject->thumbnail){echo 'src ="'.$programObject->thumbnail.'"';} ?> />
						     <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Change Image"> 
						     <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Delete Image">

								<div><?php echo $programObject->thumbnail;?></div>
							
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
							<div class="labelTxt"> Body Parts </div>
							<?php $body_parts = get_all_body_parts(); 
							 foreach ($body_parts as $body_part){
							 	$parts = explode(",",$programObject->body_part);
							 	$injuredParts = false;
							 	foreach($parts as $part){
							 		if(str_replace(' ', '', strtolower($body_part->name)) == str_replace(' ', '', strtolower($part))){
							 			$injuredParts = true;
							 			break;
							 		}
							 	}
							 ?><input type="checkbox" name="bodypart" value="<?php echo $body_part->name;?>" <?php if($injuredParts){?> checked="checked"<?php } ?>> <?php echo $body_part->name;?></input>
							<?php } ?>
					</div>

					<div class="form-group <?php if($programObject->type == "Prevention" || $programObject->type == "Strength-Training" ){ echo "hidden";}?>">
							<div class="labelTxt"> How It Happened </div>
							<?php $howItHappeneds = get_all_injury_reasons();
							 foreach ($howItHappeneds as $howItHappened){ 
							 	$whatHappened = explode(",",$programObject->howItHappen);
							 	$itHappens = false;
							 	foreach($whatHappened as $itHappened){
							 		if(str_replace(' ', '', strtolower($howItHappened->name)) == str_replace(' ', '', strtolower($itHappened))){
							 			$itHappens = true;
							 			break;
							 		}
							 	}
							?><input type="checkbox" name="bodypart" value="<?php echo $howItHappened->name;?>" <?php if($itHappens){?> checked="checked"<?php } ?> > <?php echo $howItHappened->name;?></input>
							<?php } ?>
					</div>
					<div class="form-group <?php if($programObject->type == "Rehab"){ echo "hidden";}?>">
						<div class="labelTxt"> Sports and Occupations </div>
						<?php $sportsOccupations = get_all_occupations();
							foreach ($sportsOccupations as $sportsOccupation){
								?><input type="checkbox" name="bodypart" value="<?php echo $sportsOccupation->name;?>"> <?php echo $sportsOccupation->name;?></input>	
							<?php } ?>
					</div>	
				</div>
				<div class="col-md-12">
					<div class="form-group"> 
						<div class="labelTxt">Description</div>
						<textarea id="descBox" name="progDescUpdate" class="form-control" required="required" placeholder="Description" ><?php if($programObject->description){echo $programObject->description;} ?> </textarea>
					</div>
					<div class="form-group">
						<div class="labelTxt">Equiptment</div>
						<textarea id="equipBox" name="progEquipUpdate" class="form-control" required="required" placeholder="Equipment"> <?php if($programObject->equipment){echo $programObject->equipment;} ?> </textarea>
					</div>
					<div class="form-group" id="hideField1">	
					<div class="labelTxt">Weekly Plan</div>				
						<textarea id="weekBox" name="progPlanUpdate" class="form-control" required="required" placeholder="Weekly Plan"> <?php if($programObject->weeklyPlan){echo $programObject->weeklyPlan;} ?> </textarea>
					</div>
					<div class="form-group" id="hideField2">
						<div class="labelTxt">Lifestyle</div>
						<textarea id="lifeBox" name="progLifestyleUpdate" class="form-control" required="required" placeholder="Lifestyle"> <?php if($programObject->lifeStyle){echo $programObject->lifeStyle;} ?> </textarea>
					</div>
				</div>
			</div>
			<?php
	}

	public function displayPhase($phaseObject){
	?> 	
			<div class="phaseHeader" data-phase-id="<?php echo $phaseObject->id ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="labelTxt">Phase Name</div>
							<input id="phaseName" type="text" name="phaseName" class="form-control" required="required" placeholder="Phase Name" <?php if($phaseObject->name){echo 'value ="'.$phaseObject->name.'"';} ?>/>	
					</div>
					<div class="col-md-6">
						<div class="labelTxt">Phase Duration</div>
							<input id="phaseDuration" type="text" name="phaseDuration" class="form-control" required="required" placeholder="Phase Duration" <?php if($phaseObject->duration){echo 'value ="'.$phaseObject->duration.'"';} ?>/>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="labelTxt">Phase Introduction</div>
							<textarea id="phaseIntro" name="phaseIntro" class="form-control"  placeholder="Phase Notes"> <?php if($phaseObject->intro){echo $phaseObject->intro;} ?></textarea>
					</div>
					<div class="col-md-6">
						<div class="labelTxt">Phase Notes</div>
							<textarea id="phaseNotes" name="phaseNotes" class="form-control"  placeholder="Phase Notes"> <?php if($phaseObject->notes){echo $phaseObject->notes;} ?></textarea>
					</div>
				</div>
			</div>
	<?php
	}
	public function displayExercise($exerciseObject){
		?> 
	<!-- Start of Exercise -->									
			<div class="exercises" data-phaseId="<?php echo $exerciseObject->phase_id; ?>">		<ul class="sortable">												
							<li>
							<span class="exerciseName"><?php echo $exerciseObject->name; ?></span> 

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="order" name="order" value="<?php echo $exerciseObject->order_no; ?>">
										</div>
										<div class="form-group">
											<input required="required" class="form-control orderField" type="text"   name="orderField" <?php echo $exerciseObject->order_field ?> placeholder="Order">														
										</div>
										<div class="form-group">	
											<input required="required" class="form-control set" type="text" placeholder="Sets x Reps"  name="setsReps" <?php echo $exerciseObject->sets_reps ?>>
										</div>											
										<div class="form-group">
											<input required="required" class="form-control rest" type="text" placeholder="Rest"  name="rest" <?php echo $exerciseObject->rest ?>>
										</div>
										<div class="form-group">
											<input required="required" class="form-control var" type="text"  placeholder="Variation" name="variation" <?php echo $exerciseObject->variation ?>>
										</div>
										<div class="form-group">
											<textarea required="required" class="form-control equip"  placeholder="Equipment" name="equipmentText" <?php echo $exerciseObject->equiptment ?>></textarea>
										</div>
										<div class="form-group">
											<textarea required="required" class="form-control ins"  placeholder="Special Instructions" name="specialInstructionsText" <?php echo $exerciseObject->special_instructions ?>></textarea>
										</div>
									</div>
									<div class="col-md-6">		
										<!-- <select required="required" class="exerciseVideoUrlSource form-control">
											<option>Select a Video</option>
												<?php 
												//$videos = $wpdb->get_results("SELECT * FROM `dev_cura_exercise_videos` WHERE id > 0", ARRAY_A);
												//$getVideoForExer = $wpdb->get_col("SELECT exercise_video_url FROM `dev_cura_exercises` WHERE id = $exercise_Id");
												//print_r($getVideoForExer);
												//	foreach ($videos as $key_v => $value_v) { ?>
														<!-- <option value="<?php //echo $value_v['url'] ?>" <?php// echo ($value_v['url'] == $getVideoForExer[0]) ? 'selected' : '' ?>><?php //echo $value_v['name'] ?></option> 
												<?php// } ?>
										</select> -->
										<input type="hidden" class="exercise ex" name="phase[<?php echo $key ?>][exercise][<?php echo $keys ?>][exerciseUrl]" value="<?php echo $exerciseObject->exercise_video_url ?>">
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
										    		<input type="hidden" placeholder="File URL" id="file_url" class="regular-text form-control file-upload-path" name="" data-exerFileName="0" value="">
										    		
												</div>
											</div>
										</div>
									</div>
								<span class="glyphicon glyphicon-move"></span>
								<span class="move"> Move this exercise to a desired order in the list</span>
							</li>
				</ul>											
			</div>
		<!-- End of Exercise -->
		<?php
	}
		
}
		