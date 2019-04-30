<?php
session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}


$myTitle = 'Showing Student Score - MYSCHOOL APP';
include_once '../pages/header.php';

$sessions = $_GET['session_id'];
$classes = $_GET['class_id'];
$terms = $_GET['term_id'];
$subjects = $_GET['subject_id'];
$tests = $_GET['test_id'];
$personNumber = $_GET['person_number'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT name FROM z_tb_grade, z_tb_subjects WHERE
 z_tb_subjects.subject_id = z_tb_grade.subject_id AND z_tb_grade.subject_id = '$subjects' ");
$stmt->execute();
$row = $stmt->fetch();
$subName = $row['name'];
?>
<?php include_once'../pages/menu.php'; ?>

<div class="pusher">
    <div class="ui container">
        <!-- BODY -->
        <body>


            <?php include_once'../pages/menuoptions.php'; ?>
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">View  <?php echo $personNumber; ?> Score for <?php echo $subName; ?></h3> <a href="individual_subject_score_view.php" class="ui small primary button" style="color: #ffffff;"> << Back</a></span>
                    
                        <table id="example" class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Admission Number</th>
                                    <th>Score</th>
                                    <th>Test</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Admission Number</th>
                                    <th>Score</th>
                                    <th>Test</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                try {
                                    include_once '../inc/config.php';
                                    $r = 1;
                                    $stmt = $db->query("SELECT DISTINCT z_tb_grade.person_number, z_tb_subjects.name AS subName, score, z_tb_test.name, z_tb_grade.test_id FROM
                                     z_tb_grade, z_tb_subjects, z_tb_session, z_tb_term, z_tb_class, z_tb_test, z_tb_person WHERE 
                                     z_tb_test.test_id = z_tb_grade.test_id 
                                     AND z_tb_subjects.subject_id = z_tb_grade.subject_id AND z_tb_grade.subject_id = '$subjects'
                                     AND z_tb_session.session_id = z_tb_grade.session_id AND z_tb_grade.session_id = '$sessions' 
                                     AND z_tb_term.term_id = z_tb_grade.term_id AND z_tb_grade.term_id = '$terms'
                                     AND z_tb_test.test_id = z_tb_grade.test_id AND z_tb_grade.test_id = '$tests'
                                     AND z_tb_class.class_id = z_tb_grade.class_id AND z_tb_grade.class_id = '$classes'                                     
                                     AND z_tb_person.person_number = z_tb_grade.person_number AND z_tb_grade.person_number = '$personNumber'
                                     ORDER BY z_tb_grade.person_number");
                                    while ($row = $stmt->fetch()) {
                                        $testId = $row['test_id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['person_number']; ?></td>
                                            <td><?php echo $row['score']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td>
                                                <a class="tiny ui button" href="edit_score.php?score=<?php echo $row['score']; ?>&subject_id=<?php echo $subjects; ?>&test_id=<?php echo $testId; ?>&session_id=<?php echo $sessions; ?>&term_id=<?php echo $terms; ?>&person_number=<?php echo $row['person_number']; ?>&class_id=<?php echo $classes; ?>"><i class="left edit icon"></i>edit</a>
                                                <a class="tiny ui button red" href="javascript:delterm('<?php echo $row['score']; ?>','<?php echo $row['score']; ?>')"><i class="left delete icon"></i>delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $r++;
                                    }
                                } catch (PDOException $exc) {
                                    echo $exc->getMessage();
                                }
                                ?>
                            </tbody>
                        </table>
                    </div> <!-- End of main container -->
                </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->
<?php include_once'../pages/footer.php'; ?>
</html>
