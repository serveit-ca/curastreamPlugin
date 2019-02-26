<?php
/*
Plugin Name: Curastream
Description: Add Programs
Author: Admin
*/
// Used for page filtering 
include("objects/program.php");
include("ajaxSaves.php");
include("ajaxCustomProgram.php");
// Used for Ajax Saves to DB 
function curastream_add_bootstrap_And_Other() 
    {       
        // JS
       // wp_register_script('loadUI', 'https://code.jquery.com/jquery-3.3.1.min.js');
        wp_register_script('loadAJAX', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
        wp_register_script('loadselect2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js');
        wp_register_script('data_table_js', 'https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/fh-3.1.4/sl-1.2.6/datatables.min.js');

        //wp_enqueue_script('loadUI');
        wp_enqueue_script('loadAJAX');
        wp_enqueue_script('loadselect2');
        wp_enqueue_script('data_table_js');

        wp_register_script('oembed', plugins_url( '/assets/js/oembed.js', __FILE__ ));
        //wp_enqueue_script('loadUI');
        wp_enqueue_script('oembed');
        // CSS
         wp_register_style('select2Style', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css', false, NULL, 'all');
          wp_enqueue_style('select2Style');
        wp_register_style('prefix_bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', false, NULL, 'all');
        wp_enqueue_style('prefix_bootstrap');
        wp_register_style('font_awesome', 'https://use.fontawesome.com/releases/v5.4.1/css/all.css', false, NULL, 'all');
        wp_enqueue_style('font_awesome');

        wp_register_style('data_tables_css', 'https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/fh-3.1.4/sl-1.2.6/datatables.min.css', false, NULL, 'all');
        wp_enqueue_style('data_tables_css');
    }
add_action('admin_enqueue_scripts', 'curastream_add_bootstrap_And_Other');

add_action( 'admin_print_styles', 'register_scripts_with_jquery' );
// Add Media Image Script 
// As you are dealing with plugin settings,
// I assume you are in admin side

function load_wp_media_files() {
    // Enqueue WordPress media scripts
    wp_enqueue_media();
    wp_enqueue_script( 'wp-api' );

    // Enqueue custom script that will interact with wp.media
  }

add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
/*Going to register the custom JavaScript and CSS File   */
function register_scripts_with_jquery(){   
    // Register the script like this for a plugin:
   // wp_register_style( '')
    wp_register_style( 'curastreamStyle', plugins_url( 'assets/css/style.css', __FILE__ ));
    wp_enqueue_style( 'curastreamStyle');
    wp_register_script( 'custom-programUI-script', plugins_url( 'assets/js/customProgramUI.js', __FILE__ ), "", "", true);
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-programUI-script' );
  
}

// register_activation_hook( __FILE__, 'Curastream_install');
function add_menu() {
    add_menu_page('Curastream','Curastream',
        'curaProgEditor',
        'curastreamPlugin',
        'curastream_parent_page',
        '',
        2
    );
}
function add_submenu() {
  
        add_submenu_page('curastreamPlugin','Program Administration','Program Administration',
            'curaProgEditor',
            'curastream/customProgram.php',
            '',
            ''
        );
    
    if( current_user_can('administrator')) { 
         add_submenu_page('curastreamPlugin','Program Metrics','Program Metrics',
            'curaProgEditor',
            'curastream/programMetrics.php',
            '',
            ''
        );
 
    add_submenu_page('curastreamPlugin','Category Management','Category Management',
        'curaProgEditor',
        'curastream/categoryManagement.php',
        '',
        ''
    );
    add_submenu_page('curastreamPlugin','Group Management','Group Management',
        'curaProgEditor',
        'curastream/groupManagement.php',
        '',
        ''
    );
    add_submenu_page('curastreamPlugin','Video Management','Video Management',
        'curaProgEditor',
        'curastream/exerciseManagement.php',
        '',
        ''
    );
    add_submenu_page('curastreamPlugin','Testing','Testing',
        'curaProgEditor',
        'curastream/testing.php',
        '',
        ''
    );
    add_submenu_page('curastreamPlugin','View Dashboard','View Dashboard',
        'curaProgEditor',
        get_site_url().'/my-programs',
        '',
        ''
    );
    }
}

function load_wp_media(){
    wp_enqueue_media();
}

// register_rest_route(
//     'curastream', '/view_program_details/',
//     array(
//     'methods'  => 'POST',
//     'callback' => 'view_program_details',
//     )
//     );


// Endpoint for memberpress 
    add_action('rest_api_init', function(){
        register_rest_route('curastream', '/mempr_new_corp/', array(
            'methods' => 'POST',
            'callback' => 'mempr_add_new_corp'
        ));
    });

    add_action('rest_api_init', function(){
        register_rest_route('curastream', '/mempr_new_sub_corp/', array(
            'methods' => 'POST',
            'callback' => 'mempr_add_new_sub_corp'
        ));
    });

    add_action('rest_api_init', function(){
        register_rest_route('curastream', '/mempr_remove_sub_corp/', array(
            'methods' => 'POST',
            'callback' => 'mempr_remove_sub_corp'
        ));
    });

    add_action('rest_api_init', function(){
    $programs = new program();
        register_rest_route('curastream', '/view_program_details/', array(
            'methods' => 'GET',
            'callback' => 'view_program_details',
            ));
    } );

add_action( 'admin_menu', 'add_menu');
add_action( 'admin_menu', 'add_submenu');
add_action( 'admin_enqueue_scripts', 'load_wp_media' );

function add_curastream_user_role() {
remove_role('curastreamProgramEditor');
    add_role('curastreamProgramEditor', 'Curastream Program Editor');
    // echo "Hello World";
     $role = get_role("curastreamProgramEditor");
      $role->add_cap( 'read');
      $role->add_cap('curaProgEditor');
      $role->add_cap('delete_posts');
   }
    $role = get_role("administrator");
      $role->add_cap('curaProgEditor');

add_action( 'init', 'add_curastream_user_role');


// api functions

/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function curastream_parent_page() {
echo "<h1>Welcome to the Curastream Plugin</h1>";
echo "<h3>Here are some useful Links</h3>";
echo ("<ul><li><a href=\"".get_site_url()."/wp-json/\">JSON Output</a></li></ul>");
}

function mempr_add_new_corp($request){
    $json = file_get_contents('php://input');
    $input = json_decode($json);

    error_log("-------------------Decode JSON------------------------------------");
    error_log("Full String: ".$json);
    error_log( print_r($input, TRUE) );
     error_log( $input->data->member->id) ;
    error_log("Error JSON ".json_last_error());
    // $halfString = end(explode('"member":{"id":',$json));
    // error_log("Half String: ".$halfString);
    // $cutString = reset(explode(',',$halfString));
    // error_log("Cut String: ".$cutString);

   // $jsonData = headerRest($request);
    //$data = json_decode($jsonData);
    //$programs = new program();
     
      //error_log(print_r($data));
    // Check To Ensure it is a Corp Sub

    // New Corp
    //$corpName = $data['']
  //  $newCorpId = $programs->newCorp("Corp Name");
    // New Group
    //$newGroupId = $programs->newCorpGroup("Corp Name - Default", $newCorpId);
    // Assign Group Owner

   
    //$programs->assignUserToGroup($newGroupId, $data->member->id);
    //error_log("Post Assign To Group");
}

function mempr_add_new_sub_corp($request){
    $data = $request->get_json_params();
    $programs = new program();
    //Get Group Id From Json

    //Get User Id From Json
    
    // Assign User To Corp Group
    $programs->assignUserToGroup($groupId, $userId);
}

function mempr_remove_sub_corp($request){
    $data = $request->get_json_params();
    $programs = new program();
    //Get Group Id From Json

    //Get User Id From Json
    
    // Remove User From Corp Group
    $programs->removeUserFromGroup($groupId, $userId);
}


function headerRest($request){
    header('Content-Type:application/json;charset=utf8');
    header('Access-Control-Allow-Origin: *');

    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);    
    if(empty($data)){

        if(isset($request) && !empty($request->get_params())){
            $data = $request->get_params();
        }
    }
    return $data;
}

function view_program_details($request){
    
    $data = headerRest($request);
    $id = $data['id'];
    if(isset($id)){
        $programs = new program();
        $program = $programs->getProgramById($id);

    if(isset($program) && !is_null($program))
    {
            $phases = array();            
            $progPhases = $programs->getPhasesByProgramId($program->id);            
            foreach ($progPhases as $phase) {
                $exerciseArray = array();
                $exercises = $programs->getExercisesByPhaseId($phase->id);
                   foreach ($exercises as $exercise) {
                        $exerciseContent[] = array(
                            "id"=>$exercise->id,
                            "phase_id"=>$exercise->phase_id,
                            "order_no"=>$exercise->order_no,
                            "order_field"=>$exercise->order_field,
                            "name"=>$exercise->name,
                            "rest"=>$exercise->rest,
                            "sets_reps"=>$exercise->sets_reps,
                            "variation"=>$exercise->variation,
                            "equipment"=>$exercise->equipment,
                            "special_instructions"=>$exercise->special_instructions,
                            "exercise_video_url"=>$exercise->exercise_video_url,
                            "file_url"=>$exercise->file_url,
                            "file_name"=>$exercise->file_name
                            );
                        $exerciseArray[] = $exerciseContent;
                    }
                $phaseContent[] = array(
                    "id"=>$phase->id,
                    "name"=>$phase->name,
                    "intro"=>$phase->intro,
                    "notes"=>$phase->notes,
                    "exercise"=>$exerciseArray);
                                     $phases[] = $phaseContent;
            }
            $partIdString = $program->body_part;
            $sportIdString = $program->sportsOccupation;
            $howIdString = $program->howItHappen;
            $partIdArray = array();
            $sportIdArray = array();
            $howIdArray = array();
            $partIdArray = explode(',', $partIdString);
            $sportIdArray = explode(',', $sportIdString);
            $howIdArray = explode(',', $howIdString);
            $partNameArray = array();
            $sportNameArray = array();
            $howNameArray = array();
            foreach ($partIdArray as $key ) {
                $part = $programs->getBodyPartById($key);
                $partName = $part->name;
                $partNameArray[] = $partName;
            }
            $partNameString = implode(",", $partNameArray);
            foreach ($sportIdArray as $key ) {
                $sport = $programs->getSportOccById($key);
                $sportName = $sport->name;
                $sportNameArray[] = $sportName;
            }
            $sportNameString = implode(",", $sportNameArray);
            foreach ($howIdArray as $key ) {
                $how = $programs->getHowItHappenedById($key);
                $howName = $how->name;
                $howNameArray[] = $howName;
            }
            $howNameString = implode(",", $howNameArray);

            $programContent = array(
                "id"=>$program->id,
                "type"=>$program->type,
                "name"=>$program->name,
                "description"=>$program->description,
                "equipment"=>$program->equipment,
                "duration"=>$program->duration,
                "weekly_plan"=>$program->weeklyPlan,
                "life_style"=>$program->lifeStyle,
                "assoc_body_part_id"=>$partNameString,
                "how_it_happen"=>$howNameString,
                "sports_occupation"=>$sportNameString,
                "thumbnail"=>$program->thumbnail,
                "phases" => $phases  
            );

        
    //$content = array('message' => 'Successfully removed program from user list.');
    //$result["user_id"] =$current_user->ID;
    $result["status"] ='success';
    $result["data"] = $programContent;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse;die();
    }
        else
        {
    $content = array('message' => 'Failed to display program.');
    //$result["sql"] =$sql;
    //$result["user_id"] =$current_user->ID;
    $result["status"] ='success';
    $result["data"] = $programContent;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
    echo $respnse;  
die();
        
    }
    }
    else
    {
    $content = array('message' => 'All fields are required.');
    $result["status"] ='fail';
    $result["data"] = $programContent;
    $respnse = json_encode($result,JSON_PRETTY_PRINT);
     echo $respnse; die();
    }

    
}

// get programs by type
function get_programs() {
    global $wpdb;
    $table = 'dev_cura_programs';
    $programs = $wpdb->get_results("SELECT * FROM $table");        
    
    if ( empty($programs)) {
        $data = array('Status' => 'failed', 'programs' => null);
        return $data;
    }
    $data = array('Status' => 'success', 'programs' => $programs);
    return $data;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/programs/', array(
        'methods' => 'GET',
        'callback' => 'get_programs',
    ) );
} );

