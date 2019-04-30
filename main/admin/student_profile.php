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
//$class_name = $_GET['class_name'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_person WHERE person_number = :person_number");
$stmt->execute(array(
   ':person_number' => $personNumber 
));

$row = $stmt->fetch();

//$personNumber = $row['person_number'];
//$firstname = $row['firstname'];
//$lastname = $row['lastname'];
//$phone = $row['phone'];
//$address = $row['address'];
//$name = $firstname.' '.$lastname;
?>

<?php include_once'../pages/menu.php'; ?>
 
<div class="pusher">
<div class="ui container">
  <!-- BODY -->
  <body>
  	
  	
  	 <?php include_once'../pages/menuoptions.php'; ?>
  	 <div class="ui basic segment">
 	<div class="ui main text container">
                        <h3 class="ui header">Student Profile: <h6><?php // echo $personNumber. ';&nbsp;&nbsp;Name: '.$name. ';&nbsp;&nbsp;Current Class:  '.$class_name; ?></h6> </h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                          
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
