/* This script file is used to manage the jQuery needs of the custom program builder 
* This variable debug is used to enable debugging at a global level 
*/
var JS_DEBUG = true;

if(JS_DEBUG){console.log("Welcome to the Custom ProgramUI Builder Script");}
// Load AJaX Functions 

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
		var programID = jQuery("#existingProgram option:selected").val()

		// determine the location of the new phase 

		// add a new phase to the database ajax
		var results = addPhaseAJAX("New Phase",10,-1,4);
		console.log(results);
		// ensure the datasbse has been updated
		// get a new phase object via aJAX 
		// get a new add phase button via Ajax 
		// insert a new phase into the webpage
});

jQuery(".addExercise").live('click', function(event){
		if(JS_DEBUG){console.log("Adding a new Exercise");}
		// determine the location of the new phase 
		// add a new phase to the database ajax
		// ensure the datasbse has been updated
		// get a new phase object via aJAX 
		// get a new add phase button via Ajax 
		// insert a new phase into the webpage
});

