<?php
require "conn.php";
if($conn == null){
    echo "connection failed";
}
$user_disease = $_POST["disease"];
$user_pincode=$_POST["pincode"];
$user_name = $_POST["email"];

$mysql_qry1 = "SELECT * from diseasetable where disease like '$user_disease' AND pincode like '$user_pincode';";
$result1 = mysqli_query($conn,$mysql_qry1);
$flag = 0;
if(mysqli_num_rows($result1) >0) 
{
 $flag = 1;
 $mysql_qry4 = "UPDATE diseasetable SET count= count+1 WHERE disease LIKE '$user_disease' AND pincode LIKE '$user_pincode';";
     if($conn->query($mysql_qry4) === TRUE && $flag == 1) 
        {
            echo "Update Successful";
        }
    else{
            echo "Error: ".$mysql_qry4."<br>".$conn->error;
        }
}
else if(mysqli_num_rows($result1) === 0){
    $flag=1;
    $mysql_qry = "INSERT INTO diseasetable (disease, pincode) VALUES ('$user_disease', '$user_pincode');";
     if($conn->query($mysql_qry) === TRUE && $flag == 1) 
        {
            echo "Update Successful";
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