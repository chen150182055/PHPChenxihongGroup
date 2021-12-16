<?php
/**
 * @Author 陈西洪1920170577
 *
 * @var $conn
 */

//判断用户登录状态
/**
 * echo 和 print 之间的差异：
 * echo - 能够输出一个以上的字符串
 * print - 只能输出一个字符串，并始终返回 1
 * 提示：echo 比 print 稍快，因为它不返回任何值。
 */


echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light">   <!-- <nav> 标签定义导航链接的部分 -->
  <a class="navbar-brand" href="../front/index.php">南方学院考试系统</a>     <!-- navbar-brand是Bootstrap中的一个样式 -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">    <!-- 这边有一个按钮，这里的样式也是由bootstrap定义的 -->
    <span class="navbar-toggler-icon"></span>  <!-- <span> 标签被用来组合文档中的行内元素。 -->
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">';


if (!isset($_COOKIE["user"])) {   //isset() 函数用于检测变量是否已设置并且非 NULL。PHP 的 $_COOKIE 变量用于取回 cookie 的值。下面的例子中我们取回了user的cookie的值
    echo '<li class="nav-item">
          <a class="nav-link" href="../front/student_login.php?action=login">考生登录</a>
      </li> ';
} else {
    echo '<li class="nav-item">
          <a class="nav-link" href="../front/student_login.php?action=logout">注销</a>
      </li> ';
}


echo '<li class="nav-item">
        <a class="nav-link" href="../front/online_exam.php?action=start">开始答题</a>
      </li>
      
     
      <li class="nav-item">
          <a class="nav-link" href="../back/teacher_login.php?action=login">教师登录</a>
      </li> 
      </ul>
</div>
</nav> 
      ';

?>
