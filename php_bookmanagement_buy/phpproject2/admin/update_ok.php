<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
include_once("../conn/registerconn.php");//包含数据库连接文件
if(!empty($_POST)){
	if(!($_POST['username'] and $_POST['password'] and $_POST['tel'] and $_POST['email'])){
		echo "<script>alert('请完善信息');</script>";;
	}else{
		$sqlstr = "update register set username = '".$_POST['username']."', password = '".$_POST['password']."', phone = '".$_POST['tel']."', email = '".$_POST['email']."' where id = ".$_POST['id'];//定义更新语句
		$result = mysqli_query($register,$sqlstr);//执行更新语句
		if($result){
			echo "<script>alert('修改成功');location='alluser.php';</script>";
		}else{
            echo "<script>alert('修改失败');</script>";
		}
	}
}
?>