<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}
// including the config file
include_once '../inc/config.php';
 
// set headers to force download on csv format
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=grade.csv');
 
// we initialize the output with the headers
// $output = "Admission No, Subject, Test Score\n";
// select all members
$sql = 'SELECT person_number, score, z_tb_subjects.name AS subjects, z_tb_test.name as test  FROM z_tb_grade
JOIN z_tb_subjects ON z_tb_grade.subject_id = z_tb_subjects.subject_id
JOIN z_tb_test ON z_tb_grade.test_id = z_tb_test.test_id
 ORDER BY grade_id ASC';
$query = $db->prepare($sql);
$query->execute();
$list = $query->fetchAll();

$output = "Admission No, Subject, Test, Score\n";

foreach ($list as $rs) {
    // add new row
    $output .= $rs['person_number'].",".$rs['subjects'].",".$rs['test'].",".$rs['score']."\n";
}
// export the output
echo $output;
exit;
?>
