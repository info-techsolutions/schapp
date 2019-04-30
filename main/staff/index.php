<?php
session_start(); //Start the current session
session_name("Staff");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Welcome to MYSCHOOL APP - Welcome to demo page';

$sid = $_SESSION['sid'];
$username = $_SESSION['username'];

include_once '../pages/header.php';
?>

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
<body>
    <div class="ui bottom attached segment pushable">
<?php include_once '../pages/menu.php'; ?>
        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                   Welcome ..............
                </div>
            </div>
        </div>
    </div>
    <?php include_once'../pages/footer.php'; ?>
    
</body>
</html>
