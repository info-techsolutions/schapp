<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $person_number = strip_tags($_POST['person_number']);
    $password = strip_tags($_POST['password']);
    $firstname = strip_tags($_POST['firstname']);
    $lastname = strip_tags($_POST['lastname']);
    $phone = strip_tags($_POST['phone']);
    $gender = strip_tags($_POST['gender']);
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

    if ($phone == '') {
        $error[] = 'Please supply a valid phone number';
    }

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

                    $stmt = $db->prepare('INSERT INTO z_tb_person(person_number, password, firstname, lastname, phone, gender, profile_photo_url, address) VALUES (:person_number, :password, :firstname, :lastname, :phone, :gender, :profile_photo_url, :address)');
                    $stmt->execute(array(
                        ':person_number' => $person_number,
                        ':password' => $password,
                        ':firstname' => $firstname,
                        ':lastname' => $lastname,
                        ':phone' => $phone,
                        ':gender' => $gender,
                        ':profile_photo_url' => $handle->file_dst_name,
                        ':address' => $address
                    ));
                    
                        // Let's store the last id 
        		$uid = $db->lastInsertId();
                    
                    
                    // Lets's SELECT THE ROLE_ID FOR STAFF
                    $stmt = $db->prepare("SELECT role_id FROM z_tb_role WHERE name = :name");
                    $stmt->execute(array(
                    		':name' => 'ADMIN'
                    ));
                    $row = $stmt->fetch();
                    $roleId = $row['role_id'];
                    
                    /*
                    $stmt = $db->prepare("SELECT username FROM z_tb_person WHERE person_id = :uid");
                    $stmt->execute(array(
                    		':uid' =>  $uid
                    ));
                    $row = $stmt->fetch();
                    $username = $row['username'];
                    */
                    
                    // Let's add the role_id and staff_id into the user_role table
                    $stmt = $db->prepare("INSERT INTO z_tb_user_role(person_id, role_id) VALUES(:person_id, :role_id)");
                    $stmt->execute(array(
                    	':person_id' => $uid,
                    	':role_id' => $roleId
                    ));
                    
                    //Let's define Admin as users.So we add them in the users table for future reference
                    $stmt = $db->prepare("INSERT INTO z_tb_users(person_id) VALUES(:person_id)");
                    $stmt->execute(array(
                    	':person_id' => $uid
                    ));
                    
                    ?>
                    <span class="flow-text">You have successfully added <?php echo $firstname . ' ' . $lastname ?> as a Admin <a href="../public/show_admin.php" class="ui small primary button" style="color: #ffffff; ">view</a></span>

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
