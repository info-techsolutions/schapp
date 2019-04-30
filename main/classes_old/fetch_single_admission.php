<?php
include_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/func_ajax.php';
include_once '../inc/errorcode.php';

if(isset($_POST["user_id"]))
{
 $output = array();
 $stmt = $db->prepare("SELECT * FROM z_tb_person WHERE person_number = '".$_POST["user_id"]."' LIMIT 1" );
 $stmt->execute();
 $result = $stmt->fetchAll();

 foreach($result as $row)
 {
  $output["firstname"] = $row["firstname"];
  $output["lastname"] = $row["lastname"];
  $output["phone"] = $row["phone"];
  $output["address"] = $row["address"];
  if($row["profile_photo_url"] != '')
  {
   $output['image'] = '<img src="http://127.0.0.1/schapp/main/admin/pic/'.$row["profile_photo_url"].'" class="img-thumbnail" width="50" height="35" />
   <input type="hidden" name="hidden_user_image" value="'.$row["profile_photo_url"].'" />';
  }
  else
  {
   $output['image'] = '<input type="hidden" name="hidden_user_image" value="" />';
  }
 }
 echo json_encode($output);
}
