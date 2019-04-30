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
    $gender = strip_tags($_POST['gender']);
    $classes = strip_tags($_POST['classes']);
    $arms = strip_tags($_POST['arms']);
    $address = strip_tags($_POST['address']);

// collect forma data
    extract($_POST);

// basic basic validation
    if ($person_number == '') {
        $error[] = 'Your username is neccessary.';
    }

    if ($firstname == '') {
        $error[] = 'Your username is neccessary.';
    }

    if ($lastname == '') {
        $error[] = 'Please supply a valid password';
    }

    /*if ($phone == '') {
        $error[] = 'Please supply a valid phone number';
    }*/

    if ($gender == '') {
        $error[] = 'Let us know your gender';
    }


    if (!isset($error)) {
        try {

            $handle = new upload($_FILES['image']);

            // Has the file been uploaded to the server
            if ($handle->uploaded) {

                // If Yes, then we upload the file from the server to our desired location
                $handle->process('../admin/pic/');

                // Now, if everything is OK, process the images
                if ($handle->processed) {

                    $stmt = $db->prepare('INSERT INTO z_tb_person(person_number, firstname, lastname, phone, gender, profile_photo_url, address, class_id, arm_id, typ, payment_status) '
                            . 'VALUES (:person_number, :firstname, :lastname, :phone, :gender, :profile_photo_url, :address, :class_id, :arm_id, :typ, :payment_status)');
                    $stmt->execute(array(
                        ':person_number' => $person_number,
                        ':firstname' => $firstname,
                        ':lastname' => $lastname,
                        ':phone' => $phone,
                        ':gender' => $gender,
                        ':profile_photo_url' => $handle->file_dst_name,
                        ':address' => $address,
                        ':class_id' => $classes,
                        ':arm_id' => $arms,
                        ':typ' => 'STUDENT',
                        ':payment_status' => 'NIL'
                    ));
                    ?>
                    <span class="flow-text">You have successfully added <?php echo $firstname . ' ' . $lastname ?> as a student <a href="../public/index1.php" class="ui small primary button" style="color: #ffffff; ">Home</a></span>

                    <?php
                } else {
                    // error occurred
                    $msg = $handle->error;
                    ?>
                    <span class="red flow-text">Error: <?php echo $msg; ?> </span>

                    <?php
                }
                // Let's delete the temporary files
                $handle->clean();
            } else {
                // if i'm here, the upload file failed for some reasons
                // i.e the server didn't receive the file


                $msg1 = $handle->error . 'File not uploaded to the server';
                ?>
                <span class="flow-text red"><br />Error:  <?php echo $msg1; ?> </span>


                <?php
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
