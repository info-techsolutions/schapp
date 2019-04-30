<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $subjectId = strip_tags($_POST['subject_id']);
    $name = strip_tags($_POST['name']);

// collect forma data
    extract($_POST);

// basic basic validation
    if ($name == '') {
        $error[] = 'Your subject name is neccessary.';
    }

    if (!isset($error)) {
        try {
                    $stmt = $db->prepare("UPDATE z_tb_subjects SET name = :name WHERE subject_id = :subject_id ");
                    $result = $stmt->execute(array(
                        ':subject_id' => $subjectId,
                        ':name' => $name
                    ));
                    if ($result){
                    ?>
<span class="flow-text">You have successfully updated subject <?php echo $name; ?><a href="../admin/show_subject.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                    <?php
                } else {
                   
                    ?>
                    <span class="red flow-text">Error updating subject </span>

                    <?php
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
