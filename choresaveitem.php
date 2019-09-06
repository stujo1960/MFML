<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();

$category = 'Chores';
$item = $_POST['item'];     if(!$item){$item = $_GET['item'];}
$notes = $_POST['notes'];   if(!$notes){$notes = $_GET['notes'];}
$userid = $_POST['userid']; if(!$userid){$userid = $_GET['userid'];}
$frog = $_POST['frog']; if(!$frog){$frog = $_GET['frog'];}

$sql = "INSERT INTO choreslist (category,item,notes,userid,frog) VALUES ('$category','$item','$notes','$userid','$frog')";
$result = mysqli_query($link,$sql);
array_push($json,$userid,$item,$notes,$category);

echo json_encode (array('saveitem'=>$json));
?>