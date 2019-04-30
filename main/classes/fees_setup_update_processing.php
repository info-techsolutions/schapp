<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $fees_setup_id = strip_tags($_POST['fees_setup_id']);
    $name = strip_tags($_POST['name']);

// collect forma data
    extract($_POST);

// basic basic validation
    if ($name == '') {
        $error[] = 'Your term name is neccessary.';
    }

    if (!isset($error)) {
        try {
                    $stmt = $db->prepare("UPDATE z_tb_fees_setup SET name = :name WHERE fees_setup_id = :fees_setup_id ");
                    $result = $stmt->execute(array(
                        ':fees_setup_id' => $fees_setup_id,
                        ':name' => strtoupper($name)
                    ));
                    if ($result){
                    ?>
<span class="flow-text">You have successfully updated Fees setup option <?php echo $name; ?><a href="show_fees_setup.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                    <?php
                } else {
                   
                    ?>
                    <span class="red flow-text">Error updating Fees setup </span>

                    <?php
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
