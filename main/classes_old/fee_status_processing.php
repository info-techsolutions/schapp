<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $personNumber = strip_tags($_POST['person_number']);
    $paymentStatus = strip_tags($_POST['payment_status']);
    $sessions = strip_tags($_POST['sessions']);
    $terms = strip_tags($_POST['terms']);

// collect forma data
    extract($_POST);

// basic basic validation
   

    if (!isset($error)) {
        try {
            $stmt =$db->prepare("SELECT * FROM z_tb_payment_status WHERE person_number = :person_number");
            $stmt->execute(array(
                ':person_number' => $personNumber
            ));
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if(empty($res)){
                $stmt = $db->prepare("INSERT INTO z_tb_payment_status(session_id, term_id, person_number, status) "
                        . "VALUES (:session_id, :term_id, :person_number, :status)");
                $stmt->execute(array(
                    ':session_id' => $sessions,
                    ':term_id' => $terms,
                    ':person_number' => $personNumber,
                    ':status' => $paymentStatus
                ));
                echo '<span class="flow-text">You have successfully update School Fee Status <a href="../public/show_student.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>';
                
            }
            else{
                $stmt = $db->prepare("UPDATE z_tb_payment_status SET session_id = :session_id, term_id = :term_id, status = :status WHERE person_number = :person_number ");
                $result = $stmt->execute(array(
                ':person_number' => $person_number,
                ':session_id' => $sessions,
                ':term_id' => $terms,
                ':status' => $paymentStatus
            ));
            
            
            if ($result) {
                $stmt = $db->prepare("UPDATE z_tb_person SET payment_status = :payment_status WHERE person_number = :person_number ");
                $result = $stmt->execute(array(
                ':person_number' => $person_number,
                ':payment_status' => $paymentStatus
            ));
                ?>
                <span class="flow-text">You have successfully update School Fee Status <a href="../admin/show_student.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

                <?php
            }
           
            else {
                ?>
                <span class="red flow-text">Error updating student Fees. </span>

                <?php
            }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
