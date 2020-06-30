<?php
    $name = "";
    if(isset($_GET['name'])){
        $name = $_GET['name'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
    <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <title>Title</title>
</head>
<script>

</script>
<body>
<nav class='navbar navbar-default' style='background:#92B8B1;font-size: 20px;font-family:新宋体;'>
    <div class='container-fluid'>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
                <span class='sr-only'>Toggle navigation</span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='../commodities/commodities.php' style='color: #171a1d'>首页</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
            <ul class='nav navbar-nav' id='classification'>
                <li class='li'><a href='../commodities/classification.php?kind=散文集' style='color: #171a1d'>散文集</a></li>
<!--                <li class='li'><a href='../commodities/classification.php?kind=小说' style='color: #171a1d'>小说</a></li>-->
                <li class='li'><a href='../commodities/classification.php?kind=故事书' style='color: #171a1d'>故事书</a></li>
                <li class='li'><a href='../commodities/classification.php?kind=科幻书' style='color: #171a1d'>科幻书</a></li>
            </ul>
            <form action='../commodities/searchProduct.php' class='navbar-form navbar-left'>
                <div class='form-group'>
                    <input type='text' class='form-control' placeholder='Search' name="name" value="<?php echo $name?>">
                </div>
                <button type='submit' class='btn btn-success' style='width: 150px;'>查找</button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='#'>订单</a></li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded=\"false\">Dropdown <span class=\"caret\"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href='#'>Action</a></li>
                        <li><a href='#'>Another action</a></li>
                        <li><a href='#'>Something else here</a></li>
                        <li role='separator' class='divider'></li>
                        <li><a href='#'>Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</body>
</html>