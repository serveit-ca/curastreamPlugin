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
		if(JS_DEBUG){console.log("Step 2: Clicked Edit Existing Custom Program Button");}
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

jQuery("#generalProgram_copyAndedit").on('click', function(event){
		if(JS_DEBUG){console.log("Step 3: Clicked Copy an Existing Program and edit from  generalProgram_copyAndedit");}
		var programID = jQuery(".generalProgramexistingProgram").val();
		console.log("Program ID"+ programID);
		
		jQuery(".alertArea").append('<div class="alertLog">Creating a General Program from the existing program</div>');
		//TODO: Add Logic in here 
		
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

	// Used to show an exercise video 
	/* This function shows the videos when the video has been clicked */
jQuery('.exercise-container').live('click', function(event){
	console.log("Exercise Clicked");
	console.log($(this).attr("data-videoId"));
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
       	jQuery(this).html(""); 
        jQuery(this).html(data.html); 
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
		// Load the form in the html object
		// insert a new phase into the webpage		
			}else{
				jQuery(".alertArea").append('<div class="alertLog alertError"> Program type not updated - Error code: AJAX - updateAProgram</div>');
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
    	console.log("Image Clicked");
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      imgContainer.append( '<img src="'+attachment.url+'" alt="" style="max-width:100%;"/>' );

      // Send the attachment id to our hidden input
      imgIdInput.val( attachment.id );

      // Hide the add image link
      addImgLink.addClass( 'hidden' );

      // Unhide the remove image link
      delImgLink.removeClass( 'hidden' );
    });

    // Finally, open the modal on click
    frame.open();

     });


