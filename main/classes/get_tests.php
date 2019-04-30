<?php
require_once '../inc/config.php';
include_once '../inc/errorcode.php';


$stmt = $db->prepare("SELECT test_id, name from z_tb_test");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(array('data' => $result));


