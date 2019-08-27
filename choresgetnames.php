<?php
header('Content-type: application/json');
include ("base_info_i.php");
$anarray = array();
$shortlist = $_POST['shortlist'];
/////////////////////////////////////////////////////// get list of current userids //////////////////////////

if ($shortlist == 'short'){
	$sql = "SELECT DISTINCT userid FROM choreslist ORDER BY userid";
}
else{
	$sql = "SELECT DISTINCT userid FROM choreslist ORDER BY userid";
}
$result = mysqli_query($link,$sql);
while ($myrow = mysqli_fetch_array($result)){
     	$userid = $myrow["userid"];
	array_push($anarray,$userid);
}
echo json_encode (array('userids'=>$anarray));
?>