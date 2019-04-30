<?php
$myTitle = 'Add student - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                    <div class="ui main text container">
                        <h3 class="ui header">Add Student</h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="student-form" method="post">
                            <div class="fields">
                                <div class="field">
                                    <label>Admission Number</label>
                                    <input type="text" name="person_number" id="person_number" placeholder="Admission Number">
                                </div>
                                <div class="field">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" id="firstname" placeholder="Firstname">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" id="lastname" placeholder="lastname">
                                </div>
                                <div class="field">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" id="phone" placeholder="phone">
                                </div>
                               
                            </div>
                            <div class="fields">
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
                                <div class="fields">
                             <div class="field">

                                        <label>Classes</label>
                                        <select id="classes" name="classes">
                                        </select>
                                    </div>

                                    <div class="field">

                                        <label>Arms</label>
                                        <select id="arms" name="arms">
                                        </select>
                                    </div>
                            </div>
                            
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Add student</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/signup.js"></script>
    <script>
        $(document).ready(function () {
        
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
    </script>
</body>
</html>
