<?php 
include "objects/userTracking.php";
require_once "objects/program.php";
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
		$tracking = new userTracking();
		$programObj = new program();
		$users = get_users();
	?>

	 <h1>User Metrics</h1>

	<div class="tableProrgams general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="programMetrics" class="table table-bordered">	
					<thead>
						<tr>
					<th id= "name">User Name and ID</th>
					<th id= "corp">Corporate Account</th>
					<th id= "numLogins">Number of Logins</th>
					<th id= "numPrograms">Number of Viewed Programs</th>
					<th id= "numExericses">Number of Viewed Exercises</th>
					<th id= "lastLogin">Last Login</th>
					<th id= "lastProg">Last Viewed Program</th>
					<th id= "lastExercise">Last Viewed Exercise</th>
					</tr>
					</thead>
					<tbody>
					<?php 
						foreach ($users as $user) {					
						
					?>
							<tr>
							<td><?php echo $user->data->user_nicename . " - " . $user->ID ?></td>	
							<td><?php echo  "To Get From API" ?></td>	
							<td><?php echo $tracking->getAllUserLogin($user->ID);?></td>
							<td><?php echo $tracking->getTotalViewedPrograms($user->ID)?></td>
							<td><?php echo $tracking->getTotalViewedExercises($user->ID)?></td>
							<td><?php echo $tracking->getLastUserLogin($user->ID); ?></td>
							<td><?php 
									$viewedProg = $tracking->getLastViewedProgram($user->ID);
									if($viewedProg != "No Program Viewed"){
										$viewedProg = $programObj->getProgramById($viewedProg);
										echo $viewedProg->name;
									} 
									else{
										echo $viewedProg;
									}
							?></td>
							<td><?php 
									$viewedExercise = $tracking->getLastViewedExercise($user->ID);
									if($viewedExercise != "No Exercise Viewed"){
										$viewedExercise = $programObj->getAnExerciseById($viewedExercise);
										echo $viewedExercise->name;
									} 
									else{
										echo $viewedExercise;
									}
							?></td>							
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

