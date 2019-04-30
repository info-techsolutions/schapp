<?php
$myTitle = 'Editing student - MYSCHOOL APP';
include_once '../pages/header.php';

$personNumber = $_GET['student_number'];

include_once '../inc/config.php';
$stmt = $db->prepare("SELECT * FROM z_tb_person WHERE person_number = :person_number");
$stmt->execute(array(
   ':person_number' => $personNumber 
));

$row = $stmt->fetch();

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$phone = $row['phone'];
$address = $row['address'];
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                    <div class="ui main text container">
                        <h3 class="ui header">Edit Student with Admission Number: <h6><?php echo $personNumber;  ?></h6> </h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="student-form" method="post">
                            <div class="fields">
                              
                                <div class="field">
                                    <label>Firstname</label>
                                    <input type="hidden" name="person_number" value="<?php echo $personNumber; ?>" placeholder="Admission Number">
                                    <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" placeholder="Firstname">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" placeholder="lastname">
                                </div>
                                <div class="field">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" value="<?php echo $phone; ?>" id="phone" placeholder="phone">
                                </div>
                               
                            </div>
                            <div class="fields">
                                

                                <div class="field">
                                    <label>Address</label>
                                    <textarea rows="2" name="address" id="address"><?php echo $address; ?></textarea>
                                </div>

                                
                            </div>
                            
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">update student</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/student_update.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
