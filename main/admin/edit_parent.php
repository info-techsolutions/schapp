<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Editing parent - MYSCHOOL APP';
include_once '../pages/header.php';

$personNumber = $_GET['person_number'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_person WHERE person_number = :person_number");
$stmt->execute(array(
   ':person_number' => $personNumber 
));

$row = $stmt->fetch();

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$phone = $row['phone'];
$address = $row['address'];
?>
<?php include_once'../pages/menu.php'; ?>
 
<div class="pusher">
<div class="ui container">
  <!-- BODY -->
  <body>
  	
  	
  	 <?php include_once'../pages/menuoptions.php'; ?>
  	 <div class="ui basic segment">
 	<div class="ui main text container">
                        <h3 class="ui header">Update Parent with username: <h6><?php echo $personNumber;  ?></h6> </h3>
                        <div class="ui message" style="display: none;"></div>
                        <div class="ui equal width form">
                            <form id="parent-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Firstname</label>
                                    <input type="hidden" name="person_number" value="<?php echo $personNumber; ?>" placeholder="Admission Number">
                                    <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" placeholder="Firstname">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" placeholder="lastname">
                                </div>
                                <div class="field">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" value="<?php echo $phone; ?>" id="phone" placeholder="phone">
                                </div>
                               
                            </div>
                            <div class="fields">
                                

                                <div class="field">
                                    <label>Address</label>
                                    <textarea rows="2" name="address" id="address"><?php echo $address; ?></textarea>
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
    <script src="../assets/js/parent_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</html>
