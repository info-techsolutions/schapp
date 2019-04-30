<?php
$myTitle = 'Showing session - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';
// Let's confirm deletion
if (isset($_GET['delstudent'])) {
    $stmt = $db->prepare('DELETE FROM z_tb_person WHERE person_number = :person_number');
    $stmt->execute(array(':person_number' => $_GET['delstudent']));

    header('Location: show_student.php?action=deleted');
    exit();
}
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">Showing Students</h3>
                    <div class="ui equal width form">
                        <?php
                        // Lets get the action status
                        if (isset($_GET['action'])) {
                            echo '<h3>Student ' . $_GET['action'] . '</h3>';
                        }
                        ?>
                        <div class="ui message" style="display: none;"></div>
                        <table id="example" class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Admission Number</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Admission Number</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                try {
                                    include_once '../inc/config.php';
                                    $r = 1;
                                    $stmt = $db->query('SELECT person_number, firstname, lastname, created_at FROM z_tb_person ORDER BY person_number ASC');
                                    while ($row = $stmt->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['person_number']; ?></td>
                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php echo date('jS M, Y', strtotime($row['created_at'])); ?></td>
                                            <td>
                                                <a class="tiny ui button" href="edit_student.php?student_number=<?php echo $row['person_number']; ?>"><i class="left edit icon"></i>edit</a>
                                                <a class="tiny ui button red" href="javascript:delstudent('<?php echo $row['person_number']; ?>','<?php echo $row['firstname']; ?>')"><i class="left delete icon"></i>delete</a>
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
        
        function delstudent(id, firstname)
            {
                if (confirm("Are you sure you want to delete '" + firstname + "'"))
                {
                    window.location.href = 'show_student.php?delstudent=' + id;
                }
            }
    </script>
</body>
</html>
