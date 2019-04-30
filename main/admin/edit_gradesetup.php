<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Editing Grade setup - MYSCHOOL APP';
include_once '../pages/header.php';

$gradesetupId = $_GET['gradesetup_id'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_gradesetup WHERE gradesetup_id = :gradesetup_id");
$stmt->execute(array(
   ':gradesetup_id' => $gradesetupId 
));

$row = $stmt->fetch();

$name = $row['remark'];
?>
<?php include_once'../pages/menu.php'; ?>
 
<div class="pusher">
<div class="ui container">
  <!-- BODY -->
  <body>
  	
  	
  	 <?php include_once'../pages/menuoptions.php'; ?>
  	 <div class="ui basic segment">
 	<div class="ui main text container">
                        <h3 class="ui header">Editing Grade setup: <h6><?php echo $name;  ?></h6> </h3>
                        <div class="ui message" style="display: none;"></div>
                        <div class="ui equal width form">
                            
                            <form id="gradesetup-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>From</label>
                                    <input type="hidden" name="gradesetup_id" value="<?php echo $gradesetupId; ?>">
                                    <input type="text" name="froms" id="froms" value="<?php echo $row['froms']; ?>" placeholder="Subject name">
                                </div>
                                <div class="field">
                                    <label>To</label>
                                    <input type="text" name="tos" id="tos" value="<?php echo $row['tos']; ?>" placeholder="Subject name">
                                </div>
                                
                                <div class="field">
                                    <label>Year</label>
                                    <input type="text" name="grade" id="grade" value="<?php echo $row['grade']; ?>" placeholder="Subject name">
                                </div>
                                
                                <div class="field">
                                    <label>Remark</label>
                                    <input type="text" name="remark" id="remark" value="<?php echo $name; ?>" placeholder="Subject name">
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
    <script src="../assets/js/gradesetup_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</html>
