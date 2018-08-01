<?php 
function prefix_enqueue() 
{       
	    // JS
	wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
	wp_enqueue_script('prefix_bootstrap');

	    // CSS
	wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
	wp_enqueue_style('prefix_bootstrap');
}
prefix_enqueue();
?>
<html>
<head>
	<title></title>
	<style type="text/css">
	table#sports {
		width: 100%!important;
		border: 1px solid #ece4e4!important;
	}

	form#editForm, form#actionsForm {
		display: inline-block;
	}
	form#editForm input[type="submit"], input[id*=fieldValue]{
		display: none;
	}

	table#sports td, table#sports th {
		padding: 10px!important;
		border: 1px solid #e0e0e0!important;
	}
	table#sports, td,th {
		border-collapse: collapse!important;
	}

	table#sports th {
		text-align: left!important;
	}
	
	input[type="button"], input[type="submit"] {
		border: 0;
		background-color: #00b1b3;
		color: #fff;
		padding: 9px 22px;
	}
	input[id*=fieldValue] {
		padding: 5px 10px;
		font-size: 16px;
		margin-top: 10px;
	}

	input[id*=fieldValue]:focus,input:focus,select:focus {
		border-color: #00b1b3 !important;
	}
	
input.form-control {
    height: 40px;
}

input#edit {
    background: #efc227;
}

input[value="Delete"] {
    background: #ff5e5e!important;
}
select#sports {
    height: 40px;
}
table#sports {
		margin-top: 30px;
	}
	</style>
</head>
<body>
	<h1 style="margin: 40px 0;">Sport/Occupation</h1>
	<form action="" method="POST">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<input type="text" name="sport_occ" class="form-control" placeholder="Sports & Occupations">
				</div>					
			</div>
		
		
			<div class="col-md-4">
				<div class="form-group">
					<select id="sports" name="type" class="form-control">
						<option value="" disabled="disabled" selected="selected">Select</option>
						<option value="occupation">Occupation</option>
						<option value="sport">Sport</option>
					</select>
				</div>					
			</div>
		
			<div class="col-md-4">
				<div class="form-group">
					<input type="submit" name="add_option" value="Add">
				</div>					
			</div>
		</div>
		
		
	</form>
	<?php
	global $wpdb; 

	if (isset($_POST['component_type']) && isset($_POST['component_id']) && $_POST['action'] == 'Delete') {
		global $wpdb;
		$table = 'dev_cura_sport_occupation';
		$where = array('id' => $_POST['component_id']);
		$wpdb->delete($table, $where); 
	}
	if (isset($_POST['component_type']) && isset($_POST['edit_component_id']) && $_POST['action'] == 'Update') {
		$table = 'dev_cura_sport_occupation';
		$data = array('name' => $_POST['edit_component_name']);
		$where = array('id' => $_POST['edit_component_id']);
		$wpdb->update($table,$data,$where, array('%s'));

	// $id = stripslashes_deep($_POST['id']); //added stripslashes_deep which removes WP escaping.
	// $title = stripslashes_deep($_POST['edit_component_name']);

	// $wpdb->update('dev_cura_sport_occupation', array('id'=>$id, 'title'=>$title), array('id'=>$id));
		
	}
	if (isset($_POST['sport_occ']) && isset($_POST['type']) && isset($_POST['add_option'])){		
		$table = 'dev_cura_sport_occupation';
		$data = array('name' => $_POST['sport_occ'], 'type' => $_POST['type']);
		$wpdb->insert( $table, $data);
	}
	$result = $wpdb->get_results("SELECT * FROM `dev_cura_sport_occupation` WHERE id > 0");
function cmp($a, $b)
	{
		return strcmp($a->name, $b->name);
	}
	usort($result, "cmp");

	?>

	<table id="sports">
		<th>Sr No.</th>
		<th>Sport/Occupation</th>
		<th>Type</th>
		<th>Actions</th>
		<?php 
		$count = 0;
		foreach ($result as $key => $value) {
			$count++;
			$part_id = $value->id; 
			$part_name = $value->name;
			$part_type = $value->type
			?>
			<tr>
				<td><?php echo $count?></td>	
				<td><?php echo ucfirst($part_name); ?>
					<br>
					<input id="fieldValue<?php echo $part_id ?>" type="text" value="<?php echo ucfirst($part_name) ?>">
				</td>	
				<td><?php echo ucfirst($part_type); ?>
				</td>
				<td>
					<form id ="editForm" action="" method="POST">				
						<input type="hidden" name="component_type" value="injury"> 
						<input type="hidden" name="edit_component_name" value="">
						<input type="button" value="Edit" id="edit" data-id ="<?php echo $part_id ?>">
						<input type="hidden" name="edit_component_id" value="<?php echo $part_id ?>"> 
						<input type='submit' name="action" value="Update">
					</form>
					<form id ="actionsForm" action="" method="POST">
						<input type="hidden" name="component_type" value="injury"> 
						<input type="hidden" name="component_id" value="<?php echo $part_id ?>"> 
						<input type='submit' name="action" value="Delete">
					</form>
				</td>
			</tr>
			<?php } ?>
		</table>
		<script type="text/javascript">
		jQuery('input#edit').click(function(){
			jQuery(this).hide();
			jQuery(this).siblings(jQuery('input[type="submit"]')).show();
			jQuery('input#fieldValue' + jQuery(this).attr('data-id')).show();
			jQuery(this).prev().attr('value', jQuery('input#fieldValue' + jQuery(this).attr('data-id')).val());
		})
		jQuery('input[id*=fieldValue]').keyup(function(){
			jQuery('input[name= edit_component_name]').attr('value',jQuery(this).val());
		})
		</script>
	</body>
	</html>