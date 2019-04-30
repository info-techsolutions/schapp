<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Showing Student Score - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<?php include_once'../pages/menu.php'; ?>

<div class="pusher">
    <div class="ui container">
        <!-- BODY -->
        <body>


            <?php include_once'../pages/menuoptions.php'; ?>
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">Run Project Report</h3>
                     
        <?php
            set_include_path('../reportico-4.6');
            require_once('../reportico-4.6/reportico.php'); 
            $q = new reportico();
            $q->initial_project = "zenny";
            $q->initial_project_password = "admin";
            $q->initial_execute_mode = "MENU";
            $q->access_mode = "SINGLEREPORT";
            $q->bootstrap_preloaded = false; // Set to true to use existing site bootstrap
            $q->embedded_report = true;
            $q->execute();
          ?> 
                           </div> <!-- End of main container -->
            </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->
    <?php include_once'../pages/footer.php'; ?>
</html>
