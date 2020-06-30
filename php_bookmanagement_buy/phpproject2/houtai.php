<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台布局</title>
    <link rel="stylesheet" href="layui/layui.css" >

</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">欢迎进入图书系统</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">

            <li class="layui-nav-item">
                <dl class="layui-nav-child">

                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <?php
                    session_start();
                    $username=$_SESSION['val'];
                    echo $_SESSION['val'];
                    //直接输出全局变量val.
                    ?>
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="user/showusermessage.php" target="frame">基本资料</a></dd>

                </dl>
            </li>
            <li class="layui-nav-item"><a href=index.html onclick = 'return del();'>退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item"><a href="commodities/commodities.php" target="frame" >浏览商品</a></li>
                <li class="layui-nav-item"><a href="user/showgouwuche.php" target="frame" >购物车展示</a></li>
                <li class="layui-nav-item ">
                    <a class="" href="javascript:;">用户订单状态</a>
                    <dl class="layui-nav-child">
                        <dd><a href=user/allorder.php?action=all target="frame">全部订单</a></dd>
                        <dd><a href=user/allorder.php?action=all1 target="frame">未发货</a></dd>
                        <dd><a href=user/allorder.php?action=all2 target="frame">运输中</a></dd>
                        <dd><a href=user/allorder.php?action=all3 target="frame">已送达</a></dd>
<!--                        <dd><a href="">超链接</a></dd>-->
                    </dl>
                </li>
<!--                <li class="layui-nav-item">-->
<!--                    <a href="javascript:;">解决方案</a>-->
<!--                    <dl class="layui-nav-child">-->
<!--                        <dd><a href="javascript:;">列表一</a></dd>-->
<!--                        <dd><a href="javascript:;">列表二</a></dd>-->
<!--                        <dd><a href="">超链接</a></dd>-->
<!--                    </dl>-->
<!--                </li>-->

<!--                <li class="layui-nav-item"><a href="">发布商品</a></li>-->
            </ul>
        </div>
    </div>
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 0px" >
            <iframe id="righFrame" name="frame"  width="100%" height="1100px" scrolling="yes"  style="border:1px solid #CCC;"></iframe>
        </div>
    </div>
    <div class="layui-footer">
        <!-- 底部固定区域 -->
        底部边界
    </div>
</div>
<script src="layui/layui.all.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
    function del(){
        if(!window.confirm('是否退出登录??'))
            return false;
    }
</script>
</body>
</html>
