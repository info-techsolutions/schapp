<?php 
// including the config file
include_once '../inc/config.php';
// include_once '../inc/errorcode.php';

if(isset($_POST)){
 
$csv_file =  $_FILES['csv_file']['tmp_name'];
if (is_file($csv_file)) {
    $input = fopen($csv_file, 'a+');
    // if the csv file contain the table header leave this line
    $row = fgetcsv($input, 1024, ','); // here you got the header
    while ($row = fgetcsv($input, 1024, ',')) {
    try {
    
    // Let's get the class to which each student belong to
    $stmtClass = $db->prepare("SELECT class_id FROM z_tb_class WHERE z_tb_class.name = '$row[2]' ");
    $stmtClass->execute();
    $rowClass = $stmtClass->fetch();
    
    $class_id = $rowClass['class_id'];
    
     // Let's get the arm to which each student belong to
    $stmtArm = $db->prepare("SELECT arm_id FROM z_tb_arm WHERE z_tb_arm.name = '$row[3]' ");
    $stmtArm->execute();
    $rowArm = $stmtArm->fetch();
    
    $arm_id = $rowArm['arm_id'];
    
    
    
    
    
        // insert into the database
        $stmt = $db->prepare('INSERT INTO z_tb_person(person_number, class_id, arm_id, firstname, lastname, gender, address, typ, payment_status) '
                            . 'VALUES (:person_number, :class_id, :arm_id, :firstname, :lastname, :gender, :address, :typ, :payment_status)');
	$result = $stmt->execute(array(
                        ':person_number' => $row[1],
                        ':class_id' => $class_id,
                        ':arm_id' => $arm_id,
                        ':firstname' => $row[4],
                        ':lastname' => $row[5],
                        ':gender' => $row[6],
                        ':address' => str_replace(","," ", $row[7]),
                        ':typ' => $row[8],
                        ':payment_status' => $row[9]
                    ));  
                    
                    } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
}

if($result){
                    ?>
                    <div class="ui success message">
                        <div class="header">Information</div>
                        <p>Grade added.</p>
                    </div>
                    <?php
                    }  
                    
                    else{
                    ?>
                    <div class="ui error message">
                        <div class="header">Error!</div>
                        <p>Error adding grades.</p>
                    </div>
                    <?php
                    
                    }
}
 
}
?>
