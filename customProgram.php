<?php
include ("objects/customProgram.php");
$customProgram = new customProgram();
$customProgram -> prefix_enqueue();
wp_localize_script('customProgram', 'settings', array('ajaxurl' => admin_url('admin-ajax.php')));
/* This page take users through the custom progam module which allows a profession to create and assign a custom prgraom */
//The Curastream WordPress plugin shall allow exercises to be searched by a quick type filter which auto complete 
// Get a list of registered users 
/*Going to register the custom JavaScript and CSS File   */
 


 
$allUsers = get_users(array(
    'meta_key' => 'first_name',
    'orderby'  => 'meta_value',
));
if(WP_DEBUG){	echo("<br/>All Users Array Size:".sizeof($allUsers));}

// Create an empty array of Active users 
$activeUsers = array();
// Add active users to the array
foreach($allUsers as $user){
if(WP_DEBUG){		echo ("<br/>".$user->ID.$user->user_login);}
	if (user_can($user->ID, 'mepr-active')){
if(WP_DEBUG){			echo("<br/>Active User".$user->user_login);}
		array_push($activeUsers,$user);
	}else{
if(WP_DEBUG){			echo ("<br/> Error".$user->user_login);}
	}
if(WP_DEBUG){		echo("<br/>Array Size:".sizeof($activeUsers));}
}
// Get a list of groups 
// Select a user or a group TODO - Add Group functionality 
?><!DOCTYPE HTML>
<html>
	<head>
	<script>


		jQuery(document).ready(function(){

			console.log("doc.ready");
			jQuery("#selectUser").change(function(){ 
				console.log("onchange");
				jQuery(".baseProgram").removeClass("hidden");
				console.log("user change");
			});
			jQuery("#modifyExisting").click(function(){
				jQuery(".modifyExistingProgram").removeClass("hidden");
				
				jQuery(".createNewForm").addClass("hidden");
			});
			jQuery("#createNew").click(function(){
				console.log("createNew clicked");
				jQuery(".createNewForm").removeClass("hidden");
				jQuery(".modifyExistingForm").addClass("hidden");
				jQuery(".modifyExistingProgram").addClass("hidden");
			});
			jQuery("#customizeButton").click(function(){

				jQuery(".modifyExistingForm").removeClass("hidden");
				console.log("clicking custom ");

				 
			});


		});
	</script>
	</head>
	<body>


		<link rel="stylesheet" type="text/css" href="/curatream/assets/css/style.css" />


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
		<button id="modifyExisting">Modify Existing</button><button id="createNew">Create New Program </button>
	</div>
	 <!-- Part 3 -->
	<div class="modifyExistingProgram hidden">
		<h3>3. Select an Exisitng Program</h3>
	 	<select name="existingProgram">
		 		<?php 
		 			global $wpdb;
		 				$programs = $wpdb->get_results("SELECT id, name FROM `dev_cura_programs` WHERE id > 0 ORDER BY name", ARRAY_A);
		 			foreach ($programs as $key => $value) { ?>
		 				<option id="existingOption" value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>	
		 			<?php } ?>
		 </select>
		 <div>
		 	<button id="customizeButton">Customize</button>
		 </div>
	</div>
	<div class="createNewForm hidden">
		<h3>3. Create a New Custom Program</h3>
		<div> 
			<?php echo $customProgram ->createForm($customProgram); ?> 
		</div>
	</div>
	<div class="modifyExistingForm hidden">

		<div>
			<?php 
			//$progIdByName = $customProgram->getProgramByName()
			// $aProgram = $customProgram->populateFormById("37"); 
			// print_r($aProgram);
			//echo $aProgram->description;
			echo $customProgram->createForm($aProgram); ?>
		</div>
	</div>

</body>
</html>

<?php


?>