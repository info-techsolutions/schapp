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
    $armId = $_POST['arm_id'];


// collect forma data
    extract($_POST);

// basic basic validation

    if (!isset($error)) {
        try {

            $stmt = $db->prepare("SELECT score FROM z_tb_grade WHERE person_number = :person_number 
            AND session_id = :session_id AND term_id = :term_id AND test_id = :test_id 
            AND subject_id = :subject_id AND class_id = :class_id AND arm_id = :arm_id ");

            $stmt->execute(array(
            ':person_number' => $person_number,
            ':session_id' => $sessionId,
            ':term_id' => $termId,
            ':test_id' => $testId,
            ':subject_id' => $subjectId,
            ':class_id' => $classId,
            ':arm_id' => $armId
            ));
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($user)) {
            
                ?>
                <span class="red flow-text">Error!<br /> You already added a score for this student.</span>
                <script>
                    window.location.href = "../admin/check_student_class.php";
                </script>
                
                <?php

           } else {

                $stmt = $db->prepare("INSERT INTO z_tb_grade(person_number, session_id,term_id, test_id, subject_id, class_id, arm_id, score, grade) VALUES(:person_number, :session_id, :term_id, :test_id, :subject_id, :class_id, :arm_id, :score, :grade)");
                $result = $stmt->execute(array(
                    ':person_number' => $personNumber,
                    ':session_id' => $sessionId,
                    ':term_id' => $termId,
                    ':test_id' => $testId,
                    ':subject_id' => $subjectId,
                    ':class_id' => $classId,
                    ':arm_id' => $armId,
                    ':score' => $score,
                    ':grade' => ''
                ));
                if ($result) {
                    ?>
                    <span class="flow-text">Score successfully added.
                     <a href="../admin/view_student_score.php?person_number=<?php echo $personNumber; ?>&session_id=<?php echo $sessionId; ?>&class_id=<?php echo $classId; ?>&term_id=<?php echo $termId; ?>&subject_id=<?php echo $subjectId; ?>&test_id=<?php echo $testId; ?>" class="ui small green button" style="color: #ffffff;">View Score >></a> | <a href="../admin/check_student_class.php" class="ui small primary button" style="color: #ffffff;"> << Back</a></span>

                    <?php

                } else {
                    ?>
                    <span class="red flow-text">Error updating subject </span>

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
?>
