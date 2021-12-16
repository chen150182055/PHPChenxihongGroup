<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <title>用户中心</title>
</head>

<body>
<!--判断是否已安装,若已经安装则进行数据库连接-->
<?php include '../include/installed_judge.php';?>       <!-- 引入installed_judge.php页面,该页面与mysql建立连接 -->
<!-- 导航栏 -->
<?php include '../include/back_nav.php'; ?>             <!-- 引入back_nav.php页面 -->

<a href="#">修改密码</a>

<?php include "../include/footer.php"; ?>               <!-- 引入footer.php页面,该页面引入了一些js文件 -->