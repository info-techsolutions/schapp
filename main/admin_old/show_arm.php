<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}


$myTitle = 'Showing Arm - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';
// Let's confirm deletion
if (isset($_GET['delarm'])) {
    $stmt = $db->prepare('DELETE FROM z_tb_arm WHERE arm_id = :arm_id');
    $stmt->execute(array(':arm_id' => $_GET['delarm']));

    header('Location: show_arm.php?action=deleted');
    exit();
}
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                <button id="add-arm" class="tiny ui button teal"><i class="left add icon"></i>add</button>
                    <h3 class="ui header">Showing Arm</h3>
                    <div class="ui equal width form">
                        <?php
                        // Lets get the action status
                        if (isset($_GET['action'])) {
                            echo '<h3>Arm ' . $_GET['action'] . '</h3>';
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
                                    $stmt = $db->query('SELECT arm_id, name FROM z_tb_arm ORDER BY arm_id ASC');
                                    while ($row = $stmt->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td>
                                                <a class="tiny ui button" href="edit_arm.php?arm_id=<?php echo $row['arm_id']; ?>"><i class="left edit icon"></i>edit</a>
                                                <a class="tiny ui button red" href="javascript:delarm('<?php echo $row['arm_id']; ?>','<?php echo $row['name']; ?>')"><i class="left delete icon"></i>delete</a>
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
         <!-- Modal -->
    <div class="ui modal" id="add-session">
        <i class="close icon"></i>
        <div class="header">
            Add Arm
        </div>
       
        <div class="content">
        <div class="ui message" style="display: none;"></div>
            <div class="ui form">
                <div class="ui equal width form">
                            
                             <form id="arm-form" method="post">
                            <div class="fields">
                                <div class="field">
                                    <label>Arm Name</label>
                                    <input type="text" name="name" id="name" placeholder="Arm name">
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
    <script src="../assets/js/add_arm.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
            
              $('#add-arm').on('click', function () {
              $('.ui.modal').modal('show');
           });

        });
        
        function delarm(id, name)
            {
                if (confirm("Are you sure you want to delete '" + name + "'"))
                {
                    window.location.href = 'show_subject.php?delsubject=' + id;
                }
            }
    </script>
</body>
</html>
