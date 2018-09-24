<?php
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
?>
<div class="UserSelect">
<h1>Custom Program Creation</h1>
<h3>1. Lets Select a User or a Group (Coming Soon)</h3>
	<select name="activeUser">
		<option>Please Select a User</option>
		<?php foreach($activeUsers as $aUser){echo("<option value=\"".$aUser->ID."\">".$aUser->first_name." ".$aUser->last_name."</option>");}?>
	</select>
	<select name="activeGroup" disabled>
		<option>Please Select a Group</option>
	</select>
</div>
<div class="baseProgram">
	<h3>2. Do you want to modify a existing program or create a new one?</h3>
	<button id="modifyExisting">Modify Existing</button><button id="createNew">Create New Program </button>
</div>
<div class="modifyExistingProgram">
	<h3>3. Select an Exisitng Program</h3>
 	<select name="existingProgram">
	 		<?php 
	 			global $wpdb;
	 				$programs = $wpdb->get_results("SELECT id, name FROM `dev_cura_programs` WHERE id > 0 ORDER BY name", ARRAY_A);
	 			foreach ($programs as $key => $value) { ?>
	 				<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>	
	 			<?php } ?>
	 </select>
	 <div>
	 	<button>Customize</button>
	 </div>
</div>
<?php


?>