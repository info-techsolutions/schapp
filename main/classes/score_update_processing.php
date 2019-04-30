<?php

require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $score = strip_tags($_POST['score']);
    $personNumber = $_POST['person_number'];
    $sessionId = $_POST['session_id'];
    $termId = $_POST['term_id'];
    $testId = $_POST['test_id'];
    $subjectId = $_POST['subject_id'];
    $classId = $_POST['class_id'];


// collect forma data
    extract($_POST);

// basic basic validation

    if (!isset($error)) {
        try {

                $stmt = $db->prepare("UPDATE z_tb_grade SET score = :score WHERE session_id = :session_id AND term_id = :term_id AND class_id = :class_id
                AND test_id = :test_id AND subject_id = :subject_id AND person_number = :person_number");
                $result = $stmt->execute(array(
                    ':person_number' => $personNumber,
                    ':session_id' => $sessionId,
                    ':term_id' => $termId,
                    ':test_id' => $testId,
                    ':subject_id' => $subjectId,
                    ':class_id' => $classId,
                    ':score' => $score,
                ));
                if ($result) {
    /*     
      switch($testId){
    	case 1:
    	$stmt = $db->prepare("UPDATE z_tb_report SET test_one = :test_one, total = :total WHERE session_id = :session_id AND term_id = :term_id AND
    	 subject_id = :subject_id AND class_id = :class_id AND person_number = :person_number");
   $stmt->execute(array(
   ':person_number' => $personNumber,
   ':session_id' => $sessionId,
   ':term_id' => $termId,
   ':class_id' => $classId,
   ':subject_id' => $subjectId,
   ':test_one' => $score,
   ':total' => $score
   ));
    	break;
    	
    	
    	case 2:
    	$stmt = $db->prepare("UPDATE z_tb_report SET test_two = :test_two, total = :total WHERE session_id = :session_id AND term_id = :term_id AND
    	 subject_id = :subject_id AND class_id = :class_id AND person_number = :person_number");
   $stmt->execute(array(
   ':person_number' => $personNumber,
   ':session_id' => $sessionId,
   ':term_id' => $termId,
   ':class_id' => $classId,
   ':subject_id' => $subjectId,
   ':test_two' => $score,
   ':total' => $score
   ));
    	break;
    	
    	case 3:
    	$stmt = $db->prepare("UPDATE z_tb_report SET test_three = :test_three, total = :total WHERE session_id = :session_id AND term_id = :term_id AND
    	 subject_id = :subject_id AND class_id = :class_id AND person_number = :person_number");
   $stmt->execute(array(
   ':person_number' => $personNumber,
   ':session_id' => $sessionId,
   ':term_id' => $termId,
   ':class_id' => $classId,
   ':subject_id' => $subjectId,
   ':test_three' => $score,
   ':total' => $score+$score+$score
   ));
   
    	break;
    	
    	default:
    	?>
    	<!--<span class="flow-text">Error</span>-->
    	
    	<?php
    }
    */
                    ?>
                    <span class="flow-text">Score successfully updated. <a href="view_student_score.php?person_number=<?php echo $personNumber; ?>&subject_id=<?php echo $subjectId; ?>&test_id=<?php echo $testId; ?>&class_id=<?php echo $classId; ?>&session_id=<?php echo $sessionId; ?>&term_id=<?php echo $termId; ?>" class="ui small green button" style="color: #ffffff;">View Score >></a> | 
                    <a href="individual_subject_score_view.php" class="ui small primary button" style="color: #ffffff;"> << Back</a></span>

                    <?php

                } else {
                    ?>
                    <span class="red flow-text">Error updating subject </span>

                    <?php

                }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
}
?>
