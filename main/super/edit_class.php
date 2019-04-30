<?php
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

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                    <div class="ui main text container">
                        <h3 class="ui header">Editing Class: <h6><?php echo $name;  ?></h6> </h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="class-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Term name</label>
                                    <input type="hidden" name="class_id" value="<?php echo $classId; ?>">
                                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Arm name">
                                </div>
                            </div>
                           
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">update term</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/class_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
