<?php
require_once("db.php");
$rLevel=0;
if(isset($_GET["RunningLevel"])) $rLevel=$_GET["RunningLevel"];

$sql = "select Age, Pace
from profile where RunningLevel='$rLevel'";

$result = $mydb->query($sql);

$data = array();
for($x=0; $x<mysqli_num_rows($result); $x++) { //gives number of rows in results
  $data[] = mysqli_fetch_assoc($result);
  //get a row from the result table and
  //coverts it to a key value and stores it in data array
}

echo json_encode($data);
//going to print out the value of the
//data array in json format
?>
