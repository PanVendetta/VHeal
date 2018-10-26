<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 require_once('conn.php');
 $image = $_POST['image'];
 $patient_name= $_POST['patientname'];
 
 
 
 $sql = "update patienttable 
        set patientreport='$image'
        where patientname ='$patient_name';";
 
 $stmt = mysqli_prepare($conn,$sql);
 
 mysqli_stmt_execute($stmt);
 
 $check = mysqli_stmt_affected_rows($stmt);
 
 if($check == 1){
 echo "Image Uploaded Successfully";
 }else{
 echo "Error Uploading Image";
 }
 mysqli_close($conn);
 }else{
 echo "Error";
 }