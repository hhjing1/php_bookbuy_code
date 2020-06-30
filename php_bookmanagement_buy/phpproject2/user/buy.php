<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="../css/style2.css" rel="stylesheet" type="text/css" media="all" />
    <title>修改</title>
    <style>
        #wen{
            float: left;
            margin-top: 60px;
            margin-left: 200px;
        }
        #wen2{
            color: deeppink;
        }
    </style>
</head>
<body>

<?php
include_once("../conn/registerconn.php");//包含数据库连接文件
$id=$_GET['id'];
$bookid=$_GET['bookid'];
session_start();
$username=$_SESSION['val'];
$number=$_GET['number'];
//等到user中的信息
$sqluser = "select * from register  where username='". $username."'order by id";
$resultuser = mysqli_query($register, $sqluser);
$rowsuser = mysqli_fetch_row($resultuser);
//获取book信息
$sqlbook = "select * from book  where id='".$bookid."' order by id";
$resultbook = mysqli_query($register, $sqlbook);
$rowsbook = mysqli_fetch_row($resultbook);

$zongqianshu=(double)$rowsbook[2]*$number+10;
?>
<!-- main -->


<div class="main-w3layouts wrapper">
    <img src="<?php echo $rowsbook[5] ?>" width="200px"  id="wen">
    <div class="main-agileinfo">
        <div class="agileits-top" >
            <form method="post" action="gouwucheaddorder.php">
                <h3 id="wen2">产品名称</h3><input type="text" class="text" name="title" placeholder="" required="" value="<?php echo $rowsbook[1] ?>">
                <h3 id="wen2">产品单价</h3><input type="text" class="text" name="danjia" placeholder="" required="" value="<?php echo $rowsbook[2] ?>">
                <h3 id="wen2"> 购买数量</h3><input type="text" class="text" name="shuliang" placeholder="" required="" value="<?php echo $number ?>">
                <h3 id="wen2">运费</h3><input type="text" class="text" name="yunfei" placeholder="" required=""  value="<?php echo "10 元" ?>">
                <h3 id="wen2">应付钱数</h3><input type="text" class="text" name="zongqianshu" placeholder="" required=""  value="<?php echo $zongqianshu ?>">
                <h3 id="wen2">本人名字</h3><input type="text" class="text" name="username" placeholder="" required="" value="<?php echo $rowsuser[1] ?>">
                <h3 id="wen2">练习电话</h3><input type="text" class="text" name="phone" placeholder="" required="" value="<?php echo $rowsuser[3] ?>">
                <h3 id="wen2">本人地址</h3><input type="text" class="text" name="address" placeholder="" required="" value="">
                <input type="hidden" class="text" name="userid" value="<?php echo $rowsuser[0] ?>">
                <input type="hidden" class="text" name="prodid" value="<?php echo $rowsbook[0] ?>">
                <input type="hidden" class="text" name="shopid" value="<?php echo $id ?>">
                <input type="submit" value="提交订单并付款">
            </form>
        </div>
    </div>
    <!-- //copyright -->
    <ul class="w3lsg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</body>
</html>