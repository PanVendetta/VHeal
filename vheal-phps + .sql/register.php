<?php
require "conn.php";
if($conn == null){
    echo "connection failed";
}
$user_mail= $_POST["username"];
$user_pass = $_POST["pass"];
$user_name = $_POST["name"];

$user_phone = $_POST["phone"];
$mysql_qry1 = "select * from login where username like '$user_mail' ;";
$result1 = mysqli_query($conn,$mysql_qry1);
$flag = 0;
if(mysqli_num_rows($result1) > 0) 
{
 $flag = 0;
 echo "email already registered";
}
else if(mysqli_num_rows($result1) === 0){
    $flag=1;
    $mysql_qry = "insert into login(username,password,name,phone) values('$user_mail','$user_pass', '$user_name', '$user_phone');";
     if($conn->query($mysql_qry) === TRUE && $flag == 1) 
        {
            echo "Registration Successful";
        }
    else{
            echo "Error: ".$mysql_qry."<br>".$conn->error;
        }
}
else{
 echo "Entered details are incorrect";
 $flag = 0;
}
$conn->close();
?>