<?php
$myTitle = 'Showing Student Score - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">Run Project Report</h3>
                    <div class="ui equal width form">
                     
                        <div class="ui message" style="display: none;"></div>
        <?php
            set_include_path('../reportico-4.6');
            require_once('../reportico-4.6/reportico.php'); 
            $q = new reportico();
            $q->initial_project = "zenny";
            $q->initial_project_password = "admin";
            $q->initial_execute_mode = "MENU";
            $q->access_mode = "SInGLEPROJECT";
            $q->embedded_report = true;
            $q->execute();
          ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once'../pages/footer.php'; ?>
</body>
</html>
