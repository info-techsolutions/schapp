<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Editing Fees Payment Option  - MYSCHOOL APP';
include_once '../pages/header.php';

$fees_setup_id = $_GET['fees_setup_id'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_fees_setup WHERE fees_setup_id = :fees_setup_id");
$stmt->execute(array(
   ':fees_setup_id' => $fees_setup_id 
));

$row = $stmt->fetch();

$name = $row['name'];
?>
<?php include_once'../pages/menu.php'; ?>
 
<div class="pusher">
<div class="ui container">
  <!-- BODY -->
  <body>
  	
  	
  	 <?php include_once'../pages/menuoptions.php'; ?>
  	 <div class="ui basic segment">
 	<div class="ui main text container">
                        <h3 class="ui header">Editing Fees Payment options: <h6><?php echo $name;  ?></h6> </h3>
                        <div class="ui message" style="display: none;"></div>
                        <div class="ui equal width form">
                            
                            <form id="fees-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Option type</label>
                                    <input type="hidden" name="fees_setup_id" value="<?php echo $fees_setup_id; ?>">
                                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="">
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
    <script src="../assets/js/fees_setup_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</html>
