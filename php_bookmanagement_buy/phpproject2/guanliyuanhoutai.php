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
                <li class="layui-nav-item ">
                    <a class="" href="javascript:;">用户信息管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="admin/seealluser.php" target="frame">浏览用户信息</a></dd>
                        <dd><a href="admin/alluser.php" target="frame">查看修改用户信息</a></dd>
                        <dd><a href="admin/adminregister.html" target="frame">增加用户信息</a></dd>
<!--                        <dd><a href="">超链接</a></dd>-->
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">图书信息管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href=admin/seeallbook.php?kind=故事书 target="frame">浏览图书信息</a></dd>
                        <dd><a href=admin/allbook.php?kind=故事书 target="frame">查看修改图书信息</a></dd>
                        <dd><a href="admin/adminregisterbook.html" target="frame">增加图书信息</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href=admin/allorder.php target="frame" >用户订单信息操作</a></li>
<!--                <li class="layui-nav-item"><a href="">发布商品</a></li>-->
            </ul>
        </div>
    </div>
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 0px" >
            <iframe id="righFrame" name="frame"  width="100%" height=1000px" scrolling="yes"  style="border:1px solid #CCC;"></iframe>
        </div>
    </div>
    <div class="layui-footer">
        <!-- 底部固定区域 -->
        欢迎进行图书内容的相关操作！！！！！！！！！！！！
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
