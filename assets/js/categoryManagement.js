
var JS_DEBUG = true;

if(JS_DEBUG){console.log("Welcome to the Category Management Script");}

// Table Filtering 
jQuery(document).ready(function(){
	jQuery('#bodyParts').DataTable({
		paging: false,
		 "columns": [
   	null,
    null,
    null,
     { "searchable": false },
     { "searchable": false }
  ]
	});
});

jQuery(document).ready(function(){
	jQuery('#injuryType').DataTable({
		paging: false,
		 "columns": [
   	null,
    null,
    null,
     { "searchable": false },
     { "searchable": false }
  ]
	});
});

jQuery(document).ready(function(){
	jQuery('#sportsAndOccupations').DataTable({
		paging: false,
		 "columns": [
   	null,
    null,
    null,
     { "searchable": false },
     { "searchable": false },
     { "searchable": false }
  ]
	});
});

jQuery(document).ready(function(){
	jQuery('#exerciseVideos').DataTable({
		paging: false,
		 "columns": [
   	null,
    null,
      { "searchable": false },
     { "searchable": false },
     null,
     null,
     { "searchable": false }
  ]
	});
});
jQuery(document).ready(function(){
	jQuery('#programMetrics').DataTable({
		paging: false,
		 "columns": [
   	null,
    null,
    null,
    null,
    null,
    null,
    null,
    { "searchable": false }
  ]
	});
});
jQuery(document).ready(function(){
	jQuery('#customProgramMetrics').DataTable({
		paging: false,
		 "columns": [
   	null,
    null,
    null,
    null,
    null,
    null,
    null,
    { "searchable": false }
  ]
	});
});

// Save Buttons 

// Assign Custom Program 

jQuery('#newBodyPartSave').live('click', function(event){

	console.log("Going to Save a New Body Part");
	var bodyPart = jQuery("#newBodyPartText").val();
	console.log("Body Part"+bodyPart);
	if(bodyPart.trim() ==""){
		console.log("Error - Pleaes Enter a Body Part")
		jQuery("#newBodyPartText").after('<div id="bodyPartAddError" class="alertError">Please Enter a Body Part</div>');
	}else{
		jQuery("bodyPartAddError").remove();
		var data = {
			'action': 'createANewBodyPart',
			'name': bodyPart
		};
	
			// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			 jQuery("#newBodyPartSave").after('<div class="alertSuccess">Body Part: '+ bodyPart+' - Added</div>');
			var table = jQuery('#bodyParts').DataTable();
			table.row.add([ bodyPart,'<input type="text" placeholder="Update '+bodyPart+'">','0','<i class="showHideAll fas fa-2x fa-angle-down"></i>	<div class="hidden showData"></div>','<button>Save</button><button>Delete</button>']).draw();
			jQuery("#newBodyPartText").val("");

		// Load the form in the html object
			}else{
				 jQuery("#newBodyPartSave").after('<div class="alertError">Body Part: '+ bodyPart+' - Not Added</div>');
			}
		}
	 	});
		}
	});

// Injury Type

jQuery('#newInjuryTypeSave').live('click', function(event){

	console.log("Going to Save a New Injury Type");
	var injuryType = jQuery("#newInjuryTypeText").val();
	console.log("Injury Type"+injuryType);
	if(injuryType.trim() ==""){
		console.log("Error - Pleaes Enter a Injury Type");
		jQuery("#newInjuryTypeText").after('<div id="injuryTypeAddError" class="alertError">Please Enter a Injury Type</div>');
	}else{
		jQuery("injuryTypeAddError").remove();
		var data = {
			'action': 'createANewHowItHappened',
			'name': injuryType
		};

			// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			 jQuery("#newInjuryTypeSave").after('<div class="alertSuccess">How it Happened: '+ injuryType+' - Added</div>');
			var table = jQuery('#injuryType').DataTable();
			table.row.add([ injuryType,'<input type="text" placeholder="Update '+injuryType+'">','0','<i class="showHideAll fas fa-2x fa-angle-down"></i>	<div class="hidden showData"></div>','<button>Save</button><button>Delete</button>']).draw();
			jQuery("#newInjuryTypeText").val("");

		// Load the form in the html object
			}else{
				 jQuery("#newInjuryTypeSave").after('<div class="alertError">How it Happened:  '+ injuryType+' - Not Added</div>');
			}
		}
	 	});
		}
	});

