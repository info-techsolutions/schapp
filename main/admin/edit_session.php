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

$sessionId = $_GET['session_id'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_session WHERE session_id = :session_id");
$stmt->execute(array(
   ':session_id' => $sessionId 
));

$row = $stmt->fetch();

$year = $row['year'];
?>
<?php include_once'../pages/menu.php'; ?>
 
<div class="pusher">
<div class="ui container">
  <!-- BODY -->
  <body>
  	
  	
  	 <?php include_once'../pages/menuoptions.php'; ?>
  	 <div class="ui basic segment">
 	<div class="ui main text container">
                        <h3 class="ui header">Edit Session: <h6><?php echo $year;  ?></h6> </h3>
                        
                         <div class="ui message" style="display: none;"></div>
                        <div class="ui equal width form">
                           
                            <form id="session-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>No of times Opened</label>
                                    <input type="hidden" name="session_id" value="<?php echo $sessionId; ?>" placeholder="">
                                    <input type="text" name="year" id="year" value="<?php echo $year; ?>" placeholder="Firstname">
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
    <script src="../assets/js/session_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</html>