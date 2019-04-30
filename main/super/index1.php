<?php
$myTitle = 'Welcome to MYSCHOOL APP - Welcome to demo page';
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
