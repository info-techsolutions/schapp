<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $tos = strip_tags($_POST['tos']);
    $gradesetupId = strip_tags($_POST['gradesetup_id']);
    $froms = strip_tags($_POST['froms']);
    $grade = strip_tags($_POST['grade']);
    $remark = strip_tags($_POST['remark']);

// collect forma data
    extract($_POST);

// basic basic validation


    if (!isset($error)) {
        try {
                    $stmt = $db->prepare("UPDATE z_tb_gradesetup SET tos = :tos, froms = :froms, grade = :grade, remark = :remark WHERE gradesetup_id = :gradesetup_id ");
                    $result = $stmt->execute(array(
                        ':gradesetup_id' => $gradesetupId,
                        ':tos' => $tos,
                        ':froms' => $froms,
                        ':grade' => $grade,
                        ':remark' => $remark
                    ));
                    if ($result){
                    ?>
<span class="flow-text">You have successfully updated grade setup <?php echo $remark; ?><a href="../admin/show_gradesetup.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                    <?php
                } else {
                   
                    ?>
                    <span class="red flow-text">Error updating grade setup </span>

                    <?php
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
