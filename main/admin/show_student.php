<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Showing Students - MYSCHOOL APP';
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
<?php include_once'../pages/menu.php'; ?>
 
<div class="pusher">
<div class="ui container">
  <!-- BODY -->
  <body>
  	
  	
  	 <?php include_once'../pages/menuoptions.php'; ?>
  	 <div class="ui basic segment">
 	<div class="ui main text container">
                    <button id="add-student" class="tiny ui button teal"><i class="left add icon"></i>add</button>
                    <h3 class="ui header">Showing Students</h3>
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
                                    <th>School Fees</th>
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
                                    <th>School Fees</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                try {
                                    include_once '../inc/config.php';
                                    $r = 1;
                                    $stmt = $db->query("SELECT person_number, z_tb_class.name as class_name, payment_status, firstname, lastname, created_at FROM"
                                            . " z_tb_person, z_tb_class"
                                            . " WHERE typ = 'STUDENT' AND z_tb_class.class_id = z_tb_person.class_id"
                                            . " ORDER BY person_number ASC");
                                    while ($row = $stmt->fetch()) {
                                    $className = $row['class_name'];
                                    
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['person_number']; ?></td>
                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php
                                                if ($row['payment_status'] == '') {
                                                    echo 'Not available';
                                                } else {
                                                    echo $row['payment_status'];
                                                }
                                                ?></td> 
                                            <td><?php echo date('jS M, Y', strtotime($row['created_at'])); ?></td>
                                            <td>
                                                <a class="tiny ui button blue" href="student_profile.php?student_number=<?php echo $row['person_number']; ?>"><i class="left dashboard icon"></i>Profile</a>
                                                <a class="tiny ui button teal" href="fees_status.php?student_number=<?php echo $row['person_number']; ?>&class_name=<?php echo $className; ?>"><i class="left edit icon"></i>fees Status</a>
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
 </div> <!-- End of main container -->
            </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->

    <!-- Modal -->
    <div class="ui modal" id="add-session">
        <i class="close icon"></i>
        <div class="header">
            Add Student
        </div>

        <div class="content">
            <div class="ui form">
                <div class="ui equal width form">
                    <div class="ui message" style="display: none;"></div>

                    <form id="student-form" method="post">
                        <div class="fields">
                            <div class="required field">
                                <label>Admission Number</label>
                                <input type="text" name="person_number" id="person_number" placeholder="Admission Number" autocomplete="off">
                            </div>
                            <div class="required field">
                                <label>Surname</label>
                                <input type="text" name="lastname" id="lastname" placeholder="lastname">
                            </div>

                        </div>
                        <div class="fields">
                            <div class="required field">
                                <label>Firstname</label>
                                <input type="text" name="firstname" id="firstname" placeholder="Firstname">
                            </div>
                            <div class="field">
                                <label>Phone Number</label>
                                <input type="text" name="phone" id="phone" placeholder="phone">
                            </div>

                        </div>
                        <div class="fields">
                            <div class="required field">
                                <label>Choose a gender:</label>
                                <select name="gender" id="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="required field">
                                <label>Address</label>
                                <textarea rows="2" name="address" id="address"></textarea>
                            </div>

                            <div class="field">
                                <label>Browse and upload your picture</label>
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="required fields">
                            <div class="field">

                                <label>Classes</label>
                                <select id="classes" name="classes">
                                </select>
                            </div>

                            <div class="required field">

                                <label>Arms</label>
                                <select id="arms" name="arms">
                                </select>
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
    <script src="../assets/js/signup.js"></script>
   
    
    <script>
        $(document).ready(function () {
            $('#example').DataTable();


            $('#add-student').on('click', function () {
                $('.ui.modal').modal('show');
            });

            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();

            /* Let's get classes */
            $.getJSON("http://127.0.0.1/schapp/main/classes/get_classes.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#classes").append("<option value=" + value.class_id + ">" + value.name + "</option>");
                    $("#classes1").append("<option value=" + value.class_id + ">" + value.name + "</option>");
                });
            });
            /* End of let's get classes */

            /* Let's get arms */
            $.getJSON("http://127.0.0.1/schapp/main/classes/get_arms.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#arms").append("<option value=" + value.arm_id + ">" + value.name + "</option>");
                    $("#arms1").append("<option value=" + value.arm_id + ">" + value.name + "</option>");
                });
            });

        });

        function delstudent(id, firstname)
        {
            if (confirm("Are you sure you want to delete '" + firstname + "'"))
            {
                window.location.href = 'show_student.php?delstudent=' + id;
            }
        }
    </script>
</html>
