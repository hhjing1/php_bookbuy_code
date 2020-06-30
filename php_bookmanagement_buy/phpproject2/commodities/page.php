<?php
function getProductByPage($page){
    $register = mysqli_connect("localhost", "root", "511924", "phpfile") or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
    mysqli_query($register,"set names utf8");
    $sql="select * from book limit ".(($page-1)*18).",18";
    $result =  mysqli_query($register,$sql)or die("数据查询失败");
    return $result;
};
$page = $_GET['page'];
$sum = $_GET['sum'];
$result = getProductByPage($page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品列表</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
    <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <style>
        .div{
            width: 220px;
            height: 250px;
            float: left;
            padding: 10px 0px;
            text-align: center;
            margin: auto;
        }
        .img{
            width: 130px;
            height: 130px;
            display: inline-block;
        }
        .product_info{
            width: 170px;
            height: 60px;
            color: #2fab31;
            overflow: hidden;
            text-overflow: ellipsis;
            position: relative;
            left: 20px;
            display: block;
        }
    </style>
</head>
<body>
<div class="row" style="width: 80%;margin-left: 10%">

    <?php
    include('../commodities/head.php');
    while($row=mysqli_fetch_array($result)){
        ?>
        <div class="col-md-2 div" >
            <a href="product_info.php?id=<?php echo $row['id'];?>"><img  class="img" src="<?php echo $row['img'];?>"></a>
            <p class="product_info"><a  href="product_info.php?pid=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></p>
            <p style="color: #FF0000">商场价：<?php echo $row['newprice']."￥";?></p>
        </div>
        <?php
    }
    ?>
    <div class="col-md-4"></div>
<!--    实现分页-->
    <div class="col-md-6" style="position: relative;">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg">
                <li>
                    <a href="<?php if ($page>=2)echo '../commodities/page.php?page='.($page-1).'&sum='.$sum; else echo '#'?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                if ($page==1){
                    echo "<li class='active'><a href='../commodities/page.php?page=1&sum=$sum'>1</a></li>";
                    for ($i = 2;$i<=5;$i++){
                        echo "<li><a href='../commodities/page.php?page=$i&sum=$sum' >$i</a></li>";
                    }
                }else if($page==$sum){
                    for ($i = $page-4;$i<$page;$i++){
                        echo "<li><a href='../commodities/page.php?page=$i&sum=$sum' >$i</a></li>";
                    }
                    echo "<li class='active'><a href='#' >$page</a></li>";
                } else{
                    if ($page+3<=$sum){
                        for ($i =$page-1;$i<$page;$i++){
                            echo "<li><a href='../commodities/page.php?page=$i&sum=$sum'>$i</a></li>";
                        }
                        echo "<li class='active'><a href='#'>$page</a></li>";
                        for ($i=$page+1;$i<=$page+3;$i++){
                            echo "<li><a href='../commodities/page.php?page=$i&sum=$sum'>$i</a></li>";
                        }
                    }else{
                        for ($i=$page-(4-($sum-$page));$i<$page;$i++){
                            echo "<li><a href='../commodities/page.php?page=$i&sum=$sum'>$i</a></li>";
                        }
                        echo "<li class='active'><a href='#'>$page</a></li>";
                        for ($i=$page+1;$i<=$sum;$i++){
                            echo "<li><a href='../commodities/page.php?page=$i&sum=$sum'>$i</a></li>";
                        }
                    }

                }
                ?>
                <li>
                    <a href="<?php if ($page<$sum)echo '../commodities/page.php?page='.($page+1).'&sum='.$sum; else echo '#'?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

</body>
</html>
