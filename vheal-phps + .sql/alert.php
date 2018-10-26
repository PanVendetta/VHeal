<?php


$user_report=$_POST["reporttext"];
$user_name=$_POST["reportname"];
$f=0;
$text = "word word w.d. word!..";
    $split = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $user_report, -1, PREG_SPLIT_NO_EMPTY);
    
    
foreach($split as $z){
if(strcmp($user_name,$z)==0){
    $f=1;
    echo "Valid";
    break;
    
}
}
if($f==0)
    echo "Not Valid";

?>