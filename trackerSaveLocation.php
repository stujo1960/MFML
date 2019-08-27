<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();
$longitude = $_POST['longitude'];   if(!$longitude){$longitude = $_GET['longitude'];}
$latitude = $_POST['latitude'];   if(!$latitude){$latitude = $_GET['latitude'];}
$username = $_POST['username'];   if(!$username){$username = $_GET['username'];}
$date = $_POST['date'];   if(!$date){$date = $_GET['date'];}
$rowcount = 0;
$sql = "SELECT DISTINCT username FROM ourlocations WHERE username = '$username' ORDER BY username";
if ($result=mysqli_query($link,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  mysqli_free_result($result);
  }
if($rowcount > 0){
	$sql = "UPDATE ourlocations SET
		latitude = '$latitude',
		longitude = '$longitude',
		date = '$date'
		WHERE username = '$username'";
}
else{
	$sql = "INSERT INTO ourlocations (username,latitude,longitude,date) VALUES ('$username','$latitude','$longitude','$date')";
}
$result = mysqli_query($link,$sql);
array_push($json,$username,$latitude,$longitude,$rowcount);
echo json_encode (array('location'=>$json));
?>