/* This script file is used to manage the jQuery needs of the custom program builder 
* This variable debug is used to enable debugging at a global level 
*/
var JS_DEBUG = true;

if(JS_DEBUG){console.log("Welcome to the Custom ProgramUI Builder Script");}
// Enable select 2 Functionality 
jQuery(document).ready(function() {
    jQuery('.enableSelect2').select2();
});

///////////////////////// Fuctions used on the Custom Program Creation Page - Top Buttons ///////////////////////
// These fucntions are used to display the differnt button options on the Custom Programs page 
// when you start to edit or customize a program 

	jQuery(".generalProgram").on('click', function(event){
		if(JS_DEBUG){console.log("Step 1: Clicked General Program Button ");}
		jQuery(".general_newModify").removeClass("hidden");
		jQuery(".custom_newModify").addClass("hidden");
		jQuery(".customProgram_selectUser").addClass("hidden");
		jQuery(".custom_modifyExisting").addClass("hidden");
		jQuery(".customProgram_modifyExisting").addClass("hidden");
		jQuery(".customProgram_createNewOrCopy").addClass("hidden");

	});

jQuery(".generalProgram_createNew").on('click', function(event){
		if(JS_DEBUG){console.log("Step 2: Clicked Create General Program Button");}
		jQuery(".gernalProgram_createNewOrCopy").removeClass("hidden");
		jQuery(".gernalProgram_modifyExisting").addClass("hidden");
	});

jQuery(".generalProgram_modifyExisting").on('click', function(event){
		if(JS_DEBUG){console.log("Step 2: Clicked Exit Existing Custom Program Button");}
		jQuery(".gernalProgram_modifyExisting").removeClass("hidden");
		jQuery(".gernalProgram_createNewOrCopy").addClass("hidden");

	});
jQuery(".customProgram").on('click', function(event){
		if(JS_DEBUG){console.log("Step 1: Clicked Custom Program Button");}
		jQuery(".custom_newModify").removeClass("hidden");
		jQuery(".general_newModify").addClass("hidden");
		jQuery(".gernalProgram_createNewOrCopy").addClass("hidden");
		jQuery(".gernalProgram_modifyExisting").addClass("hidden");
	});
jQuery(".custom_createNew").on('click', function(event){
		if(JS_DEBUG){console.log("Step 2: Clicked Create Custom Program Button");}
		jQuery(".customProgram_selectUser").removeClass("hidden");
		jQuery(".customProgram_modifyExisting").addClass("hidden");
	});
jQuery(".custom_modifyExisting").on('click', function(event){
		if(JS_DEBUG){console.log("Step 2: Clicked Edit Existing Custom Program Button");}
		jQuery(".customProgram_modifyExisting").removeClass("hidden");
		jQuery(".customProgram_selectUser").addClass("hidden");
		jQuery(".customProgram_createNewOrCopy").addClass("hidden");
	});
jQuery(".customProgram_selectUser").on('change', function(event){
		if(JS_DEBUG){console.log("Step 3: Selected a User ");}
		jQuery(".customProgram_createNewOrCopy").removeClass("hidden");
	});
///////////////////////// Fuctions used on the Custom Program Creation Page - Call to Actions ///////////////////////
jQuery("#generalProgram_startfromScratch").on('click', function(event){
		if(JS_DEBUG){console.log("Step 3: Clicked Start a Gernal Program from generalProgram_startfromScratch");}
		var programName = jQuery("#generalProgram_StartFromScratchName").val();
		if(programName.trim()){
		jQuery(".alertArea").append('<div class="alertLog alertNotice">Creating a general program from scratch with the name: '+programName+'</div>');
		
		var data = {
		'action': 'createNewProgram',
		'programName': programName
		};
	// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Data: "+ data);
			//console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response !=null){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">New program '+programName+' created</div>');
		// Load the form in the html object
		// insert a new phase into the webpage
			jQuery(".programEditingArea").html(response);
		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program not created - Error code: AJAX - createNewProgram</div>');
			}
		}
		});
		}else{
			// No Program Name Specified
			jQuery(".alertArea").append('<div class="alertLog alertError">Please ender a program name</div>');		
		}
	}); 
jQuery("#customProgram_startfromScratch").on('click', function(event){
		if(JS_DEBUG){console.log("Step 4: Clicked Start a Custom Program from customProgram_startfromScratch");}
		
		var userName = jQuery("#selectUser").select2('data');
		jQuery(".alertArea").append('<div class="alertLog alertNotice">Creating a custom program from scratch for: '+userName[0].text+" - "+ userName[0].id+ '</div>');
		var programName = "Custom Program for "+userName[0].text;  
		console.log(programName); 
		console.log(userName[0].id); 
		var data = {
		'action': 'createNewCustomProgram',
		'programName': programName,
		'temp_user_id':userName[0].id
		};
	// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Data: "+ data);
			//console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response !=null){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">New program '+programName+' created</div>');
		// Load the form in the html object
		// insert a new phase into the webpage
			jQuery(".programEditingArea").html(response);
		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program not created - Error code: AJAX - createNewProgram</div>');
			}
		}
		});
	}); 

