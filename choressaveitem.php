<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();

$category = 'Chores';
$item = $_POST['item'];     if(!$item){$item = $_GET['item'];}
$notes = $_POST['notes'];   if(!$notes){$notes = $_GET['notes'];}
$userid = $_POST['userid']; if(!$userid){$userid = $_GET['userid'];}

$sql = "INSERT INTO choreslist (category,item,notes,userid) VALUES ('$category','$item','$notes','$userid')";
$result = mysqli_query($link,$sql);
array_push($json,$category,$item,$notes,$userid);

echo json_encode (array('saveitems'=>$json));
?>