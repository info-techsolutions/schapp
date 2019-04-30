<?php
$myTitle = 'Showing Class Type- MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';
// Let's confirm deletion
if (isset($_GET['delclasstype'])) {
    $stmt = $db->prepare('DELETE FROM z_tb_classtype WHERE classtype_id = :classtype_id');
    $stmt->execute(array(':classtype_id' => $_GET['delclasstype']));

    header('Location: show_classtype.php?action=deleted');
    exit();
}
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                <button id="add-classtype" class="tiny ui button teal"><i class="left add icon"></i>add</button>
                    <h3 class="ui header">Showing Class Type</h3>
                    <div class="ui equal width form">
                        <?php
                        // Lets get the action status
                        if (isset($_GET['action'])) {
                            echo '<h3>class type' . $_GET['action'] . '</h3>';
                        }
                        ?>
                        <div class="ui message" style="display: none;"></div>
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
                                    $stmt = $db->query('SELECT classtype_id, name FROM z_tb_classtype ORDER BY classtype_id ASC');
                                    while ($row = $stmt->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td>
                                                <a class="tiny ui button" href="edit_classtype.php?classtype_id=<?php echo $row['classtype_id']; ?>"><i class="left edit icon"></i>edit</a>
                                                <a class="tiny ui button red" href="javascript:delclasstype('<?php echo $row['classtype_id']; ?>','<?php echo $row['name']; ?>')"><i class="left delete icon"></i>delete</a>
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
            Add Class type
        </div>
       
        <div class="content">
            <div class="ui form">
                <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            
                             <form id="classtype-form" method="post">
                            <div class="fields">
                                <div class="field">
                                    <label>Class Type</label>
                                    <input type="text" name="name" id="name" placeholder="class Type">
                                </div>
                                
                            </div>
                                                       
                           <div class="actions">
			    <div><button class="ui blue right icon button submit" type="submit">Add</button></div>
			</div>
                            </form>
                            
                             
                            </form>
                        </div>
            </div>
        </div>
        
    </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/add_classtype.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            
            $('#add-classtype').on('click', function () {
              $('.ui.modal').modal('show');
           });

 	    $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
            
        });
        
        function delclasstype(id, name)
            {
                if (confirm("Are you sure you want to delete '" + name + "'"))
                {
                    window.location.href = 'show_classtype.php?delclasstype=' + id;
                }
            }
    </script>
</body>
</html>
