<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include_once("../conn/registerconn.php");
session_start();
$username=$_SESSION['val'];//连接数据库
if ($_GET['action'] == "del"){							//判断是否执行删除
    $sqlstr1 = "delete from shopping where username = ".$username;		//定义删除语句
    $result = mysqli_query($register,$sqlstr1);				//执行删除操作
    if ($result){
        echo "<script>alert('购物车中的商品全部删除成功');location='showgouwuche.php';</script>";
        //echo "<script>alert('删除成功');history.go(-1);</script>";
    }else{
        echo "删除失败";
    }
}
?>
