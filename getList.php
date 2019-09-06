<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();
$targetcat = $_POST['targetcat'];
if(!$targetcat){
$targetcat = $_GET['targetcat'];
}
if($targetcat == 'All'){
	$sql = "SELECT * FROM itemlist WHERE removed = 'N' ORDER BY category DESC,item,userid";
}
else{
	$sql = "SELECT * FROM itemlist WHERE (removed = 'N') && (category = '$targetcat') ORDER BY category,item,userid";

}
     $result = mysqli_query($link,$sql);
     while ($myrow = mysqli_fetch_array($result)){
     	$id = $myrow["id"];
     	$category = $myrow["category"];
     	$item = $myrow["item"];
     	$notes = $myrow["notes"];
     	$userid = $myrow["userid"];
     	$checked = $myrow["checked"];
		array_push($json,$item,$notes,$userid,$id,$category);
}
echo json_encode (array('catigories'=>$json));
?>