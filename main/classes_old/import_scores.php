<?php 
// including the config file
include_once '../inc/config.php';
include_once '../inc/errorcode.php';

if(isset($_POST)){

    $sessions = $_POST["sessions"];
    $terms = $_POST["terms"];
    $tests = $_POST["tests"];
    $subjects = $_POST["subjects"];
    $classes = $_POST["classes"];
    $arms = $_POST["arms"];
 
$csv_file =  $_FILES['csv_file']['tmp_name'];
if (is_file($csv_file)) {
    $input = fopen($csv_file, 'a+');
    
    // if the csv file contain the table header leave this line
    $row = fgetcsv($input, 1024, ','); // here you got the header
    
    // print_r($row[1]);
    
    while ($row = fgetcsv($input, 1024, ',')) {
        // We can only see the values in the array only from after the while stmt above
            
    try {
       
       $stmt = $db->prepare("SELECT score FROM z_tb_grade WHERE person_number = :person_number 
            AND session_id = :session_id AND term_id = :term_id AND test_id = :test_id 
            AND subject_id = :subject_id AND class_id = :class_id AND arm_id = :arm_id ");

            $stmt->execute(array(
            ':person_number' => $row[1],
            ':session_id' => $sessions,
            ':term_id' => $terms,
            ':test_id' => $tests,
            ':subject_id' => $subjects,
            ':class_id' => $classes,
            ':arm_id' => $arms
            ));
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
             if (!empty($user)) {
             ?>
                    <div class="ui error message">
                        <div class="header">Error!</div>
                        <p>You already added score in this Excel sheet</p>
                    </div>
                    <?php
                    
                    }
                    else{
    
          // insert into the database
        $stmt = $db->prepare('INSERT INTO z_tb_grade(person_number, session_id, term_id, test_id, subject_id, class_id, arm_id, score) '
                            . 'VALUES (:person_number, :session_id, :term_id, :test_id, :subject_id, :class_id, :arm_id, :score)');
                            
        $result = $stmt->execute(array(
                        ':person_number' => $row[1],
                        ':session_id' => $sessions,
                        ':term_id' => $terms,
                        ':test_id' => $tests,
                        ':subject_id' => $subjects,
                        ':class_id' => $classes,
                        ':arm_id' => $arms,
                        ':score' => $row[2]
                    ));  
        
	/*
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
                    */
                    
                          
                      }
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
