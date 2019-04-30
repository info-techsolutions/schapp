<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Individual Subject Report - MYSCHOOL APP';
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
                    <h3 class="ui header">Individual Subject Report</h3>
                    <div class="ui equal width form">
                        <div id="printMe" class="ui message" style="display: none;"></div>
                        <form id="individual-subject-form" method="post" actionn="../classes/individual_student_report.php">

                            <div class="wrapper">
                                <div class="fields">

                                    <div class="field">

                                        <label>Session</label>
                                        <select id="sessions" name="sessions">
                                        </select>
                                    </div>

                                    <div class="field">

                                        <label>Terms</label>
                                        <select id="terms" name="terms">
                                        </select>
                                    </div>

                                    <div class="field">

                                        <label>Classes</label>
                                        <select id="classes" name="classes">
                                        </select>
                                    </div>

                                   <div class="field">

                                        <label>Subject</label>
                                        <select id="subjects" name="subjects">
                                        </select>
                                    </div>


                                </div>

                            </div>


                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Get Report</button></div>
                            </div>
                        </form>
                    </div>
                            </div> <!-- End of main container -->
            </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->
    <?php include_once'../pages/footer.php'; ?>
    
   <script src="../assets/js/jQuery.print.js"></script> 
  <script src="../assets/js/individual_subject_report.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
            
        });
    </script>
    <script src="../assets/js/get_criteria.js"></script>
</html>
