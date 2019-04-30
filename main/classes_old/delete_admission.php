<?php

include_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/func_ajax.php';
include_once '../inc/errorcode.php';


if(isset($_POST["user_id"]))
{
 $image = get_image_name($_POST["user_id"]);
 if($image != '')
 {
  unlink("../admin/pic/" . $image);
 }
 $stmt = $db->prepare("DELETE FROM z_tb_person  WHERE person_number = :person_number");
 $result = $stmt->execute(
  array(
   ':person_number' => $_POST["user_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
 else{
  echo 'Error deleting'.$_POST["user_id"];
 }
 
}
