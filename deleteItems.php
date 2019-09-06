<?php
header('Content-type: application/json');
include ("base_info_i.php");
$json = array();
$category= $_POST['category'];
if (!$category){$category= $_GET['category'];}
$list= $_POST['list'];
if (!$list){$list= $_GET['list'];}
$array = $array.$list;
$array = (explode(',',$array));
$count = sizeof($array)-1;
$data = $array;
$servercount = 1;
	$sql = "SELECT * FROM itemlist WHERE (removed = 'N') && (category = '$category') ORDER BY category,item,userid";
     	$result = mysqli_query($link,$sql);
     	while ($myrow = mysqli_fetch_array($result)){
     		$id = $myrow["id"];
     		$category = $myrow["category"];
     		$item = $myrow["item"];
     		$notes = $myrow["notes"];
     		$userid = $myrow["userid"];
		$x = 0;
		for($x;$x<=$count;$x++){
			if ($data[$x] == $servercount){
			//echo "id = ".$id."<BR>";
				$sql2 = "UPDATE itemlist SET removed = 'Y' WHERE id ='$id'";
				$result2 = mysqli_query($link, $sql2);
				array_push($json,$item);
			}
		}
		$servercount++;
	}
mysqli_close($link);
echo json_encode (array('updated'=>$json));
?>