function get_program($data) {
    global $wpdb;
    $table = 'dev_cura_programs';
    $program_id = $data['program-id'];
    $programs = $wpdb->get_results("SELECT * FROM $table WHERE id = $program_id");        
    
    if ( empty($programs)) {
        $data = array('Status' => 'failed', 'programs' => null);
        return $data;
    }
    $data = array('Status' => 'success', 'programs' => $programs);
    return $data;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/program/', array(
        'methods' => 'POST',
        'callback' => 'get_program',
    ) );
} );

function get_program_by_Id($prog_id) {
    global $wpdb;
    $table = 'dev_cura_programs';
    $program_id = $prog_id;
    $programs = $wpdb->get_results("SELECT * FROM $table WHERE id = $program_id");        
    
    if ( empty($programs)) {
        $data = array('Status' => 'failed', 'programs' => null);
        return $data;
    }
    $data = array('Status' => 'success', 'programs' => $programs);
    return $data;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/program/', array(
        'methods' => 'POST',
        'callback' => 'get_program_by_Id',
    ) );
} );

function get_sports(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $table = $wpdb->prefix .'cura_sport_occupation';
    $sport = $wpdb->get_results("SELECT id, name FROM $table WHERE type LIKE '%Sport%' ORDER BY name");
    if (empty($sport)) {
        $response = array('status' => 'success', 'sports' => null);
        return $response;
    }
    $response = array('status' => 'success', 'sports' => $sport);
    return $response;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/sports', array(
        'methods' => 'GET',
        'callback' => 'get_sports',
    ) );
} );

