<?php
$myTitle = 'Search Student - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">Student grade</h3>
                    <div class="ui equal width form">
                        <div class="ui message" style="display: none;"></div>
                        <form id="all-class-form" method="post">

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

                                        <label>Test</label>
                                        <select id="tests" name="tests">
                                        </select>
                                    </div>

                                </div>
                                <div class="fields">

                                    <div class="field">

                                        <label>Subject</label>
                                        <select id="subjects" name="subjects">
                                        </select>
                                    </div>

                                    <div class="field">

                                        <label>Classes</label>
                                        <select id="classes" name="classes">
                                        </select>
                                    </div>

                                    <div class="field">

                                        <label>Arms</label>
                                        <select id="arms" name="arms">
                                        </select>
                                    </div>

                                </div>
                            </div>


                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Search student</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once'../pages/footer.php'; ?>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();

            /* Let's get subject */
            $.getJSON("http://127.0.0.1/schapp/main/classes/get_subjects.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#subjects").append("<option value=" + value.subject_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get subject */

            /* Let's get the test */
            $.getJSON("http://127.0.0.1/schapp/main/classes/get_tests.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#tests").append("<option value=" + value.test_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get test */

            /* Let's get classes */
            $.getJSON("http://127.0.0.1/schapp/main/classes/get_classes.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#classes").append("<option value=" + value.class_id + ">" + value.name + "</option>");
                    $("#classes1").append("<option value=" + value.class_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get classes */

            /* Let's get arms */
            $.getJSON("http://127.0.0.1/schapp/main/classes/get_arms.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#arms").append("<option value=" + value.arm_id + ">" + value.name + "</option>");
                    $("#arms1").append("<option value=" + value.arm_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get arms */

            /* Let's get sessions */
            $.getJSON("http://127.0.0.1/schapp/main/classes/get_sessions.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#sessions").append("<option value=" + value.session_id + ">" + value.year + "</option>");
                });
            });
            /* End of let's get sessions */


            /* Let's get term */
            $.getJSON("http://127.0.0.1/schapp/main/classes/get_terms.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#terms").append("<option value=" + value.term_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get term */

        });
    </script>
    <script src="../assets/js/search_student.js"></script>
</body>
</html>
