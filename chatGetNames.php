<?php
header('Content-type: application/json');
include ("base_info_i.php");
$anarray = array();
$shortlist = $_POST['shortlist'];
/////////////////////////////////////////////////////// get list of current names //////////////////////////

if ($shortlist == 'short'){
	$sql = "SELECT DISTINCT name FROM users ORDER BY name";
}
else{
	$sql = "SELECT DISTINCT name FROM users ORDER BY name";
}
$result = mysqli_query($link,$sql);
while ($myrow = mysqli_fetch_array($result)){
     	$name = $myrow["name"];
	array_push($anarray,$name);
}
echo json_encode (array('names'=>$anarray));
?>