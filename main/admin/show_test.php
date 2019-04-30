<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Showing Test/Exams - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';
// Let's confirm deletion
if (isset($_GET['deltest'])) {
    $stmt = $db->prepare('DELETE FROM z_tb_test WHERE test_id = :test_id');
    $stmt->execute(array(':test_id' => $_GET['deltest']));

    header('Location: show_test.php?action=deleted');
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
                <button id="add-test" class="tiny ui button teal"><i class="left add icon"></i>add</button>
                    <h3 class="ui header">Showing Test</h3>
                        <?php
                        // Lets get the action status
                        if (isset($_GET['action'])) {
                            echo '<h3>class ' . $_GET['action'] . '</h3>';
                        }
                        ?>
                       
                        <table id="example" class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                     <th>S/N</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                try {
                                    include_once '../inc/config.php';
                                    $r = 1;
                                    $stmt = $db->query('SELECT test_id, name FROM z_tb_test ORDER BY test_id ASC');
                                    while ($row = $stmt->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td>
                                                <a class="tiny ui button" href="edit_test.php?test_id=<?php echo $row['test_id']; ?>"><i class="left edit icon"></i>edit</a>
                                                <a class="tiny ui button red" href="javascript:deltest('<?php echo $row['test_id']; ?>','<?php echo $row['name']; ?>')"><i class="left delete icon"></i>delete</a>
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
    <div class="ui modal" id="add-test">
        <i class="close icon"></i>
        <div class="header">
            Add Test Type
        </div>
       
        <div class="content">
         <div class="ui message" style="display: none;"></div>
            <div class="ui form">
                <div class="ui equal width form">
                           
                            
                             <form id="test-form" method="post">
                            <div class="fields">
                                <div class="field">
                                    <label>Test Name</label>
                                    <input type="text" name="name" id="name" placeholder="Test name">
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
    <script src="../assets/js/add_test.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            
            $('#add-test').on('click', function () {
              $('.ui.modal').modal('show');
           });
           
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();

        });
        
        function deltest(id, name)
            {
                if (confirm("Are you sure you want to delete '" + name + "'"))
                {
                    window.location.href = 'show_test.php?deltest=' + id;
                }
            }
    </script>
</html>
