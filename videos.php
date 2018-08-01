<html>

<head>

	<title></title>

	<!--<link href="<?php echo site_url(); ?>/wp-content/plugins/Curastream/select2/dist/css/select2.min.css" rel="stylesheet" />-->

	<style type="text/css">



	<?php 

	if (isset($_POST['edit'])) { ?>

		form#updateVideoForm

		{

			display: block;

		}

		form#addVideoForm

		{

			display: none;	

		}

		table#videos

		{

			display: none;

		}

		#back

		{

			display: inline-block;

			padding: 10px 15px;

			text-decoration: none;

			color: #fff;

			background-color: #00b1b3;

			    margin-bottom: 15px;

}



		}

		<?php } 

		else

			{ ?>

				form#updateVideoForm

				{

					display: none;

				}

				form#addVideoForm

				{

					display: block;	

				}

				#back

				{

					display: none;

				}

				<?php }	?>

				table#videos {

					width: 100%!important;

					border: 1px solid #ece4e4!important;

				}



				form#editForm, form#deleteForm {

					display: inline-block;

				}

				table#videos td, table#videos th {

					padding: 10px!important;

					border: 1px solid #e0e0e0!important;

				}

				table#videos, td,th {

					border-collapse: collapse!important;

				}



				table#videos th {

					text-align: left!important;

				}

				.form-control{

					width: 40% ;

					padding: 8px 10px;

					margin: 5px 10px 5px 0 ;

				}

				textarea.form-control{

					width: 81.4%;

					max-height: 113px;

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



				input:focus,select:focus,textarea:focus{

					border-color: #00b1b3 !important;

				}

				select.form-control {

					height: 38px;

				}

				#updateHeading span {

					display: inline-block;

					margin: 0 0 10px 0;

					border-bottom: 2px solid #00b1b3;

					padding-bottom: 10px;

				}

				#updateHeading{

					margin-bottom: 10px;

				}

				.videoPlayer

				{

					position: fixed;

					width: 100vw;

					height: 100vh;

					top: 0;

					left: 0;

					background: rgba(0, 0, 0, 0.25);

					display: none;

				}

				.close

				{

					color: #fff;

					position: absolute;

					top: 50px;

					right:50px;

					cursor: pointer;

					font-size:20px;

				}

				span#body-parts {

					padding: 5px;

					background-color: #00b1b3;

					display: inline-block;

					margin: 5px 5px 0 0;

					color: #fff;

					border-radius: 4px;

				}

				th#bodyparts {

					width: 20%;

				}

				th#sr {

					width: 7%;

				}



				th#title, #cat {

					width: 10%;

				}



				th#actions {

					width: 25%;

				}

				.searchVids {

					margin-bottom: 30px;

				}



				.searchVids select {

					margin-top: 1px;

				}

				.form-control-full {

					width: 81.3%;

					display: block;

					margin: 5px 0 10px 0;

				}

				.vid-overlay {

					position: fixed;

					width: 100vw;

					height: 100vh;

					background: rgba(0, 0, 0, 0.5);

					top: 0;

					left: 0;

					display: none;

				}

				span.closeVid {

					position: absolute;

					top: 50px;

					right: 50px;

					color: #fff;

					font-size: 30px;

					font-weight: 900;

					cursor: pointer;	

				}

				button.playVid {

					padding: 9px 15px;

					border: 0;

					background-color: #00b1b3;

					color: #fff;

					font-size: 14px;

				}

				.vid-overlay iframe

				{

					position: absolute;

					top: 0;

					bottom:0;

					left: 0;

					right: 0;

					margin: auto;

				}

				#editMode

				{

					display: block;

					margin-top: 20px;

				}

				label {

					color: #00b1b3;

					font-size: 16px;

					font-weight: 700;

					display: block;

					margin: 20px 0 10px 0;

				}

				.select-cat {

				    height: 35px !important;

				}

				input[name="edit"] {

				    background: #efc227;

				}

				input[name="delete"] {

				    background-color: #ff5e5e;

				}

				</style>

			</head>

			<body>

				<?php 

				global $wpdb;

				$body_parts = $wpdb->get_results("SELECT * FROM `dev_cura_body_parts` WHERE id > 0");

				function cmp($a, $b)

				{

					return strcmp($a->name, $b->name);

				}

				usort($body_parts, "cmp");

				// foreach ($body_parts as $key => $value) {		

				// 	print_r((array)$value);				

				// }

				?>

				<h1 style="margin: 40px 0;">Videos</h1>

				<a id="back" href="">Go Back to Videos List</a>

				<!-- update video form -->

				<form id="updateVideoForm" action="" method="POST" style="margin-bottom: 40px;">

					<h3 id="updateHeading"><span>Edit video : <?php echo str_replace(array('\"', "\'"),array('"', "'"), $_POST['edit-videoName']) ?></span></h3>

					<input class="form-control" type="text" name="updateVideoName" placeholder="Video Title" value="<?php echo str_replace(array('\"', "\'"),array('"', "'"), $_POST['edit-videoName']) ?>">

					<input class="form-control" type="text" name="updateVideoURL" placeholder="Video URL" value="<?php echo $_POST['edit-videoURL'] ?>">

					<select class="form-control-full select-cat" name="updateVideoCategory">

						<option value="" disabled="disabled" selected="selected">Select a category</option>

						<option value="Mobility" <?php echo ($_POST['edit-videoCat'] == 'Mobility') ? "selected='selected'" : ''  ?>>Mobility</option>

						<option value="Stability" <?php echo ($_POST['edit-videoCat'] == 'Stability') ? "selected='selected'" : ''  ?>>Stability</option>

						<option value="Strength" <?php echo ($_POST['edit-videoCat'] == 'Strength') ? "selected='selected'" : ''  ?>>Strength</option>

						<option value="Stretch" <?php echo ($_POST['edit-videoCat'] == 'Stretch') ? "selected='selected'" : ''  ?>>Stretch</option>

						<option value="Test" <?php echo ($_POST['edit-videoCat'] == 'Test') ? "selected='selected'" : ''  ?>>Test</option>

					</select>

					<select id="bodyParts" class="form-control-full" multiple name="updateAssoc_body_part_id[]">

						<option value="" disabled="disabled">Select a body part</option>

						<?php foreach ($body_parts as $key => $value){	?>

						<option value="<?php echo array_values((array)$value)[0] ?>" <?php echo (in_array(array_values((array)$value)[1], explode(',', $_POST['edit-videoAssocBodyPart']))) ? "selected='selected'" : ''  ?>>

							<?php echo array_values((array)$value)[1]; ?></option>

							<?php } ?>			

						</select>

						<textarea class="form-control" rows="5" name="updateVideoDesc" placeholder="Description"><?php echo str_replace(array('\"', "\'"),array('"', "'"), $_POST['edit-videoDesc']); ?></textarea>

						<br>

						<input type="hidden" name="updateVideoId" value="<?php echo $_POST['edit-videoId'] ?>">

						<input type="submit" name="updateVideo" value="Update">

						<iframe class="adminIframe" id="editMode" width="640" height="360" src="<?php echo $_POST['edit-videoURL'] ?>" frameborder="0" allowfullscreen></iframe>

					</form>



					<!-- Add new video form -->

					<form id="addVideoForm" action="" method="POST" style="margin-bottom: 40px;">

						<!-- new form here -->

						<input class="form-control" type="text" name="videoName" placeholder="Video Title">

						<input class="form-control" type="text" name="videoURL" placeholder="Video URL">

						<select class="form-control-full select-cat" name="videoCategory">

							<option value="" disabled="disabled" selected="selected">Select a category</option>

							<option value="Mobility">Mobility</option>

							<option value="Stability">Stability</option>

							<option value="Strength">Strength</option>

							<option value="Stretch">Stretch</option>

							<option value="Test">Test</option>

						</select>

						<select id="bodyParts" class="form-control-full" name="assoc_body_part_id[]" multiple >

							<option value="" disabled="disabled" selected="selected">Select a body part</option>

							<?php foreach ($body_parts as $key => $value){ ?>

							<option value="<?php echo array_values((array)$value)[0]; ?>"><?php echo array_values((array)$value)[1]; ?></option>

							<?php } ?>			

						</select>

						<textarea class="form-control" rows="5" name="videoDesc" placeholder="Description"></textarea>

						<br>

						<input type="submit" name="addVideo" value="Add">

					</form>



					<?php

					global $wpdb; 



	// Adding videos to DB

					if (isset($_POST['addVideo']) && !empty($_POST['videoName']) && !empty($_POST['videoURL']) && !empty($_POST['videoCategory']) && !empty($_POST['assoc_body_part_id'])){	

						$partsNameAdd = array();

						foreach($_POST['assoc_body_part_id'] as $key => $value){

							$partsNameAdd[] = $wpdb->get_col("SELECT name FROM `dev_cura_body_parts` WHERE id = $value");

						}

						$partsName = array();

						foreach($partsNameAdd as $key => $value){

							foreach($value as $key2 => $value2){

								$partsName[] =  $value2;

							}

						} 

						$idsAdd = implode(',', $_POST['assoc_body_part_id']);						

						$parts = implode(',', $partsName);

						$table = 'dev_cura_exercise_videos';

						$data = array(

							'category_name' => ucfirst($_POST['videoCategory']),

							'assoc_body_part_id' => $idsAdd,

							'assoc_body_parts_name' => $parts,

							'name' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['videoName'])),

							'description' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['videoDesc'])),

							'url' => $_POST['videoURL'],

							);

						

						$wpdb->insert( $table, $data);

					}

					

					$fetchResults = $wpdb->get_results("SELECT * FROM `dev_cura_exercise_videos` WHERE id > 0");

					usort($fetchResults, "cmp");





	// Deleting videos from DB

					if (isset($_POST['delete']) && isset($_POST['video_id'])) {

						global $wpdb;

						$table = 'dev_cura_exercise_videos';

						$where = array('id' => $_POST['video_id']);

						$wpdb->delete($table, $where); 

					}

					$fetchResults = $wpdb->get_results("SELECT * FROM `dev_cura_exercise_videos` WHERE id > 0");

					usort($fetchResults, "cmp");



	// Updating videos in DB

					if (isset($_POST['updateVideo']) && !empty($_POST['updateVideoName']) && !empty($_POST['updateVideoURL']) && !empty($_POST['updateVideoCategory']) && !empty($_POST['updateAssoc_body_part_id'])){

						$partsNameAdd = array();

						foreach($_POST['updateAssoc_body_part_id'] as $key => $value){

							$partsNameAdd[] = $wpdb->get_col("SELECT name FROM `dev_cura_body_parts` WHERE id = $value");

						}

						$partsName = array();

						foreach($partsNameAdd as $key => $value){

							foreach($value as $key2 => $value2){

								$partsName[] =  $value2;

							}

						} 

						$ids = implode(',', $_POST['updateAssoc_body_part_id']);

						$parts = implode(',', $partsName);

						$table = 'dev_cura_exercise_videos';

						$data = array(

							'category_name' => ucfirst($_POST['updateVideoCategory']),

							'assoc_body_part_id' => $ids,

							'assoc_body_parts_name' => $parts,

							'name' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['updateVideoName'])),

							'description' => str_replace(array('\"', "\'"),array('"', "'"), ucfirst($_POST['updateVideoDesc'])),

							'url' => $_POST['updateVideoURL'],

							);

						$where = array('id' => $_POST['updateVideoId']);										

 						$wpdb->update( $table, $data, $where);

						$fetchResults = $wpdb->get_results("SELECT * FROM `dev_cura_exercise_videos` WHERE id > 0");

						usort($fetchResults, "cmp");

					}



	// Searching videos with specific body parts

					if (isset($_POST['searchSelect']) && !empty($_POST['searchSelect']) && isset($_POST['search'])) {

						$idToSearch = $_POST['searchSelect'];

						$searchResults = $wpdb->get_results("SELECT * FROM `dev_cura_exercise_videos` WHERE assoc_body_parts_name LIKE '%$idToSearch%'");

						usort($searchResults, "cmp");

						// echo "<pre>";

						// print_r($searchResults);

						// echo "</pre>";

						

					}

					?>

					<div class="searchVids">

						<form action="" method="post">

							<label>Filter Videos by Body Parts</label>

							<select class="form-control" name="searchSelect">

								<option value="">View All</option>

								<?php foreach ($body_parts as $key => $value){	?>

									<option value="<?php echo array_values((array)$value)[1] ?>"<?php echo (isset($_POST['search']) && $_POST['searchSelect'] == array_values((array)$value)[1]) ? 'selected' : '' ?>><?php echo array_values((array)$value)[1]; ?></option>

								<?php } ?>			

							</select>

							<input type="submit" name="search" value="Search">

						</form>

					</div>



					<table id="videos">	

						<th id= "sr">Sr No.</th>

						<th id= "title">Video Title</th>

						<th id= "cat">Video Category</th>

						<th id= "bodyparts">Body Part(s)</th>

						<th id= "desc">Description</th>

						<th id= "actions">Actions</th>

						<?php 

						$count = 0;

						if (isset($_POST['searchSelect']) && !empty($_POST['searchSelect']) && isset($_POST['search'])) {

							foreach ($searchResults as $key => $value) {

								$count++;

								$video_id = $value->id; 

								$video_cat = $value->category_name;

								$video_name = $value->name;

								$assoc_body_parts = explode(',', $value->assoc_body_parts_name);

								$video_desc = $value->description;

								$video_url = $value->url;

								?>

								<tr>

									<td><?php echo $count ?></td>	

									<td><?php echo $video_name ?></td>	

									<td><?php echo $video_cat ?></td>	

									<td id="bodyParts">



										<?php 

										foreach ($assoc_body_parts as $key => $value) {

											// $body_parts_with_id = $wpdb->get_row("SELECT name FROM `dev_cura_body_parts` WHERE id = $value", ARRAY_A);

											echo "<span id='body-parts'>".$value."</span>" ;

										}

										?>

									</td>	

									<td><?php echo $video_desc?></td>	



									<td>

										<form id ="editForm" action="" method="POST">

											<input type="hidden" name="edit-videoId" value="<?php echo $video_id ?>">

											<input type="hidden" name="edit-videoCat" value="<?php echo $video_cat ?>">

											<input type="hidden" name="edit-videoName" value="<?php echo $video_name ?>">

											<input type="hidden" name="edit-videoAssocBodyPart" value="<?php echo implode(',',$assoc_body_parts ) ?>">

											<input type="hidden" name="edit-videoDesc" value="<?php echo $video_desc ?>"> 

											<input type="hidden" name="edit-videoURL" value="<?php echo $video_url ?>"> 

											<input type='submit' name="edit" value="Edit">

										</form>

										<form id ="deleteForm" action="" method="POST">

											<input type="hidden" name="video_id" value="<?php echo $video_id ?>"> 

											<input type='submit' name="delete" value="Delete">

										</form>

										<button class="playVid" data-video="<?php echo $video_url ?>">Play</button>

										<div class="vid-overlay">											

										</div>

									</td>

								</tr>

								<?php } 

							}

							else{



								foreach ($fetchResults as $key => $value) {

									usort($fetchResults, "cmp");

									$count++;

									$video_id = $value->id; 

									$video_cat = $value->category_name;

									$video_name = $value->name;

									$assoc_body_parts = explode(',', $value->assoc_body_parts_name);

									$video_desc = $value->description;

									$video_url = $value->url;

									?>

									<tr>

										<td><?php echo $count ?></td>	

										<td><?php echo $video_name ?></td>	

										<td><?php echo $video_cat ?></td>	

										<td id="bodyParts">



											<?php 

											foreach ($assoc_body_parts as $key => $value) {

												// $body_parts_with_id = $wpdb->get_row("SELECT name FROM `dev_cura_body_parts` WHERE id = $value", ARRAY_A);

												echo "<span id='body-parts'>".$value."</span>" ;

											}

												// print_r($assoc_body_part_id);

											?>

										</td>	

										<td><?php echo $video_desc?></td>	



										<td>

											<form id ="editForm" action="" method="POST">

												<input type="hidden" name="edit-videoId" value="<?php echo $video_id ?>">

												<input type="hidden" name="edit-videoCat" value="<?php echo $video_cat ?>">

												<input type="hidden" name="edit-videoName" value="<?php echo $video_name ?>">

												<input type="hidden" name="edit-videoAssocBodyPart" value="<?php echo implode(',',$assoc_body_parts ) ?>">

												<input type="hidden" name="edit-videoDesc" value="<?php echo $video_desc ?>"> 

												<input type="hidden" name="edit-videoURL" value="<?php echo $video_url ?>"> 

												<input type='submit' name="edit" value="Edit">

											</form>

											<form id ="deleteForm" action="" method="POST">

												<input type="hidden" name="video_id" value="<?php echo $video_id ?>"> 

												<input type='submit' name="delete" value="Delete">

											</form>

											<button class="playVid" data-video="<?php echo $video_url ?>">Play</button>

											<div class="vid-overlay">											

											</div>

										</td>

									</tr>

									<?php }

								} ?>

							</table>

						<!--<script src="<?php echo site_url(); ?>/wp-content/plugins/Curastream/select2/dist/js/jquery.min.js" type="text/javascript"></script>

						<script src="<?php echo site_url(); ?>/wp-content/plugins/Curastream/select2/dist/js/select2.min.js" type="text/javascript"></script>-->



						<script type="text/javascript">

							// jQuery(document).ready(function() {

	  				// 			jQuery('.multiple').select2();

	  				// 			jQuery('.multiple').select2({

							//   		placeholder: 'Select an option'

							// 	});

	  				// 		});



							jQuery('.playVid').click(function(){

								jQuery(this).siblings('.vid-overlay').append('<span class="closeVid">X</span><iframe class="adminIframe"  width="640" height="360" src="" frameborder="0" allowfullscreen></iframe>');

								jQuery(this).siblings('.vid-overlay').children('iframe').attr('src', jQuery(this).data('video'));

								jQuery(this).siblings('.vid-overlay').css('display','block');

							})					

							jQuery('.vid-overlay').click(function(){

								jQuery(this).empty();

								jQuery(this).css('display', 'none');

								// jQuery(window).volume = 0;

							})



</script>

</body>

</html>