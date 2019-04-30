<?php
$myTitle = 'Showing Student Score - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';
// Let's confirm deletion
if (isset($_GET['delterm'])) {
    $stmt = $db->prepare('DELETE FROM z_tb_term WHERE term_id = :term_id');
    $stmt->execute(array(':term_id' => $_GET['delterm']));

    header('Location: show_term.php?action=deleted');
    exit();
}

    $sessions = $_POST["sessions"];
    $terms = $_POST["terms"];
    $classes = $_POST["classes"];
    $subjects = $_POST["subjects"];
    
    $stmt = $db->prepare("SELECT z_tb_subjects.name FROM z_tb_grade, z_tb_subjects WHERE z_tb_subjects.subject_id = z_tb_grade.subject_id AND z_tb_grade.subject_id = :subject_id");
    $stmt->execute(array(
    	':subject_id' => $subjects
    ));   
    $row = $stmt->fetch();
    $subjectName = $row['name'];

?>
		
                        <div class="ui message" style="display: none;"></div>
                        <div id="printMe">
                        <p>Viewing Subject For: <strong><?php echo $subjectName; ?></strong></p>
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
                                    $stmt = $db->query("SELECT DISTINCT z_tb_grade.person_number, score, z_tb_test.name, z_tb_grade.test_id FROM
                                     z_tb_grade, z_tb_subjects, z_tb_session, z_tb_term, z_tb_class, z_tb_test, z_tb_person WHERE 
                                     z_tb_test.test_id = z_tb_grade.test_id AND z_tb_subjects.subject_id = z_tb_grade.subject_id 
                                     AND z_tb_grade.subject_id = '$subjects' AND z_tb_session.session_id = z_tb_grade.session_id AND
                                     z_tb_grade.session_id = '$sessions' AND z_tb_term.term_id = z_tb_grade.term_id AND z_tb_grade.term_id = '$terms'
                                     AND z_tb_class.class_id = z_tb_grade.class_id AND z_tb_grade.class_id = '$classes'                                     
                                     AND z_tb_person.person_number = z_tb_grade.person_number 
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
                        <a class="ui small teal button print" >Print</a>
                        </div>
                        
    <?php // include_once'../pages/footer.php'; ?>
    
   <script src="../assets/js/jQuery.print.js"></script>
    <script src="../assets/js/signup.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            
            $("#printMe").find('.print').on('click', function () {
            $.print("#printMe");
        });

        });
        
        function delterm(id, name)
            {
                if (confirm("Are you sure you want to delete '" + name + "'"))
                {
                    window.location.href = 'show_term.php?delterm=' + id;
                }
            }
    </script>

