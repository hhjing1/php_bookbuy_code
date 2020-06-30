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
            width:100px;
            float:left;
            border-radius:10px;
        }
        .logbtn{
            margin-right:20px;
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
$psw="";
$name="";
if (!empty($_POST)) {
    $name = $_POST['username'];
    if (!($name)) {
        echo "<script>alert('请填写个人手机号！');</script>";
    }else{
        include_once("../conn/registerconn.php");//包含数据库连接文件
        $sqlstr = "select * from register where phone = '$name'" ;//定义查询语句
        $result = mysqli_query($register, $sqlstr);//执行查询语句
        $rows = mysqli_fetch_row($result);//将查询结果返回为数组
        if (!is_null($rows)) {
            $psw=$rows[2];
        }else{
            echo "<script>alert('当前手机号未注册！');</script>";
        }
    }
}
?>
<div class="header"><h1>欢迎进入图书系统</h1></div>
<div class="container">
    <div class="login">
        <h2 class="logtip">密码找回</h2>
        <form  method="post">
            <div class="form-group">
                <label for="username">手机号</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php  echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php  echo $psw; ?>">
            </div>
            <div class="btnbag">
                <input type="submit" class="btn btn-primary logbtn" name="submit" value="确定">
            </div>
        </form>
    </div>
</div>
</body>
</html>
