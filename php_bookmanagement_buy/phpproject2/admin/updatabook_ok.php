<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
include_once("../conn/registerconn.php");//包含数据库连接文件
if(!empty($_POST)){
    if(!($_POST['title'] and $_POST['oldprice'] and $_POST['newprice'] and $_POST['img'] and$_POST['salenumber'])){
        echo "<script>alert('请完善信息');</script>";;
    }else{
        $sqlstr = "update book set title = '".$_POST['title']."', newprice = '".$_POST['newprice']."', oldprice = '".$_POST['oldprice']."',salenumber = '".$_POST['salenumber']."', img = '".$_POST['img']."' where id = ".$_POST['id'];//定义更新语句
        $result = mysqli_query($register,$sqlstr);//执行更新语句
        if($result){
            echo "<script>alert('修改成功');location='allbook.php?kind=故事书';</script>";
        }else{
            echo "<script>alert('修改失败');</script>";
        }
    }
}
?>