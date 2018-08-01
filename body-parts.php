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
		table#body-parts {
			width: 100%!important;
			border: 1px solid #ece4e4!important;
		}

		form#editForm, form#actionsForm {
			display: inline-block;
		}
		form#editForm input[type="submit"], input[id*=fieldValue]{
			display: none;
		}

		table#body-parts td, table#body-parts th {
			padding: 10px!important;
			border: 1px solid #e0e0e0!important;
		}
		table#body-parts, td,th {
			border-collapse: collapse!important;
		}

		table#body-parts th {
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
table#body-parts {
    margin-top: 30px;
}
.overlayAction {
    height: 100vh;
    position: fixed;
    width: 87vw;
    top: 0;
    left: 160px;
    background:rgba(255,255,255,0.8);
    z-index: 999;
    /*display: none;*/
}
.overlayAction img{
position: absolute;
left: 0;
right: 0;
margin: auto;
top: 0;
bottom: 0;
}
	</style>
</head>
<body>
	<div class="overlayAction">
		<img src="<?php echo site_url().'/wp-admin/images/spinner-2x.gif' ?>">
	</div>
	<h1 style="margin: 40px 0;">Body parts</h1>
	<form action="" method="POST">
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<input class="form-control" required type="text" name="body_part" placeholder="Body Part">
				</div>
			</div>
			<div class="col-md-7">
				<div class="form-group">
					<input type="submit" name="submit" value="Add"> 					
				</div>
			</div>
		</div>
	</form>
	<?php
	global $wpdb; 

	if (isset($_POST['component_type']) && isset($_POST['component_id']) && $_POST['action'] == 'Delete') {
		global $wpdb;
		$table = 'dev_cura_body_parts';
		$where = array('id' => $_POST['component_id']);
		$wpdb->delete($table, $where); 
	}
	if (isset($_POST['component_type']) && isset($_POST['edit_component_id']) && $_POST['action'] == 'Update') {
		$table = 'dev_cura_body_parts';
		$data = array('name' => $_POST['edit_component_name']);
		$where = array('id' => $_POST['edit_component_id']);
		$wpdb->update($table,$data,$where, array('%s'));

	// $id = stripslashes_deep($_POST['id']); //added stripslashes_deep which removes WP escaping.
	// $title = stripslashes_deep($_POST['edit_component_name']);

	// $wpdb->update('dev_cura_body_parts', array('id'=>$id, 'title'=>$title), array('id'=>$id));
		
	}
	if (isset($_POST['body_part']) && isset($_POST['submit']) && !empty($_POST['body_part'])){		
		$table= 'dev_cura_body_parts';
		$data = array('name' => $_POST['body_part']);
		$wpdb->insert( $table, $data);
	}
	$result = $wpdb->get_results("SELECT * FROM `dev_cura_body_parts` WHERE id > 0");
	function cmp($a, $b)
	{
		return strcmp($a->name, $b->name);
	}
	usort($result, "cmp");

	?>

	<table id="body-parts">
		<th>Sr No.</th>
		<th>Body Part Name</th>
		<th>Actions</th>
		<?php 
		$count = 0;
		foreach ($result as $key => $value) {
			$count++;
			$part_id = $value->id; 
			$part_name = $value->name
			?>
			<tr>
				<td><?php echo $count?></td>	
				<td><?php echo ucfirst($part_name) ?>
					<br>
					<input id="fieldValue<?php echo $part_id ?>" type="text" value="<?php echo ucfirst($part_name) ?>">
				</td>	
				<td>
					<form id ="editForm" action="" method="POST">				
						<input type="hidden" name="component_type" value="body_parts"> 
						<input type="hidden" name="edit_component_name" value="">
						<input type="button" value="Edit" id="edit" data-id ="<?php echo $part_id ?>">
						<input type="hidden" name="edit_component_id" value="<?php echo $part_id ?>"> 
						<input type='submit' name="action" value="Update">
					</form>
					<form id ="actionsForm" action="" method="POST">
						<input type="hidden" name="component_type" value="body_parts"> 
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
			jQuery(document).ready(function() {
				jQuery('.overlayAction').css('display','none');
			});
			jQuery(document).on('click','input[value="Update"]',function(){
				jQuery('.overlayAction').css('display','block');
			})
			jQuery(document).on('click','input[value="Delete"]',function(){
				jQuery('.overlayAction').css('display','block');
			})
			
		</script>
	</body>
	</html>