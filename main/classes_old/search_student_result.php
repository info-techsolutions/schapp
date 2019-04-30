<?php

$myTitle = 'Showing All Student in a class - MYSCHOOL APP';

include_once '../pages/header.php';
include_once '../inc/config.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $sessions = $_POST["sessions"];
    $terms = $_POST["terms"];
    $classes = $_POST["classes"];
    

    // Let's check if it's already added
    $stmt = $db->prepare("SELECT * FROM z_tb_report WHERE session_id = :session_id AND term_id = :term_id AND class_id = :class_id");

    $stmt->execute(array(
        ':session_id' => $sessions,
        ':term_id' => $terms,
        ':class_id' => $classes,
    ));

    $alreadyAdded = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($alreadyAdded)) {
        ?>
        <span class="red flow-text">Error! You already added scores for this class.</span>

        <?php

    } else {

        $stmt = $db->query("SELECT DISTINCT subject_id FROM z_tb_grade");

        foreach ($stmt as $row) {

            $subjectId = $row["subject_id"];
            
            $k = 0;

            $stmt1 = $db->query("SELECT DISTINCT person_number, test_id, score"
                    . " FROM z_tb_grade, z_tb_class, z_tb_term, z_tb_session "
                    . " WHERE z_tb_grade.class_id = z_tb_class.class_id AND z_tb_grade.class_id = '$classes' AND"
                    . " z_tb_grade.term_id = z_tb_term.term_id AND z_tb_grade.term_id = '$terms' AND"
                    . " z_tb_grade.session_id = z_tb_session.session_id AND z_tb_grade.session_id = '$sessions'"
                    . " AND subject_id = '$subjectId' "
                    . " ORDER BY person_number ");

            foreach ($stmt1 as $row1) {
//                echo $row1["score"]. ",<br />";
                $personNumber = $row1["person_number"];
                $testId = $row1["test_id"];
                $score = $row1["score"];

                switch ($testId) {
                    case 1:

                        $stmt = $db->prepare("INSERT INTO z_tb_report(person_number, session_id, term_id, class_id, subject_id, test_one) 
   VALUES(:person_number, :session_id, :term_id, :class_id, :subject_id, :test_one)");
                        $stmt->execute(array(
                            ':person_number' => $personNumber,
                            ':session_id' => $sessions,
                            ':term_id' => $terms,
                            ':class_id' => $classes,
                            ':subject_id' => $subjectId,
                            ':test_one' => $score
                        ));
                        break;

                    case 2:
                        $stmt = $db->prepare("UPDATE z_tb_report SET test_two = :test_two WHERE person_number = :person_number AND subject_id = '$subjectId'");
                        $stmt->execute(array(
                            ':person_number' => $personNumber,
                            ':test_two' => $score
                        ));
                        break;

                    case 3:
                        // $total .= $score + $score + $score;
                        $stmt = $db->prepare("UPDATE z_tb_report SET test_three = :test_three  WHERE person_number = :person_number AND subject_id = '$subjectId'");
                        $stmt->execute(array(
                            ':person_number' => $personNumber,
                            ':test_three' => $score,
                        ));


                        // Let add the total score

                        $stmt = $db->prepare("UPDATE z_tb_report SET total = test_one+test_two+test_three  WHERE person_number = :person_number AND subject_id = '$subjectId'");
                        $stmt->execute(array(
                            ':person_number' => $personNumber
                        ));


                    default:
                        break;
                }
            }  // End of second loop
            
                $stmt11 = $db->query("SELECT person_number, subject_id, total "
                . " FROM z_tb_report WHERE"
                . " subject_id = $subjectId"
              //  . " AND class_id = '$classes'"
               // . " AND term_id = '$terms'"
              //  . " AND session_id = '$sessions'"
                . " ORDER BY total DESC");

        foreach ($stmt11 as $tot) {
            $studentId = $tot['person_number'];
            $theOtherSubject = $tot['subject_id'];

            $k = $k + 1;
            $stmt = $db->prepare("UPDATE z_tb_report SET rank = $k WHERE person_number = '$studentId' AND subject_id = '$theOtherSubject'");
            $stmt->execute();
        }
        
        
        }
        
        echo ' <span class="flow-text">Report successfully added.</span>';

    
    }
}