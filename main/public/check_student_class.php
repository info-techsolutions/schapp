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
        });
    </script>
    <script src="../assets/js/search_student.js"></script>
    <script src="../assets/js/get_criteria.js"></script>
</body>
</html>