jQuery("#generalProgram_edit").on('click', function(event){
		if(JS_DEBUG){console.log("Step 3: Clicked edit a general Program generalProgram_edit");}
		var programID = jQuery("#generalExistingProgramEdit").val();
		console.log("Program ID"+ programID);
		
		jQuery(".alertArea").append('<div class="alertLog alertNotice">Editing the general program with the id of '+programID+'</div>');
		var data = {
		'action': 'modifyExisitngProgram',
		'programId': programID
		};
	// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Data: "+ data);
			//console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response !=null){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">General Program with id of '+ programID +' loaded</div>');
		// Load the form in the html object
		// insert a new phase into the webpage
			jQuery(".programEditingArea").html(response);
		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program not loaded - Error code: AJAX - modifyExisitngProgram</div>');
			}
		}
		});
	}); 
jQuery("#customProgram_edit").on('click', function(event){
		if(JS_DEBUG){console.log("Step 3: Clicked edit a Custom Program customProgram_edit");}
		var programID = jQuery("#customExistingProgramEdit").val();
		console.log("Program ID"+ programID);
		
		jQuery(".alertArea").append('<div class="alertLog alertNotice">Editing the general program with the id of '+programID+'</div>');
		var data = {
		'action': 'modifyExisitngProgram',
		'programId': programID
		};
	// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Data: "+ data);
			//console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response !=null){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">General Program with id of '+ programID +' loaded</div>');
		// Load the form in the html object
		// insert a new phase into the webpage
			jQuery(".programEditingArea").html(response);
		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program not loaded - Error code: AJAX - modifyExisitngProgram</div>');
			}
		}
		});
	}); 

jQuery("#generalProgram_copyAndedit").on('click', function(event){
		if(JS_DEBUG){console.log("Step 3: Clicked Copy an Existing Program and edit from  generalProgram_copyAndedit");}
		var programID = jQuery("#generalProgramexistingProgram").val();
		console.log("Program ID"+ programID);
		
		jQuery(".alertArea").append('<div class="alertLog">Creating a General Program from the existing program</div>');
		// Copy the program and display
		var data = {
		'action': 'copyAndEditGeneralExisting',
		'existingProgram': programID
		};
	// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Data: "+ data);
			//console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response !=null){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">General Program with id of '+ programID +' loaded</div>');
		// Load the form in the html object
		// insert a new phase into the webpage
			jQuery(".programEditingArea").html(response);
		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program not loaded - Error code: AJAX - copyAndEditGeneralExisting</div>');
			}
		}
		});
	}); 
jQuery("#customProgram_copyAndedit").on('click', function(event){
		if(JS_DEBUG){console.log("Step 4: Clicked Copy an Existing Program and edit from  customProgram_copyAndedit");}
		var programID = jQuery("#existingProgram").val();
		var userName = jQuery("#selectUser").select2('data');
		console.log("Program ID"+ programID);
		
		jQuery(".alertArea").append('<div class="alertLog">Creating a Custom Program from the existing program</div>');
		// Copy the program and display
		var data = {
		'action': 'copyAndEditCustomExisting',
		'existingProgram': programID,
		'temp_user_id':userName[0].id
		};
	// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Data: "+ data);
			//console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response !=null){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Custom Program with id of '+ programID +' loaded</div>');
		// Load the form in the html object
		// insert a new phase into the webpage
			jQuery(".programEditingArea").html(response);
		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program not loaded - Error code: AJAX - copyAndEditCustomExisting</div>');
			}
		}
		});
	}); 

jQuery(".addPhase").live('click', function(event){
		if(JS_DEBUG){console.log("Adding a new Phase");}
		jQuery(".alertArea").append('<div class="alertLog alertNotice">Adding a new Phase</div>');

		var programID = jQuery("#theProgramMetaId").attr('data-programid');
		console.log("Program ID"+ programID);
		var finalOrder = jQuery(this).parent().parent().parent().prev().attr('data-phase-order');
		console.log("Previous Phase Order Lookup "+finalOrder);
		if(typeof finalOrder === "undefined"){
			finalOrder = 1
		}else{
			finalOrder++; 
		}
		console.log("Phase Final Order "+finalOrder);
		var currentElement = jQuery(this);
		// add a new phase to the database ajax and reorder
		var data = {
		'action': 'addPhaseToProgram',
		'programId': programID,
		'finalOrder': finalOrder
		};
	// Post to Ajax
	jQuery.ajax({type:'POST',data,url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Copied Program - "+response);
			resultObj = response;
			//console.log(resultObj);
			//console.log(data);
		// Find the HTML Object where we want to load the form into 
		if(resultObj !=null){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Phase Added</div>');
		// Load the form in the html object
		//console.log(resultObj);
		// insert a new phase into the webpage
		console.log(currentElement);
		currentElement.parent().parent().parent().before(resultObj);
		currentElement.parent().parent().parent().remove();
		updatePhaseOrder();
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError">Error: Phase Not Added</div>');
			}
		}
	});
});
jQuery(".removePhase").live('click', function(event){
		if(JS_DEBUG){console.log("Removing a  Phase");}
		jQuery(".alertArea").append('<div class="alertLog alertNotice">Removing a Phase </div>');
		var phaseToDelete = jQuery(this);
		
		var programID = jQuery("#theProgramMetaId").attr('data-programid');
		console.log("Program ID"+ programID);
		var phaseOrder = jQuery(this).closest(".phaseContainer").attr('data-phase-order');
		console.log("Phase Order Lookup"+phaseOrder);
		var phaseId = jQuery(this).closest(".phaseHeader").attr('data-phase-id');

		console.log("Phase Final Order"+phaseOrder);
		// add a new phase to the database ajax and reorder
		var data = {
		'action': 'deleteReorderPhase',
		'programId': programID,
		'phaseId': phaseId,
		'initialOrder' : phaseOrder
		};
	// Post to Ajax
	jQuery.ajax({type:'POST',data,url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			resultObj = response;
		// Find the HTML Object where we want to load the form into 
		if(resultObj !=null){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Phase Removed</div>');
		phaseToDelete.parent().parent().parent().parent().prev(".addPhaseContainer").remove();
		phaseToDelete.parent().parent().parent().parent().remove(); 
		updatePhaseOrder();
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError">Error: Phase Not Removed</div>');
			}
		}
	});
});

