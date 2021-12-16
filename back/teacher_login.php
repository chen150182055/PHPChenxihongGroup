<?php
//该页面用来实现教师登录的页面

/**
 * @Author 陈西洪1920170577
 *
 * @var $conn
 */

//注销登录
if (@$_GET['action'] == "logout" && isset($_COOKIE["user"])) {
    // 设置cookies立即过期
    setcookie("user", "", time() - 3600);
    header("Location:admin.php");
    exit();
}
?>
    <!doctype html>  <!-- Bootstrap 要求使用HTML5文件类型,所以需要添加HTML5 doctype声明 -->
    <html>
    <head>
        <meta charset="utf-8">      <!-- 设置对应编码类型 -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- 为了让Bootstrap开发的网站对移动设备友好，确保适当的绘制和屏幕缩放，需要在网页的head之中添加viewport meta标签
         下面解释一下各个参数的意思
         width=device-width 表示宽度是设备屏幕的宽度。
         initial-scale=1 表示初始的缩放比例。
         shrink-to-fit=no 自动适应手机屏幕的宽度。 -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <title>管理登录</title>
    </head>
    <style>
        #main {
            position: absolute;
            width: 400px;
            height: 200px;
            left: 50%;
            top: 50%;
            margin-left: -200px;
            margin-top: -100px;
            border: 1px solid #00F
        }

    </style>

<body>
    <div class="container">     <!-- Bootstrap需要一个容器来包裹网站的内容，我们可以使用两个容器类.container 类用于固定宽度并支持响应式布局的容器
     .container-fluid 类用于 100% 宽度，占据全部视口（viewport）的容器。本项目中这里使用的是container
     -->
        <div class="row align-items-center">
            <!-- 这里介绍一下Bootstrap的网格系统
                Bootstrap中的网格系统一共有5个类
                1.col-针对所有设备
                2.col-sm- 平板-屏幕宽度等于或者大于576px
                3.col-md- 桌面显示器 - 屏幕宽度等于或者大于768px
                4..col-lg- 大桌面显示器
                5.col-xl- 超大桌面显示器
             -->

            <!-- 以下Bootstrap将自动布局 -->
            <div class="col">

            </div>
            <div class="col">
                <form name="login" action="teacher_login.php" method="get" autocomplete='off'>
                    <div class="form-group">   <!-- form-group:增加盒子的下边界 -->
                        <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                               placeholder="用户名">

                        <input type="password" name="passwd" class="form-control" id="exampleInputEmail1"
                               placeholder="密码">
                        <?php
                        if (@$_GET['action'] == "login") {
                            echo "<input type='hidden' name='action' value='login'></table>";
                            echo '<div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-secondary">登录</button>  
       </div>';
                        }
                        ?>
                    </div>
                </form>
            </div>
            <div class="col">
            </div>
        </div>
    </div>
    <br/>

    <!--判断是否已安装,若已经安装则进行数据库连接-->
<?php include '../include/installed_judge.php'; ?>

<?php
//登录
/**
 * setcookie()定义和用法
 * setcookie() 函数向客户端发送一个 HTTP cookie。
 * cookie 是由服务器发送到浏览器的变量。cookie 通常是服务器嵌入到用户计算机中的小文本文件。每当计算机通过浏览器请求一个页面，就会发送这个 cookie。
 * cookie 的名称指定为相同名称的变量。例如，如果被发送的 cookie 名为 "name"，会自动创建名为 $user 的变量，包含 cookie 的值。
 * 必须在任何其他输出发送前对 cookie 进行赋值。
 * 如果成功，则该函数返回 true，否则返回 false。
 *          参数          描述
 *          name        必需,规定cookie的名称
 *          value       必需,规定cookie的值
 *          expire      可选,规定cookie的有效期
 *          path        可选,规定cookie的服务器路径
 *          domain      可选,规定cookie的域名
 *          secure      可选,规定是否通过安全的https来传输cookie
 *
 */
if (@$_GET['action'] == "login" && @$_GET['username']) {   //

    $sql = "SELECT username,passwd FROM users WHERE username='" . $_GET['username'] . "'";   //从数据库中查询是否有这个用户
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {    //如果查询的结果不为空的
        while ($row = $result->fetch_assoc()) {
            if ($row["passwd"] == md5($_GET['passwd'])) {    //如果输入的密码是数据库中查询的密码(md5加密之后的)
                setcookie("user", md5($row['username'] . '#$%^adf'), time() + 3600);  //创建用户的cookies，setcookie()函数，user为cookie的名称，cookie的值为md5加密后的值，有效时间为time()+3600
                header("Location:admin.php");   //跳转到admin页面
                exit();
            } else {
                exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
            }
        }
        $conn->close();   //关闭数据库连接，养成一个好习惯
    } else {
        exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');  //如果登录失败，则退出此程序，并且弹出提示
    }
}
?>
<?php include "../include/footer.php"; ?>