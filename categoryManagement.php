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
	$bodyParts = $programObj->getAllBodyParts();
	?>
	<h1>Body Parts</h1> 


	<div class="tableBodyParts general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="programs" class="table table-bordered">	
					<th id= "name">Name</th>
					<th id= "edit">Edit</th>
					<th id= "actions">Actions</th>
					<tr>
						<td> <input type="text" placeholder="New Body Part "></td>
						<td></td>
						<td><button>Save</button></td>
					</tr>
					<?php 
							foreach ($bodyParts as $key) {					
					?>
							<tr>
								<td><?php echo $key->name ?></td>	
								<td>
									<input type="text" placeholder="Update <?php echo $key->name ?> ">
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


	<!-- How it Happened Table -->
	<?php 
	$programObj = new program();
	$injuries = $programObj->getAllInjuries();
	?>
	<h1>How it Happened</h1>

	<div class="tableBodyParts general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="programs" class="table table-bordered">	
					<th id= "name">Name</th>
					<th id= "edit">Edit</th>
					<th id= "actions">Actions</th>
					<tr>
						<td> <input type="text" placeholder="New How it Happened"></td>
						<td></td>
						<td><button>Save</button></td>
					</tr>
					<?php 
							foreach ($injuries as $key) {					
					?>
							<tr>
								<td><?php echo $key->name ?></td>	
								<td>
									<input type="text" placeholder="Update <?php echo $key->name ?> ">
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

	<!-- Sports and Occupations Table -->
	<?php 
	$programObj = new program();
	$sports = $programObj->getAllSportsOccupations();
	?>
	<h1>Sports and Occupations</h1>

	<div class="tableBodyParts general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="programs" class="table table-bordered">	
					<th id= "name">Name</th>
					<th id= "type">Type</th>
					<th id= "edit">Edit</th>
					<th id= "actions">Actions</th>
					<tr>
						<td> <input type="text" placeholder="New Sport or Occupation"></td>
						<td><select>
								<option value="sport">Sport</option>
								<option value="occupation">Occupation</option>
							</select>
						</td>
						<td></td>
						<td><button>Save</button></td>
					</tr>
					<?php 
							foreach ($sports as $key) {					
					?>
							<tr>
								<td><?php echo $key->name ?></td>
								<td><?php echo $key->type ?> <button>Toggle Type</button></td>	
								<td>
									<input type="text" placeholder="Update <?php echo $key->name ?> ">
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
