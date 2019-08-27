<?php
header('Content-type: application/json');
include ("base_info_i.php");
$anarray = array();
$shortlist = $_POST['shortlist'];
/////////////////////////////////////////////////////// get list of current categories //////////////////////////

if ($shortlist == 'short'){
	$sql = "SELECT DISTINCT category FROM itemlist WHERE removed='N' ORDER BY category";
}
else{
	$sql = "SELECT DISTINCT category FROM itemlist ORDER BY category";
}
$result = mysqli_query($link,$sql);
while ($myrow = mysqli_fetch_array($result)){
     	$category = $myrow["category"];
		array_push($anarray,$category);
}
echo json_encode (array('category'=>$anarray));
?>