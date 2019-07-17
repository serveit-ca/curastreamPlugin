<?php 


//include "objects/program.php";
function prefix_enqueue() 
{    
    // JS
    wp_register_script('prefix_bootstrap0', '//code.jquery.com/jquery-3.3.1.min.js');
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
if(isset($_POST['programId']) && isset($_POST['groupId'])){
	$groups = new group();
	$groups->assignProgramToGroup($_POST['programId'], $_POST['groupId']);

}
if(isset($_POST['deleteGroup']) && isset($_POST['groupId'])){
	$groups = new group();
	$groups->deleteGroup($_POST['groupId']);

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
	$groupObj = new group();
	$corpGroups = $groupObj->getAllCorpGroups();
	$allProgs = $programObj->getAllGenericPrograms();
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
							$groupUsers = $groupObj->getUsersByGroupId($key['id']);					
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
							<td>
								<i class="showHideAll fas fa-2x fa-angle-down"></i>
									<div  id="prog-list-<?php echo $key['id']?>" class="hidden showData">
										<?php
											$groupProgs = $groupObj->getProgramsByGroupId($key['id']);
											foreach ($groupProgs as $gProg) {
												$progName = $programObj->getProgramById($gProg);
												echo $progName->name . "<br>";
											}
									 	?>
								 	</div>							 	
							 </td>
							
							<td><?php
								$corpId = $groupObj->getCorpAccountByGroupId($key['id']);
								if($corpId != "No Corp For This Group"){
									$corp = $groupObj->getCorpById($corpId);

									if(isset($corp->name)){
										echo $corp->name;
									}
									else{
										echo "Error - No Corp Assigned to Group.";
									}
								} 
								else{
									echo $corpId;
								}?></td>
							
							<td>			
								<button class="deleteGroup btn btn-danger " data-toggle="modal" data-target="#delete-group-modal" id="<?php echo $key['id'] ?>">Delete Group</button>
								<button class="addProgram btn btn-primary" data-toggle="modal" data-target="#add-program-modal" id="<?php echo $key['id'] ?>">Add Program</button>
							</td>
							</tr>
						<?php  
					}?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal -->




	<!-- <?php
	$programObj = new program();
	$groupObj = new group();
		$corpGroups = $groupObj->getAllCustomGroups();
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
							$groupUsers = $groupObj->getUsersByGroupId($key['id']);					
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
								$groupProgs = $groupObj->getProgramsByGroupId($key['id']);
								foreach ($groupProgs as $gProg) {
									$progName = $programObj->getProgramById($gProg);
									echo $progName->name . "<br>";
								}
							 ?></td>
							
							<td>

								<a href="" target="_blank">
									<div class="deleteGroup smallProgramBtn">
										Delete Group
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
	</div> -->
	<div class="modal fade" id="add-program-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add a Program</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="add-program-form" method="POST" action="">
	        	<select id="program-option">
	        		<?php
	        			foreach ($allProgs as $prog) { ?>
	        				<option value="<?php echo $prog->id ?>"> <?php echo $prog->name ?></option>
	        		<?php	}
	        		?>
	        	</select>    	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Save changes</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="delete-group-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Delete Group?</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Are you sure you want to delete thus group? (This cannot be un-done!) 	
	      </div>
	      <div class="modal-footer">
	      	<form id="delete-group-form" method="POST" action="">
	        	<button type="submit" class="btn btn-danger">Delete Group</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
<script type="text/javascript">
	$( document ).ready(function() {
    	$(".addProgram").click(function (){
    		id = $(this).attr('id');    		
    	});
    	$(".deleteGroup").click(function (){
    		id = $(this).attr('id');    		
    	});
    	$("#add-program-form").submit(function(e) {

    		e.preventDefault();

    		var form = $(this);
    		var url = form.attr('action');

    		var programName = $("#program-option option:selected").text();
    		var progId = $("#program-option option:selected").val();
    		var tdId = "prog-list-".concat(id);

    		$('#'+tdId).append(programName + "<br>");

    		$.post(url, {programId: progId, groupId: id});


    	});

    	$("#delete-group-form").submit(function(e) {

    		e.preventDefault();
    		console.log("Delete Submit");
    		var form = $(this);
    		var url = form.attr('action');

    		console.log(id);

    		$.post(url, {groupId: id, deleteGroup: "1"});

    		location.reload(true);

    	});




	});
</script>
</body>
</html>

	
<?php prefix_enqueue(); ?>