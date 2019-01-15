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
				<table id="programs" class="table table-bordered">	
					<th id= "name">Name</th>
					<th id= "updateName">Update Name</th>
					<th id= "url">URL</th>
					<th id= "updateUrl">Update URL</th>
					<th id= "numUses"># of Uses</th>
					<th id= "Assigned">Programs Assigned</th>
					<th id= "actions">Actions</th>
					<tr>
						<td> <input type="text" placeholder="New Exercise Video"></td>
						<td></td>
						<td> <input type="text" placeholder="New Video URL"></td>
						<td></td>
						<td></td>
						<td></td>
						<td><button>Save</button></td>
					</tr>
					<?php 
							foreach ($exerciseVideos as $key) {	
								$progNames = $programObj->getProgramsByExerciseVideo($key->id);				
					?>
							<tr>
								<td><?php echo $key->name ?></td>	
								<td>
									<input type="text" placeholder="Update <?php echo $key->name ?> ">
								</td>
								<td><a href="<?php echo $key->url ?>"><?php echo $key->url ?></a></td>
								<td>
									<input type="text" placeholder="Update Url">
								</td>
								<td><?php echo $programObj->getExerciseVideoCount($key->id); ?></td>
								<td><?php
										foreach ($progNames as $name) {
											echo $name . "<br>";
										}
									?>
										
								</td>
								<td>
									<button>Save</button>
									<button>Delete</button>
								</td>
							</tr>
						<?php } ?>
				</table>
			</div>
		</div>
	</div>