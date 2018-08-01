<?php 

$path = dirname(dirname(dirname(dirname(__FILE__))));

include_once $path . '/wp-config.php';

include_once $path . '/wp-load.php';

include_once $path . '/wp-includes/wp-db.php';

include_once $path . '/wp-includes/pluggable.php';

// fetch exercises for program module

if (isset($_POST['getVideos']) && !empty($_POST['getVideos'])) { 

	$body_parts = $wpdb->get_results("SELECT * FROM `dev_cura_body_parts` WHERE id > 0", ARRAY_A); 

	foreach ($body_parts as $key => $row) {

	    $name[$key]  = $row['name'];

	}

	array_multisort($name, SORT_ASC, $body_parts);

	?>



	<div class="searchVids">

		<label>Filter Videos by Body Parts</label>

		<div class="listVideos">

			<div class="row">

				<div class="col-md-5">

				<select class="form-control" name="searchSelect">

					<option value="">View All</option>

					<?php foreach ($body_parts as $key => $value){	?>

						<option value="<?php echo $value['name'];?>"><?php echo $value['name'];?></option>

					<?php } ?>			

				</select>

			</div>

			<div class="col-md-3">

				<input id="searchVideos" type="submit" name="search" value="Search">

			</div>

			</div>

		</div>

	</div>

	<table id="videos" class="table">	

		<thead>

			<th id= "sr">Sr No.</th>

			<th id= "title">Video Title</th>

			<th id= "cat">Video Category</th>

			<th id= "parts">Associated Parts</th>

			<th id="use">Action</th>

		</thead>

		<tbody style="height:200px">

		<?php 

		$count = 0;

		

		$videos = $wpdb->get_results("SELECT * FROM `dev_cura_exercise_videos` WHERE id > 0", ARRAY_A);

		foreach ($videos as $keys => $rows) {

		    $names[$keys]  = $rows['name'];

		}

		array_multisort($names, SORT_ASC, $videos);



		foreach ($videos as $key => $value) {

			$count++;

			$video_id = $value['id'];

			$video_cat = $value['category_name'];

			$video_name = $value['name'];

			$video_parts = explode(',', $value['assoc_body_parts_name']);

			// $assoc_body_part_id = explode(',', $value['assoc_body_part_id')];

			$video_url = $value['url'];

			?>

			<tr>

				<td><?php echo $count ?></td>	

				<td><?php echo $video_name ?></td>	

				<td><?php echo $video_cat ?></td>

				<td>

					<?php 

						foreach ($video_parts as $key => $value) {

							// $body_parts_with_id = $wpdb->get_row("SELECT name FROM `dev_cura_body_parts` WHERE id = $value", ARRAY_A);

							echo "<span class='body-parts'>".$value."</span>" ;

						}

					?>

				</td>				

				<td id="actions">

					<span class="useButton" data-part="<?php echo $video_name ?>" data-video-url="<?php echo $video_url ?>">Use this video</span>

				</td>

			</tr>

		<?php } ?>

		</tbody>

	</table>

	<script type="text/javascript">

	 jQuery('#searchVideos').on('click', function(event){

			filter = new RegExp(jQuery(this).parents('.fetchVideos').find('select').val(),'i');

			jQuery("#videos tbody tr").filter(function(){

				jQuery(this).each(function(){

					found = false;

					jQuery(this).children().eq(3).each(function(){

						content = jQuery(this).html();

						if(content.match(filter))

						{

							found = true

						}

					});

					if(!found)

					{

						jQuery(this).hide();

						

					}

					else

					{

						jQuery(this).show();

					}

				});

			});

		})

</script>

<?php } ?>

