<?php 
//include "objects/program.php";
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
	<style type="text/css">
		
		</style>
</head>
<script type="text/javascript">
	

</script>
<body>
	<?php
	$programObj = new program();
		$programs = $programObj->getAllGenericPrograms();
		foreach ($programs as $key => $row) {
		    $name[$key]  = $row->name;
		}
		array_multisort($name, SORT_ASC, $programs);
	?>

	 <h1>General Programs</h1>

	<div class="tableProrgams general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="programs" class="table table-bordered">	
					<th id= "name">Program Name</th>
					<th id= "type">Program Type</th>
					<th id= "state">State</th>
					<th id= "numUsers">Current Number of Users</th>
					<th id= "users">Users</th>
					<th id= "numDeletion">Number of Deletions</th>
					<th id= "deletedBy">Deleted By</th>
					<th id= "actions">Actions</th>
					<?php 
							foreach ($programs as $key) {					
							$partsAssoc = explode(',', $key->body_part);
							$sports_occ = explode(',', $key->sportsOccupation);
					?>
							<tr>
							<td><?php echo $key->name ?></td>	
							<td><?php echo  $key->type ?></td>	
							<td><?php

								if($key->state == 0){
								echo "Production";
								}
								else{
								echo "Development";
								} ?>
								 	
							</td>
							<td><?php echo $programObj->checkStaleness($key->id); ?></td>
							<td><ul><?php //echo "user names"
								$programUsers = $programObj->getProgramUsersById($key->id);
								foreach ($programUsers as $aUser) {
									echo("<li>" .$aUser."</li>");
								}
								?>					
							</ul></td>
							<td><?php echo $programObj->getProgramDeletionById($key->id); ?></td>
							<td><ul><?php $programUsers = $programObj->getProgramUserDeletionById($key->id);
								foreach ($programUsers as $aUser) {
									echo("<li>" .$aUser."</li>");
								}
								?>
							</ul></td>		
							<td>

								<a href="<?php echo get_site_url();?>/view-program/?program_id=<?php echo $key->id;?>" target="_blank">
									<div class="viewProgram smallProgramBtn">
										View Program
									</div>
								</a>
								<a href="<?php echo get_site_url();?>/wp-admin/admin.php?page=curastream%2FcustomProgram.php&program_id=<?php echo $key->id;?>" target="_blank">
									<div class="viewProgram smallProgramBtn">
										Edit Program
									</div>
								</a>

							</td>
							</tr>
						<?php  
					}?>
				</table>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>


	<?php
	$programObj = new program();
		$programs = $programObj->getAllCustomPrograms();

	?>
	<h1>Custom Programs</h1>

	<div class="tableProrgams general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="programs" class="table table-bordered">	
					<th id= "name">Program Name</th>
					<th id= "type">Program Type</th>
					<th id= "state">State</th>
					<th id= "numUsers">Current Number of Users</th>
					<th id= "users">Users</th>
					<th id= "numDeletion">Number of Deletions</th>
					<th id= "deletedBy">Deleted By</th>
					<th id= "actions">Actions</th>
					<?php 
							foreach ($programs as $key) {					
							$partsAssoc = explode(',', $key->body_part);
							$sports_occ = explode(',', $key->sportsOccupation);
					?>
							<tr>
							<td><?php echo $key->name ?></td>	
							<td><?php echo  $key->type ?></td>	
							<td><?php

								if($key->state == 0){
								echo "Production";
								}
								else{
								echo "Development";
								} ?>
								 	
							</td>
							<td><?php echo $programObj->checkStaleness($key->id); ?></td>
							<td><ul><?php //echo "user names"
								$programUsers = $programObj->getProgramUsersById($key->id);
								foreach ($programUsers as $aUser) {
									echo("<li>" .$aUser."</li>");
								}
								?>					
							</ul></td>
							<td><?php echo $programObj->getProgramDeletionById($key->id); ?></td>
							<td><ul><?php $programUsers = $programObj->getProgramUserDeletionById($key->id);
								foreach ($programUsers as $aUser) {
									echo("<li>" .$aUser."</li>");
								}
								?>
							</ul></td>		
							<td><?php 

								echo("<button id=\"view-".$key->id."\">View</button>");
								echo("<button id=\"view-".$key->id."\">Edit</button>");

								?>
								

							</td>
							</tr>
						<?php  
					}?>
				</table>
			</div>
		</div>
	</div>
	
<?php prefix_enqueue(); ?>