<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $classtypeId = strip_tags($_POST['classtype_id']);
    $name = strip_tags($_POST['name']);

// collect forma data
    extract($_POST);

// basic basic validation
    if ($name == '') {
        $error[] = 'Your class type is neccessary.';
    }

    if (!isset($error)) {
        try {
                    $stmt = $db->prepare("UPDATE z_tb_classtype SET name = :name WHERE classtype_id = :classtype_id ");
                    $result = $stmt->execute(array(
                        ':classtype_id' => $classtypeId,
                        ':name' => $name
                    ));
                    if ($result){
                    ?>
<span class="flow-text">You have successfully updated term <?php echo $name; ?><a href="../public/show_classtype.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

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
