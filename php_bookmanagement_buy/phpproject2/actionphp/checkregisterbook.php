<?php
header("Content-type:text/html;charset=utf-8");
function _check_username($title, $register)
{ $sqlstr2 = "select * from book where title ='".$title."'";
    $result2 = mysqli_query($register,$sqlstr2);
    while ($rows = mysqli_fetch_row($result2)){
        return true;
    }
    return false;
}
include_once("../conn/registerconn.php");
$title = $_POST['title'];
$resultresult="true";
if(_check_username($title,$register))
{
    $resultresult="false";
}
$json_arr = array("kind" => $resultresult);
$json_obj = json_encode($json_arr);
echo $json_obj;


