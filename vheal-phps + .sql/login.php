<?php
require "conn.php";
if($conn == null){
    echo "connection failed";
}
$username = $_POST["username"];
$pass = $_POST["pass"];
$mysql_qry = "select * from login where username like '$username' and password like '$pass';";
$result = mysqli_query($conn,$mysql_qry);
if(mysqli_num_rows($result) > 0) {
    echo "Login Successful";
}else{
    echo "Login Failed";
}
$conn->close();
?>
