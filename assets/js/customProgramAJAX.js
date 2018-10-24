var JS_DEBUG = true;

if(JS_DEBUG){console.log("Welcome to the Custom ProgramAJAX Builder Script");}

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


function addPhaseAJAX(phaseName, programID, initialOrder, finalOrder){
if(JS_DEBUG){console.log("Adding a new Phase AJAX");}
	var data = {
		'action': 'addPhaseToProgram',
		'baseProgramId': programID,
		'initialOrder': initialOrder,
		'finalOrder': finalOrder
	};
	// Post to Ajax
	jQuery.ajax({type:'POST',data,url:window.location.origin+'/wp-admin/admin-ajax.php', success:function( response ){
		// This should be returnin"g HTML object 
			//console.log("Copied Program - "+response);
			var resultObj = response;
			//console.log(resultObj);
		// Find the HTML Object where we want to load the form into 
		if(resultObj !=null){
			jQuery(".alertArea").append('<div class="alertLog">Phase Added</div>');
		// Load the form in the html object
		//console.log(resultObj);
			return resultObj;
			}else{
				jQuery(".alertArea").append('<div class="alertLog">Error: Phase Not Added</div>');
				return "error";
			}	
		}
	});
}

// //For Program Type Radio Buttons
// jQuery(".radio_btn_type").on('click', function(event){
// 	//Get Data
// 	var prog_type = jQuery(this).val();
// 	// Asign Data for Database
// 	var data = {
// 		'action': 'typeRadio',
// 		'prog_type': prog_type
// 	};
// 	// Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });



// //For Program Name Box
// jQuery("#nameBox").on('focusout', function(event){
// 	//Get Data
// 	var prog_name = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'nameBox',
// 		'prog_name': prog_name
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Program duration Box
// jQuery("#durBox").on('focusout', function(event){
// 	//Get Data
// 	var prog_dur = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'durBox',
// 		'prog_dur': prog_dur
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Program Description Box
// jQuery("#descBox").on('focusout', function(event){
// 	//Get Data
// 	var prog_desc = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'descBox',
// 		'prog_desc': prog_desc
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Program Equipment Box
// jQuery("#equipBox").on('focusout', function(event){
// 	//Get Data
// 	var prog_equip = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'equipBox',
// 		'prog_equip': prog_equip
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Program Weekly Plan Box
// jQuery("#weekBox").on('focusout', function(event){
// 	//Get Data
// 	var prog_week = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'equipBox',
// 		'prog_week': prog_week
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Program Lifestyle Box
// jQuery("#lifeBox").on('focusout', function(event){
// 	//Get Data
// 	var prog_life = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'lifeBox',
// 		'prog_life': prog_life
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Phase Name Box
// jQuery("#phaseName").on('focusout', function(event){
// 	//Get Data
// 	var phase_name = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'phaseName',
// 		'phase_name': phase_name
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Phase Name Box
// jQuery("#phaseName").on('focusout', function(event){
// 	//Get Data
// 	var phase_name = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'phaseName',
// 		'phase_name': phase_name
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Phase Intro
// jQuery("#phaseIntro").on('focusout', function(event){
// 	//Get Data
// 	var phase_intro = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'phaseIntro',
// 		'phase_intro': phase_intro
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Phase Duration
// jQuery("#phaseDur").on('focusout', function(event){
// 	//Get Data
// 	var phase_dur = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'phaseDur',
// 		'phase_dur': phase_dur
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });

// //For Phase Notes
// jQuery("#phaseNotes").on('focusout', function(event){
// 	//Get Data
// 	var phase_notes = jQuery(this).val();
// 	//Asign Data for Database
// 	var data = {
// 		'action': 'phaseDur',
// 		'phase_notes': phase_notes
// 	};
// 	//Post to Ajax
// 	jQuery.post(window.location.origin+"/wp-admin/admin-ajax.php", data, function(response){
// 		//Error Checking
// 		if(!response.trim()){
// 			console.log("Success!"+response);
// 		}
// 		else{
// 			console.log("Error"+response);
// 		}
// 	});
// });
