<?php
$register = mysqli_connect("localhost", "root", "511924", "phpfile") or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
mysqli_query($register,"set names utf8");						//设置数据库编码格式utf8
?>
