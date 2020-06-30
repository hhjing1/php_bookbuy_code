<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车信息</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        #col{
            color: red;
        }
    </style>
</head>
<body>
<?php
include_once("../conn/registerconn.php");
?>
<table class="table table-hover table-striped table-bordered table-sm" id="resultshow">

    <?php
    session_start();
    $username=$_SESSION['val'];
    $sql = "select * from shopping where username='".$username."' order by id";
    $result = mysqli_query($register, $sql);
    while ($rows = mysqli_fetch_row($result)) {

//查询图书信息
        $sqlbook = "select * from book  where id='". $rows[2] ."' order by id";
        $resultbook = mysqli_query($register, $sqlbook);
        $rowsbook = mysqli_fetch_row($resultbook);

        echo "<tr>";
        echo"<td height='50' width='50' rowspan='6' align='center'><img src=" . $rowsbook[5] . " height='300' width='220'></td>";
        echo "<td height='25' align='center'>产品名称</td>";
        echo "<td height='25' align='center'>" . $rowsbook[1] . "</td></tr><tr>";
        echo"<td height='25' align='center' width='150'>产品单价</td>";
        echo "<td height='25' align='center' >" . $rowsbook[2] . " &nbsp; &nbsp;人民币</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>运费</td>";
        echo "<td height='25' align='center'>10 &nbsp;&nbsp;&nbsp;   人民币</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>商品数量</td>";
        echo "<td height='25' align='center'>" . $rows[3] . "&nbsp; &nbsp;个</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>订单用户名</td>";
        echo "<td height='25' align='center'>" . $username . "&nbsp; &nbsp;</td></tr><tr>";

        echo "<td align='center' height='25'width='150'>
               相关操作
              </td><td  align='center'>
              <a href=buy.php?action=update&id=" . $rows[0] . "&number=".$rows[3]."&bookid=".$rowsbook[0].">立即购买</a>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <a href=deleteshopping.php?action=del&id=" . $rows[0] . " onclick = 'return del();'>从购物车中移除</a>
              </td>";
        echo "</tr>";
    }
    echo "<tr>";
    echo"<td height='50' width='50' colspan='3' align='center'>
         <a href=allbuy.php?action=update>全部购买</a>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <a href=deleteallshopping.php?action=del onclick = 'return del();'>全部移除</a></td>";
    ?>
</table>
</body>
<script>
    //删除确认
    function del(){
        if(!window.confirm('是否全部从购物车中移除??'))
            return false;
    }
</script>
</html>