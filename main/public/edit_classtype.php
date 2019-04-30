<?php
$myTitle = 'Editing Class type - MYSCHOOL APP';
include_once '../pages/header.php';

$classtypeId = $_GET['classtype_id'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_classtype WHERE classtype_id = :classtype_id");
$stmt->execute(array(
   ':classtype_id' => $classtypeId 
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
                            <form id="classtype-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Term name</label>
                                    <input type="hidden" name="classtype_id" value="<?php echo $classtypeId; ?>">
                                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="class type name">
                                </div>
                            </div>
                           
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">update</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/classtype_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
