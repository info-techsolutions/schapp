<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Editing subject - MYSCHOOL APP';
include_once '../pages/header.php';

$subjectId = $_GET['subject_id'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_subjects WHERE subject_id = :subject_id");
$stmt->execute(array(
   ':subject_id' => $subjectId 
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
                        <h3 class="ui header">Editing Subject: <h6><?php echo $name;  ?></h6> </h3>
                        <div class="ui message" style="display: none;"></div>
                        <div class="ui equal width form">
                            
                            <form id="subject-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Subject name</label>
                                    <input type="hidden" name="subject_id" value="<?php echo $subjectId; ?>">
                                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Subject name">
                                </div>
                            </div>
                           
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">update subject</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/subject_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
