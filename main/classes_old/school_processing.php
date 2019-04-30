<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {


    $schname = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $username = strip_tags($_POST['user']);
    $password = strip_tags($_POST['pass']);
    $address = strip_tags($_POST['address']);

// collect forma data
    extract($_POST);

// basic basic validation

    if ($schname == '') {
        $error[] = 'No school name is neccessary.';
    }

    if ($email == '') {
        $error[] = 'No email';
    }
    
    if ($username == '') {
        $error[] = 'No username';
    }
    
    if ($password == '') {
        $error[] = 'No password';
    }
    
     if ($address == '') {
        $error[] = 'No Address';
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
                
                $code = generateSchoolCode();

                    $stmt = $db->prepare('INSERT INTO z_tb_schools(sch_code, name, email, username, password, logo, address) '
                            . 'VALUES (:sch_code, :name, :email, :username, :password, :logo, :address)');
                    $stmt->execute(array(
                        ':sch_code' => $code,
                        ':name' => $name,
                        ':email' => $email,
                        ':username' => $username,
                        ':password' => $password,
                        ':logo' => $handle->file_dst_name,
                        ':address' => $address
                        
                    ));
                    ?>
                     <div class="ui success message">
                        <div class="header">Signup?</div>
                        <p>Account successfully created.</p>
                    </div>

                    <?php
                } else {
                    // error occurred
                    $msg = $handle->error;
                    ?>
                     <div class="ui error message">
                        <div class="header">Error</div>
                         <span class="red flow-text">Error: <?php echo $msg; ?> </span>
                    </div>
                   

                    <?php
                }
                // Let's delete the temporary files
                $handle->clean();
            } else {
                // if i'm here, the upload file failed for some reasons
                // i.e the server didn't receive the file


                $msg1 = $handle->error . 'File not uploaded to the server';
                ?>
                <div class="ui error message">
                        <div class="header">Error</div>
                         <span class="red flow-text">Error: <?php echo $msg1; ?> </span>
                    </div>


                <?php
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
