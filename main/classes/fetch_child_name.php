<?php
include_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/func_ajax.php';
include_once '../inc/errorcode.php';

if(isset($_POST["parentId"]))
{
$output = array();
$username = $_POST["parentId"];

$stmt = $db->prepare("SELECT person_id FROM z_tb_person WHERE person_number = '$username'");
$stmt->execute();
$row = $stmt->fetch();

$pid = $row['person_id'];

$stmt = $db->query("SELECT sponsor_id,firstname, class_id, person_number FROM z_tb_person WHERE typ = 'STUDENT'");

    foreach ($stmt as $value) {
    
    	$output["firstname"] = $value["firstname"];
    	$output["sponsor_id"] = $value["sponsor_id"];
    	$output["person_number"] = $value["person_number"];
    	$output["class_id"] = $value["class_id"];
    	
    	if ($output["sponsor_id"] == $pid) {
    	$output['student'] = '<a type="button" class="btn btn-info btn-xs resultee" person_number="'.$value["person_number"].'" class_id="'.$value["class_id"].'" >view '.$value["firstname"].' result</a>';
    	}
            }
 echo json_encode($output);
}
