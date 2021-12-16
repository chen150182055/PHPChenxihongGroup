<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <!-- 引入 echarts.js -->
    <script src="../static/echarts.js"></script>   <!-- ECharts 是一个使用 JavaScript 实现的开源可视化库，涵盖各行业图表，满足各种需求。 -->
    <title>主页</title>

</head>

<body>
<!--判断是否已安装,若已经安装则进行数据库连接-->
<?php include '../include/installed_judge.php';?>  <!-- 引入installed_judge.php页面 -->
<!-- 导航栏 -->
<?php include '../include/front_nav.php'; ?>        <!-- 引入front_nav.php页面 -->
<?php include '../include/footer.php'; ?>           <!-- 引入footer.php页面 -->

