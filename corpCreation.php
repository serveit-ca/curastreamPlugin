<?php 
//include "objects/program.php";
function prefix_enqueue() 
{       
    // JS
    wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    wp_register_script('loadUI', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js');
    wp_register_script('loadselect2', site_url('/wp-content/plugins/Curastream/select2/dist/js/select2.min.js'));
    wp_enqueue_script('prefix_bootstrap');
    wp_enqueue_script('loadUI');
    wp_enqueue_script('loadselect2');

    // CSS
    wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('prefix_bootstrap');
}

 ?>
<html>
    <head>
        <title>Corp Creation</title>
        <style type="text/css">
        
        </style>
    </head>
    <script type="text/javascript">
    

    </script>
    <body>
        <?php
            $group = new group();
            $randAuth = $group->random_str(16); ?>

        <h1>Corporation Creation</h1>

        <div class="corp-form">
            <form method="POST" action="">
                <label for="corp-name">Corporation :</label>
                <input type="test" name="corp-name" id="corp-name">
                <label for="instruction-text">Instruction Text: </label>
                <input type="text" name="instruction-text" id="instruction-text">
                <label for="logo-url">Logo Url: </label>
                <input type="text" name="logo-url" id="logo-url">
                <label for="company-email">Company Email: </label>
                <input type="email" name="company-email" id="company-email">
                <label for="company-phone">Company Phone: </label>
                <input type="text" name="company-phone" id="company-phone">
                <label for="auth-token">Auth Token: </label>
                <input type="text" name="auth-token" disabled="true" value="<?php $randAuth ?>">

                <button type="submit" id="new-corp-submit">Submit</button>

            </form>
        </div>
    </body>
</html>