function get_occupation(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $table = $wpdb->prefix .'cura_sport_occupation';
    $occupation = $wpdb->get_results("SELECT id, name FROM $table WHERE type LIKE '%Occupation%' ORDER BY name");
    if (empty($occupation)) {
        $response = array('status' => 'success', 'occupations' => null);
        return $response;
    }
    $response = array('status' => 'success', 'occupations' => $occupation);
    return $response;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/occupations', array(
        'methods' => 'GET',
        'callback' => 'get_occupation',
    ) );
} );

// get the list of how it happened injury causes
function get_injury_causes(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $table = $wpdb->prefix .'cura_how_it_happened';
    $how_it_happened = $wpdb->get_results("SELECT id, name FROM $table ORDER BY name");
    if (empty($how_it_happened)) {
        $response = array('status' => 'success', 'how_it_happened' => null);
        return $response;
    }
    $response = array('status' => 'success', 'how_it_happened' => $how_it_happened);
    return $response;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/how-it-happened', array(
        'methods' => 'GET',
        'callback' => 'get_injury_causes',
    ) );
} );


function get_function_by_sport(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $progType = $data['program_type'];
    $sport_id = (int)$data['id'];
    $sportsTable = $wpdb->prefix . 'cura_sport_occupation';
    $sport = $wpdb->get_var("SELECT name FROM $sportsTable WHERE id = $sport_id AND type LIKE '%sport%'");
     if (empty($sport_id)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    if (empty($sport)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $table = $wpdb->prefix . 'cura_programs';
    $sportsProgram = $wpdb->get_results("SELECT id, name, description, duration, equipment, thumbnail FROM $table WHERE type LIKE '%$progType%' AND sports_occupation LIKE '%$sport%'");
    if (empty($sportsProgram)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $response = array('status' => 'success', 'program' => $sportsProgram);
    return $response;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/sport-program/', array(
        'methods' => 'POST',
        'callback' => 'get_function_by_sport',
    ) );
} );

