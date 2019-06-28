<?php
/*
Plugin Name: Curastream
Description: Add Programs
Author: Admin
*/
// Used for page filtering 
include("objects/program.php");
include("objects/group.php");
include("objects/userTracking.php");
include("rest.php");
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
function load_wp_media_files() {
    // Enqueue WordPress media scripts
    wp_enqueue_media();
    wp_enqueue_script( 'wp-api' );
  }
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
/*Going to register the custom JavaScript and CSS File   */
function register_scripts_with_jquery(){   
    // Register the script like this for a plugin:
   // wp_register_style( '')
    wp_register_style( 'curastreamStyle', plugins_url( 'assets/css/style.css', __FILE__ ));
    wp_enqueue_style( 'curastreamStyle');
    wp_register_script( 'custom-programUI-script', plugins_url( 'assets/js/customProgramUI.js', __FILE__ ), "", "", true);
    wp_register_script( 'catagory-management-script', plugins_url( 'assets/js/categoryManagement.js', __FILE__ ), "", "", true);
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-programUI-script' );
    wp_enqueue_script( 'catagory-management-script' );
}
add_action( 'admin_print_styles', 'register_scripts_with_jquery' );
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
add_action( 'admin_menu', 'add_menu');
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
             add_submenu_page('curastreamPlugin','User Metrics','User Metrics',
                'curaProgEditor',
                'curastream/userMetrics.php',
                '',
                ''
            );
             add_submenu_page('curastreamPlugin','Corporate Pricing','Corporate Pricing',
                'curaProgEditor',
                'curastream/corpPricing.php',
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
        add_submenu_page('curastreamPlugin','API Testing','API Testing',
            'curaProgEditor',
            'curastream/testing_API.php',
            '',
            ''
        );
        add_submenu_page('curastreamPlugin','View Dashboard','View Dashboard',
            'curaProgEditor',
            get_site_url().'/my-programs',
            '',
            ''
        );
        add_submenu_page('curastreamPlugin','Corporate Accounts','Corporate Accounts',
            'curaProgEditor',
            'curastream/corpCreation.php',
            '',
            ''
        );
    }
}
add_action( 'admin_menu', 'add_submenu');
function load_wp_media(){
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media' );
// Endpoint for memberpress 
    add_action('rest_api_init', function(){
    });
    add_action('rest_api_init', function(){
    });
    add_action('rest_api_init', function(){
    });
function add_curastream_user_role() {
remove_role('curastreamProgramEditor');
    add_role('curastreamProgramEditor', 'Curastream Program Editor');
    // echo "Hello World";
    $role = get_role("curastreamProgramEditor");
    $role->add_cap( 'read');
    $role->add_cap('curaProgEditor');
    $role->add_cap('delete_posts');
    $role = get_role("administrator");
    $role->add_cap('curaProgEditor');
}
add_action( 'init', 'add_curastream_user_role');
function curastream_parent_page() {
echo "<h1>Welcome to the Curastream Plugin</h1>";
echo "<h3>Here are some useful Links</h3>";
echo ("<ul><li><a href=\"".get_site_url()."/wp-json/\">JSON Output</a></li></ul>");
echo ("<ul><li><a href=\"https://curastream.serveit.work/doc/\">JSON Output</a></li></ul>");
}