jQuery('#newSportOccSave').live('click', function(event){

	console.log("Going to Save a New Sport or Occupation");
	var sportOcc = jQuery("#newSportOccText").val();
	console.log("Sport / Occ "+sportOcc);
	var sOType = jQuery("#newSportOccType option:selected").val();
	console.log("Sport / Occ Type "+sOType);
	if(sportOcc.trim() ==""){
		console.log("Error - Pleaes Enter a Sport or Occupation");
		jQuery("#newSportOccText").after('<div id="sportOccError" class="alertError">Please Enter a Sport or Occupation</div>');
	}else{
		jQuery("sportOccError").remove();
		if(sOType.trim() =="sport"){
			var data = {
			'action': 'createANewSport',
			'name': sportOcc
	 		};
		}
		else if(sOType.trim() =="occupation"){
			var data = {
			'action': 'createANewOccupation',
			'name': sportOcc
	 		};
		}

			// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			if(sOType.trim() =="sport"){
				jQuery("#newSportOccSave").after('<div class="alertSuccess">Sport: '+ sportOcc+' - Added</div>');
				var table = jQuery('#sportsAndOccupations').DataTable();
				table.row.add([ sportOcc,'sport <button>Toggle Type</button>','<input type="text" placeholder="Update '+sportOcc+'">','0','<i class="showHideAll fas fa-2x fa-angle-down"></i>	<div class="hidden showData"></div>','<button>Save</button><button>Delete</button>']).draw();
			}else if(sOType.trim() =="occupation"){
				jQuery("#newSportOccSave").after('<div class="alertSuccess">Occupation: '+ sportOcc+' - Added</div>');
				var table = jQuery('#sportsAndOccupations').DataTable();
				table.row.add([ sportOcc,'occupation <button>Toggle Type</button>','<input type="text" placeholder="Update '+sportOcc+'">','0','<i class="showHideAll fas fa-2x fa-angle-down"></i>	<div class="hidden showData"></div>','<button>Save</button><button>Delete</button>']).draw();
			
			}
			jQuery("#newSportOccText").val("");

		// Load the form in the html object
			}else{
				 jQuery("#newSportOccSave").after('<div class="alertError">Error - Sport | Occupation: '+ sportOcc+' - Not Added</div>');
			}
		}
	 	});
		}
	});
jQuery(".updatePartButton").on('click', function(event){
		if(JS_DEBUG){console.log("Starting to Update an Injury Name");}
		// Get the Name 
		var partId = jQuery(this).attr('data-exerciseId');
		console.log("Part Id"+exerciseVideoId);
		var nameID = "#updateName"+exerciseVideoId;
		console.log("New Name"+newName);
		var categoryType = jQuery(this).attr('data-type')

		if(newName.trim() !=""){		
			if(categoryType == "Body"){
				var data = {
				'action': 'updateBodyPart',
				'partId': exerciseVideoId,
				'name': newName,
				};
			}
			elseif(categoryType == "Injury"){
				var data = {
				'action': 'updateHowItHappened',
				'partId': exerciseVideoId,
				'name': newName,
				};
			}
			elseif(categoryType == "Sport"){
				var data = {
				'action': 'updateSportsAndOccupation',
				'partId': exerciseVideoId,
				'name': newName,
				};
			}

			// Post to Ajax
			jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
				// This should be returnin"g HTML object 
					//console.log("Data: "+ data);
					//console.log("Results: "+ response);
				// Find the HTML Object where we want to load the form into 
				if(response !=null){	
				// Find the table body tag 
				console.log(response);
					location.reload();
					}else{
						console.log("Error Updating Part");
					}
				}
			});
			}else{
				alert("Please enter a new Exercise Name or a new Vimeo URL");
		}
	}); 