<?php
header("Content-type:text/html;charset=utf-8");

include_once("../conn/registerconn.php");
$title = $_POST['title'];
$newprice=$_POST['newprice'];
$oldprice=$_POST['oldprice'];
$salenumber=$_POST['salenumber'];
$img=$_POST['img'];
$kind=$_POST['kind'];

$resultresult="false";
$sqlstr1 = "insert into book values('0','".$title."','".$newprice."','".$oldprice."','".$salenumber."','".$img."','".$kind."')";
$result2 = mysqli_query($register,$sqlstr1);
if ($result2){
    $resultresult="true";
}
$json_arr = array("kind1" => $resultresult);
$json_obj = json_encode($json_arr);
echo $json_obj;


