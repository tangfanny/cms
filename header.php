<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>信息管理系统</title>
    <link href="css/easyui.css" type="text/css" rel="stylesheet" />
    <link href="css/demo.css" type="text/css" rel="stylesheet" />
    <link href="css/icon.css" type="text/css" rel="stylesheet" />
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easyui.min.js"></script>
</head>
<body class="easyui-layout">
<div data-options="region:'north',split:true" style="height:100px;">
    <h1 class="logo">信息管理系统</h1>
    <ul class="nav">
        <li><a href="index.php" class="active">文章列表</a></li><li><a href="user.php">用户列表</a></li>
    </ul>
    <div class="right"><a href="">欢迎您：<?php echo $_SESSION['username'];?></a> | <a href="javascript:void(0);"><?php echo date('Y/m/d');?></a> | <a href="logout.php" onclick="return confirm('确定注销吗?');">注销</a></div>
</div>