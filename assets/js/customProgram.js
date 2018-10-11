/* This script file is used to manage the jQuery needs of the custom program builder 
* This variable debug is used to enable debugging at a global level 
*/
var JS_DEBUG = true;

if(JS_DEBUG){console.log("Welcome to the Custom Program Builder Script");}

// Used to show the select use box iwhen creating a custom program jQuery(".radio_btn_type").on('click', function(event){
	jQuery("#selectUser").on('change', function(event){
		console.log("hello");
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
// Used to customize a custom program 
	jQuery("#customizeButton").on('click', function(event){
		if(JS_DEBUG){console.log("Clicking Custom");}
		// get the ID of the current Program 
		var programID = jQuery("#existingProgram option:selected").val()
		if(JS_DEBUG){console.log("We want to customize the course "+ programID );}
		// Get the custom program from the AJAX PHP Form 
		// This should be returning HTML object 
		// Find the HTML Object where we want to load the form into 
		// Load the form in the html object 
		
		jQuery(".modifyExistingForm").removeClass("hidden");
	
	});

//For Program Type Radio Buttons
jQuery(".radio_btn_type").on('click', function(event){
	//Get Data
	var prog_type = jQuery(this).val();
	// Asign Data for Database
	var data = {
		'action': 'typeRadio',
		'prog_type': prog_type
	};
	// Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Program Name Box
jQuery("#nameBox").on('focusout', function(event){
	//Get Data
	var prog_name = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'nameBox',
		'prog_name': prog_name
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Program duration Box
jQuery("#durBox").on('focusout', function(event){
	//Get Data
	var prog_dur = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'durBox',
		'prog_dur': prog_dur
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Program Description Box
jQuery("#descBox").on('focusout', function(event){
	//Get Data
	var prog_desc = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'descBox',
		'prog_desc': prog_desc
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Program Equipment Box
jQuery("#equipBox").on('focusout', function(event){
	//Get Data
	var prog_equip = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'equipBox',
		'prog_equip': prog_equip
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Program Weekly Plan Box
jQuery("#weekBox").on('focusout', function(event){
	//Get Data
	var prog_week = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'equipBox',
		'prog_week': prog_week
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Program Lifestyle Box
jQuery("#lifeBox").on('focusout', function(event){
	//Get Data
	var prog_life = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'lifeBox',
		'prog_life': prog_life
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Phase Name Box
jQuery("#phaseName").on('focusout', function(event){
	//Get Data
	var phase_name = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'phaseName',
		'phase_name': phase_name
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Phase Name Box
jQuery("#phaseName").on('focusout', function(event){
	//Get Data
	var phase_name = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'phaseName',
		'phase_name': phase_name
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Phase Intro
jQuery("#phaseIntro").on('focusout', function(event){
	//Get Data
	var phase_intro = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'phaseIntro',
		'phase_intro': phase_intro
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Phase Duration
jQuery("#phaseDur").on('focusout', function(event){
	//Get Data
	var phase_dur = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'phaseDur',
		'phase_dur': phase_dur
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});

//For Phase Notes
jQuery("#phaseNotes").on('focusout', function(event){
	//Get Data
	var phase_notes = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'phaseDur',
		'phase_notes': phase_notes
	};
	//Post to Ajax
	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
		//Error Checking
		if(!response.trim()){
			console.log("Success!"+response);
		}
		else{
			console.log("Error"+response);
		}
	});
});