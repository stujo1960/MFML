<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();
$targetid = $_POST['targetid'];		if(!$targetid){$targetid = $_GET['targetid'];}

$sql = "SELECT * FROM choreslist WHERE (removed = 'N') &&(userid = '$targetid') ORDER BY frog DESC,userid,item";
$result = mysqli_query($link,$sql);
while ($myrow = mysqli_fetch_array($result)){
	$id = $myrow["id"];
     	$item = $myrow["item"];
     	$notes = $myrow["notes"];
     	$userid = $myrow["userid"];
     	$frog = $myrow["frog"];
	if ($frog == "true"){$frog = "<font color='red'><B>! - Urgent - ! : </b></font> ";}
	else {$frog = "";}
	array_push($json,$item,$notes,$userid,$frog);
}
//echo json_encode (array('catigories'=>$json));
echo json_encode (array($targetid=>$json));
?>