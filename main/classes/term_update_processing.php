<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $termId = strip_tags($_POST['term_id']);
    $name = strip_tags($_POST['name']);
    $daysOpened = strip_tags($_POST['days_opened']);

// collect forma data
    extract($_POST);

// basic basic validation
    if ($name == '') {
        $error[] = 'Your term name is neccessary.';
    }
    if ($daysOpened == '') {
        $error[] = 'Days opened is not specified.';
    }

    if (!isset($error)) {
        try {
                    $stmt = $db->prepare("UPDATE z_tb_term SET name = :name, days_opened = :days_opened WHERE term_id = :term_id ");
                    $result = $stmt->execute(array(
                        ':term_id' => $termId,
                        ':name' => $name,
                        ':days_opened' => $daysOpened
                    ));
                    if ($result){
                    ?>
<span class="flow-text">You have successfully updated term <?php echo $name; ?><a href="show_term.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                    <?php
                } else {
                   
                    ?>
                    <span class="red flow-text">Error updating term </span>

                    <?php
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
