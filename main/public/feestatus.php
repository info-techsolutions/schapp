<?php
$myTitle = 'Get School Fees - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">School Fees Report</h3>
                    <div class="ui equal width form">
                        <div id="printMe" class="ui message" style="display: none;"></div>
                        <form id="fee-status" method="post">

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

                                   <!-- <div class="field">
                                        <label>Admission Number</label>
                                        <input type="text" name="person_number" placeholder="Student Admission Number" id="person_number">
                                    </div>-->


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
    <script src="../assets/js/feestatus.js"></script>
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