// update phase Order 
function updatePhaseOrder(){
	console.log("Update Phase Order");
	order = 1
	jQuery(".phaseContainer").each(function(){
		console.log("Current Phase Order:"+jQuery(this).attr('data-phase-order'));
		console.log("New Phase Order:"+order);
		jQuery(this).attr('data-phase-order',order);
		var phaseID = jQuery(this).children('.phaseHeader').attr('data-phase-id');
		console.log("Phase Id:"+phaseID);
		order ++;
	});
}



// Show Exercise Selected 
jQuery(".addExerciseShow").live('click', function(event){
	if(JS_DEBUG){console.log("Going to show the Add an Exercise");}
	var currentElement = jQuery(this);
		var data = {
		'action': 'addExerciseChooser',
		};
		// ensure the datasbse has been updated
		jQuery.ajax({type:'POST',data,url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){	
			resultObj = response;
			
if(resultObj !=null){
			jQuery(".alertArea").append('<div class="alertLog">Loading Avaiable Exercise Videos</div>');
		// Load the form in the html object
		//console.log(resultObj);
		// insert a new phase into the webpage
		//console.log(currentElement);
		currentElement.parent().parent().parent().after(resultObj);
		currentElement.parent().parent().parent().hide();
					    jQuery('.enableSelect2').select2();
			}else{
				jQuery(".alertArea").append('<div class="alertLog">Error: Exercise Not Added</div>');
			}
		}
	});
		// get a new phase object via aJAX 
		// get a new add phase button via Ajax 
		// insert a new phase into the webpage
});
// used to remove a show exercise 
jQuery(".closeAddExercise").live('click', function(event){
	if(JS_DEBUG){console.log("Going to close an exercise");}
	jQuery(this).parent().parent().parent().prev(".addExerciseMainContainer").show();
	jQuery(this).parent().parent().parent().remove();
});
// Add an Exercise to Jquery 
jQuery(".addExercise").live('click', function(event){
		if(JS_DEBUG){console.log("Adding a new Exercise");}
		var programID = jQuery("#theProgramMetaId").attr('data-programid');
		console.log("Program ID "+programID);
		// determine the phase of the new exercise 
		var phaseId = jQuery(this).closest(".phaseContainer").children(".phaseHeader").attr("data-phase-id");
		console.log("Phase ID "+phaseId);
		var exerciseID = jQuery(".addExerciseSelecter").val();
		console.log("Exercise ID "+exerciseID);

		// determine the location of the new exercise
		console.log(jQuery(this).closest(".addExerciseContent"));
		var finalOrder = jQuery(this).closest(".exercises").attr('data-ordernumber');
		console.log("Previous Phase Order Lookup"+finalOrder);
		if(typeof finalOrder === "undefined"){
			finalOrder = 1
		}else{
			finalOrder++; 
		}
		console.log("Final Order "+finalOrder);
		// add a new exercise to the database ajax
		var currentElement = jQuery(this);
		var parentElement = jQuery(this).closest(".phaseContainer");
		// add a new phase to the database ajax and reorder
		var data = {
		'action': 'addExerciseToPhase',
		'programID': programID,
		'exerciseId': exerciseID,
		'phaseId': phaseId,
		'finalOrder':finalOrder	};
		// ensure the datasbse has been updated
		jQuery.ajax({type:'POST',data,url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Copied Program - "+response);
			resultObj = response;
			//console.log(resultObj);
		// Find the HTML Object where we want to load the form into 
		if(resultObj !=null){
			jQuery(".alertArea").append('<div class="alertLog">Exercise Added</div>');
		// Load the form in the html object
		//console.log(resultObj);
		// insert a new phase into the webpage
		//console.log(currentElement);
		currentElement.parent().parent().parent().parent().before(resultObj);
		currentElement.parent().parent().parent().parent().remove();
		updateExerciseOrder(parentElement);
			}else{
				jQuery(".alertArea").append('<div class="alertLog">Error: Exercise Not Added</div>');
			}
		}
	});

});

function updateExerciseOrder(location){
	console.log("Update Exercise Order");
	order = 1
	console.log(jQuery(location));

	jQuery(location).children(".exercises").each(function(){

		console.log("Current Exercise Order:"+jQuery(this).attr('data-ordernumber'));
		console.log("New Exercise Order:"+order);
		jQuery(this).attr('data-ordernumber',order);
		var exerciseID = jQuery(this).attr('data-exerciseID')
		console.log("Exercise Id:"+exerciseID);
		
		order ++;
	});
}

