<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改图书信息</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .page{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .page a, .page span{
            text-decoration: none;
            border: 1px solid #f9d52b;
            padding: 5px 7px;
            color: #767675;
            cursor: pointer;
        }
        .color{
            background-color: #00FFFF;
        }
        .page a:hover,.page:hover{
            color: red;
        }
        p{
            color: blue;
        }
    </style>
</head>
<body>
<?php
include_once("../conn/registerconn.php");
?>
<table class="table table-hover table-striped table-bordered table-sm" id="resultshow">

    <?php
    $kind=$_GET['kind'];
    $sql = "select * from book  where kind='".$kind."' order by id";
    $result = mysqli_query($register, $sql);
    if($kind=="故事书"){
        echo"<div class=\"page\">
    <span>--</span>
    <a href=#>上一页</a>
    <a href=allbook.php?kind=故事书 class='color'>故事书</a>
    <a href=allbook.php?kind=科幻书 >科幻书</a>
    <a href=allbook.php?kind=散文集 >散文集</a>
    <a href=allbook.php?kind=科幻书 >下一页</a>
    <span>--</span>
    </div>";}
    else if($kind=="科幻书"){
        echo"<div class=\"page\">
    <span>--</span>
    <a href=allbook.php?kind=故事书>上一页</a>
    <a href=allbook.php?kind=故事书>故事书</a>
    <a href=allbook.php?kind=科幻书 class='color'>科幻书</a>
    <a href=allbook.php?kind=散文集>散文集</a>
    <a href=allbook.php?kind=散文集>下一页</a>
    <span>--</span>
    </div>";}
    else if($kind=="散文集"){
        echo"<div class=\"page\">
    <span>--</span>
    <a href=allbook.php?kind=科幻书>上一页</a>
    <a href=allbook.php?kind=故事书>故事书</a>
    <a href=allbook.php?kind=科幻书>科幻书</a>
    <a href=allbook.php?kind=散文集 class='color'>散文集</a>
     <a href=#>下一页</a>
    <span>--</span>
    </div>";}
    while ($rows = mysqli_fetch_row($result)) {
        echo "<tr>";
        echo"<td height='50' width='50' rowspan='4' align='center'><img src=" . $rows[5] . " height='200' width='200'></td>";
        echo "<td height='25' align='center'>产品名称</td>";
        echo "<td height='25' align='center'>" . $rows[1] . "</td></tr><tr>";
        echo"<td height='25' align='center' width='150'>现在的新价格</td>";
        echo "<td height='25' align='center' >" . $rows[2] . " &nbsp; &nbsp;人民币</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>原来的旧价格</td>";
        echo "<td height='25' align='center'>" . $rows[3] . " &nbsp; &nbsp;人民币</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>售卖商品的数量</td>";
        echo "<td height='25' align='center'>" . $rows[4] . "&nbsp; &nbsp;个</td></tr>";

    }
    ?>
</table>
</body>
<script>
    //删除确认
    function del(){
        if(!window.confirm('是否要删除数据??'))
            return false;
    }
</script>
</html>