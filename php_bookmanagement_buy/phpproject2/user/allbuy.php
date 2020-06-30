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

session_start();
$username=$_SESSION['val'];

//等到user中的信息
$sqluser = "select * from register  where username='". $username."'order by id";
$resultuser = mysqli_query($register, $sqluser);
$rowsuser = mysqli_fetch_row($resultuser);

//等到ushop中的信息
$sqlshop = "select * from shopping  where username='". $username."'order by id";
$resultshop = mysqli_query($register, $sqlshop);
$yunfei=10;
$money=0;
$geshu=0;
$zongqianshu=0;
while ($rowsshop = mysqli_fetch_row($resultshop)){
    //获取book信息
    $sqlbook = "select * from book  where id='".$rowsshop[2]."' order by id";
    $resultbook = mysqli_query($register, $sqlbook);
    $rowsbook = mysqli_fetch_row($resultbook);
    $money=(double)$money+$rowsshop[3]*$rowsbook[2];
    $geshu=$geshu+1;
}
$yunfei=$yunfei*$geshu;
$zongqianshu=$money+$yunfei;

?>
<!-- main -->


<div class="main-w3layouts wrapper">
    <div class="main-agileinfo">
        <div class="agileits-top" >
            <form method="post" action="allgouwucheaddorder.php">
                <h3 id="wen2">产品总个数</h3><input type="text" class="text" name="title" placeholder="" required="" value="<?php echo $geshu ?>">
                <h3 id="wen2">产品总价</h3><input type="text" class="text" name="danjia" placeholder="" required="" value="<?php echo $money ?>">
                <h3 id="wen2">运费总价</h3><input type="text" class="text" name="shuliang" placeholder="" required="" value="<?php echo $yunfei ?>">
                <h3 id="wen2">订单总价格</h3><input type="text" class="text" name="yunfei" placeholder="" required=""  value="<?php echo $zongqianshu?>">
                <h3 id="wen2">本人名字</h3><input type="text" class="text" name="username" placeholder="" required="" value="<?php echo $rowsuser[1] ?>">
                <h3 id="wen2">练习电话</h3><input type="text" class="text" name="phone" placeholder="" required="" value="<?php echo $rowsuser[3] ?>">
                <h3 id="wen2">本人地址</h3><input type="text" class="text" name="address" placeholder="" required="" value="">
                <input type="hidden" class="text" name="userid" value="<?php echo $rowsuser[0] ?>">
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