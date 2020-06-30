<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>登录</title>
    <style type="text/css">
        *{
            padding:0px;
            margin:0px;
        }
        .header{
            width:100%;
            height:100px;
            padding:20px;
            background-color:#D2E9FF;
            text-align:center;
        }
        .container{
            width:100%;
            height:700px;
            position:relative;
            background-color:#A6FFFF;
        }
        .login{
            width:500px;
            height:auto;
            background-color:white;
            position:absolute;
            top:100px;
            left:350px;
            border-radius:8px;
        }
        label{
            float:left;
            width:100px;
            margin-top:7px;
            margin-right:5px;
        }
        .form-control{
            width:60%;
        }
        .logtip{
            padding-top:20px;
            padding-bottom:20px;
            border-bottom:2px solid red;
            text-align:center;
        }
        .form-group{
            margin-left:40px;
            margin-top:40px;
        }
        .btn{
            height:50px;
            width:200px;
            float:left;
            color: red;
            background-color: #00FFFF;
            border-radius:10px;
        }
        .logbtn{
            margin-right:20px;
            margin-left: 20px;
        }


        .btnbag{
            margin-left:140px;
            margin-right:140px;
            height:50px;
            overflow:hidden;
            margin-top:30px;
            margin-bottom:40px;
        }
    </style>
</head>
<body>
<?php
session_start();
$username=$_SESSION['val'];
include_once("../conn/registerconn.php");//包含数据库连接文件
$sqlstr = "select * from register where username = '$username'" ;//定义查询语句
$result = mysqli_query($register, $sqlstr);//执行查询语句
$rows = mysqli_fetch_row($result);//将查询结果返回为数组

if (!empty($_POST)) {
    $password = $_POST['password'];
    if (!($password)) {
        echo "<script>alert('请填写好密码！');</script>";
    }else{
        $sqlstr2="update register set password = '".$password."' where username = '$username'";
        $result2 = mysqli_query($register, $sqlstr2);//执行查询语句
        if ($result) {
            $sqlstr = "select * from register where username = '$username'" ;//定义查询语句
            $result = mysqli_query($register, $sqlstr);//执行查询语句
            $rows = mysqli_fetch_row($result);//将查询结果返回为数组
            echo "<script>alert('恭喜您,密码修改成功！');</script>";
        }else{
            $sqlstr = "select * from register where username = '$username'" ;//定义查询语句
            $result = mysqli_query($register, $sqlstr);//执行查询语句
            $rows = mysqli_fetch_row($result);//将查询结果返回为数组
            echo "<script>alert('密码修改失败！');</script>";
        }
    }
}

?>
<div class="header"><h1>欢迎进入图书系统</h1></div>
<div class="container">
    <div class="login">
        <h2 class="logtip">个人信息显示和修改</h2>
        <form  method="post">
            <div class="form-group">
                <label for="username">用户名</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php  echo $rows[1]; ?>" disabled="disabled">
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php  echo $rows[2]; ?>">
            </div>
            <div class="form-group">
                <label for="username">手机号</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php  echo $rows[3]; ?>" disabled="disabled">
            </div>
            <div class="form-group">
                <label for="username">邮箱</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php  echo $rows[4]; ?>" disabled="disabled">
            </div>
            <div class="btnbag">
                <input type="submit" class="btn btn-primary logbtn" name="submit" value="确认修改密码">
            </div>
        </form>
    </div>
</div>
</body>
</html>
