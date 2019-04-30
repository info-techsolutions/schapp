<?php
  
include '../inc/db.php';
require '../inc/func_ajax.php';
include_once '../inc/errorcode.php';
  
  
if(isset($_POST["operation"]))
{

// When the operation is an add operation
 if($_POST["operation"] == "Add")
 {
  $image = '';
  if($_FILES["image"]["name"] != '')
  {
   $image = upload_image();
  }
   $statement = $connection->prepare("INSERT INTO z_tb_person(person_number, class_id, arm_id, firstname, lastname, phone, gender, profile_photo_url, address, typ, payment_status) 
   VALUES (:person_number, :class_id, :arm_id, :firstname, :lastname, :phone, :gender, :profile_photo_url, :address, :typ, :payment_status)");
   $result = $statement->execute(array(
                        ':person_number' => $_POST["person_number"],
                        ':class_id' => $_POST["classes"],
                        ':arm_id' => $_POST["arms"],
                        ':firstname' => $_POST["firstname"],                       
                        ':lastname' => $_POST["lastname"],
                        ':phone' => $_POST["phone"],
                        ':gender' => $_POST["gender"],
                        ':profile_photo_url' => $image,
                        ':address' => $_POST["address"],
                        ':typ' => 'STUDENT',
                        ':payment_status' => 'NIL'
                    ));

  if(!empty($result))
  {
   // echo 'Data Inserted';
   ?>
    <div class="container">
      <h2>Info!</h2>
      <p>Student added.</p>
      <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    </div>
    <?php
  }
 }
 
 // When the operation is an Edit operation
 if($_POST["operation"] == "Edit")
 {
  $image = '';
  if($_FILES["image"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_user_image"];
  }
  	$statement = $connection->prepare("UPDATE z_tb_person SET firstname = :firstname, lastname = :lastname, phone = :phone, address = :address, profile_photo_url = :profile_photo_url WHERE person_number = :person_number ");
 	$result = $statement->execute(array(
                        ':person_number' => $_POST["user_id"],
                        ':firstname' => $_POST["lastname"],
                        ':lastname' => $_POST["firstname"],
                        ':phone' => $_POST["phone"],
                        ':address' => $_POST["address"],
                        ':profile_photo_url' => $image
                    ));
  if(!empty($result))
  {
   // echo 'Data Updated';
   ?>
      <div class="container">
      <h2>Info!</h2>
      <p>Student Successfully Updated.</p>
      <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    </div>
    <?php
  }
 }
 
 // When the operation is an Add class operation
 if($_POST["operation"] == "classs"){
 
 	$statement = $connection->prepare("INSERT INTO z_tb_students(admission_number, class_id, arm_id) values(:admission_number, :class_id, :arm_id)");
  	$result = $statement->execute(array(
                        ':admission_number' => $_POST["user_id"],
                        ':class_id' => $_POST["classes"],
                        ':arm_id' => $_POST["arms"]
                    ));
  if(!empty($result))
  {
   echo 'Class Added';
  }
 }
 
 
}

?>
   
