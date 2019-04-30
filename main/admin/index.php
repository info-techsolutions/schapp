<?php
session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Welcome to MYSCHOOL APP - Welcome to Admin page';

$aid = $_SESSION['aid'];
$username = $_SESSION['username'];

include_once '../pages/header.php';
?>
<!--
<style type="text/css">
    body {
        background-color: #DADADA;
    }
    body > .grid {
        height: 100%;
    }
    .image {
        margin-top: -100px;
    }
    .column {
        max-width: 450px;
    }
</style>   

--> 

 <?php include_once'../pages/menu.php'; ?>
 
<div class="pusher">
<div class="ui container">
  <!-- BODY -->
  <body>
  	
  	
  	 <?php include_once'../pages/menuoptions.php'; ?>
  	 <div class="ui basic segment">
 	<div class="ui main text container">
 	
 	Welcome <?php echo $username; ?>! ..............
 	
 	</div> <!-- End of main container -->
 	</div>	<!-- End of segment -->
     
     
    	 	</body> <!-- ./ End of body -->
 	</div><!-- ./End of container -->
 </div><!-- ./End of pusher -->

 <?php include_once'../pages/footer.php'; ?>
</html>