// Used to hide an exercise details 
jQuery(".exerciseExpandHide").live('click', function(event){
	if(JS_DEBUG){console.log("Going to hide or show a Exercise");}
	jQuery(this).parent().parent().next(".exerciseDetails").toggle();
	if(jQuery(this).hasClass("fa-angle-double-up")){
		jQuery(this).removeClass("fa-angle-double-up");
		jQuery(this).addClass("fa-angle-double-down");
	}else if(jQuery(this).hasClass("fa-angle-double-down")){
		jQuery(this).removeClass("fa-angle-double-down");
		jQuery(this).addClass("fa-angle-double-up");
	}
});
jQuery(".phaseExpandHide").live('click', function(event){
	if(JS_DEBUG){console.log("Entering the Hide Show Phaese Function");}
	if(jQuery(this).hasClass("fa-angle-double-up")){
	if(JS_DEBUG){console.log("Going to hide all Exercises in Phase");}
	jQuery(this).parent().parent().parent().nextAll(".exercises").each(function() {
		console.log("Found an Exercise");
		jQuery(this).children(".exerciseDetails").hide();
		 jQuery(this).children(".exerciseHeader").children(".col-md-1").children(".exerciseExpandHide").removeClass("fa-angle-double-up");
		 jQuery(this).children(".exerciseHeader").children(".col-md-1").children(".exerciseExpandHide").addClass("fa-angle-double-down");

	});
		jQuery(this).removeClass("fa-angle-double-up");
		jQuery(this).addClass("fa-angle-double-down");
	}else if(jQuery(this).hasClass("fa-angle-double-down")){
	if(JS_DEBUG){console.log("Going to show all Exercises in Phase");}
		jQuery(this).parent().parent().parent().nextAll(".exercises").each(function() {
			console.log("Found an Exercise");
			jQuery(this).children(".exerciseDetails").show();
			 jQuery(this).children(".exerciseHeader").children(".col-md-1").children(".exerciseExpandHide").removeClass("fa-angle-double-down");
			 jQuery(this).children(".exerciseHeader").children(".col-md-1").children(".exerciseExpandHide").addClass("fa-angle-double-up");

		});
		jQuery(this).removeClass("fa-angle-double-down");
		jQuery(this).addClass("fa-angle-double-up");
	}
});
jQuery(".phaseHideAll").live('click', function(event){
	if(JS_DEBUG){console.log("Entering the Hide all exercises in Phaese Function");}
	if(jQuery(this).hasClass("fa-angle-up")){ 
	if(JS_DEBUG){console.log("Going to hide all Exercises in Phase");}
	jQuery(this).parent().parent().parent().nextAll(".exercises").each(function() {
		console.log("Found an Exercise");
		jQuery(this).hide();	 
	});
	jQuery(this).parent().parent().parent().nextAll(".addExerciseMainContainer").each(function() {
		console.log("Found an Exercise");
		jQuery(this).hide();
	});
		jQuery(this).removeClass("fa-angle-up");
		jQuery(this).addClass("fa-angle-down");
	}else if(jQuery(this).hasClass("fa-angle-down")){
	if(JS_DEBUG){console.log("Going to show all Exercises in Phase");}
		jQuery(this).parent().parent().parent().nextAll(".exercises").each(function() {
		console.log("Found an Exercise");
		jQuery(this).show();	 
	});
	jQuery(this).parent().parent().parent().nextAll(".addExerciseMainContainer").each(function() {
		console.log("Found an Exercise");
		jQuery(this).show();
	});
		jQuery(this).removeClass("fa-angle-down");
		jQuery(this).addClass("fa-angle-up");
	}
});
// Used to remove an exercise 
jQuery(".removeExercise").live('click', function(event){
		if(JS_DEBUG){console.log("Removing an exercise");}
		jQuery(".alertArea").append('<div class="alertLog alertNotice">Removing an exercise </div>');
		var exerciseToDelete = jQuery(this);
		var parentElement = jQuery(this).closest(".phaseContainer");

		
		var exerciseId = jQuery(this).closest(".exercises").attr('data-exerciseid');
		console.log("Exercise ID"+ exerciseId);
		var exerciseOrder = jQuery(this).closest(".exercises").attr('data-ordernumber');
		console.log("Exercise Order Lookup"+exerciseOrder);
		var phaseId = jQuery(this).closest(".exercises").attr('data-phaseid');

		console.log("Exercse Phase ID "+phaseId);
		// add a new phase to the database ajax and reorder
		var data = {
		'action': 'deleteReorderExercise',
		'exerciseId': exerciseId,
		'phaseId': phaseId,
		'initialOrder' : exerciseOrder
		};
	// Post to Ajax
	jQuery.ajax({type:'POST',data,url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			resultObj = response;
		// Find the HTML Object where we want to load the form into 
		if(resultObj !=null){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Exercise Removed</div>');
		exerciseToDelete.parent().parent().parent().prev(".addExerciseMainContainer").remove();
		exerciseToDelete.parent().parent().parent().remove();
		updateExerciseOrder(parentElement);
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError">Error: Exercise Not Removed</div>');
			}
		}
	});
});

