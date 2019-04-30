<?php
$myTitle = 'Editing subject - MYSCHOOL APP';
include_once '../pages/header.php';

$armId = $_GET['arm_id'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_arm WHERE arm_id = :arm_id");
$stmt->execute(array(
   ':arm_id' => $armId 
));

$row = $stmt->fetch();

$name = $row['name'];
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                    <div class="ui main text container">
                        <h3 class="ui header">Editing Arm: <h6><?php echo $name;  ?></h6> </h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="arm-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Subject name</label>
                                    <input type="hidden" name="arm_id" value="<?php echo $armId; ?>">
                                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Arm name">
                                </div>
                            </div>
                           
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">update arm</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/arm_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
