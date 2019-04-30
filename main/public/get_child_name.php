<?php
/*
// list of printer types for specific manufacturer
include("../inc/config.php");

$manid = $_POST['man'];

header("Content-type: text/xml");
echo "<?xml version=\"1.0\" ?>\n";
echo "<names>\n";
$select = "SELECT person_id, firstname, lastname FROM z_tb_person WHERE class_id = '".$manid."'";
try {
	foreach($db->query($select) as $row) {
		echo "<Users>\n\t<id>".$row['person_id']."</id>\n\t<name>".$row['firstname']."</name>\n</Users>\n";
	}
}
catch(PDOException $e) {
	echo $e->getMessage();
}
echo "</names>";
*/

require_once '../inc/config.php';
include_once '../inc/errorcode.php';

$adm = $_POST['admNo'];

$data = [];

$stmt = $db->query("SELECT person_number, firstname, lastname FROM z_tb_person WHERE class_id = '".$adm."'");
foreach ($stmt as $row) {
    $personId = $row["person_number"];
     $name = $row['firstname'].' '.$row['lastname'];   
     $data [] = array("id" => $personId, "name" => $name);
}

echo json_encode($data);
?>
