<?php
header("Content-type:text/html;charset=utf-8");

include_once("../conn/registerconn.php");
$userid=$_POST['userid'];
$prodid=$_POST['prodid'];
$zongqianshu=$_POST['zongqianshu'];
$shuliang=$_POST['shuliang'];
$address=$_POST['address'];
$state="未发货";
$shopid=$_POST['shopid'];

$sqlstr1 = "insert into bookorder values('0','".$userid."','".$prodid."','".$address."','".$zongqianshu."','".$shuliang."','".$state."')";
$result2 = mysqli_query($register,$sqlstr1);
if ($result2){
    $sqlstrw = "delete from shopping where id = ".$shopid;		//定义删除语句
    $resultw = mysqli_query($register,$sqlstrw);
    echo "<script type='text/javascript'>alert('恭喜您购买成功');location='showgouwuche.php';</script>";

}
else{
    echo "<script type='text/javascript'>alert('提交订单失败付款失败');location='showgouwuche.php';</script>";}


