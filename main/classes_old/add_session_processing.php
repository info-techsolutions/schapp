<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $year = strip_tags($_POST['year']);
    $times_opened = strip_tags($_POST['times_opened']);


// collect forma data
    extract($_POST);

// basic basic validation
    if ($year == '') {
        $error[] = 'Eneter year.';
    }
    
    if($times_opened == ''){
        $error[] = 'Enter number of times opened';
    }

    if (!isset($error)) {
        try {

            $stmt = $db->prepare('INSERT INTO z_tb_session(year, times_opened) VALUES (:year, :times_opened)');
            $result = $stmt->execute(array(
                ':year' => $year,
                ':times_opened' => $times_opened
                ));
            if ($result) {
                ?>
                <span class="flow-text">You have successfully added session for <?php echo $year; ?> <a href="../admin/show_session.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                <?php
            } else {
                // error occurred
                ?>
                <span class="red flow-text">Error adding session </span>

                <?php
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
