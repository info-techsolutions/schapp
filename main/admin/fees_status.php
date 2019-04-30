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
$class_name = $_GET['class_name'];

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
$name = $firstname.' '.$lastname;
?>

<?php include_once'../pages/menu.php'; ?>
 
<div class="pusher">
<div class="ui container">
  <!-- BODY -->
  <body>
  	
  	
  	 <?php include_once'../pages/menuoptions.php'; ?>
  	 <div class="ui basic segment">
 	<div class="ui main text container">
                        <h3 class="ui header">Update Student Fees Status: <h6><?php echo $personNumber. ';&nbsp;&nbsp;Name: '.$name. ';&nbsp;&nbsp;Current Class:  '.$class_name; ?></h6> </h3>
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

                                        <label>Class</label>
                                        <select id="classes" name="classes">
                                        </select>
                                    </div>
                                </div>
                                <div class="fields">
                                <div class="field">

                                        <label>Payment status</label>
                                        <select id="status" name="status">
                                        <?php
                                        $stmt = $db->prepare("SELECT name, status, amount, mode, comments FROM z_tb_fees_setup, z_tb_payment_status WHERE person_number = '$personNumber' AND z_tb_fees_setup.fees_setup_id = z_tb_payment_status.status  "); 
                                        $stmt->execute();
                                        $row = $stmt->fetch();
                                        $name = $row['name'];
                                        $status = $row['status'];
                                        $mode = $row['mode'];
                                        $amt = $row['amount'];
                                        $comm = $row['comments'];
                                        ?>
                                        <option value="1" <?php if ($name == 'NIL') echo 'selected = "selected"'; ?>>NIL</option>
                                        <option value="2"  <?php if ($name == 'HALF') echo 'selected = "selected"'; ?>>HALF</option>
                                        <option value="3" <?php if ($name == 'FULL') echo 'selected = "selected"'; ?>>FULL</option>
                                         </select>
                                    </div>
                                    
                                    <div class="field">

                                        <label>Payment Mode</label>
                                        <select id="mode" name="mode">
                                        <option value="cash" <?php if ($mode == 'cash') echo 'selected = "selected"'; ?>>Cash</option>
                                        <option value="bank" <?php if ($mode == 'bank') echo 'selected = "selected"'; ?>>Bank</option>
                                         
                                        <option value="online" <?php if ($mode == 'online') echo 'selected = "selected"'; ?>>Online</option>
                                        <option value="others" <?php if ($mode == 'others') echo 'selected = "selected"'; ?>>Others</option>
                                         ?>
                                       
                                        </select>
                                    </div>
                                    
                                    <div class="field">
                                <label>Amount</label>
                                <input type="number" value="<?php if ($amt == ''){ echo 0; } else{ echo $amt; }?>" name="amt" id="amt" placeholder="amount">
                            </div>
                            
                            <div class="field">
                                <label>Comments</label>
                                <textarea rows="2" name="comments" id="comments"><?php if ($comm == ''){ echo ''; } else{ echo $comm; }?></textarea>
                            </div>
                                
                            </div>
                           
                            
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">update</button></div>
                            </div>
                            </form>
                        </div>
                                   </div> <!-- End of main container -->
            </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/fee_status.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
            
            /*
             $.getJSON("../classes/get_payment_options.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#status").append("<option value=" + value.fees_setup_id + ">" + value.name + "</option>");
                });
            });
            */
        });
    </script>
    <script src="../assets/js/get_criteria.js"></script>
</html>