function get_function_by_occupation(){
    if (!is_user_logged_in()) {
        return null;
    }
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    $progType = $data['program_type'];
    $occ_id = (int)$data['id'];
    $occTable =  $wpdb->prefix . 'cura_sport_occupation';
    $occ = $wpdb->get_var("SELECT name FROM $occTable WHERE id = $occ_id AND type LIKE '%occupation%'");
    if (empty($occ)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $table = $wpdb->prefix . 'cura_programs';
    $occProgram = $wpdb->get_results("SELECT id, name, description, equipment, thumbnail FROM $table WHERE type LIKE '%$progType%' AND sports_occupation LIKE '%$occ%' ORDER BY name");
    if (empty($occProgram)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $response = array('status' => 'success', 'program' => $occProgram);
    return $response;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/occupation-program/', array(
        'methods' => 'POST',
        'callback' => 'get_function_by_occupation',
    ) );
} );

function get_rehab_program(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    // prog-type
    $progType = $data['program_type'];
    // body part id
    $body_part_id = (int)$data['body_part'];
    // get the cause
    $cause_id = (int)$data['how_it_happened'];
    // getting name of the body part
    $body_part_table = $wpdb->prefix . 'cura_body_parts';
    $cause_table = $wpdb->prefix . 'cura_how_it_happened';
    $queriedBodyPart = $wpdb->get_var("SELECT name FROM $body_part_table WHERE id = $body_part_id");
    $queriedCause = $wpdb->get_var("SELECT name FROM $cause_table WHERE id = $cause_id");
    $table = $wpdb->prefix . 'cura_programs';
    if (empty($body_part_id) || empty($cause_id)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    if (empty($queriedBodyPart) || empty($queriedCause)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $program = $wpdb->get_results("SELECT id, name, description, equipment, thumbnail FROM $table WHERE type LIKE '%$progType%' AND assoc_body_part_id LIKE '%$queriedBodyPart%' AND how_it_happen LIKE '%$queriedCause%' ORDER BY name");
    if (empty($program)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $response = array('status' => 'success', 'program' => $program);
    return $response;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/rehab-program/', array(
        'methods' => 'POST',
        'callback' => 'get_rehab_program',
    ) );
} );

function get_prevention_program(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    // prog-type
    $progType = $data['program_type'];
    // body part id
    $body_part_id = $data['body_part'];    
    // getting name of the body part
    $body_part_table = $wpdb->prefix . 'cura_body_parts';
    $queriedBodyPart = $wpdb->get_var("SELECT name FROM $body_part_table WHERE id = $body_part_id");
    if (empty($body_part_id)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    if (empty($queriedBodyPart)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $table = $wpdb->prefix . 'cura_programs';
    $program = $wpdb->get_results("SELECT id, name, description, equipment, thumbnail FROM $table WHERE type LIKE '%$progType%' AND assoc_body_part_id LIKE '%$queriedBodyPart%' ORDER BY name");
    if (empty($program)) {
        $response = array('status' => 'success', 'program' => null);
        return $response;
    }
    $response = array('status' => 'success', 'program' => $program);
    return $response;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/prevention-program/', array(
        'methods' => 'POST',
        'callback' => 'get_prevention_program',
    ) );
} );

// function to get recent activities
function get_recent_activities()
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);    
    $current_user = wp_get_current_user();
    if($current_user->ID!=0)
    {
        global $wpdb; // this is how you get access to the database
        $dev_cura_user_recent = $wpdb->prefix . "cura_user_recent";
        $dev_cura_programs = $wpdb->prefix . "cura_programs";
        $recent = $wpdb->get_results("SELECT program_id FROM $dev_cura_user_recent WHERE user_id = $current_user->ID");
        $allActivity = array();
        foreach ($recent as $key => $value) {
            $recentProgramMeta = $wpdb->get_results("SELECT id, name,thumbnail, description, equipment, duration FROM $dev_cura_programs WHERE  id = $value->program_id", ARRAY_A);
            $allActivity[] = array(
                "id" => $recentProgramMeta[0]['id'],
                "name" => $recentProgramMeta[0]['name'], 
                "thumbnail" => $recentProgramMeta[0]['thumbnail'],
                "description" => $recentProgramMeta[0]['description'],
                "equipment" => $recentProgramMeta[0]['equipment'],
                "duration" => $recentProgramMeta[0]['duration']
                );
        }     
        if (empty($recent)) {
            $response = array('status' => 'success', 'activity' => null);
        }
        else{
            $response = array('status' => 'success', 'activity' => $allActivity);        
        }
        return $response;     
    }  
    else{
        $response = array('status' => 'success', 'message' => "User is not signed-in");  
        return $response;
    }  
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/recent-activities/', array(
        'methods' => 'GET',
        'callback' => 'get_recent_activities',
    ) );
} );

/*
this function will get the ongoing programs for the current user from the 'dev_cura_user_programs' with 'completed' = 0,
after checking if the program exists in the program table
*/

