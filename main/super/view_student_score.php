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

$personNumber = $_GET['person_number'];
$subjectId = $_GET["subject_id"];
$testId = $_GET["test_id"];

$stmt = $db->prepare("SELECT person_number FROM z_tb_person");
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">Showing Student with Admission Number: <?php echo $personNumber; ?> </h3>
                    <div class="ui equal width form">
                        <?php
                        // Lets get the action status
                        if (isset($_GET['action'])) {
                            echo '<h3>Term ' . $_GET['action'] . '</h3>';
                        }
                        ?>
                        <div class="ui message" style="display: none;"></div>
                        <table id="example" class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Test</th>
                                    <th>Subject</th>
                                    <th>Score</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                     <th>S/N</th>
                                     <th>Test</th>
                                     <th>Subject</th>
                                    <th>Score</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                try {
                                    include_once '../inc/config.php';
                                    $r = 1;
                                    $stmt = $db->query("SELECT z_tb_test.name AS name, z_tb_subjects.name AS subject_name, score FROM z_tb_grade,  z_tb_test, z_tb_subjects"
                                     ." WHERE person_number = '$personNumber' AND z_tb_test.test_id = z_tb_grade.test_id AND"
                                     ." z_tb_grade.test_id = '$testId' AND z_tb_subjects.subject_id = z_tb_grade.subject_id" 
                                     ." AND z_tb_grade.subject_id = '$subjectId' ORDER BY grade_id ");
                                    while ($row = $stmt->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['subject_name']; ?></td>
                                            <td><?php echo $row['score']; ?></td>
                                            <td>
                                                <a class="tiny ui button" href="edit_score.php?score=<?php echo $row['score']; ?>"><i class="left edit icon"></i>edit</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/signup.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();

        });
        
        function delterm(id, name)
            {
                if (confirm("Are you sure you want to delete '" + name + "'"))
                {
                    window.location.href = 'show_term.php?delterm=' + id;
                }
            }
    </script>
</body>
</html>
