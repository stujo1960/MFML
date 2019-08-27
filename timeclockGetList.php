<?php
header('Content-type: application/json');
include ("base_info_i.php");
$anarray = array();
$who = $_POST['who'];
$clockin = $_POST['clockin'];
$now1 = time();
$now = date('Y-m-d H:i:00',$now1);

if ($clockin){
	$sql = "UPDATE timeclock SET clockin = '$now' where id = '$clockin'";
}
elseif($who){
	$sql = "SELECT * FROM timeclock WHERE (name = '$who') && (clockin = '0000-00-00 00:00:00') ORDER BY name,starttime";
}
else{
	$sql = "SELECT * FROM timeclock ORDER BY name,starttime";
}

    	$result = mysqli_query($link,$sql);
     	while ($myrow = mysqli_fetch_array($result)){

		$id = $myrow['id'];
		$name = $myrow['name'];
		$event = $myrow['event'];
		$details = $myrow['details'];
		$starttime = $myrow['starttime'];
		$starttime = substr($starttime,5);
		$starttime = substr($starttime,0,-3);
		$endtime = $myrow['endtime'];
		$endtime = substr($endtime,5);
		$endtime = substr($endtime,0,-3);
		$clockin = $myrow['clockin'];
		$late = $myrow['late'];
		$deltatime = $myrow['deltatime'];
		if($deltatime < 0){$deltatime = $deltatime;}
array_push($anarray,$id,$name,$event,$details,$endtime,$clockin,$late,$deltatime);


}
echo json_encode (array('list'=>$anarray));

?>