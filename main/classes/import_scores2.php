<?php 
// including the config file
include_once '../inc/config.php';
include_once '../inc/errorcode.php';

if(isset($_POST)){
 
$csv_file =  $_FILES['csv_file']['tmp_name'];
if (is_file($csv_file)) {
    $input = fopen($csv_file, 'a+');
    
    // if the csv file contain the table header leave this line
    $row = fgetcsv($input, 1024, ','); // here you got the header
    
    // print_r($row[1]);
    
    while ($row = fgetcsv($input, 1024, ',')) {
        // We can only see th values in the array only from after the while stmt above
        
        $stmtCheck = $db->prepare("SELECT * FROM z_tb_person WHERE person_number = '$row[1]'");
    $stmtCheck->execute();
    $rowCheck = $stmtCheck->fetch();
    $classID = $rowCheck['class_id'];
    
     if (empty($classID)) {
        ?>
        <div class="ui error message">
                        <div class="header">Error!</div>
                        <p>Error! We are unable to recognised some student with the associated class</p>
                    </div>

        <?php
    }
    else{
    
    try {
    
    
    // Let's get the session to which each student belong to
    $stmtSession = $db->prepare("SELECT session_id FROM z_tb_session WHERE z_tb_session.year = '$row[2]' ");
    $stmtSession->execute();
    $rowSession = $stmtSession->fetch();
    
    $session_id = $rowSession['session_id'];
    
    
    // Let's get the term to which each student belong to
    $stmtTerm = $db->prepare("SELECT term_id FROM z_tb_term WHERE z_tb_term.name = '$row[3]' ");
    $stmtTerm->execute();
    $rowTerm = $stmtTerm->fetch();
    
    $term_id = $rowTerm['term_id'];
    
    
     // Let's get the test name to which each student sat for
    $stmtTest = $db->prepare("SELECT test_id FROM z_tb_test WHERE z_tb_test.name = '$row[4]' ");
    $stmtTest->execute();
    $rowTest = $stmtTest->fetch();
    
    $test_id = $rowTest['test_id'];
    
    
    // Let's get the term to which each student belong to
    $stmtSubjects = $db->prepare("SELECT subject_id FROM z_tb_subjects WHERE z_tb_subjects.name = '$row[5]' ");
    $stmtSubjects->execute();
    $rowSubjects = $stmtSubjects->fetch();
    
    $subject_id = $rowSubjects['subject_id'];
    
    
    // Let's get the class to which each student belong to
    $stmtClass = $db->prepare("SELECT class_id FROM z_tb_class WHERE z_tb_class.name = '$row[6]' ");
    $stmtClass->execute();
    $rowClass = $stmtClass->fetch();
    
    $class_id = $rowClass['class_id'];
    
     // Let's get the arm to which each student belong to
    $stmtArm = $db->prepare("SELECT arm_id FROM z_tb_arm WHERE z_tb_arm.name = '$row[7]' ");
    $stmtArm->execute();
    $rowArm = $stmtArm->fetch();
    
    $arm_id = $rowArm['arm_id'];
    
          // insert into the database
        $stmt = $db->prepare('INSERT INTO z_tb_grade(person_number, session_id, term_id, test_id, subject_id, class_id, arm_id, score) '
                            . 'VALUES (:person_number, :session_id, :term_id, :test_id, :subject_id, :class_id, :arm_id, :score)');
	$result = $stmt->execute(array(
                        ':person_number' => $row[1],
                        ':session_id' => $session_id,
                        ':term_id' => $term_id,
                        ':test_id' => $test_id,
                        ':subject_id' => $subject_id,
                        ':class_id' => $class_id,
                        ':arm_id' => $arm_id,
                        ':score' => $row[8]
                    ));  
                    
                          
                      
                    } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
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