function get_ongoing_programs()
{
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);    
    
    $current_user = wp_get_current_user();
    if($current_user->ID!=0)
    {
    
        global $wpdb; // this is how you get access to the database
        $dev_cura_user_programs = $wpdb->prefix . "cura_user_programs";
        $dev_cura_programs = $wpdb->prefix . "cura_programs";
        $dev_cura_user_phases = $wpdb->prefix . "cura_user_phases";
        $sql = "SELECT * FROM $dev_cura_user_programs where user_id = $current_user->ID AND completed = 0";
        $ongoing = $wpdb->get_results($sql);
        // return $ongoing;
        if ($ongoing) {
            $response = array();
            foreach ($ongoing as $key => $value) {
                // check if the program id is in program table as a program
                $program = $wpdb->get_results("SELECT * FROM $dev_cura_programs where id = $value->saved_prog_id");
                if ($program) { // if program exists 
                    // $response[] = 'yes';
                    $completedDaysFromProg = $wpdb->get_var("SELECT sum(completed_days) FROM $dev_cura_user_phases where user_id = $current_user->ID AND prog_id = $value->saved_prog_id group by user_id");
                    // if ($completedDaysFromProg == null) {
                    //     $completedDays = 0;   
                    // }
                    // else
                    // {
                    //     $completedDays = $completedDaysFromProg;
                    // }
                    $response[] = array(
                        'program_id' => $value->saved_prog_id,
                        'program_type' => $program[0]->type,
                        'program_name' => $program[0]->name,
                        'program_duration' => $program[0]->duration,
                        'program_thumbnail' => $program[0]->thumbnail,
                        'completed_days' => $completedDaysFromProg,
                        'progress' => $completedDaysFromProg
                        );
                }
            }
            $data = array('status' => 'success', 'programs' => $response);
            return $data;
        } 
        else{
            $data = array('status' => 'success', 'programs' => null);
            return $data;
        }      
    }
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'curastream/v1', '/ongoing-programs/', array(
        'methods' => 'GET',
        'callback' => 'get_ongoing_programs',
    ) );
} );


// marking phase as active

