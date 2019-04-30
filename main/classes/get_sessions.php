<?php
require_once '../inc/config.php';
include_once '../inc/errorcode.php';

$stmt = $db->prepare("SELECT session_id, year from z_tb_session");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(array('data' => $result));



