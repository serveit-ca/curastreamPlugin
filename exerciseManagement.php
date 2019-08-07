<?php 
//include "objects/program.php";
function prefix_enqueue() 
{       
    // JS
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
</head>
<body>
	<!-- Body Parts Table -->
	<?php 
	$programObj = new program();
	$exerciseVideos = $programObj->getAllExerciseVideosNoFavorite();
	?>
	<h1>Exercises</h1> 


	<div class="exercisesTable general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="exerciseVideos" class="table table-bordered">	
					<thead>
						<tr>
							<th id= "name">Name</th>
							<th id= "updateName">Update Name</th>
							<th id= "url">URL</th>
							<th id= "updateUrl">Update URL</th>
							<th id= "numUses"># of Uses</th>
							<th id= "Assigned">Programs Assigned</th>
							<th id= "actions">Actions</th>
						</tr>
					</thead>
					<tbody>
					<tr class="addExerciseRow">
						<td> <input  id="addNewExerciseName" type="text" placeholder="New Exercise Video"></td>
						<td></td>
						<td> <input id="addNewExerciseVideo" type="text" placeholder="New Video URL"></td>
						<td></td>
						<td></td>
						<td></td>
						<td><button class="saveNewExercise  custom-btn">Add Video</button></td>
					</tr>
					<?php 
							foreach ($exerciseVideos as $key) {	
								$progNames = $programObj->getProgramsByExerciseVideo($key->id);				
					?>
							<tr>
								<td><?php echo $key->name ?></td>	
								<td>
									<input type="text" class="updateName" id="updateName<?php echo $key->id?>" placeholder="Update <?php echo $key->name ?> ">
								</td>
								<td><a href="<?php echo $key->url ?>"><?php echo $key->url ?></a></td>
								<td>
									<input type="text" id="updateUrl<?php echo $key->id?>" placeholder="Update Url">
								</td>
								<td><?php  $programCount = $programObj->getExerciseVideoCount($key->id);
								echo $programCount ?></td>
								<td>
									<i class="showHideAll fas fa-2x fa-angle-down"></i>
									<div class="hidden showData">
									<?php
										foreach ($progNames as $value) {
											echo $value->name ?> <a href="<?php echo get_site_url();?>/view-program/?program_id=<?php echo $value->id;?>" target="_blank">
									<div class="viewProgram smallProgramBtn">
										View Program
									</div>
								</a>
								<a href="<?php echo get_site_url();?>/wp-admin/admin.php?page=curastream%2FcustomProgram.php&program_id=<?php echo $value->id;?>" target="_blank">
									<div class="viewProgram smallProgramBtn">
										Edit Program
									</div>
								</a> <br>
										<?php }
									?>
									</div>
								</td>
								<td>
									<button class="custom-btn updateExerciseVideo" data-exerciseId="<?php echo $key->id?>">Save</button>
									<button class="deleteVideoExercise custom-btn" data-programCount="<?php echo $programCount ?>" data-exerciseId="<?php echo $key->id?>">Delete</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>