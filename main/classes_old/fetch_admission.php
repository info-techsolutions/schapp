<?php

include_once '../inc/config.php';
require_once '../inc/function.php';
include_once '../classes/class.upload.php';
include_once '../inc/func_ajax.php';
include_once '../inc/errorcode.php';

$link ='http://127.0.0.1/schapp/main/admin/pic/';

$query = "";
$search = $_POST['search']['value'];
$output = array();

$query .= "SELECT * FROM z_tb_person ";
if(isset($_POST["search"]["value"]))
{
 $query .= "WHERE typ = 'STUDENT' AND firstname LIKE '%".$search."%' ";
// $query .= "WHERE firstname LIKE '%".$search."%' ";
// $query .= 'WHERE firstname LIKE "%'.$_POST["search"]["value"].'%" ';
// $query .= "OR lastname LIKE '%".$search."%' ";
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY person_number DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$data = array();
$filtered_rows = $stmt->rowCount();

//Let's make an iteration
 $r = 1;
 
foreach($result as $row)
{
 $image = '';
 
 $pic = $row["profile_photo_url"];
 
 if($pic != '')
 {
   $image = '<img src="'.$link.$pic.'" class="img-thubmnail" width="50" height="35" />';
 }
 else
 {
  $image = '';
 }
 $sub_array = array();
 $sub_array[] = $r;
 $sub_array[] = $image;
 $sub_array[] = $row["person_number"];
 $sub_array[] = $row["firstname"];
 $sub_array[] = $row["lastname"];
 $sub_array[] = date('jS M, Y', strtotime($row['created_at']));
 $sub_array[] = '<button type="button" name="update" id="'.$row["person_number"].'" class="btn btn-warning btn-xs update">Update</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["person_number"].'" class="btn btn-danger btn-xs delete">Delete</button>';
 $data[] = $sub_array;
 
 $r++;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);
echo json_encode($output);