// Used to customize a custom program 
	jQuery("#CopyAndCustomize").on('click', function(event){
		if(JS_DEBUG){console.log("Clicking Custom");}
		// get the ID of the current Program 
		var programID = jQuery("#existingProgram option:selected").val()
		if(JS_DEBUG){console.log("We want to customize the course "+ programID );}
		// Get the custom program from the AJAX PHP Form 
		var data = {
		'action': 'createAndDisplayCustomProgram',
		'baseProgramId': programID
	};
	//	jQuery.ajax({async:false, type:'get',data, dataType:'text',url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
	// Post to Ajax
	jQuery.ajax({type:'POST',data,url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Copied Program - "+response);
			var resultObj = response;
			//console.log(resultObj);
		// Find the HTML Object where we want to load the form into 
		if(resultObj !=null){
			jQuery(".alertArea").append('<div class="alertLog">Custom Program Created</div>');
		// Load the form in the html object
		//console.log(resultObj);
			jQuery(".modifyExistingForm").html(resultObj);
			}	
		}
	});
		jQuery(".modifyExistingForm").removeClass("hidden");

});

	// Used to show an exercise video 
	/* This function shows the videos when the video has been clicked */
jQuery('.exercise-container').live('click', function(event){
	console.log("Exercise Clicked");
	console.log(jQuery(this).attr("data-videoId"));
	var exerciseContainer = jQuery(this);
	// Lets initiate the video 
	// This is the URL of the video you want to load
        var videoUrl = 'https://www.vimeo.com/'+$(this).attr("data-videoId");
        console.log("Video URL: "+videoUrl);
         // This is the oEmbed endpoint for Vimeo (we're using JSON)
        // (Vimeo also supports oEmbed discovery. See the PHP example.)
        var endpoint = 'https://www.vimeo.com/api/oembed.json';
        // Tell Vimeo what function to call
        var callback = 'embedVideo';
         // Put together the URL
        var url = endpoint + '?url=' + encodeURIComponent(videoUrl) + '&callback=' + callback + '&width=640';

       jQuery.getJSON('https://www.vimeo.com/api/oembed.json?url=' + encodeURIComponent(videoUrl) + '&autoplay=1&callback=?', function(data){
       	console.log("Updating Video")
       	exerciseContainer.html(""); 
        exerciseContainer.html(data.html); 
		});
});

jQuery('input[name=typeUpdate]').live('change', function(event){
	console.log("Type change detected!");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programType = jQuery(this).val();
	console.log("Type Radio Button Changed to: "+ programType+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Changeing program type to: '+programType+'</div>');
	var data = {
		'action': 'updateAProgram',
		'type': programType,
		'programId': programId
		};
	// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program type updated to '+programType+' in database</div>');
		if(programType.toLowerCase() === "rehab"){
			console.log("Program type detected as Rehab Program");
			jQuery('#bodyPartGroup').removeClass( 'hidden' );
			jQuery('#howItHappenedGroup').removeClass( 'hidden' );
			jQuery('#sportsAndOccupationGroup').addClass( 'hidden' );

		}else if (programType.toLowerCase() === "prevention"){
			console.log("Program type detected as Prevention Program");
			jQuery('#bodyPartGroup').removeClass( 'hidden' );
			jQuery('#howItHappenedGroup').addClass( 'hidden' );
			jQuery('#sportsAndOccupationGroup').addClass( 'hidden' );
		}else if (programType.toLowerCase() === "strength-training"){
			console.log("Program type detected as strenth Program");
			jQuery('#bodyPartGroup').addClass( 'hidden' );
			jQuery('#howItHappenedGroup').addClass( 'hidden' );
			jQuery('#sportsAndOccupationGroup').removeClass( 'hidden' );

		}	

			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program type not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('input[name=stateUpdate]').live('change', function(event){
	console.log("Program state change detected!");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programState = jQuery(this).val();
	console.log("Type Radio Button Changed to: "+ programState+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Changeing program state to: '+programState+'</div>');
	var data = {
		'action': 'updateAProgram',
		'state': programState,
		'programId': programId
		};
	// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program state updated to '+programState+' in database</div>');
		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program state not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('input[name=progNameupdate]').live('blur', function(event){
	console.log("Program Name Change Detected");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programName = jQuery(this).val();
	console.log("Program Name changing to: "+ programName+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program name changing to: '+programName+'</div>');
	var data = {
		'action': 'updateAProgram',
		'name': programName,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program name updated to '+programName+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program name not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('input[name=progDurationUpdate]').live('blur', function(event){
	console.log("Program Duration Change Detected");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programDuration = jQuery(this).val();
	console.log("Program Duration changing to: "+ programDuration+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program duration changing to: '+programDuration+'</div>');
	var data = {
		'action': 'updateAProgram',
		'duration': programDuration,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program duration updated to '+programDuration+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program duration not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('input[name=add_image_btn]').live('click', function(event) {
      jQuery(".alertArea").append('<div class="alertLog alertNotice">Adding a thumbnail to the program</div>');
      var programId = jQuery("#theProgramMetaId").attr("data-programId");

    event.preventDefault();
    var frame
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {

      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      jQuery(".imageContainer").append( '<img class="thumbnailImg"src="'+attachment.url+'" alt="" />' );

      // Save to the database  the attachment id to our hidden input
     	var data = {
		'action': 'updateAProgram',
		'thumbnail': attachment.url,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program thumbnail '+attachment.url+' has been added to this program</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
		   // Hide the add image link
      jQuery('input[name=add_image_btn]').addClass( 'hidden' );
      // unhide the change image button 
      jQuery('input[name=change_image_btn]').removeClass( 'hidden' );
      // unhide the delete image button 
      jQuery('input[name=delete_image_btn]').removeClass( 'hidden' );
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program thumbnail not added - Error code: AJAX - updateAProgram</div>');
			}
		}
		});
    });

    // Finally, open the modal on click
    frame.open();

     });


jQuery('input[name=change_image_btn]').live('click', function(event) {
      jQuery(".alertArea").append('<div class="alertLog alertNotice">Changing a thumbnail for the program</div>');
      var programId = jQuery("#theProgramMetaId").attr("data-programId");

    event.preventDefault();
    var frame
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {

      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      jQuery(".imageContainer").html( '<img class="thumbnailImg"src="'+attachment.url+'" alt="" />' );

      // Save to the database  the attachment id to our hidden input
     	var data = {
		'action': 'updateAProgram',
		'thumbnail': attachment.url,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program thumbnail '+attachment.url+' has been changed for this program</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		

			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program thumbnail not changed - Error code: AJAX - updateAProgram</div>');
			}
		}
		});
    });

    // Finally, open the modal on click
    frame.open();

     });

jQuery('input[name=delete_image_btn]').live('click', function(event) {
	    jQuery(".alertArea").append('<div class="alertLog alertNotice">Deleting a thumbnail for the program</div>');

	 var programId = jQuery("#theProgramMetaId").attr("data-programId");
	 var data = {
		'action': 'updateAProgram',
		'thumbnail': "",
		'programId': programId
		};
		jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program thumbnail has been deleted for this program</div>');
			jQuery(".imageContainer").html(" ");

			jQuery('input[name=add_image_btn]').removeClass( 'hidden' );
    		jQuery('input[name=change_image_btn]').addClass( 'hidden' );
      		jQuery('input[name=delete_image_btn]').addClass( 'hidden' );
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program thumbnail not deleted - Error code: AJAX - updateAProgram</div>');
			}
		}
		});
     });

