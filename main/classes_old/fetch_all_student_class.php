<?php
$myTitle = 'Showing All Class - MYSCHOOL APP';

include_once '../pages/header.php';
include_once '../inc/config.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $sessions = $_POST["sessions"];
    $terms = $_POST["terms"];
    $tests = $_POST["tests"];
    $subjects = $_POST["subjects"];
    $classes = $_POST["classes"];
    $arms = $_POST["arms"];
    ?>

    <div class="ui message" style="display: none;"></div>
    <table id="example" class="ui celled table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Admission Number</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Admission Number</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            try {
                include_once '../inc/config.php';
                $r = 1;
//                $stmt = $db->query("SELECT person_number, session_id, term_id, test_id, subject_id, class_id,"
//                        . " arm_id, score FROM z_tb_grade WHERE test_id = '$tests'"
//                        . " AND subject_id = '$subjects' AND class_id = '$classes' ");
                $stmt = $db->query("SELECT z_tb_session.session_id, z_tb_term.term_id,"
                        . " z_tb_test.test_id, z_tb_subjects.subject_id,"
                        . " z_tb_class.class_id AS class_id,"
                        . " z_tb_arm.arm_id AS arm_id, z_tb_person.person_number, firstname,"
                        . " lastname, z_tb_class.name AS class FROM"
                        . " z_tb_person, z_tb_session,"
                        . " z_tb_term, z_tb_test, z_tb_subjects, z_tb_class, z_tb_arm"
                        . " WHERE z_tb_session.session_id = '$sessions'"
                        . " AND z_tb_term.term_id = '$terms'"
                        . " AND z_tb_test.test_id = '$tests'"
                        . " AND z_tb_subjects.subject_id = '$subjects'"
                        . " AND z_tb_class.class_id = '$classes'"
                        . " AND z_tb_arm.arm_id = '$arms' AND typ = 'STUDENT'"
                        . " ORDER BY z_tb_person.person_id ");
                while ($row = $stmt->fetch()) {
                    ?>
                    <tr>
                        <td><?php echo $r; ?></td>
                        <td><?php echo $row["person_number"];  ?></td>
                        <td><?php echo $row["firstname"];  ?> </td>
                        <td><?php echo $row['lastname'];  ?></td>
                        <td><?php echo $row["class"];  ?> </td>
                        
                        <td>
                            <a class="tiny ui button" href="add_student_score.php?person_number=<?php echo $row['person_number']; ?>&session_id=<?php echo $row['session_id']; ?>&term_id=<?php echo $row['term_id'] ?>&test_id=<?php echo $row['test_id']; ?>&subject_id=<?php echo $row['subject_id']; ?>&class_id=<?php echo $row['class_id']; ?>&arm_id=<?php echo $row['arm_id']; ?>"><i class="left edit icon"></i>Add score</a>
                            <a class="tiny ui button red" href="javascript:delclass('<?php echo $row['person_number']; ?>','<?php echo $row['lastname']; ?>')"><i class="left delete icon"></i>delete</a>

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
    <!--                        </div>
                        </div>
                    </div>
                </div>
            </div>-->
    <?php // include_once'../pages/footer.php'; ?>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();

        });

        function delclass(id, name)
        {
            if (confirm("Are you sure you want to delete '" + name + "'"))
            {
                window.location.href = 'show_class.php?delclass=' + id;
            }
        }
    </script>
    <!--    </body>
        </html>-->
    <?php
}
?>
