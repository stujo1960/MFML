<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();
$userid= $_POST['userid'];
if (!$userid){$userid= $_GET['userid'];}
$list= $_POST['list'];
if (!$list){$list= $_GET['list'];}
$array = $array.$list;
$array = (explode(',',$array));
$count = sizeof($array)-1;
$data = $array;
				$sql3 = "UPDATE choreslist SET removed = 'Y', item = '$list',userid = '$userid' WHERE id ='500'";
				$result3 = mysqli_query($link, $sql3);
$servercount = 1;
	$sql = "SELECT * FROM choreslist WHERE (removed = 'N') && (userid = '$userid') ORDER BY userid,item";
     	$result = mysqli_query($link,$sql);
     	while ($myrow = mysqli_fetch_array($result)){
     		$id = $myrow["id"];
     		$userid = $myrow["userid"];
     		$item = $myrow["item"];
     		$notes = $myrow["notes"];
		$x = 0;
		for($x;$x<=$count;$x++){
			if ($data[$x] == $servercount){
				$sql2 = "UPDATE choreslist SET removed = 'Y' WHERE id ='$id'";
				$result2 = mysqli_query($link, $sql2);
			}
		}
		$servercount++;
	}
mysqli_close($link);	
array_push($json,'updated list = ',$list);
echo json_encode (array('updated'=>$json));
?>