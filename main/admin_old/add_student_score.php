<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Adding Score for a student - MYSCHOOL APP';
include_once '../pages/header.php';

$personNumber = $_GET['person_number'];
$sessionId = $_GET['session_id'];
$termId = $_GET['term_id'];
$testId = $_GET['test_id'];
$subjectId = $_GET['subject_id'];
$classId = $_GET['class_id'];
$armId = $_GET['arm_id'];


include_once '../inc/config.php';
$stmt = $stmt = $db->prepare("SELECT person_id,"
        . " session_id, term_id, test_id, subject_id, z_tb_class.class_id AS class_id,"
        . " z_tb_term.name AS term_name, z_tb_subjects.name AS subject, z_tb_test.name AS test,"
        . " z_tb_arm.arm_id AS arm_id, person_number, firstname, lastname, z_tb_class.name"
        . " AS class FROM z_tb_person, z_tb_session, z_tb_term, z_tb_test,"
        . " z_tb_subjects, z_tb_class, z_tb_arm"
        . " WHERE z_tb_session.session_id = :sessions AND z_tb_term.term_id = :terms"
        . " AND z_tb_test.test_id = :tests AND z_tb_subjects.subject_id = :subjects"
        . " AND z_tb_class.class_id = :classes AND z_tb_arm.arm_id = :arms AND person_number = :person_number"
        . " ORDER BY z_tb_person.person_id ");
$stmt->execute(array(
    ':person_number' => $personNumber,
    ':sessions' => $sessionId,
    ':terms' => $termId,
    ':tests'=>$testId,
    ':subjects' => $subjectId,
    ':classes' => $classId,
    ':arms' => $armId
));
$row = $stmt->fetch();
//$stmt = $db->prepare("SELECT * FROM z_tb_person WHERE person_number = :person_number");
//$stmt->execute(array(
//   ':person_number' => $personNumber 
//));
//
//$row = $stmt->fetch();
//
//$firstname = $row['firstname'];
//$lastname = $row['lastname'];
//$phone = $row['phone'];
//$address = $row['address'];
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                    <div class="ui main text container">
                        <h3 class="ui header">Adding Score for student(<?php echo $row['lastname'].' ' .$row['firstname']; ?>) with Admission Number: </h3><h6> <?php echo $personNumber;  ?> in term: <?php echo $row['term_name'].' ('.$row['test'].')'; ?>; &nbsp; Subject: <?php echo $row['subject']; ?>, </h6>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="score-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Enter a score</label>
                                    <input type="hidden" name="person_number" id="person_number" value="<?php echo $personNumber; ?>">
                                    <input type="hidden" name="session_id" id="session_id"  value="<?php echo $sessionId; ?>">
                                    <input type="hidden" name="term_id" id="term_id" value="<?php echo $termId; ?>">
                                    <input type="hidden" name="test_id" id="test_id" value="<?php echo $testId; ?>">
                                    <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $subjectId; ?>">
                                    <input type="hidden" name="class_id" id="class_id" value="<?php echo $classId; ?>">
                                    <input type="hidden" name="arm_id" id="arm_id" value="<?php echo $armId; ?>">
                                    <input type="text" name="score" id="score" value="" placeholder="Enter a score">
                                </div>
                            </div>
                            
                            
                            
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Add</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/add_student_score.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
