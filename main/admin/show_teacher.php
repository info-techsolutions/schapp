<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Showing Teachers - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';
// Let's confirm deletion
if (isset($_GET['delteacher'])) {
    $stmt = $db->prepare('DELETE FROM z_tb_person WHERE person_number = :person_number');
    $stmt->execute(array(':person_number' => $_GET['delteacher']));

    header('Location: show_teacher.php?action=deleted');
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
                <button id="add-teacher" class="tiny ui button teal" href=""><i class="left add icon"></i>add</button>
                    <h3 class="ui header">Showing Teachers </h3> 
                        <?php
                        // Lets get the action status
                        if (isset($_GET['action'])) {
                            echo '<h3>Teacher ' . $_GET['action'] . '</h3>';
                        }
                        ?>
                        <div class="ui message" style="display: none;"></div>
                         
                        <table id="example" class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Username</th>
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
                                    $stmt = $db->query("SELECT person_number, firstname, lastname, created_at FROM z_tb_person, z_tb_user_role, z_tb_role
                                     WHERE 
                                     z_tb_person.person_id = z_tb_user_role.person_id AND z_tb_role.role_id = z_tb_user_role.role_id AND z_tb_role.name = 'STAFF' ORDER BY person_number ASC");
                                    while ($row = $stmt->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['person_number']; ?></td>
                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php echo date('jS M, Y', strtotime($row['created_at'])); ?></td>
                                            <td>
                                                <a class="tiny ui button" href="edit_teacher.php?person_number=<?php echo $row['person_number']; ?>"><i class="left edit icon"></i>edit</a>
                                                <a class="tiny ui button red" href="javascript:delteacher('<?php echo $row['person_number']; ?>','<?php echo $row['firstname']; ?>')"><i class="left delete icon"></i>delete</a>
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
    <div class="ui modal" id="add-teacher">
        <i class="close icon"></i>
        <div class="header">
            Add Teacher
        </div>
       
        <div class="content">
            <div class="ui form">
                <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="teacher-form" method="post">
                            <div class="fields">
                            <div class="field">
                                    <label>username</label>
                                    <input type="text" name="person_number" id="person_number" placeholder="provide any username" autocomplete="off">
                             </div>
                                <div class="field">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" id="firstname" placeholder="Firstname">
                             </div>
                                <div class="field">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" id="lastname" placeholder="lastname">
                                </div>
                                <div class="field">
                                    <label>Provide a secure password.</label>
                                    <input type="password" name="password" id="password" placeholder="provide a secure password">
                                </div>
                               
                            </div>
                            <div class="fields">
                            <div class="field">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" id="phone" placeholder="phone">
                                </div>
                                <div class="field">
                                    <label>Choose a gender:</label>
                                    <select name="gender" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Address</label>
                                    <textarea rows="2" name="address" id="address"></textarea>
                                </div>

                                <div class="field">
                                    <label>Browse and upload your picture</label>
                                    <input type="file" name="image">
                                </div>
                            </div>
                            
                            <div class="actions">
           
			    <div>
				<button class="ui blue right icon button submit" type="submit">Add</button>
			    </div>
			</div>
                          </form>
                        </div>
            </div>
        </div>
        
    </div>

    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/signup_teacher.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();

        });

           $('#add-teacher').on('click', function () {
              $('.ui.modal').modal('show');
           });
        
        function delteacher(id, firstname)
            {
                if (confirm("Are you sure you want to delete '" + firstname + "'"))
                {
                    window.location.href = 'show_teacher.php?delteacher=' + id;
                }
            }
    </script>
</html>
