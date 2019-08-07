<?php 

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
				<table id="bodyParts" class="table table-bordered">	
					<thead>
						<tr>
					<th id= "name">Name</th>
					<th id= "edit">Edit</th>
					<th id= "numUses"># of Program Uses</th>
					<th id= "assigned">Assigned Programs</th>
					<th id= "actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> <input type="text" id="newBodyPartText" placeholder="New Body Part "></td>
						<td></td>
						<td></td>
						<td></td>
						<td><button class="button-secondary custom-btn" id="newBodyPartSave">Save</button></td>
					</tr>
					<?php 
							foreach ($bodyParts as $key) {
							$partPrograms = $programObj->getProgramsByBodyPart($key->id);					
					?>
							<tr>
								<td><?php echo $key->name ?></td>	
								<td>
									<input type="text" class="updateName" id="updateName<?php echo $key->id?>" placeholder="Update <?php echo $key->name ?> ">
								</td>
								<td>
									<?php echo count($partPrograms); ?>

								</td>
								<td>
									<i class="showHideAll fas fa-2x fa-angle-down"></i>
									<div class="hidden showData">
										<?php foreach ($partPrograms as $value) {
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
									<button class="custom-btn updatePartButton" data-partId="<?php echo $key->id?>" data-type="Body">Save</button>
									<button class="custom-btn deletePartButton" data-partId="<?php echo $key->id?>" data-type="Body">Delete</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
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
				<table id="injuryType" class="table table-bordered">	
					<thead>
						<tr>
							<th id= "name">Name</th>
							<th id= "edit">Edit</th>
							<th id= "numUses"># of Uses</th>
							<th id= "assigned">Assigned Programs</th>
							<th id= "actions">Actions</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td> <input id="newInjuryTypeText"type="text" placeholder="New How it Happened"></td>
						<td></td>
						<td></td>
						<td></td>
						<td><button id="newInjuryTypeSave" class="button-secondary custom-btn">Save</button></td>
					</tr>
					<?php 
							foreach ($injuries as $key) {
							$injuryPrograms = $programObj->getProgramsByHowItHappened($key->id);					
					?>
							<tr>
								<td><?php echo $key->name ?></td>	
								<td>
									<input type="text" class="updateName" id="updateName<?php echo $key->id?>" placeholder="Update <?php echo $key->name ?> ">
								</td>
								<td><?php echo count($injuryPrograms); ?></td>
								<td>
									<i class="showHideAll fas fa-2x fa-angle-down"></i>
									<div class="hidden showData">
									<?php foreach ($injuryPrograms as $value) {
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
									<button class="custom-btn updatePartButton" data-partId="<?php echo $key->id?>" data-type="Injury">Save</button>
									<button class="custom-btn deletePartButton" data-partId="<?php echo $key->id?>" data-type="Injury">Delete</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
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
				<table id="sportsAndOccupations" class="table table-bordered">
				<thead>
				<tr>	
					<th id= "name">Name</th>
					<th id= "type">Type</th>
					<th id= "edit">Edit</th>
					<th id= "numUses"># of Uses</th>
					<th id= "assigned">Assigned Programs</th>
					<th id= "actions">Actions</th>
				</tr>
				</thead>
					<tbody>
					<tr>
						<td> <input id="newSportOccText" type="text" placeholder="New Sport or Occupation"></td>
						<td><select id="newSportOccType">
								<option value="sport">Sport</option>
								<option value="occupation">Occupation</option>
							</select>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td><button id="newSportOccSave" class="button-secondary custom-btn">Save</button></td>
					</tr>
					<?php 
							foreach ($sports as $key) {
							$sportPrograms = $programObj->getProgramsBySportOcc($key->id);						
					?>
							<tr>
								<td><?php echo $key->name ?></td>
								<td><?php echo $key->type ?> <button>Toggle Type</button></td>	
								<td>
									<input type="text" class="updateName" id="updateName<?php echo $key->id?>" placeholder="Update <?php echo $key->name ?> ">
								</td>
								<td><?php echo count($sportPrograms); ?></td>
								<td>
									<i class="showHideAll fas fa-2x fa-angle-down"></i>
									<div class="hidden showData">
									<?php foreach ($sportPrograms as $value) {
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
									<button class="custom-btn updatePartButton" data-partId="<?php echo $key->id?>" data-type="Sport">Save</button>
									<button class="custom-btn deletePartButton" data-partId="<?php echo $key->id?>" data-type="Sport">Delete</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
