<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $personNumber = strip_tags($_POST['person_number']);
    $sessions = strip_tags($_POST['sessions']);
    $terms = strip_tags($_POST['terms']);
    $classes = strip_tags($_POST['classes']);
    $paymentStatus = strip_tags($_POST['status']);
    $mode = strip_tags($_POST['mode']);
    $amt = strip_tags($_POST['amt']);
    $com = strip_tags($_POST['comments']);
 

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
                $stmt = $db->prepare("INSERT INTO z_tb_payment_status(session_id, term_id, person_number, class_id, status, amount, mode, comments) "
                        . "VALUES (:session_id, :term_id, :person_number, :class_id, :status, :amount, :mode, :comments)");
                $stmt->execute(array(
                    ':session_id' => $sessions,
                    ':term_id' => $terms,
                    ':person_number' => $personNumber,
                    ':class_id' => $classes,
                    ':status' => $paymentStatus,
                    ':amount' => $amt,
                    ':mode' => $mode,
                    ':comments' => $com
                ));
                
                $pid = $db->lastInsertId();
                
                echo '<span class="flow-text">You have successfully updated School Fee Status <a href="show_student.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>';
                
            }
             
            else{
            
                $stmt = $db->prepare("UPDATE z_tb_payment_status SET session_id = :session_id, term_id = :term_id, class_id = :class_id, status = :status,
                amount = :amount, mode = :mode, comments = :comments WHERE 
                person_number = :person_number ");
                $result = $stmt->execute(array(
                ':person_number' => $person_number,
                ':session_id' => $sessions,
                ':term_id' => $terms,
                ':class_id' => $classes,
                ':status' => $paymentStatus,
                ':amount' => $amt,
                ':mode' => $mode,
                ':comments' => $com
            ));
            
            
            if ($result) {
            
            	$stmt = $db->prepare("SELECT z_tb_fees_setup.name AS status_name FROM z_tb_fees_setup, z_tb_payment_status WHERE z_tb_fees_setup.fees_setup_id = z_tb_payment_status.status 
            	AND z_tb_payment_status.status = '$status'");
            	$stmt->execute();
            	$row = $stmt->fetch();
            	$getName = $row['status_name'];
            	
                $stmt = $db->prepare("UPDATE z_tb_person SET payment_status = :payment_status WHERE person_number = :person_number ");
                $result = $stmt->execute(array(
                ':person_number' => $person_number,
                ':payment_status' => $getName
            ));
                ?>
                <span class="flow-text">You have successfully updated School Fee Status <a href="show_student.php" class="ui small primary button" style="color: #ffffff; ">continue</a></span>

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
