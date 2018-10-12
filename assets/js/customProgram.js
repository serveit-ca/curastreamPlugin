/* This script file is used to manage the jQuery needs of the custom program builder 
* This variable debug is used to enable debugging at a global level 
*/
var JS_DEBUG = true;

if(JS_DEBUG){console.log("Welcome to the Custom Program Builder Script");}

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

//For Exercise Name
jQuery(".exerciseName").on('focusout', function(event){
	//Get Data
	var exercise_name = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'exerciseName',
		'exercise_name': exercise_name
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

//For Exercise Order
jQuery("#exerciseOrder").on('focusout', function(event){
	//Get Data
	var exercise_order = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'exerciseOrder',
		'exercise_order': exercise_order
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

//For Exercise Sets
jQuery("#exerciseSets").on('focusout', function(event){
	//Get Data
	var exercise_order = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'exerciseSets',
		'exercise_sets': exercise_sets
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

//For Exercise Rest
jQuery("#exerciseRest").on('focusout', function(event){
	//Get Data
	var exercise_rest = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'exerciseRest',
		'exercise_rest': exercise_rest
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

//For Exercise Variation
jQuery("#exerciseVariation").on('focusout', function(event){
	//Get Data
	var exercise_variation = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'exerciseVariation',
		'exercise_variation': exercise_variation
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

//For Exercise Equipment
jQuery("#exerciseEquipment").on('focusout', function(event){
	//Get Data
	var exercise_equipment = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'exerciseEquipment',
		'exercise_equipment': exercise_equipment
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

//For Exercise Special
jQuery("#exerciseSpecial").on('focusout', function(event){
	//Get Data
	var exercise_special = jQuery(this).val();
	//Asign Data for Database
	var data = {
		'action': 'exerciseSpecial',
		'exercise_special': exercise_special
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