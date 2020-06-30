<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
include_once("../conn/registerconn.php");//包含数据库连接文件
if(!empty($_POST)){
    if(!($_POST['address'])){
        echo "<script>alert('请完善信息');</script>";;
    }else{
        $sqlstr = "update bookorder set address = '".$_POST['address']."' where id = ".$_POST['id'];//定义更新语句
        $result = mysqli_query($register,$sqlstr);//执行更新语句
        if($result){
            echo "<script>alert('修改成功');location='allorder.php?action=".$_POST['wen']."';</script>";
        }else{
            echo "<script>alert('修改失败');</script>";
        }
    }
}
?>