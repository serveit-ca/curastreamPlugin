<?php 
	function deleteComponent($component_type, $component_id){
		global $wpdb;
		var_dump($wpdb);
		die;
		$table = 'dev'.$component_type;
		$where = array('id' => $component_id);
		$wpdb->delete($table, $where); 
		wp_redirect(site_url('wp-admin/admin.php?page=demo%2Fbody-parts.php'));
	}
	if (isset($_POST['component_type']) && isset($_POST['component_id'])) {
		echo "deleted";
	}
 ?>