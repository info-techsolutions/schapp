<?php

function upload_image()
{
 if(isset($_FILES["image"]))
 {
  $extension = explode('.', $_FILES['image']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = '../admin/pic/' . $new_name;
  move_uploaded_file($_FILES['image']['tmp_name'], $destination);
  return $new_name;
 }
}

function get_total_all_records()
{
 include '../inc/db.php';
 $stmt = $connection->prepare("SELECT * FROM zb_tb_person");
 $stmt->execute();
 $result = $stmt->fetchAll();
 return $stmt->rowCount();
}

function get_image_name($user_id)
{
 include('db.php');
 $stmt = $connection->prepare("SELECT profile_photo_url FROM z_tb_person WHERE person_number = '$user_id'");
 $stmt->execute();
 $result = $stmt->fetchAll();
 foreach($result as $row)
 {
  return $row["profile_photo_url"];
 }
}
?>
