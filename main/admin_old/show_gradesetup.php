<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

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
                <button id="add-gradesetup" class="tiny ui button teal"><i class="left add icon"></i>add</button>
                    <h3 class="ui header">Showing Grade setup</h3>
                    <div class="ui equal width form">
                        <?php
                        // Lets get the action status
                        if (isset($_GET['action'])) {
                            echo '<h3>Grade Setup ' . $_GET['action'] . '</h3>';
                        }
                        ?>
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
    
     <!-- Modal -->
    <div class="ui modal" id="add-session">
        <i class="close icon"></i>
        <div class="header">
            Set-up Grade.
        </div>
       
        <div class="content">
        <div class="ui message" style="display: none;"></div>
            <div class="ui form">
                <div class="ui equal width form">
                            
                            <form id="grade-form" method="post">

                            <div class="wrapper">
                                <div class="fields">

                                    <div class="field">
                                        <label>From</label>
                                        <input type="text" name="from[]" id="from" placeholder="from">
                                    </div>
                                    <div class="field">
                                        <label>To</label>
                                        <input type="text" name="to[]" id="to" placeholder="to">
                                    </div>

                                    <div class="field">
                                        <label>Grade</label>
                                        <input type="text" name="grade[]" id="grade" placeholder="grade">
                                    </div>
                                    <div class="field">
                                        <label>Remark</label>
                                        <input type="text" name="remark[]" id="remark" placeholder="Remark">
                                    </div>
                                    <button class="ui compact labeled icon button add_field_button">
                                        <i class="add icon"></i>
                                        add
                                    </button>

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
    <script src="../assets/js/add_gradesetup.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            
            $('#add-gradesetup').on('click', function () {
              $('.ui.modal').modal('show');
           });
           
           
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
            var maxFields = 10; // maximum input boxes allowed
            var wrapper = $('.wrapper'); // Fields wrapper
            var addButton = $('.add_field_button'); // Add button 

            var x = 1; // initial input boxes count
            $(addButton).click(function (e) { // On add input button click
                e.preventDefault();
                if (x < maxFields) { // max input box allowed
                    x++; //input boxes increments
                    $(wrapper).append('<div class="fields">'
                            + '<div class="field">'
                            + '<label>From</label>'
                            + '<input type="text" name="from[]" id="from" placeholder="from">'
                            + '</div>'
                            + '<div class="field">'
                            + '<label>To</label>'
                            + '<input type="text" name="to[]" id="to" placeholder="To">'
                            + '</div>'
                            + '<div class="field">'
                            + '<label>Grade</label>'
                            + '<input type="text" name="grade[]" id="grade" placeholder="Grade">'
                            + '</div>'
                            + '<div class="field">'
                            + '<label>Remarks</label>'
                            + '<input type="text" name="remark[]" id="remark" placeholder="Remark">'
                            + '</div>'
                            + '<a href="#" class="ui tiny red button remove_field">Remove</a>'
                            + '</div>'); // Add input boxes
                }

            });
            $(wrapper).on('click', '.remove_field', function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });

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
