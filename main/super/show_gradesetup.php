<?php
$myTitle = 'Showing Grade setup - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';
// Let's confirm deletion
if (isset($_GET['delgradesetup'])) {
    $stmt = $db->prepare('DELETE FROM z_tb_gradesetup WHERE gradesetup_id = :gradesetup_id');
    $stmt->execute(array(':gradesetup_id' => $_GET['delgradesetup']));

    header('Location: show_gradesetup.php?action=deleted');
    exit();
}
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">Showing Grade setup</h3>
                    <div class="ui equal width form">
                        <?php
                        // Lets get the action status
                        if (isset($_GET['action'])) {
                            echo '<h3>Grade Setup ' . $_GET['action'] . '</h3>';
                        }
                        ?>
                        <div class="ui message" style="display: none;"></div>
                        <table id="example" class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>grades</th>
                                    <th>remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>S/N</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>grades</th>
                                    <th>remark</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                try {
                                    include_once '../inc/config.php';
                                    $r = 1;
                                    $stmt = $db->query('SELECT gradesetup_id, tos, froms, grade, remark FROM z_tb_gradesetup ORDER BY gradesetup_id ASC');
                                    while ($row = $stmt->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['froms']; ?></td>
                                            <td><?php echo $row['tos']; ?></td>
                                            <td><?php echo $row['grade']; ?></td>
                                            <td><?php echo $row['remark']; ?></td>
                                            <td>
                                                <a class="tiny ui button" href="edit_gradesetup.php?gradesetup_id=<?php echo $row['gradesetup_id']; ?>"><i class="left edit icon"></i>edit</a>
                                                <a class="tiny ui button red" href="javascript:delgradesetup('<?php echo $row['gradesetup_id']; ?>','<?php echo $row['remark']; ?>')"><i class="left delete icon"></i>delete</a>
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
        
        function delgradesetup(id, remark)
            {
                if (confirm("Are you sure you want to delete grade setup: '" + remark + "'"))
                {
                    window.location.href = 'show_gradesetup.php?delgradesetup=' + id;
                }
            }
    </script>
</body>
</html>