jQuery('textarea[name=progDescUpdate]').live('blur', function(event){
	console.log("Program Description Change Detected");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programDescription = jQuery(this).val();
	console.log("Program Description changing to: "+ programDescription+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program description changing to: '+programDescription+'</div>');
	var data = {
		'action': 'updateAProgram',
		'description': programDescription,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program description updated to '+programDescription+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program description not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('textarea[name=progEquipUpdate]').live('blur', function(event){
	console.log("Program equitpment Change Detected");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programEquipment = jQuery(this).val();
	console.log("Program equitpment changing to: "+ programEquipment+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program equipment changing to: '+programEquipment+'</div>');
	var data = {
		'action': 'updateAProgram',
		'equipment': programEquipment,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program equipment updated to '+programEquipment+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program equipment not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('textarea[name=progPlanUpdate]').live('blur', function(event){
	console.log("Program weekly plan Change Detected");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programWeekly = jQuery(this).val();
	console.log("Program weekly plan changing to: "+ programWeekly+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program weekly plan changing to: '+programWeekly+'</div>');
	var data = {
		'action': 'updateAProgram',
		'weekly_plan': programWeekly,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program weekly plan updated to '+programWeekly+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program weekly plan not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('textarea[name=progLifestyleUpdate]').live('blur', function(event){
	console.log("Program lifestyle Change Detected");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programLifestyle = jQuery(this).val();
	console.log("Program lifestyle changing to: "+ programLifestyle+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program lifestyle changing to: '+programLifestyle+'</div>');
	var data = {
		'action': 'updateAProgram',
		'life_style': programLifestyle,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program lifestyle updated to '+programLifestyle+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program lifestyle not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('input[name=bodypart]').live('change', function(event){
	console.log("Program Body Part Change Detected");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programBodyPart = ""
	jQuery('input[name=bodypart]:checked').each(function (){
		if(programBodyPart){
			programBodyPart +=", ";
		}
		programBodyPart += jQuery(this).val();
		console.log(programBodyPart);
	});
	console.log("Program body parts updating to: "+ programBodyPart+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program body parts updating to: '+programBodyPart+'</div>');
	var data = {
		'action': 'updateAProgram',
		'assoc_body_part_id': programBodyPart,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program body parts updated to '+programBodyPart+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program body part not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('input[name=howithappened]').live('change', function(event){
	console.log("Program how it happened Change Detected");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programhowithappened = ""
	jQuery('input[name=howithappened]:checked').each(function (){
		if(programhowithappened){
			programhowithappened +=", ";
		}
		programhowithappened += jQuery(this).val();
		console.log(programhowithappened);
	});
	console.log("Program how it happened updating to: "+ programhowithappened+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program how it happened updating to: '+programhowithappened+'</div>');
	var data = {
		'action': 'updateAProgram',
		'how_it_happen': programhowithappened,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program how it happened updated to '+programhowithappened+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program how it happened not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});

jQuery('input[name=sportsandoccupation]').live('change', function(event){
	console.log("Program Sports and Occupations Change Detected");
	var programId = jQuery("#theProgramMetaId").attr("data-programId");
	var programSportsAndOccupations = ""
	jQuery('input[name=sportsandoccupation]:checked').each(function (){
		if(programSportsAndOccupations){
			programSportsAndOccupations +=", ";
		}
		programSportsAndOccupations += jQuery(this).val();
		console.log(programSportsAndOccupations);
	});
	console.log("Program Sports and Occupations updating to: "+ programSportsAndOccupations+ "for Program Id: " + programId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program Sports and Occupations updating to: '+programSportsAndOccupations+'</div>');
	var data = {
		'action': 'updateAProgram',
		'sports_occupation': programSportsAndOccupations,
		'programId': programId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program Sports and Occupations updated to '+programSportsAndOccupations+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program Sports and Occupations not updated - Error code: AJAX - updateAProgram</div>');
			}
		}
		});

});
jQuery('input[name=phaseName]').live('blur', function(event){
	console.log("Phase Name Change Detected");
	var phaseId = jQuery(this).parent().parent().parent().attr("data-phase-id");
	console.log("PhaseID"+phaseId);
	var phaseName = jQuery(this).val();
	console.log("Phase Name changing to: "+ phaseName+ "for Phase Id: " + phaseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Phase name changing to: '+phaseName+'</div>');
	var data = {
		'action': 'updateAPhase',
		'name': phaseName,
		'phaseId': phaseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Phase name updated to '+phaseName+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Phase name not updated - Error code: AJAX - updateAPhase</div>');
			}
		}
		});
});

jQuery('input[name=phaseDuration]').live('blur', function(event){
	console.log("Phase Duration Change Detected");
	var phaseId = jQuery(this).parent().parent().parent().attr("data-phase-id");
	console.log("PhaseID"+phaseId);
	var phaseDuration = jQuery(this).val();
	console.log("Phase duration changing to: "+ phaseDuration+ "for Phase Id: " + phaseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Phase duration changing to: '+phaseDuration+'</div>');
	var data = {
		'action': 'updateAPhase',
		'duration': phaseDuration,
		'phaseId': phaseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Phase duration updated to '+phaseDuration+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Phase duration not updated - Error code: AJAX - updateAPhase</div>');
			}
		}
		});

});
jQuery('textarea[name=phaseIntro]').live('blur', function(event){
	console.log("Phase intro Change Detected");
	var phaseId = jQuery(this).parent().parent().parent().attr("data-phase-id");
	console.log("PhaseID"+phaseId);
	var phaseIntro = jQuery(this).val();
	console.log("Phase intro changing to: "+ phaseIntro+ "for Phase Id: " + phaseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Phase duration changing to: '+phaseIntro+'</div>');
	var data = {
		'action': 'updateAPhase',
		'intro': phaseIntro,
		'phaseId': phaseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Phase intro updated to '+phaseIntro+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Phase intro not updated - Error code: AJAX - updateAPhase</div>');
			}
		}
		});
});
jQuery('textarea[name=phaseNotes]').live('blur', function(event){
	console.log("Phase notes Change Detected");
	var phaseId = jQuery(this).parent().parent().parent().attr("data-phase-id");
	console.log("PhaseID"+phaseId);
	var phaseNotes = jQuery(this).val();
	console.log("Phase notes changing to: "+ phaseNotes+ "for Phase Id: " + phaseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Phase notes changing to: '+phaseNotes+'</div>');
	var data = {
		'action': 'updateAPhase',
		'notes': phaseNotes,
		'phaseId': phaseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Phase notes updated to '+phaseNotes+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Phase notes not updated - Error code: AJAX - updateAPhase</div>');
			}
		}
		});
});

