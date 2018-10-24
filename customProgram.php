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
				<div class="UserSelect">
				<h1>Custom Program Creation</h1>
				<h3>1. Lets Select a User or a Group (Coming Soon)</h3>
					<select id="selectUser" name="activeUser">
						<option>Please Select a User</option>
						<?php foreach($activeUsers as $aUser){echo("<option value=\"".$aUser->ID."\">".$aUser->first_name." ".$aUser->last_name."</option>");}?>
					</select>
					<select name="activeGroup" disabled>
						<option>Please Select a Group</option>
					</select>
				</div>
				<!-- Part 2 -->
				<div class="baseProgram hidden" > 
					<h3>2. Do you want to modify a existing program or create a new one?</h3>
					<button class="button-secondary custom-btn"id="modifyExisting">Modify Existing</button><button class="button-secondary custom-btn" id="createNew">Create New Program </button>
				</div>
				 <!-- Part 3 -->
				<div class="modifyExistingProgram hidden">
					<h3>3. Select an Exisitng Program</h3>
				 	<select name="existingProgram" id="existingProgram">
					 		<?php 
					 			global $wpdb;
					 				$programs = $wpdb->get_results("SELECT id, name FROM `dev_cura_programs` WHERE id > 0 ORDER BY name", ARRAY_A);
					 			foreach ($programs as $key => $value) { ?>
					 				<option id="existingOption" value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>	
					 			<?php } ?>
					 </select>
					 <div>
					 	<button class="button-secondary custom-btn"id="ContineModification">Continue Modifying
					 	</button>
					 	<button class="button-secondary custom-btn"id="CopyAndCustomize">Copy & Customize</button>
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


	<div class="createNewForm hidden">
		<h3>3. Create a New Custom Program</h3>
		<div> </div>
	</div>
	<div class="container-fluid">
		<div class="modifyExistingForm hidden ">
		
		</div>
	</div>
