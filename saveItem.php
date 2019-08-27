<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();

$category = $_POST['category'];
$item = $_POST['item'];
$notes = $_POST['notes'];
$userid = $_POST['userid'];

$sql = "INSERT INTO itemlist (category,item,notes,userid) VALUES ('$category','$item','$notes','$userid')";
$result = mysqli_query($link,$sql);
array_push($json,$userid);

echo json_encode (array('id'=>$json));
?>