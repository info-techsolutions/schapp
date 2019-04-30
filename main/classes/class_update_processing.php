<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $classId = strip_tags($_POST['class_id']);
    $name = strip_tags($_POST['name']);

// collect forma data
    extract($_POST);

// basic basic validation
    if ($name == '') {
        $error[] = 'Your class name is neccessary.';
    }

    if (!isset($error)) {
        try {
                    $stmt = $db->prepare("UPDATE z_tb_class SET name = :name WHERE class_id = :class_id ");
                    $result = $stmt->execute(array(
                        ':class_id' => $classId,
                        ':name' => $name
                    ));
                    if ($result){
                    ?>
<span class="flow-text">You have successfully updated class <?php echo $name; ?><a href="../admin/show_class.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                    <?php
                } else {
                   
                    ?>
<span class="red flow-text">Error updating <?php echo $name; ?> </span>

                    <?php
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