function mark_phase_active(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;

    // id of the current program
    $progId = $data['program_id'];

    //  id of the current phase
    $phaseId = $data['phase_id'];

    // the current user
    $current_user = wp_get_current_user();

    // tables involved in this operation
    $table = $wpdb->prefix . 'cura_user_phases';
    $phaseTable = $wpdb->prefix . 'cura_phases';
    $recent = $wpdb->prefix . 'cura_user_recent';

    if($current_user->ID != 0)
    {
        // check if the phase already exists for the current user in the user phase table
        $phase = $wpdb->get_results("SELECT * FROM $table WHERE user_id = $current_user->ID AND prog_id = $progId AND phase_id = $phaseId");

        // get the phase info from the phases table, duration of the phase
        $phaseMeta = $wpdb->get_results("SELECT * FROM $phaseTable WHERE id = $phaseId", ARRAY_A);
        $phaseDuration = $phaseMeta[0]['duration'];

        // if this phase is not stored as the user's current phase yet
        if (empty($phase)){
            // return array($progId, $phaseId);

            $dataInsert = array(
                'user_id' => $current_user->ID, 
                'prog_id' => $progId,
                'phase_id' => $phaseId,
                'phase_duration' =>  $phaseDuration,
                'completed_days' => 1,
                'is_completed' => 0
                );

            $insert = $wpdb->insert($table, $dataInsert); //query for inserting record in the table

            $latest_insert = $wpdb->insert_id; // get the id of the latest record

            $latestPhaseCompletedDays = $wpdb->get_var("SELECT completed_days FROM $table WHERE id = $latest_insert"); // get the count of completed days

            $duration = $wpdb->get_var("SELECT phase_duration FROM $table WHERE id = $latest_insert"); // total duration of the phase

            $phaseInfo = $wpdb->get_results("SELECT * FROM $table WHERE prog_id = $progId AND phase_id = $phaseId AND user_id = $current_user->ID"); // 

            $response = array(
                "status" => "success", 
                "message" => "Phase Completed for today", 
                "completed_days" => $latestPhaseCompletedDays, 
                "duration" => $duration
                );


            // adding this phase info in the recent activity for the user
            $activity = $wpdb->get_results("SELECT * FROM $recent WHERE user_id = $current_user->ID AND program_id = $progId", ARRAY_A);
            $activityCount = $wpdb->get_var("SELECT COUNT(id) FROM $recent WHERE user_id = $current_user->ID");
            // oldest activity
            $oldActivityId = $wpdb->get_var("SELECT id FROM $recent WHERE user_id = $current_user->ID ORDER BY created_at LIMIT 1");
            $replace = $wpdb->get_var("SELECT id FROM $recent WHERE user_id = $current_user->ID AND program_id = $progId");
            $activityAdd = array('user_id' => $current_user->ID, 'program_id' => $progId);
            $activityUpdate = array('user_id' => $current_user->ID, 'program_id' => $progId);
            $whereReplace = array('user_id' => $current_user->ID, 'id' => $replace);
            $where = array('user_id' => $current_user->ID, 'id' => $oldActivityId);
            if ($activityCount < 3) {
                // if activity is true delete the older activity for this user and progid
                if ($activity == false) {
                    // $newActivity = $wpdb->replace($recent, $activityAdd);
                    $wpdb->insert($recent, $activityAdd);                    
                }
                else{
                    $wpdb->delete($recent, $whereReplace); 
                    $wpdb->insert($recent, $activityAdd); 
                    // return $whereReplace;
                }
            }
            else
            {
                $wpdb->update($recent, $activityUpdate, $where);
            }
            return $response;  
        }

        else
        {
            // if this phase is already stored in user phase table for this user, get the phase info

            $phaseInfo = $wpdb->get_results("SELECT * FROM $table WHERE prog_id = $progId AND phase_id = $phaseId AND user_id = $current_user->ID", ARRAY_A);
            $phaseLastUpdatedAt = strtotime($phaseInfo[0]['updated_at']); // get the updated at info for the phase

            // check if the phase was udpated less than a day ago
            $currentTime = time();

            if ($currentTime - $phaseLastUpdatedAt >= 86400) {
                // if the phase was updated more than a day ago
                $completed_days = $phaseInfo[0]['completed_days'];

                $duration = $phaseInfo[0]['phase_duration'];

                $completedDays = $wpdb->get_var("SELECT completed_days FROM $table WHERE prog_id = $progId AND phase_id = $phaseId AND user_id = $current_user->ID");

                $dataUpdate = array('completed_days' => $completedDays + 1);

                $where = array('user_id' => $current_user->ID, 'phase_id' => $phaseId, 'prog_id' => $progId);

                if ($completed_days < $duration) {
                    $update = $wpdb->update($table, $dataUpdate, $where); 
                    $latestPhaseCompletedDays = $wpdb->get_var("SELECT completed_days FROM $table WHERE prog_id = $progId AND phase_id = $phaseId AND user_id = $current_user->ID");
                    if ($latestPhaseCompletedDays == $duration) {
                        $statusUpdate = array('is_completed' => 1);
                        $update = $wpdb->update($table, $statusUpdate, $where);
                    }
                       
                    // adding this phase info in the recent activity for the user
                        $activity = $wpdb->get_results("SELECT * FROM $recent WHERE user_id = $current_user->ID AND program_id = $progId", ARRAY_A);
                        $activityCount = $wpdb->get_var("SELECT COUNT(id) FROM $recent WHERE user_id = $current_user->ID");
                        // oldest activity
                        $oldActivityId = $wpdb->get_var("SELECT id FROM $recent WHERE user_id = $current_user->ID ORDER BY created_at LIMIT 1");
                        $replace = $wpdb->get_var("SELECT id FROM $recent WHERE user_id = $current_user->ID AND program_id = $progId");
                        $activityAdd = array('user_id' => $current_user->ID, 'program_id' => $progId);
                        $activityUpdate = array('user_id' => $current_user->ID, 'program_id' => $progId);
                        $whereReplace = array('user_id' => $current_user->ID, 'id' => $replace);
                        $where = array('user_id' => $current_user->ID, 'id' => $oldActivityId);
                        if ($activityCount < 3) {
                            // if activity is true delete the older activity for this user and progid
                            if ($activity == false) {
                                // $newActivity = $wpdb->replace($recent, $activityAdd);
                                $wpdb->insert($recent, $activityAdd);                    
                            }
                            else{
                                $wpdb->delete($recent, $whereReplace); 
                                $wpdb->insert($recent, $activityAdd); 
                                // return $whereReplace;
                            }
                        }
                        else
                        {
                            $wpdb->update($recent, $activityUpdate, $where);
                        }
                        $response = array("status" => "success", "message" => "Phase Completed for today", "completed_days" => $latestPhaseCompletedDays, "duration" => $duration);
                        return $response;
                }/*here*/
                else
                {
                    $response = array("status" => "success" , "message" => "Phase Completed", "completed_days" => $duration, "duration" => $duration);
                    return $response;
                }
            }
            else
            {
                $response = array("status" => "success", "message" => "Please come back tomorrow", "completed_days" => $phaseInfo[0]['completed_days'], "duration" => $phaseInfo[0]['phase_duration']);
                return $response;
            }
        }
    }
}
add_action( 'rest_api_init', function () {
register_rest_route( 'curastream/v1', '/mark-phase-active/', array(
    'methods' => 'POST',
    'callback' => 'mark_phase_active',
) );
});



