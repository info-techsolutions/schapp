<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}


$myTitle = 'Editing student - MYSCHOOL APP';
include_once '../pages/header.php';

$personNumber = $_GET['student_number'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_person WHERE person_number = :person_number");
$stmt->execute(array(
   ':person_number' => $personNumber 
));

$row = $stmt->fetch();

$personNumber = $row['person_number'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$phone = $row['phone'];
$address = $row['address'];
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                    <div class="ui main text container">
                        <h3 class="ui header">Update Student Fees Status: <h6><?php echo $personNumber;  ?></h6> </h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="fee-status-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <input type="hidden" name="person_number" value="<?php echo $personNumber; ?>" id="person_number">
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

                                        <label>Payment Status</label>
                                        <select id="payment_status" name="payment_status">
                                            <option value="PENDING">PENDING</option>
                                            <option value="HALF">HALF</option>
                                            <option value="FULL">FULL</option>
                                        </select>
                                    </div>
                                
                            </div>
                           
                            
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">update</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/fee_status.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
            
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
</body>
</html>
