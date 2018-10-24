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
				<div class="row phaseControl">
				<div class="col-md-1">
					<i class="phaseMove fas fa-2x fa-arrows-alt-v"></i>
					<i class="phaseExpandHide fas fa-2x fa-angle-double-up"></i>
					
				</div>
				<div class="col-md-10">
				</div>
				<div class="col-md-1 text-right">
					<i class="fas fa-2x fa-times"></i>
				</div>
				</div>
			</div>
	<?php
	}
	public function displayExercise($exerciseObject){?> 					
<div class="exercises" data-phaseId="<?php echo $exerciseObject->phase_id; ?>" data-orderNumber="<?php echo $exerciseObject->order_no; ?>">
	<div class="row exerciseHeader">
		<div class="col-md-1">
			<i class="exerciseMove fas fa-2x fa-arrows-alt-v"></i>
			<i class="exerciseExpandHide fas fa-2x fa-angle-double-up"></i>
		</div>
		<div class="col-md-10">
		<div class="exerciseName"><?php echo $exerciseObject->name; ?></div> 
		</div>
		<div class="col-md-1 text-right">
			<i class="fas fa-2x fa-times"></i>

		</div>
	</div>
	<div class="row exerciseDetails">
		<div class="col-md-6">
			<div class="form-group">
				<span class="exerciseLabel labelTxt">Order</span>
				<input type="text" class="order" name="order" value="<?php echo $exerciseObject->order_field; ?>">
			</div>
			<div class="form-group">	
				<span class="exerciseLabel labelTxt">Sets x Rep</span>
				<input required="required" class="form-control set" type="text" name="setsReps" value="<?php echo $exerciseObject->sets_reps; ?>">
			</div>											
			<div class="form-group">
				<span class="exerciseLabel labelTxt">Rest</span>
				<input required="required" class="form-control rest" type="text" name="rest" value="<?php echo $exerciseObject->rest; ?>">
			</div>
			<div class="form-group">
				<span class="exerciseLabel labelTxt">Variations</span>
				<input required="required" class="form-control var" type="text" name="variation" value="<?php echo $exerciseObject->variation; ?>">
			</div>
			<div class="form-group">
				<span class="exerciseLabel labelTxt">Equipment</span>
				<textarea required="required" class="form-control equip" name="equipmentText"><?php echo $exerciseObject->equipment; ?></textarea>
			</div>
			<div class="form-group">
				<span class="exerciseLabel labelTxt">Special Instructions</span>
				<textarea required="required" class="form-control ins"  name="specialInstructionsText" ><?php echo $exerciseObject->special_instructions; ?></textarea>
			</div>
		</div>
		<div class="col-md-6">		
			<div class="videoContainer">
				<span class="exerciseLabel labelTxt">Video</span>
				<div class="exercise-container" data-videoId="<?php echo $exerciseObject->videoId; ?>">
				<img class="exerciseVideo" src="<?php echo $exerciseObject->thumbnailUrl; ?>"/>
				</div>
			</div>	
		</div>
									
</div>
</div>
<?php
	}
	public function addPhase(){?> 
		<div class="addPhaseContainer">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="addPhase">
						<i class="fas fa-plus"></i> Phase
					</div>
				</div>
			</div>
		</div>


	<?php	}
	public function addExercise(){?> 
		<div class="addExerciseContainer">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="addExercise">
						<i class=" fas fa-plus"></i> Exercise
					</div>
				</div>
			</div>
		</div>


	<?php
	
	}	
		
}
		