<?php
require_once '../inc/config.php';
include_once '../inc/errorcode.php';


$stmt = $db->prepare("SELECT fees_setup_id, name from z_tb_fees_setup");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(array('data' => $result));

