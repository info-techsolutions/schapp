<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $sessions = strip_tags($_POST['sessions']);
    $terms = strip_tags($_POST['terms']);
    $classes = strip_tags($_POST['classes']);

$data = [];

        try {
            $stmt =$db->prepare("SELECT z_tb_payment_status.status FROM z_tb_payment_status, z_tb_person, z_tb_session, z_tb_term, z_tb_class 
            WHERE 
            z_tb_session.session_id = z_tb_payment_status.session_id AND z_tb_payment_status.session_id = '$sessions' 
            AND z_tb_term.term_id = z_tb_payment_status.term_id AND z_tb_payment_status.term_id = '$terms' 
            AND z_tb_person.class_id = '$classes' AND payment_status IS NOT NULL;
");
 	$stmt->execute();
	$result = $stmt->fetchAll();

 foreach($result as $row)
 {
            $data [] = $row;
            
           
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        echo json_encode($data);
        
}

