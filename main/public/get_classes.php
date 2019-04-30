<?php
// Classes List

/*
include("../inc/config.php");

header("Content-type: text/xml");
echo "<?xml version=\"1.0\" ?>\n";
echo "<classes>\n";
$stmt = $db->query("SELECT * FROM z_tb_class");
try {
	foreach($stmt as $row) {
		echo "<Studentclass>\n\t<id>".$row['class_id']."</id>\n\t<name>".$row['name']."</name>\n</Studentclass>\n";
	}
}
catch(PDOException $e) {
	echo $e->getMessage();
	die();
}
echo "</classes>";

 */
require_once '../inc/config.php';
include_once '../inc/errorcode.php';

$stmt = $db->prepare("SELECT class_id, name FROM z_tb_class ORDER BY name");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(array('data' => $result));
?>
