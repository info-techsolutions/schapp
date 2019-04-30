<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Get Student Report - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">Individual Student Report</h3>
                    <div id="printMe" class="ui message" style="display: none;"></div>
                    <div class="ui equal width form">
                       
                        <form id="individual-report-form" method="post" actionn="../classes/individual_student_report.php">

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
                                        <label>Admission Number</label>
                                        <input type="text" name="person_number" placeholder="EDU/2017/001" id="person_number">
                                    </div>


                                </div>

                            </div>


                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Get Report</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once'../pages/footer.php'; ?>
  <script src="../assets/js/individual_student_report.js"></script>
      <script src="../assets/js/jQuery.print.js"></script> 
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();     
        });
    </script>
      <script src="../assets/js/get_criteria.js"></script>
</body>
</html>