/* 
function to get the phases in a program
and also perform validation if a phase is completed, marked active for the day and ongoing
*/
function get_phase_for_program($phases, $program){
    // this function gets the no. of phases ($phases) for the given program id($program)
    global $wpdb;
    $dev_cura_programs = $wpdb->prefix . 'cura_programs';
    $dev_cura_phases = $wpdb->prefix . 'cura_phases';
    $dev_cura_user_phases = $wpdb->prefix . 'cura_user_phases';
    $userId = wp_get_current_user()->ID;
    // if (!empty($phases) && $phases != null) {
        // $phase = $wpdb->get_results("SELECT * FROM $dev_cura_phases WHERE program_id = $program ORDER BY id LIMIT $phases");
    // }
    // else
    // {
        $phase = $wpdb->get_results("SELECT * FROM $dev_cura_phases WHERE program_id = $program ORDER BY id");   
    // }
    $phases = array();
    $phaseNum = 0;
    foreach ($phase as $key => $value) {
        $phaseNum++;
        $phase_status = $wpdb->get_results("SELECT * FROM $dev_cura_user_phases WHERE user_id = $userId AND prog_id = $program AND phase_id = $value->id");
        if (!empty($phase_status) && $phase_status[0]->is_completed == 1) {
            $status = 'completed';
        }
        elseif (!empty($phase_status) && time()-strtotime((string)$phase_status[0]->updated_at) > 86400) {
            $status = 'ongoing';
        }
        elseif (!empty($phase_status) && time() - strtotime((string)$phase_status[0]->updated_at) <= 86400) {
            $status = 'marked_active';
        }
        elseif(empty($phase_status)){  
            if ($phaseNum == 1) {
                $status = 'ongoing';
            }          
            else{
                $phaseCompleted = $wpdb->get_var("SELECT is_completed FROM $dev_cura_user_phases WHERE user_id = $userId AND prog_id = $program AND phase_id = ($value->id - 1)");
                if ($phaseCompleted == 1) {
                    $status = 'ongoing';
                }
                else
                {
                    $status = null;
                }
            }
        }
        $exercises = get_exercise_for_phase($value->id);
        $phases[] = array(
            "id"=>$value->id,
            "name"=>$value->name,
            "intro"=>$value->intro,
            "notes"=>$value->notes,
            "duration" => $phase_status[0]->phase_duration,/*duration of the phase*/
            "completed_days" => $phase_status[0]->completed_days,/*completed days from the current phase*/
            "is_completed" => (int)$phase_status[0]->is_completed,/*status of the program 0 for incomplete and 1 for complete*/
            "status" => $status,
            "exercise"=>$exercises
        );
        if ((int)$phase_status[0]->is_completed == 0) {
            //break;
        }
    }
    return $phases;
}     
function get_phase_tab_info($program){
    global $wpdb;
    $dev_cura_phases = $wpdb->prefix . 'cura_phases';
    $phase_tabs = $wpdb->get_results("SELECT id, name FROM $dev_cura_phases WHERE program_id = $program ORDER BY id");
    return $phase_tabs;
}
function get_exercise_for_phase($phase){
    // this function gets the exercises for the given phase id($phase);
    global $wpdb;
    $dev_cura_exercises = $wpdb->prefix . 'cura_exercises';
    $exercises = $wpdb->get_results("SELECT id, phase_id, order_field, name, rest, sets_reps, variation, equipment, special_instructions, exercise_video_url, file_name, file_url FROM $dev_cura_exercises WHERE phase_id = $phase ORDER BY id");
    return $exercises;
}   

