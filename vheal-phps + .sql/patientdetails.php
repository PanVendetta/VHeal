<?php
require "conn.php";
if($conn == null){
    echo "connection failed";
}
$patient_phone=$_POST["patientPhone"];
$patient_name = $_POST["patientName"];
$patient_age = $_POST["patientAge"];
$patient_pincode = $_POST["patientPincode"];
$patient_doctoryes = $_POST["patientDoctoryes"];
$patient_disease = $_POST["patientDisease"];
$user_name = $_POST["username"];

$mysql_qry4= "update login
            set prevpatient = '$patient_phone'
            where username = '$user_name';";
$result5= mysqli_query($conn, $mysql_qry4);


$mysql_qry1 = "select * from patienttable where patientphone like '$patient_phone' ;";
$result1 = mysqli_query($conn,$mysql_qry1);
$flag = 0;
if(mysqli_num_rows($result1) > 0) 
{
$row= mysqli_fetch_row($result1);
$mysql_qry2 = "UPDATE patienttable SET patientname = '$patient_name', patientage= '$patient_age', patientlocation= '$patient_pincode', patientdisease= '$patient_disease',
                 patientdoctor= '$patient_doctoryes'
                WHERE patientphone='$patient_phone';";
$result9= mysqli_query($conn, $mysql_qry2);
if($conn->query($mysql_qry2) === TRUE){
echo "Patient details uploaded";
}
else
echo "Server Error: idgaf";
}
else if(mysqli_num_rows($result1) === 0){
     $flag=1;
    $mysql_qry = "insert into
                patienttable (patientphone, patientname, patientage, patientlocation, patientdoctor, patientdisease) 
                values ('$patient_phone', '$patient_name', '$patient_age', '$patient_pincode', '$patient_doctoryes', '$patient_disease');";
    
    if($conn->query($mysql_qry) === TRUE && $flag == 1) 
        {
            echo "Patient details uploaded";
        }
    else{
            echo "Error: ".$mysql_qry."<br>".$conn->error;
        }
}
else{
 echo "Entered details are incorrect";
}

$conn->close();
?>