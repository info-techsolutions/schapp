<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Editing Score - MYSCHOOL APP';
include_once '../pages/header.php';

$score = $_GET['score'];
$subjectId = $_GET['subject_id'];
$testId = $_GET['test_id'];
$sessionId = $_GET['session_id'];
$termId = $_GET['term_id'];
$classId = $_GET['class_id'];
$personNumber = $_GET['person_number'];

include_once '../inc/config.php';

$stmt = $db->prepare("SELECT DISTINCT z_tb_test.name AS testname, z_tb_session.year, z_tb_term.name AS termname, z_tb_grade.person_number, z_tb_subjects.name AS subject FROM
                                     z_tb_grade, z_tb_subjects, z_tb_session, z_tb_term, z_tb_class, z_tb_test, z_tb_person WHERE 
                                     z_tb_test.test_id = z_tb_grade.test_id AND z_tb_grade.test_id = '$testId'
                                     AND z_tb_subjects.subject_id = z_tb_grade.subject_id 
                                     AND z_tb_grade.subject_id = '$subjectId' AND z_tb_session.session_id = z_tb_grade.session_id AND
                                     z_tb_grade.session_id = '$sessionId' AND z_tb_term.term_id = z_tb_grade.term_id AND z_tb_grade.term_id = '$termId'
                                     AND z_tb_class.class_id = z_tb_grade.class_id AND z_tb_grade.class_id = '$classId'                                     
                                     AND z_tb_person.person_number = z_tb_grade.person_number AND z_tb_grade.person_number = '$personNumber'
                                     AND z_tb_grade.score = $score
                                     ORDER BY z_tb_grade.person_number");
                                     
$stmt->execute();

$row = $stmt->fetch();
$subjectName = $row["subject"];
$testName = $row["testname"];
$sessionName = $row["year"];
$termName = $row["termname"];

?>
<?php include_once'../pages/menu.php'; ?>
 
<div class="pusher">
<div class="ui container">
  <!-- BODY -->
  <body>
  	
  	
  	 <?php include_once'../pages/menuoptions.php'; ?>
  	 <div class="ui basic segment">
 	<div class="ui main text container">
                        <h3 class="ui header">Editing Score: <h6><?php echo 'for: '. $personNumber;  ?>;
                        <?php echo 'Subject: '. $subjectName;  ?>;
                        <?php echo 'Test: '. $testName;  ?>;
                         <?php echo 'Term: '. $termName;  ?>;
                          <?php echo 'Session: '. $sessionName;  ?></h6> </h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="score-update-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Term name</label>
                                    <input type="hidden" name="session_id" id="session_id" value="<?php echo $sessionId; ?>">
                                    <input type="hidden" name="term_id" id="term_id" value="<?php echo $termId; ?>">
                                    <input type="hidden" name="class_id" id="class_id" value="<?php echo $classId; ?>">
                                    <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $subjectId; ?>">
                                    <input type="hidden" name="test_id" id="test_id" value="<?php echo $testId; ?>">
                                    <input type="hidden" name="person_number" id="person_number" value="<?php echo $personNumber; ?>">
                                    <input type="text" name="score" id="score" value="<?php echo $score; ?>" placeholder="Enter score">
                                </div>
                            </div>
                           
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">update</button></div>
                            </div>
                            </form>
                        </div>
                                                        </div> <!-- End of main container -->
            </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->
         
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/score_update_form.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</html>
