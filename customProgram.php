<?php
 
$allUsers = get_users(array(
    'meta_key' => 'first_name',
    'orderby'  => 'meta_value',
));
if(WP_DEBUG){	//echo("<br/>All Users Array Size:".sizeof($allUsers));
}

// Create an empty array of Active users 
$activeUsers = array();
// Add active users to the array
foreach($allUsers as $user){
if(WP_DEBUG){		//echo ("<br/>".$user->ID.$user->user_login);
}
	if (user_can($user->ID, 'mepr-active')){
if(WP_DEBUG){		//	echo("<br/>Active User".$user->user_login);
}
		array_push($activeUsers,$user);
	}else{
if(WP_DEBUG){			//echo ("<br/> Error".$user->user_login);
}
	}
if(WP_DEBUG){		//echo("<br/>Array Size:".sizeof($activeUsers));
}
}
// Get a list of groups 
// Select a user or a group TODO - Add Group functionality 
?>
	<div class="container-fluid customProgramContainer">

		<div class="row">
			<div class="col-md-7">
				<!-- Part 1 -->
				<div class="programSelection">
				<h1>Curastream Program Admin</h1>
				<h3>1. What do you want to work on?</h3>
					<div class="row">
						<div class="col-md-6">
							<button class="button-secondary custom-btn generalProgram">General Program </button>
						</div>
						<div class="col-md-6">
							<button class="button-secondary custom-btn customProgram">Custom Program</button>
						</div>
					</div>
				</div>
				<div class="general_newModify hidden">
					<h3>2. Would you like to create a new general program or modify an existing general program?</h3>
					<div class="row">
						<div class="col-md-6">
					<button class="button-secondary custom-btn generalProgram_createNew">Create New General Program</button>
					</div>
						<div class="col-md-6">
					<button class="button-secondary custom-btn generalProgram_modifyExisting">Edit existing general program</button>
						</div>
					</div>
				</div>
				<div class="custom_newModify hidden">
					<h3>2. Would you like to create a new custom program or modify an existing custom program?</h3>
					<div class="row">
						<div class="col-md-6">
					<button class="button-secondary custom-btn custom_createNew">Create New custom Program</button>
					</div>
						<div class="col-md-6">
					<button class="button-secondary custom-btn custom_modifyExisting">Edit existing custom program</button>
						</div>
					</div>
				</div>
				<div class="gernalProgram_modifyExisting hidden">
					<h3>3. Select an exisitng general program to edit</h3>
				 	<select name="existingProgram" class="enableSelect2" id="existingProgram">
					 		<?php 
					 			global $wpdb;
					 				$programs = $wpdb->get_results("SELECT id, name FROM `dev_cura_programs` WHERE id > 0 ORDER BY name", ARRAY_A);
					 			foreach ($programs as $key => $value) { echo("<option value=\"".$value['id'] ."\">".$value['name']."</option>");}?>
					 </select>
					 <div>
					 	<button class="button-secondary custom-btn"id="generalProgram_edit">Edit General Program 
					 	</button>
					 </div>
				</div>
				<div class="customProgram_modifyExisting hidden">
					<h3>3. Select an exisitng custom program to edit</h3>
				 	<select name="existingProgram" class="enableSelect2" id="existingProgram">
					 		<?php 
					 			global $wpdb;
					 				$programs = $wpdb->get_results("SELECT id, name FROM `dev_cura_programs` WHERE id > 0 AND customProgram = 1 ORDER BY name", ARRAY_A);
					 			foreach ($programs as $key => $value) { echo("<option value=\"".$value['id'] ."\">".$value['name']." </option>");}?>
					 </select>
					 <div>
					 	<button class="button-secondary custom-btn"id="customProgram_edit">Edit Custom Program 
					 	</button>
					 </div>
				</div>
				<div class="customProgram_selectUser hidden">
					<h3>3. Who are you creating a custom program for?</h3>
					<select id="selectUser" class="enableSelect2" name="activeUser">
						<option>Please Select a User</option>
						<?php foreach($activeUsers as $aUser){echo("<option value=\"".$aUser->ID."\">".$aUser->first_name." ".$aUser->last_name."</option>");}?>
					</select>
				</div>
				<div class="gernalProgram_createNewOrCopy hidden">
					<h3>3. How do you want to start creating your new general program?</h3>
					<div class="row">
						<div class="col-md-6">
						</div>
						<div class="col-md-6">
						 
					 	<select name="existingProgram" class="enableSelect2" id="generalProgramexistingProgram">
						 		<?php 
						 			global $wpdb;
						 				$programs = $wpdb->get_results("SELECT id, name FROM `dev_cura_programs` WHERE id > 0 ORDER BY name ", ARRAY_A);
						 			foreach ($programs as $key => $value) { echo("<option value=\"".$value['id'] ."\">".$value['name']."</option>");}?>
						 </select>
						</div>
						
						
					</div>
					<div class="row">
						<div class="col-md-6">
						 	<button class="button-secondary custom-btn"id="generalProgram_startfromScratch">Start a General Program from Scratch
						 	</button>
						 </div>
						<div class="col-md-6">
						 	<button class="button-secondary custom-btn"id="generalProgram_copyAndedit">Copy an Existing General Program & Edit
						 	</button>
						</div>

					</div>
				</div>
				<div class="customProgram_createNewOrCopy hidden">
					<h3>4. How do you want to start creating your new custom program?</h3>
					<div class="row">
						<div class="col-md-6">
						</div>
						<div class="col-md-6">
						 
					 	<select name="existingProgram" class="enableSelect2" id="existingProgram">
						 		<?php 
						 			global $wpdb;
						 				$programs = $wpdb->get_results("SELECT id, name FROM `dev_cura_programs` WHERE id > 0 ORDER BY name ", ARRAY_A);
						 			foreach ($programs as $key => $value) { echo("<option value=\"".$value['id'] ."\">".$value['name']."</option>");}?>
						 </select>
						</div>
						
						
					</div>
					<div class="row">
						<div class="col-md-6">
						 	<button class="button-secondary custom-btn"id="generalProgram_startfromScratch">Start from Scratch
						 	</button>
						 </div>
						<div class="col-md-6">
						 	<button class="button-secondary custom-btn"id="generalProgram_copyAndedit">Copy Existing Program & Edit
						 	</button>
						</div>

					</div>
				</div>
			
			</div>
			<div class="col-md-5">
				<div class="alertArea text-right">
					<h4>Program Builder Status Log</h4>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="programEditingArea">
		
		</div>
	</div>
