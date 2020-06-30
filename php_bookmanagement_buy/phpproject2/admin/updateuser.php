<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="../css/style2.css" rel="stylesheet" type="text/css" media="all" />
    <title>修改</title>
</head>
<body>
<?php
include_once("../conn/registerconn.php");//包含数据库连接文件
if ($_GET['action'] == "update") {//判断地址栏参数action的值是否等于update
    $sqlstr = "select * from register where id = " . $_GET['id'];//定义查询语句
    $result = mysqli_query($register, $sqlstr);//执行查询语句
    $rows = mysqli_fetch_row($result);//将查询结果返回为数组
}
?>
<div class="main-w3layouts wrapper">
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form method="post" action="update_ok.php">
                用户名<input type="text"  class="text" placeholder="" required=""  name="username" value="<?php echo $rows[1] ?>">
                密码<input type="text" class="text" placeholder="" required=""  name="password" value="<?php echo $rows[2] ?>">
                电话号码<input type="text" class="text" placeholder="" required=""  name="tel" value="<?php echo $rows[3] ?>">
                电子邮箱<input type="text" class="text" placeholder="" required=""  name="email" value="<?php echo $rows[4] ?>">
                <input type="hidden" class="text" name="id" value="<?php echo $rows[0] ?>">
                <input type="submit" value="提交修改">
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