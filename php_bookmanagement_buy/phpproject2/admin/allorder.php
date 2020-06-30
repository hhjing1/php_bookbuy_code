<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改订单信息</title>
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
    $sql = "select * from bookorder  order by id";
    $result = mysqli_query($register, $sql);
    while ($rows = mysqli_fetch_row($result)) {
        //查询其他两个表显示全部的订单信息
        $sqluser = "select * from register  where id='". $rows[1] ."' order by id";
        $resultuser = mysqli_query($register, $sqluser);
        $rowsuser = mysqli_fetch_row($resultuser);

        $sqlbook = "select * from book  where id='". $rows[2] ."' order by id";
        $resultbook = mysqli_query($register, $sqlbook);
        $rowsbook = mysqli_fetch_row($resultbook);

        echo "<tr>";
        echo"<td height='50' width='50' rowspan='9' align='center'><img src=" . $rowsbook[5] . " height='300' width='220'></td>";
        echo "<td height='25' align='center'>产品名称</td>";
        echo "<td height='25' align='center'>" . $rowsbook[1] . "</td></tr><tr>";
        echo"<td height='25' align='center' width='150'>产品单价</td>";
        echo "<td height='25' align='center' >" . $rowsbook[2] . " &nbsp; &nbsp;人民币</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>订单价格</td>";
        echo "<td height='25' align='center'>" . $rows[4] . " &nbsp; &nbsp;人民币</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>商品数量</td>";
        echo "<td height='25' align='center'>" . $rows[5] . "&nbsp; &nbsp;个</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>订单用户名</td>";
        echo "<td height='25' align='center'>" . $rowsuser[1] . "&nbsp; &nbsp;</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>客户联系电话</td>";
        echo "<td height='25' align='center'>" . $rowsuser[3] . "&nbsp; &nbsp;</td></tr><tr>";
        echo "<td height='25' align='center'width='150'>客户目标地址</td>";
        echo "<td height='25' align='center'>" . $rows[3] . "&nbsp; &nbsp;</td></tr><tr>";
        echo "<td height='25' align='center'width='150' >订单当前状态</td>";
        echo "<td height='25' align='center' id='col'>" . $rows[6] . "&nbsp; &nbsp;</td></tr><tr>";
        echo "<td align='center' height='25'width='150'>
               相关操作
              </td><td  align='center'>
              <a href=updatabookorder.php?action=update&id=" . $rows[0] . ">修改此订单</a>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <a href=deletebookorder.php?action=del&id=" . $rows[0] . " onclick = 'return del();'>删除此订单</a>
              </td>";
        echo "</tr>";
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