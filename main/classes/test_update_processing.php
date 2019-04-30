<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $testId = strip_tags($_POST['test_id']);
    $name = strip_tags($_POST['name']);

// collect forma data
    extract($_POST);

// basic basic validation
    if ($name == '') {
        $error[] = 'Your term name is neccessary.';
    }

    if (!isset($error)) {
        try {
                    $stmt = $db->prepare("UPDATE z_tb_test SET name = :name WHERE test_id = :test_id ");
                    $result = $stmt->execute(array(
                        ':test_id' => $testId,
                        ':name' => $name
                    ));
                    if ($result){
                    ?>
<span class="flow-text">You have successfully updated test <?php echo $name; ?><a href="../admin/show_test.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                    <?php
                } else {
                   
                    ?>
                    <span class="red flow-text">Error updating test </span>

                    <?php
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
