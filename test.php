<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();
	$sql = "SELECT name FROM catList ORDER BY name";
     $result = mysqli_query($link,$sql);
     while ($myrow = mysqli_fetch_array($result)){
     	$id = $myrow["id"];
     	$name = $myrow["name"];
		array_push($json,$name);
}
echo json_encode (array('catList'=>$json));
?>