jQuery('input[name=order]').live('blur', function(event){
	console.log("Exercise Order Change Detected");
	var exerciseId = jQuery(this).closest(".exercises").attr("data-exerciseid");
	console.log("exerciseId"+exerciseId);
	var exerciseOrder= jQuery(this).val();
	console.log("Exercise Order changing to: "+ exerciseOrder+ "for Exercise Id: " + exerciseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Exercise Order  changing to: '+exerciseOrder+'</div>');
	var data = {
		'action': 'updateAnExercise',
		'order_field': exerciseOrder,
		'exerciseId': exerciseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Exercise Order updated to '+exerciseOrder+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError">Exercise Order not updated - Error code: AJAX - updateAExercise</div>');
			}
		}
		});

});

jQuery('input[name=setsReps]').live('blur', function(event){
	console.log("Exercise setsReps Change Detected");
	var exerciseId = jQuery(this).closest(".exercises").attr("data-exerciseid");
	console.log("exerciseId"+exerciseId);
	var exerciseSetRep= jQuery(this).val();
	console.log("Exercise setsReps changing to: "+ exerciseSetRep+ "for Exercise Id: " + exerciseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Exercise Sets and Reps changing to: '+exerciseSetRep+'</div>');
	var data = {
		'action': 'updateAnExercise',
		'sets_reps': exerciseSetRep,
		'exerciseId': exerciseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Exercise Sets and Reps updated to '+exerciseSetRep+' in database</div>');
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError">Exercise Sets and Reps did not updated - Error code: AJAX - updateAExercise</div>');
			}
		}
		});

});

