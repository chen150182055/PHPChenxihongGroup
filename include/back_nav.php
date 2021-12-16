<?php

/**
 * @Author 陈西洪1920170577
 *
 * @var $conn
 */

//该php页面用来实现管理后台主页面

//判断用户登录状态
if (!isset($_COOKIE["user"])) {  //isset() 函数用于检测变量是否已设置并且非 NULL。PHP 的 $_COOKIE 变量用于取回 cookie 的值。下面的例子中我们取回了user的cookie的值
    echo '<div class="alert alert-warning" role="alert">请先登录哦~正在跳转</div>';
    header("refresh:1;url=../back/teacher_login.php?action=login");  //header() 函数向客户端发送原始的 HTTP 报头。必须在任何实际的输出被发送之前调用 header() 函数
    exit();
} else {   //
    //一下html代码用来实现管理后台主页的功能列表
    echo '
<!--
    导航栏：navbar
导航栏容器可以包含以下几个常用组成：
1、品牌LOGO（.navbar-brand ）
2、导航菜单（.navbar-nav）
3、导航文本（.navbar-text）
4、折叠导航按钮（.navbar-toggle）
5、表单（.form-inline）
-->
<nav class="navbar navbar-expand-lg navbar-light bg-light"> <!-- 导航栏，向<nav> 标签添加 class .navbar、.navbar-default。 -->
  <a class="navbar-brand" href="../back/admin.php">南方学院考试系统后台</a>    <!-- navbar-brand 品牌logo -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>       <!-- 折叠导航栏 -->  
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">    <!-- 导航菜单 -->
    <li class="nav-item">              <!--  -->
        <a class="nav-link" href="../front/index.php">前台主页<span class="sr-only"></span></a>
      </li>   
      <li class="nav-item">
          <a class="nav-link" href="../back/teacher_login.php?action=logout">注销</a>
      </li>  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          考生管理</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">  <!-- 这里实现了一个下拉菜单 -->
          <a class="dropdown-item" href="../back/stu.php?action=add">添加考生</a>   
          <a class="dropdown-item" href="../back/stu.php?action=search">查询考生</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          考题管理</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
          <a class="dropdown-item" href="../back/questions.php?action=add">添加考题</a>
          <a class="dropdown-item" href="../back/questions.php?action=search">查询考题</a>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="../back/quiz.php?action=index">考试规则</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="../back/score.php?action=search">成绩查询</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="../back/backup.php">系统维护</a>
      </li>
          </ul>     
  </div>
</nav>';
}
?>
