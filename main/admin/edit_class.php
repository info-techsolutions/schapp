<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Editing Class - MYSCHOOL APP';
include_once '../pages/header.php';

$classId = $_GET['class_id'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_class WHERE class_id = :class_id");
$stmt->execute(array(
   ':class_id' => $classId 
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
                        <h3 class="ui header">Editing Class: <h6><?php echo $name;  ?></h6> </h3>
                        
                            <div class="ui message" style="display: none;"></div>
                        <div class="ui equal width form">
                            <form id="class-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Term name</label>
                                    <input type="hidden" name="class_id" value="<?php echo $classId; ?>">
                                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Arm name">
                                </div>
                            </div>
                           
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">update class</button></div>
                            </div>
                            </form>
                        </div>
                                           </div> <!-- End of main container -->
            </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/class_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</html>