jQuery('input[name=rest]').live('blur', function(event){
	console.log("Exercise rest Change Detected");
	var exerciseId = jQuery(this).closest(".exercises").attr("data-exerciseid");
	console.log("exerciseId"+exerciseId);
	var exerciseRest= jQuery(this).val();
	console.log("Exercise rest changing to: "+ exerciseRest+ "for Exercise Id: " + exerciseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Exercise rest changing to: '+exerciseRest+'</div>');
	var data = {
		'action': 'updateAnExercise',
		'rest': exerciseRest,
		'exerciseId': exerciseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Exercise rest updated to '+exerciseRest+' in database</div>');
		// Load the form in the html object
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError">Exercise rest did not updated - Error code: AJAX - updateAExercise</div>');
			}
		}
		});

});

jQuery('input[name=variation]').live('blur', function(event){
	console.log("Exercise variation Change Detected");
	var exerciseId = jQuery(this).closest(".exercises").attr("data-exerciseid");
	console.log("exerciseId"+exerciseId);
	var exerciseVariation= jQuery(this).val();
	console.log("Exercise variation changing to: "+ exerciseVariation+ "for Exercise Id: " + exerciseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Exercise variation changing to: '+exerciseVariation+'</div>');
	var data = {
		'action': 'updateAnExercise',
		'variation': exerciseVariation,
		'exerciseId': exerciseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Exercise variation updated to '+exerciseVariation+' in database</div>');
		// Load the form in the html object
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError">Exercise variation did not updated - Error code: AJAX - updateAExercise</div>');
			}
		}
		});
});

jQuery('textarea[name=equipmentText]').live('blur', function(event){
	console.log("Exercise equipment Change Detected");
	var exerciseId = jQuery(this).closest(".exercises").attr("data-exerciseid");
	console.log("exerciseId"+exerciseId);
	var exerciseEquipment= jQuery(this).val();
	console.log("Exercise equipment changing to: "+ exerciseEquipment+ "for Exercise Id: " + exerciseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Exercise equipment changing to: '+exerciseEquipment+'</div>');
	var data = {
		'action': 'updateAnExercise',
		'equipment': exerciseEquipment,
		'exerciseId': exerciseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Exercise equipment updated to '+exerciseEquipment+' in database</div>');
		// Load the form in the html object
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError">Exercise equipment did not updated - Error code: AJAX - updateAExercise</div>');
			}
		}
		});
});

jQuery('textarea[name=specialInstructionsText]').live('blur', function(event){
	console.log("Exercise Special Instructions Change Detected");
	var exerciseId = jQuery(this).closest(".exercises").attr("data-exerciseid");
	console.log("exerciseId"+exerciseId);
	var exerciseSpecial= jQuery(this).val();
	console.log("Exercise special instructions changing to: "+ exerciseSpecial+ "for Exercise Id: " + exerciseId);
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Exercise special instructions  changing to: '+exerciseSpecial+'</div>');
	var data = {
		'action': 'updateAnExercise',
		'special_instructions': exerciseSpecial,
		'exerciseId': exerciseId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			jQuery(".alertArea").append('<div class="alertLog alertSuccess">Exercise special instructions updated to '+exerciseSpecial+' in database</div>');
		// Load the form in the html object
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError">Exercise special instructions did not updated - Error code: AJAX - updateAExercise</div>');
			}
		}
		});
});

// Assign Custom Program 

jQuery('#assignCustomProgram').live('click', function(event){
	if(jQuery(this).attr('data-action') =="save"){
	console.log("Going to Assign a Custom Program");
	var programId = jQuery("#theProgramMetaId").attr("data-programid");
	console.log("programId"+programId);
	var userId = jQuery(this).attr('data-userId');
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program Assignment about to be added</div>');

	jQuery('#assignCustomProgram').val("Remove Program From User");
			jQuery('input[name=stateUpdate]').each(function (){
				jQuery('#Production').attr('checked','checked');
			});
	jQuery(this).attr('data-action','remove')
	var data = {
		'action': 'assignProgram',
		'programId': programId,
		'userId': userId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			 jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program Assignment added to user in database</div>');
			
		// Load the form in the html object
			}else{
				 jQuery(".alertArea").append('<div class="alertLog alertError">Program Assignment did not update - Error code: AJAX - deleteCustomProgram</div>');
			}
		}
		});
	}else if(jQuery(this).attr('data-action') =="remove"){
	console.log("Going to remove a Custom Program");
	var programId = jQuery("#theProgramMetaId").attr("data-programid");
	console.log("programId"+programId);
	var userId = jQuery(this).attr('data-userId');
	jQuery(".alertArea").append('<div class="alertLog alertNotice">Program Assignment about to be removed</div>');

	jQuery('#assignCustomProgram').val("Assign Program To User");
			jQuery('input[name=stateUpdate]').each(function (){
				jQuery('#Development').attr('checked','checked');
			});
	jQuery(this).attr('data-action','save')
	var data = {
		'action': 'deleteCustomProgram',
		'programId': programId,
		'userId': userId
		};
		// Post to Ajax
	jQuery.ajax({type:'POST', data, url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			console.log("Data: "+ data);
			console.log("Results: "+ response);
		// Find the HTML Object where we want to load the form into 
		if(response.trim() =="Success"){
			 jQuery(".alertArea").append('<div class="alertLog alertSuccess">Program Assignment removed from user in database</div>');
			
		// Load the form in the html object
			}else{
				 jQuery(".alertArea").append('<div class="alertLog alertError">Program Assignment did not update - Error code: AJAX - deleteCustomProgram</div>');
			}
		}
		});
	}
});
