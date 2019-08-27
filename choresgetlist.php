<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();
$targetid = $_POST['targetid'];		if(!$targetid){$targetid = $_GET['targetid'];}

$sql = "SELECT * FROM choreslist WHERE (removed = 'N') &&(userid = '$targetid') ORDER BY userid,item";
$result = mysqli_query($link,$sql);
while ($myrow = mysqli_fetch_array($result)){
	$id = $myrow["id"];
     	$item = $myrow["item"];
     	$notes = $myrow["notes"];
     	$userid = $myrow["userid"];
	array_push($json,$item,$notes,$userid,$id);
}
echo json_encode (array('catigories'=>$json));
?>