<?php
header("Content-type:text/html;charset=utf-8");

include_once("../conn/registerconn.php");
$username = $_POST['registerUsername'];
$password=$_POST['registerPassword'];
$phone=$_POST['registerphone'];
$email=$_POST['registeremail'];

$resultresult="false";
$sqlstr1 = "insert into register values('0','".$username."','".$password."','".$phone."','$email')";
$result2 = mysqli_query($register,$sqlstr1);
if ($result2){
    $resultresult="true";
}
$json_arr = array("kind1" => $resultresult);
$json_obj = json_encode($json_arr);
echo $json_obj;


