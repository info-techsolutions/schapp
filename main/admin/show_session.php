<?php
session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Showing session - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';
// Let's confirm deletion
if (isset($_GET['delsession'])) {
    $stmt = $db->prepare('DELETE FROM z_tb_session WHERE session_id = :session_id');
    $stmt->execute(array(':session_id' => $_GET['delsession']));

    header('Location: show_session.php?action=deleted');
    exit();
}
?>
<?php include_once'../pages/menu.php'; ?>

<div class="pusher">
    <div class="ui container">
        <!-- BODY -->
        <body>


            <?php include_once'../pages/menuoptions.php'; ?>
            <div class="ui basic segment">
                <div class="ui main text container">
                    <button id="add-admin" class="tiny ui button teal"><i class="left add icon"></i>add</button>
                    <h3 class="ui header">Showing Sessions</h3>
                    <?php
                    // Lets get the action status
                    if (isset($_GET['action'])) {
                        echo '<h3>Session ' . $_GET['action'] . '</h3>';
                    }
                    ?>
                    <table id="example" class="ui celled table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                           
          <?php
    
                            try {
                                include_once '../inc/config.php';
                                $r = 1;
                                $stmt = $db->query('SELECT session_id, year FROM z_tb_session ORDER BY session_id ASC');
                                while ($row = $stmt->fetch()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $r; ?></td>
                                        <td><?php echo $row['year']; ?></td>
                                        <td>
                                            <a class="tiny ui button" href="edit_session.php?session_id=<?php echo $row['session_id']; ?>"><i class="left edit icon"></i>edit</a>
                                            <a class="tiny ui button red" href="javascript:delsession('<?php echo $row['session_id']; ?>','<?php echo $row['year']; ?>')"><i class="left delete icon"></i>delete</a>
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

<!-- Modal -->
<div class="ui modal" id="add-session">
    <i class="close icon"></i>
    <div class="header">
        Add Session
    </div>

    <div class="content">
        <div class="ui message" style="display: none;"></div>
        <div class="ui form session_form">
            <div class="ui equal width form">

                <form id="session-form" method="post">

                    <div class="fields">

                        <div class="field">
                            <label>Session Year</label>
                            <input type="text" name="year" id="year" placeholder="e.g 20../20..">
                        </div>

                    </div>
                    <div class="actions">
                        <div><button class="ui blue right icon button submit" type="submit">Add</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php include_once'../pages/footer.php'; ?>
<script src="../assets/js/add_session.js"></script>
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.semanticui.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();

        $('#add-admin').on('click', function () {
            $('.ui.modal').modal('show');
        });

    });

    function delsession(id, times_opened)
    {
        if (confirm("Are you sure you want to delete session Year: '" + times_opened + "'"))
        {
            window.location.href = 'show_session.php?delsession=' + id;
        }
    }
</script>
</html>
