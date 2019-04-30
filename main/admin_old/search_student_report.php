<?php
session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Mass Assesment Upload - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
<?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">Add Student Assesment Per Term</h3>
                    <h5 class="ui color red">NB: Once you add a class score for a term, it may be difficult to update later!</h5>
                    <div class="ui message" style="display: none;"></div>
                    <div class="ui equal width form">

                        <form id="search-student-report" method="post">

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

                                </div>

                            </div>


                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Add</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/search_student_report.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();

        });

    </script>
    <script src="../assets/js/get_criteria.js"></script>
</body>
</html>
