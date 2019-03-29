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
	$groupObj = new group();
		$customTiers = $groupObj->getAllCustomPriceTiers();
		
	?>

	<h1>Custom Pricing Tiers</h1>

	<div class="tableProrgams general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="corpGroups" class="table table-bordered">	
					<thead>
						<tr>
					<th id= "tierId">Tier Id</th>
					<th id= "corpAccount">Corporate Account</th>
					<th id= "minUsers">Minimum Users</th>
					<th id= "maxUsers">Maximum Users</th>
					<th id= "groupProgs">Price Per User</th>
					<th id= "actions">Actions</th>
					</tr>
					</thead>
					<tbody>
							<tr>
							<td></td>
							<td><select id="corpList">
					 				<?php
					 			
					 				$allCorps = $groupObj->getAllCorps();
					 				foreach ($allCorps as $key) { echo("<option value=\"".$key->id ."\">".$key->name." </option>");}
					 				?>
					 			</select>
					 		</td>
					 		<td><input type="text" name="newMin"></td>
					 		<td><input type="text" name="newMax"></td>
					 		<td><input type="text" name="newPrice"></td>
					 		<td>
					 			<a href="" target="_blank">
									<div class="saveTier smallProgramBtn">
										Save Tier
									</div>
								</a>
							</td>

					 		</tr>
					<?php 
							foreach ($customTiers as $key) {					
					?>
							<tr>
							<td><?php echo $key->id ?></td>
							<td><?php $corpId = $groupObj->getCorpByTierId($key->id);
									$corpAccount = $groupObj->getCorpById($corpId->corp_id);
									if(isset($corpAccount->name)){
										echo $corpAccount->name;
									}
									else{
										echo "Not Assigned To Any Corporate Account";
									}
								?>
							</td>
							<td><?php echo $key->min_users; ?></td>	
							<td><?php echo $key->max_users; ?></td>
							<td><?php echo $key->price_per_user; ?></td>							
							<td>
								<a href="" target="_blank">
									<div class="editTier smallProgramBtn">
										Edit Tier
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
	$groupObj = new group();
	$defaultTiers = $groupObj->getAllDefaultPriceTiers();
	?>

	<h1>Default Pricing Tiers</h1>
	<h3>Editing These Tiers Will Effect All Corporate Accounts Without Custom Tiers Assigned</h3>
	<div class="tableProrgams general">
		
		<div class="row">
			<div class="col-md-12">
				<table id="corpGroups" class="table table-bordered">	
					<thead>
						<tr>
					<th id= "tierId">Tier Id</th>
					<th id= "minUsers">Minimum Users</th>
					<th id= "maxUsers">Maximum Users</th>
					<th id= "groupProgs">Price Per User</th>
					<th id= "actions">Actions</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
					 		<td><input type="text" name="newMin"></td>
					 		<td><input type="text" name="newMax"></td>
					 		<td><input type="text" name="newPrice"></td>
					 		<td>
					 			<a href="" target="_blank">
									<div class="saveTier smallProgramBtn">
										Save Tier
									</div>
								</a>
							</td>

					 		</tr>
					<?php 
							foreach ($defaultTiers as $key) {					
					?>
							<tr>
							<td><?php echo $key->id ?></td>
							<td><?php echo $key->min_users; ?></td>	
							<td><?php echo $key->max_users; ?></td>
							<td><?php echo $key->price_per_user; ?></td>							
							<td>
								<a href="" target="_blank">
									<div class="editTier smallProgramBtn">
										Edit Tier
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