<?php
header("Content-type:text/html;charset=utf-8");

include_once("../conn/registerconn.php");//包含数据库连接文件

session_start();
$username=$_SESSION['val'];
$userid=$_POST['userid'];
$address=$_POST['address'];
$state="未发货";
//等到user中的信息
$sqluser = "select * from register  where username='". $username."'order by id";
$resultuser = mysqli_query($register, $sqluser);
$rowsuser = mysqli_fetch_row($resultuser);

//等到ushop中的信息
$sqlshop = "select * from shopping  where username='". $username."'order by id";
$resultshop = mysqli_query($register, $sqlshop);

while ($rowsshop = mysqli_fetch_row($resultshop)){
    //获取book信息
    $sqlbook = "select * from book  where id='".$rowsshop[2]."' order by id";
    $resultbook = mysqli_query($register, $sqlbook);
    $rowsbook = mysqli_fetch_row($resultbook);
    $zongqianshu=(double)$rowsbook[2]*$rowsshop[3]+10;
    $sqlstr1 = "insert into bookorder values('0','".$userid."','".$rowsshop[2]."','".$address."','".$zongqianshu."','".$rowsshop[3]."','".$state."')";
    $result2 = mysqli_query($register,$sqlstr1);

    $sqlstrw = "delete from shopping where id = ".$rowsshop[0];		//定义删除语句
    $resultw = mysqli_query($register,$sqlstrw);
}
if ($result2){
    echo "<script type='text/javascript'>alert('恭喜您全部购买成功，购物车清空');location='showgouwuche.php';</script>";

}
else{
    echo "<script type='text/javascript'>alert('提交订单失败付款失败');location='showgouwuche.php';</script>";}