function ongoing_program(){
    // check if the program is saved as user's program or not
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;
    // declaring all the variables here:

    // program id
    $progId = $data['program_id'];

    // current user's id
    $userId = wp_get_current_user()->ID;

    // tables
    $dev_cura_programs = $wpdb->prefix . 'cura_programs';
    $dev_cura_phases = $wpdb->prefix . 'cura_phases';
    $dev_cura_user_programs = $wpdb->prefix . 'cura_user_programs';
    $dev_cura_user_phases = $wpdb->prefix . 'cura_user_phases';
    $dev_cura_exercises = $wpdb->prefix . 'cura_exercises';

    // run query here to get the id of the program in the users_program table with current user id and program id
    $isProgramSaved = $wpdb->get_var("SELECT * FROM $dev_cura_user_programs WHERE user_id = $userId AND saved_prog_id = $progId");

    // run query here to get the the type of the program
    $program = $wpdb->get_results("SELECT * FROM $dev_cura_programs WHERE id = $progId");
    if (empty($program)) {
        $response = array(
            'status' => 'success',
            'program' => 'null'
            );
        return $response;
    }
    // if the program is saved as user's program, then check if it is of rehab type
    if ($isProgramSaved) {
        // check if the prog type is rehab, because restrictions only apply for rehab program type
        if ($program[0]->type == 'rehab' || $program[0]->type == 'Rehab') {
            // phase restrictions will be applied here
            // check how many phases are there for the current program in the user_phases table for the current user
            $noOfPhases = $wpdb->get_results("SELECT * FROM $dev_cura_user_phases WHERE user_id = $userId AND prog_id = $progId");
            // return count($noOfPhases);
            // if only one phase or no phase is stored in the user_phases table yet, then get the id of the phase and show the info for that phase from the phase table
            if (count($noOfPhases) <= 1) {
                // show only first phase and its exercises
                // return "only one phase";
                $phases = get_phase_for_program(1, $progId);
                $phase_tabs = get_phase_tab_info($progId);
                $content = array(
                        'id' => $program[0]->id,
                        'type' => $program[0]->type,
                        'name' => $program[0]->name,
                        'description' => $program[0]->description,
                        'equipment' => $program[0]->equipment,
                        'duration' => $program[0]->duration,
                        'weekly_plan' => $program[0]->weekly_plan,
                        'thumbnail' => $program[0]->thumbnail,
                        'life_style' => $program[0]->life_style,
                        'phase_tabs' => $phase_tabs,
                        'phases' => $phases,
                        );
                $response = array();
                $response['user_id'] = $userId;
                $response['status'] = 'success';
                $response['program'] = $content;
                return $response;
                die();
            }


            // else get the ids of more than one phases and show the info for that phase from the phase table
            else
            {
                // show the number of phases that are stored in the user phase table for the current user
                $phases = get_phase_for_program(null, $progId);
                $phase_tabs = get_phase_tab_info($progId);
                $content =  array(
                        'id' => $program[0]->id,
                        'type' => $program[0]->type,
                        'name' => $program[0]->name,
                        'description' => $program[0]->description,
                        'equipment' => $program[0]->equipment,
                        'duration' => $program[0]->duration,
                        'weekly_plan' => $program[0]->weekly_plan,
                        'thumbnail' => $program[0]->thumbnail,
                        'life_style' => $program[0]->life_style,
                          'phase_tabs' => $phase_tabs,
                        'phases' => $phases,
                        );
                $response = array();
                $response['user_id'] = $userId;
                $response['status'] = 'success';
                $response['program'] = $content;
                return $response;
                die();
            }
        }
        else
        {
            // this will work if the prog type is not rehab and no restrictions will be applied
            // return "ALL PHASES";
            $phases = get_phase_for_program(null, $progId);
             $phase_tabs = get_phase_tab_info($progId);
                $content =  array(
                        'id' => $program[0]->id,
                        'type' => $program[0]->type,
                        'name' => $program[0]->name,
                        'description' => $program[0]->description,
                        'equipment' => $program[0]->equipment,
                        'duration' => $program[0]->duration,
                        'weekly_plan' => $program[0]->weekly_plan,
                        'thumbnail' => $program[0]->thumbnail,
                        'life_style' => $program[0]->life_style,
                          'phase_tabs' => $phase_tabs,
                        'phases' => $phases,
                        );
                $response = array();
                $response['user_id'] = $userId;
                $response['status'] = 'success';
                $response['program'] = $content;
                return $response;
                die();
        }
    }
    else
    {   
        // continue to show the program details with all the phases and exercises
        $phases = get_phase_for_program(null, $progId);
          $phase_tabs = get_phase_tab_info($progId);
                $content =  array(
                        'id' => $program[0]->id,
                        'type' => $program[0]->type,
                        'name' => $program[0]->name,
                        'description' => $program[0]->description,
                        'equipment' => $program[0]->equipment,
                        'duration' => $program[0]->duration,
                        'weekly_plan' => $program[0]->weekly_plan,
                        'thumbnail' => $program[0]->thumbnail,
                        'life_style' => $program[0]->life_style,
                          'phase_tabs' => $phase_tabs,
                        'phases' => $phases,
                        );
                $response = array();
                $response['user_id'] = $userId;
                $response['status'] = 'success';
                $response['program'] = $content;
                return $response;
                die();
    }
}
add_action( 'rest_api_init', function () {
register_rest_route( 'curastream/v1', '/ongoing_program/', array(
    'methods' => 'POST',
    'callback' => 'ongoing_program',
));
});


// api for full body training program

function full_body_training(){
    header('Access-Control-Allow-Origin: *');
    $data = file_get_contents("php://input");
    $data = json_decode($data,TRUE);
    global $wpdb;

    $sportId = $data['sport'];
    $occId = $data['occupation'];
    $dev_cura_sport_occupation = $wpdb->prefix . 'cura_sport_occupation';
    $dev_cura_programs = $wpdb->prefix . 'cura_programs';
    $sport = $wpdb->get_var("SELECT name FROM $dev_cura_sport_occupation WHERE id = $sportId AND type LIKE '%sport%'");
    $occ = $wpdb->get_var("SELECT name FROM $dev_cura_sport_occupation WHERE id = $occId AND type LIKE '%occupation%'");
    if (empty($sport) && empty($occ)) {
         $response = array(
            'status' => 'success',
            'program' => 'null'
            );
        return $response;
    }
    // get the program that has the supplied sport or occ or both
    if (!empty($sportId) && empty($occId)) {
        // return "sport";
        $program = $wpdb->get_results("SELECT id, name, duration, description, equipment, thumbnail FROM $dev_cura_programs WHERE type LIKE '%strength%' AND sports_occupation LIKE '%$sport%'");
        $response = array(
            'status' => 'success',
            'program' => $program
            );
    }
    elseif (!empty($occId) && empty($sportId)) {
        // return "occ";
        $program = $wpdb->get_results("SELECT id, name, duration, description, equipment, thumbnail FROM $dev_cura_programs WHERE type LIKE '%strength%' AND  sports_occupation LIKE '%$occ%'");
        $response = array(
            'status' => 'success',
            'program' => $program
            );
    }
    elseif (!empty($occId) && !empty($sportId)) {
        $program = $wpdb->get_results("SELECT id, name, duration, description, equipment, thumbnail FROM $dev_cura_programs WHERE type LIKE '%strength%' AND sports_occupation LIKE '%$sport%' AND sports_occupation LIKE '%$occ%'");   
        $response = array(
            'status' => 'success',
            'program' => $program
            );
    }

    return $response;
}
add_action( 'rest_api_init', function () {
register_rest_route( 'curastream/v1', '/full_body_training/', array(
    'methods' => 'POST',
    'callback' => 'full_body_training',
));
});


