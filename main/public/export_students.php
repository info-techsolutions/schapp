<?php
// including the config file
include_once '../inc/config.php';
 
// set headers to force download on csv format
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=students.csv');
 
// we initialize the output with the headers
// $output = "Admission No, Subject, Test Score\n";
// select all members
$sql = "SELECT person_number, z_tb_class.name AS classname, z_tb_arm.name AS armname, firstname, lastname, gender, address, payment_status FROM z_tb_person
JOIN z_tb_class ON z_tb_person.class_id = z_tb_class.class_id
JOIN z_tb_arm ON z_tb_person.arm_id = z_tb_arm.arm_id
WHERE typ = 'STUDENT' 
 ORDER BY person_number ASC";
$query = $db->prepare($sql);
$query->execute();
$list = $query->fetchAll();

$output = ",Admission No,Class,Arm,Firstname,Surname,Gender,Address,payment_status\n";

foreach ($list as $rs) {
    // add new row
    $output .=  " ".",".$rs['person_number'].",".$rs['classname'].",".$rs['armname'].",".$rs['firstname'].",".$rs['lastname'].",".$rs['gender'].",".str_replace(",","",$rs['address']).",".$rs['payment_status']."\n";
}
// export the output
echo $output;
exit;
?>
