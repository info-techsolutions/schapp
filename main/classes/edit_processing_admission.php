<?php

include_once '../inc/config.php';
include_once '../classes/class.upload.php';
// include_once '../inc/func_ajax.php';
include_once '../inc/errorcode.php';

  $image = '';
  
  if(isset($_FILES["image"]["name"]))
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_user_image"];
  }
  $stmt = $db->prepare("UPDATE z_tb_person SET firstname = :firstname, lastname = :lastname, phone = :phone, profile_photo_url = :profile_photo_url WHERE person_number = :person_number");
  $result = $stmt->execute(
   array(
    ':firstname' => $_POST["firstname"],
    ':lastname' => $_POST["lastname"],
    ':phone' => $_POST["phone"],
    ':profile_photo_url'  => $image,
    ':person_number'   => $_POST["user_idE"]
   ));
  if(!empty($result))
  {
   echo 'Data Updated';
  }
