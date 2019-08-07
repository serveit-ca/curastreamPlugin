<?php 
//include "objects/program.php";
function prefix_enqueue() 
{       
	wp_register_script('prefix_bootstrap0', '//code.jquery.com/jquery-3.3.1.slim.min.js');
    wp_register_script('prefix_bootstrap1', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    wp_register_script('prefix_bootstrap2', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');

    wp_register_script('loadUI', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js');
    wp_register_script('loadselect2', site_url('/wp-content/plugins/Curastream/select2/dist/js/select2.min.js'));
    wp_enqueue_script('prefix_bootstrap0');
    wp_enqueue_script('prefix_bootstrap1');
    wp_enqueue_script('prefix_bootstrap2');
    wp_enqueue_script('loadUI');
    wp_enqueue_script('loadselect2');

    // CSS
    wp_register_style('prefix_bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
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
				<table id="programMetrics" class="table table-bordered">	
					<thead>
						<tr>
					<th id= "name">Program ID</th>
					<th id= "name">Program Name</th>
					<th id= "type">Program Type</th>
					<th id= "state">State</th>
					<th id= "numUsers">Current Number of Users</th>
					<th id= "users">Current Users</th>
					<th id= "numDeletion">Number of Deletions</th>
					<th id= "deletedBy">Deleted By</th>
					<th id= "actions">Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php 
							foreach ($programs as $key) {					
							$partsAssoc = explode(',', $key->body_part);
							$sports_occ = explode(',', $key->sportsOccupation);
					?>
							<tr>
							<td><?php echo  $key->id ?></td>
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
							<td>
								<i class="showHideAll fas fa-2x fa-angle-down"></i>
								<div class="hidden showData">
							<ul><?php //echo "user names"
								$programUsers = $programObj->getProgramUsersById($key->id);
								foreach ($programUsers as $aUser) {
									echo("<li>" .$aUser."</li>");
								}
								?>					
							</ul>
								</div>
							</td>
							<td><?php echo $programObj->getProgramDeletionById($key->id); ?></td>
							<td>
								<i class="showHideAll fas fa-2x fa-angle-down"></i>
								<div class="hidden showData">
									<ul><?php $programUsers = $programObj->getProgramUserDeletionById($key->id);
									foreach ($programUsers as $aUser) {
										echo("<li>" .$aUser."</li>");
									}
									?>
									</ul>
								</div>
							</td>		
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
				</tbody>
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
				<table id="customProgramMetrics" class="table table-bordered">	
					<thead>
						<tr>
					<th id= "name">Program Name</th>
					<th id= "type">Program Type</th>
					<th id= "state">State</th>
					<th id= "numUsers">Current Number of Users</th>
					<th id= "users">Current Users</th>
					<th id= "numDeletion">Number of Deletions</th>
					<th id= "deletedBy">Deleted By</th>
					<th id= "actions">Actions</th>
					</tr>
					</thead>
					<tbody>
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
							<td>
									<i class="showHideAll fas fa-2x fa-angle-down"></i>
									<div class="hidden showData">
							<ul><?php //echo "user names"
								$programUsers = $programObj->getProgramUsersById($key->id);
								foreach ($programUsers as $aUser) {
									echo("<li>" .$aUser."</li>");
								}
								?>					
							</ul>
								</div>
							</td>
							<td><?php echo $programObj->getProgramDeletionById($key->id); ?></td>
							<td>
								<i class="showHideAll fas fa-2x fa-angle-down"></i>
									<div class="hidden showData">
										<ul><?php $programUsers = $programObj->getProgramUserDeletionById($key->id);
								foreach ($programUsers as $aUser) {
									echo("<li>" .$aUser."</li>");
								}
								?>
										</ul>
									</div>
							</td>		
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
				</tbody>
				</table>
			</div>
		</div>
	</div>
	
<?php prefix_enqueue(); ?>