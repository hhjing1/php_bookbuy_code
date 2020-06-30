<?php
header("Content-type:text/html;charset=utf-8");

include_once("../conn/registerconn.php");
session_start();
$username=$_SESSION['val'];
$buynum=$_POST['buynum'];
$id=$_POST['id'];

$sql="select * from shopping where prodid = ".$id;
    $result=mysqli_query($register,$sql)or die("数据查询失败");
    if($row=mysqli_fetch_array($result)) {
        $buynum = $buynum + $row[3];
        $sqlstr = "update shopping set number = '" . $buynum . "' where prodid = " . $id;//定义更新语句
        $result1 = mysqli_query($register, $sqlstr);//执行更新语句
        if ($result1) {
            echo "<script>alert('已经收藏过此产品。本次只增加商品件数');location='../commodities/product_info.php?pid=".$id."';</script>";

        }
    }
    else{
        $sqlstr1 = "insert into shopping values('0','".$username."','".$id."','".$buynum."')";
        $result2 = mysqli_query($register,$sqlstr1);
        if ($result2){
            echo "<script>alert('加入购物车成功,详细信息请查看购物车');location='../commodities/product_info.php?pid=".$id."';</script>";

        }
    }


