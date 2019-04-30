<?php

include_once '../inc/config.php';
include_once '../inc/errorcode.php';

if($_POST) {



$sessions = $_POST["sessions"];
$terms = $_POST["terms"];
$tests = $_POST["tests"];
$subjects = $_POST["subjects"];
$classes = $_POST["classes"];
$arms = $_POST["arms"];

// $data = [];
// $data [] = $_POST;
// echo json_encode($_POST);

$output = [];

$stmt = $db->prepare("SELECT person_id, session_id, term_id, test_id, subject_id, z_tb_class.class_id AS class, z_tb_arm.arm_id AS arm, 
 person_number, firstname, lastname, z_tb_class.name AS class_name FROM z_tb_person, z_tb_session,
  z_tb_term, z_tb_test, z_tb_subjects, z_tb_class, z_tb_arm WHERE
   z_tb_session.session_id = '$sessions' AND z_tb_term.term_id = '$terms'
    AND z_tb_test.test_id = '$tests' AND z_tb_subjects.subject_id = '$subjects'
     AND z_tb_class.class_id = '$classes' AND z_tb_arm.arm_id = '$arms' AND typ = 'STUDENT' ORDER BY z_tb_person.person_id ");
$stmt->execute();
$result = $stmt->fetchAll();

 foreach($result as $row)
 {
 /*
 		echo '<tr>';			
		echo '<td class="small">'.$row["person_id"].'</td>';
		echo '<td class="small">'.$row["person_number"].'</td>';
		echo '<td class="small">'.$row["firstname"].'</td>';
		echo '<td class="small">'.$row['lastname'].'</td>';
		echo '<td class="small">'.$row["class"].'</td>';
		echo '<td class="small"><button type="button" name="update" id="'.$row["person_number"].'" class="btn btn-warning btn-xs updateGrade">Update</button></td>';
		echo '</tr>';
*/

  $output["person_id"] = $row["person_id"];
  $output["person_number"] = $row["person_number"];
  $output["firstname"] = $row["firstname"];
  $output["lastname"] = $row["lastname"];
  $output["class_name"] = $row["class_name"];
  $output["update"] = '<a data-id="'.$row["person_number"].'" data-sessionid="'.$row["session_id"].'" data-termid="'.$row["term_id"].'" data-testid="'.$row["test_id"].'" data-subjectid="'.$row["subject_id"].'" data-classid="'.$row["class"].'" data-armid="'.$row["arm"].'" name="updateGrade" class="btn btn-info btn-xs updateGrade">Add Score</a>';
  
$data [] = $output;
}

echo json_encode($data);


}
?>
