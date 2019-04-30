<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Editing Test - MYSCHOOL APP';
include_once '../pages/header.php';

$testId = $_GET['test_id'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_test WHERE test_id = :test_id");
$stmt->execute(array(
   ':test_id' => $testId 
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
                        <h3 class="ui header">Editing Test: <h6><?php echo $name;  ?></h6> </h3>
                        <div class="ui message" style="display: none;"></div>
                        <div class="ui equal width form">
                            
                            <form id="test-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Test name</label>
                                    <input type="hidden" name="test_id" value="<?php echo $testId; ?>">
                                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Test name">
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
    <script src="../assets/js/test_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</html>
