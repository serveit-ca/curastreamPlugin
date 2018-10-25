/* This script file is used to manage the jQuery needs of the custom program builder 
* This variable debug is used to enable debugging at a global level 
*/
var JS_DEBUG = true;

if(JS_DEBUG){console.log("Welcome to the Custom ProgramUI Builder Script");}
// Enable select 2 Functionality 
jQuery(document).ready(function() {
    jQuery('.enableSelect2').select2();
});

///////////////////////// Fuctions used on  the Custom Program Creation Page ///////////////////////
// Used to show the select use box iwhen creating a custom program

	jQuery("#selectUser").on('change', function(event){
		if(JS_DEBUG){console.log("onchange");}
		jQuery(".baseProgram").removeClass("hidden");
		if(JS_DEBUG){console.log("user change");}
	});
// Used to load the mobidy existing when creating a custom program 
	jQuery("#modifyExisting").on('click', function(event){
			console.log("hello");
		jQuery(".modifyExistingProgram").removeClass("hidden");
		jQuery(".createNewForm").addClass("hidden");
	});
// Used to create a new program 
		jQuery("#createNew").on('click', function(event){
			if(JS_DEBUG){console.log("createNew clicked");}
			jQuery(".createNewForm").removeClass("hidden");
			jQuery(".modifyExistingForm").addClass("hidden");
			jQuery(".modifyExistingProgram").addClass("hidden");
		});


jQuery(".addPhase").live('click', function(event){
		if(JS_DEBUG){console.log("Adding a new Phase");}
		var programID = jQuery("#existingProgram option:selected").val();

		// TODO Determine the location of the new phase 
		var finalOrder =4;
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
			console.log(data);
		// Find the HTML Object where we want to load the form into 
		if(resultObj !=null){
			jQuery(".alertArea").append('<div class="alertLog">Phase Added</div>');
		// Load the form in the html object
		console.log(resultObj);
		// insert a new phase into the webpage
		console.log(currentElement);
		currentElement.parent().parent().parent().before(resultObj);
		currentElement.parent().parent().parent().remove();
			}else{
				jQuery(".alertArea").append('<div class="alertLog">Error: Phase Not Added</div>');
			}
		}
	});
});
// used to remove a phase 
jQuery(".removePhase").live('click', function(event){
	if(JS_DEBUG){console.log("Going to remove a phase");}
	jQuery(this).parent().parent().parent().parent().prev(".addPhaseContainer").remove();
	//jQuery(this).parent().parent().parent().next(".addExerciseContainer").remove();
	jQuery(this).parent().parent().parent().parent().remove(); 
});
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
		console.log(resultObj);
		// insert a new phase into the webpage
		console.log(currentElement);
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
	jQuery(this).parent().parent().parent().prev(".addExerciseContainer").show();
	jQuery(this).parent().parent().parent().remove();
});
// Add an Exercise to Jquery 
jQuery(".addExercise").live('click', function(event){
		if(JS_DEBUG){console.log("Adding a new Exercise");}
		var programID = jQuery("#existingProgram option:selected").val();
		// determine the phase of the new exercise 
		var phaseId = 10;
		// determine the location of the new exercise
		var finalOrder = 5+1;
		// add a new exercise to the database ajax
		var currentElement = jQuery(this);
		// add a new phase to the database ajax and reorder
		var data = {
		'action': 'addExerciseToPhase',
		'programId': programID,
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
		console.log(resultObj);
		// insert a new phase into the webpage
		console.log(currentElement);
		currentElement.parent().parent().parent().before(resultObj);
		currentElement.parent().parent().parent().remove();
			}else{
				jQuery(".alertArea").append('<div class="alertLog">Error: Exercise Not Added</div>');
			}
		}
	});
		// get a new phase object via aJAX 
		// get a new add phase button via Ajax 
		// insert a new phase into the webpage
});
// Used to hide an exercise details 
jQuery(".exerciseExpandHide").live('click', function(event){
	if(JS_DEBUG){console.log("Going to hide or show an Exercise");}
	jQuery(this).parent().parent().next(".exerciseDetails").toggle();
	if(jQuery(this).hasClass("fa-angle-double-up")){
		jQuery(this).removeClass("fa-angle-double-up");
		jQuery(this).addClass("fa-angle-double-down");
	}else if(jQuery(this).hasClass("fa-angle-double-down")){
		jQuery(this).removeClass("fa-angle-double-down");
		jQuery(this).addClass("fa-angle-double-up");
	}
});
// Used to remove an exercise 
jQuery(".removeExercise").live('click', function(event){
	if(JS_DEBUG){console.log("Going to Remove an Exercise");}
	jQuery(this).parent().parent().parent().prev(".addExerciseContainer").remove();
	jQuery(this).parent().parent().parent().remove();
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

	// Used to close a 
