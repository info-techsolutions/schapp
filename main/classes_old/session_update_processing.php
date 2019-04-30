<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $sessionId = strip_tags($_POST['session_id']);
    $times_opened = strip_tags($_POST['times_opened']);
    

// collect forma data
    extract($_POST);

// basic basic validation
    if ($times_opened == '') {
        $error[] = 'Please enter something';
    }

    if (!isset($error)) {
        try {
                    $stmt = $db->prepare("UPDATE z_tb_session SET times_opened = :times_opened WHERE session_id = :session_id ");
                    $result = $stmt->execute(array(
                        ':session_id' => $sessionId,
                        ':times_opened' => $times_opened
                    ));
                    if ($result){
                    ?>
<span class="flow-text">You have successfully update  session <a href="../admin/show_session.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                    <?php
                } else {
                   
                    ?>
                    <span class="red flow-text">Error updating session </span>

                    <?php
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
