<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改用户信息</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include_once("../conn/registerconn.php");
?>
<table class="table table-hover table-striped table-bordered table-sm" id="resultshow">
    <tr>
        <td width="5%" align='center'>id</td>
        <td width="20%" align='center'>用户名</td>
        <td width="20%" align='center'>密码</td>
        <td width="20%" align='center'>电话号</td>
        <td width="20%" align='center'>电子邮箱</td>
        <td width="20%" align='center'>操作</td>
    </tr>
    <?php
    $sql = "select * from register order by id";
    $result = mysqli_query($register, $sql);
    while ($rows = mysqli_fetch_row($result)) {
        echo "<tr>";
        for ($i = 0; $i < count($rows); $i++) {
            echo "<td height='25' align='center'>" . $rows[$i] . "</td>";
        }
        echo "<td align='center'>
               <a href=updateuser.php?action=update&id=" . $rows[0] . ">修改</a>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <a href=deleteuser.php?action=del&id=" . $rows[0] . " onclick = 'return del();'>删除</a>
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