<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $name = strip_tags($_POST['name']);


// collect forma data
    extract($_POST);

// basic basic validation
    if ($name == '') {
        $error[] = 'Your test name is neccessary.';
    }

    if (!isset($error)) {
        try {

            $stmt = $db->prepare('INSERT INTO z_tb_fees_setup(name) VALUES (:name)');
            $result = $stmt->execute(array(
                ':name' => strtoupper($name)
                ));
            if ($result) {
                ?>
                <span class="flow-text">You have successfully added <?php echo $name ?> <a href="show_fees_setup.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                <?php
            } else {
                // error occurred
                ?>
                <span class="red flow-text">Error adding fees option </span>

                <?php
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
