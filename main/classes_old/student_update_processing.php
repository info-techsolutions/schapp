<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $person_number = strip_tags($_POST['person_number']);
    $firstname = strip_tags($_POST['firstname']);
    $lastname = strip_tags($_POST['lastname']);
    $phone = strip_tags($_POST['phone']);
    $address = strip_tags($_POST['address']);

// collect forma data
    extract($_POST);

// basic basic validation
    if ($firstname == '') {
        $error[] = 'Your username is neccessary.';
    }

    if ($lastname == '') {
        $error[] = 'Please supply a valid password';
    }

    if ($phone == '') {
        $error[] = 'Please supply a valid phone number';
    }

    if (!isset($error)) {
        try {
                    $stmt = $db->prepare("UPDATE z_tb_person SET firstname = :firstname, lastname = :lastname, phone = :phone, address = :address WHERE person_number = :person_number ");
                    $result = $stmt->execute(array(
                        ':person_number' => $person_number,
                        ':firstname' => $firstname,
                        ':lastname' => $lastname,
                        ':phone' => $phone,
                        ':address' => $address
                    ));
                    if ($result){
                    ?>
<span class="flow-text">You have successfully update <?php echo $firstname . ' ' . $lastname ?> record <a href="../public/show_student.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                    <?php
                } else {
                   
                    ?>
                    <span class="red flow-text">Error updating student </span>

                    <?php
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
