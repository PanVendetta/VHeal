<?php
require "conn.php";
if($conn == null){
    echo "connection failed";
}
$user_pincode=$_POST["pincodeSearch"];

//$query = mysql_query("SELECT disease, count from diseasetable where pincode = '$user_pincode';");

$sth = mysqli_query($conn, "SELECT disease, count from diseasetable where pincode = '$user_pincode';");
$rows = array();
if(mysqli_num_rows($sth) > 0){
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
echo json_encode($rows);
}
else{
    echo "No details in this area yet";
}