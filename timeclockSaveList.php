<?php
include ("base_info_i.php");
date_default_timezone_set('America/Chicago');
$todaydate = date("Y-m-d H:i:s");
$id=$_POST['id'];
$name=$_POST['name'];
$event=$_POST['event'];
$details = $_POST['details'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];
$clockin = $_POST['clockin'];
if (!$clockin){
	$todaydate = '0000-00-00 00:00:00';
	$sql = "INSERT INTO timeclock (name,event,details,starttime,endtime,clockin,late,deltatime) VALUES ('$name','$event','$details','$starttime','$endtime','$todaydate','Y','5')";

}
$result = mysqli_query($link,$sql);

?>