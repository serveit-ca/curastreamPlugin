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
		$corpGroups = $programObj->getAllCorpGroups();
	?>

	<h1>Corporate Groups</h1>

	<div class="tableProrgams general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="corpGroups" class="table table-bordered">	
					<thead>
						<tr>
					<th id= "name">Group Name</th>
					<th id= "numUsers">Current Number of Users</th>
					<th id= "users">Current Users</th>
					<th id= "groupProgs">Programs Assigned</th>
					<th id= "corp">Corporate Account</th>
					<th id= "actions">Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php 
							foreach ($corpGroups as $key) {
							$groupUsers = $programObj->getUsersByGroupId($key['id']);					
					?>
							<tr>
							<td><?php echo $key['name'] ?></td>
							<td><?php echo count($groupUsers) ?></td>	
							<td>
								<i class="showHideAll fas fa-2x fa-angle-down"></i>
								<div class="hidden showData">
							<ul><?php //echo "user names"
								$programUsers = $programObj->getProgramUsersById($key['id']);
								foreach ($programUsers as $aUser) {
									echo("<li>" .$aUser."</li>");
								}
								?>					
							</ul>
								</div>
							</td>
							<td><?php
								$groupProgs = $programObj->getProgramsByGroupId($key['id']);
								foreach ($groupProgs as $gProg) {
									$progName = $programObj->getProgramById($gProg);
									echo $progName->name . "<br>";
								}
							 ?></td>
							
							<td><?php echo $programObj->getCorpAccountByGroupId($key['id']); ?></td>
							
							<td>

								<a href="" target="_blank">
									<div class="viewProgram smallProgramBtn">
										View Program
									</div>
								</a>
								<a href="" target="_blank">
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
		$corpGroups = $programObj->getAllCustomGroups();
	?>

	<h1>Custom Groups</h1>

	<div class="tableProrgams general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="corpGroups" class="table table-bordered">	
					<thead>
						<tr>
					<th id= "name">Group Name</th>
					<th id= "numUsers">Current Number of Users</th>
					<th id= "users">Current Users</th>
					<th id= "groupProgs">Programs Assigned</th>
					<th id= "actions">Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php 
							foreach ($corpGroups as $key) {
							$groupUsers = $programObj->getUsersByGroupId($key['id']);					
					?>
							<tr>
							<td><?php echo $key['name'] ?></td>
							<td><?php echo count($groupUsers) ?></td>	
							<td>
								<i class="showHideAll fas fa-2x fa-angle-down"></i>
								<div class="hidden showData">
							<ul><?php //echo "user names"
								$programUsers = $programObj->getProgramUsersById($key['id']);
								foreach ($programUsers as $aUser) {
									echo("<li>" .$aUser."</li>");
								}
								?>					
							</ul>
								</div>
							</td>
							<td><?php
								$groupProgs = $programObj->getProgramsByGroupId($key['id']);
								foreach ($groupProgs as $gProg) {
									$progName = $programObj->getProgramById($gProg);
									echo $progName->name . "<br>";
								}
							 ?></td>
							
							<td>

								<a href="" target="_blank">
									<div class="viewProgram smallProgramBtn">
										View Program
									</div>
								</a>
								<a href="" target="_blank">
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

</body>
</html>
	
<?php prefix_enqueue(); ?>