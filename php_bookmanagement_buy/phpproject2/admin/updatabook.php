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
        }
        #wen2{
            color: deeppink;
        }
    </style>
</head>
<body>

<?php
include_once("../conn/registerconn.php");//包含数据库连接文件
if ($_GET['action'] == "update") {//判断地址栏参数action的值是否等于update
    $sqlstr = "select * from book where id = " . $_GET['id'];//定义查询语句
    $result = mysqli_query($register, $sqlstr);//执行查询语句
    $rows = mysqli_fetch_row($result);//将查询结果返回为数组
}
?>
<!-- main -->


<div class="main-w3layouts wrapper">
<!--    <img src="https://g-search1.alicdn.com/img/bao/uploaded/i4/imgextra/i1/32590494/O1CN01wmwPlk1FWIG3w6a80_!!0-saturn_solar.jpg" width="490px"  id="wen">-->
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form method="post" action="updatabook_ok.php">
                <h3 id="wen2">产品名称</h3><input type="text" class="text" name="title" placeholder="" required="" value="<?php echo $rows[1] ?>">
                <h3 id="wen2">现在新价格</h3><input type="text" class="text" name="newprice" placeholder="" required="" value="<?php echo $rows[2] ?>">
                <h3 id="wen2"> 原来旧价格</h3><input type="text" class="text" name="oldprice" placeholder="" required="" value="<?php echo $rows[3] ?>">
                <h3 id="wen2">销售的数量</h3><input type="text" class="text" name="salenumber" placeholder="" required=""  value="<?php echo $rows[4] ?>">
                <h3 id="wen2">商品图片的地址</h3><input type="text" class="text" name="img" placeholder="" required="" value="<?php echo $rows[5] ?>">
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