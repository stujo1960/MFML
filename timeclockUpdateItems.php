<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();
$name= $_POST['name'];   if (!$name){$name= $_GET['name'];}
$selected= $_POST['selected'];   if (!$selected){$selected= $_GET['selected'];}
$now1 = time();
$now = date('Y-m-d H:i:00',$now1);
$servercount = 1;
	$sql = "SELECT * FROM timeclock WHERE (name = '$name') && (clockin = '0000-00-00 00:00:00') ORDER BY name,starttime";
     	$result = mysqli_query($link,$sql);
     	while ($myrow = mysqli_fetch_array($result)){
     		$id = $myrow["id"];
     		$name = $myrow["name"];
     		$event = $myrow["event"];
		if($servercount == $selected){
			$sql2 = "UPDATE timeclock SET clockin = '$now' WHERE id ='$id'";
			$result2 = mysqli_query($link, $sql2);
			array_push($json,$event);
		}
		$servercount++;
	}
mysqli_close($link);	
array_push($json,'updated',$now);
echo json_encode (array('updated'=>$json));
?>