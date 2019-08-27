<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();
$id = $_POST['id'];
$catname = $_POST['catname'];
$del = $_POST['del'];
$newcat = $_POST['newcat'];
if (!$id){$id = $_GET['id'];}
if (!$catname){$catname = $_GET['catname'];}
if (!$del){$del = $_GET['del'];}
if (!$newcat){$newcat = $_GET['newcat'];}
if($id && $catname){ 
	$sql = "UPDATE catList SET name = '$catname' where id = '$id'";
	$result = mysqli_query($link,$sql);
}
elseif($id && ($del == 'YES')){ 
	$sql = "DELETE FROM catList where id = '$id'";
	$result = mysqli_query($link,$sql);
}
elseif($newcat){
	$sql= "INSERT INTO catList (name) values ('$newcat')";
	$result = mysqli_query($link,$sql);
}
else{
	$sql = "SELECT * FROM catList ORDER BY name";
	$result = mysqli_query($link,$sql);
	while ($myrow = mysqli_fetch_array($result)){
		$id = $myrow["id"];
     		$name = $myrow["name"];
		array_push($json,$id,$name);
	}
	echo json_encode (array('catigories'=>$json));
}
?>