<?php
session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}


$myTitle = 'Showing session - MYSCHOOL APP';
include_once '../pages/header.php';
?>
<?php include_once'../pages/menu.php'; ?>

<div class="pusher">
    <div class="ui container">
        <!-- BODY -->
        <body>


<?php include_once'../pages/menuoptions.php'; ?>
            <div class="ui basic segment">
                <div class="ui main text container">
                    <div class="ui vertical stripe segment">
                        <div class="ui text container">

                            <h4 class="ui horizontal header divider">
                                <a href="#">OOPS!!! We will come by shortly!</a>
                            </h4>
                            <h3 class="ui header">Site Under Construction!</h3>
                            <p>Our Team of Software Engineers are tested and experienced developers implementing ERP. This implementations include customizations aimed at tuning up/down so-called big business solutions to meet your requirements including SME peculiarities. </p>
                            <a href="http://infotechsolutions.zennylimited.com/erp" target="_blank" class="ui large button teal">ERP Solutions Demo</a> <a target="_blank" href="http://infotechsolutions.zennylimited.com/e-learning" class="ui large button">e-learning Solution</a>
                        </div>
                    </div>


                </div> <!-- End of main container -->
            </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->

<?php include_once'../pages/footer.php'; ?>
</html>
