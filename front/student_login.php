<?php

/**
 * @Author 陈西洪1920170577
 *
 * @var $conn
 */

//学生登录页面的实现
//注销登录
//在 PHP 中，预定义的 $_GET 变量用于收集来自 method="get" 的表单中的值。
if (@$_GET['action'] == "logout" && isset($_COOKIE["user"])) {   //at符号（@）在PHP中用作错误控制操作符。当表达式附加@符号时，将忽略该表达式可能生成的错误消息。
    // 设置cookies立即过期
    setcookie("user", "", time() - 3600);
    header("Location:index.php");
    exit();
}
?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <title>学生登录</title>
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
    <div class="container">
        <div class="row align-items-center">
            <div class="col">

            </div>
            <div class="col">
                <form name="login" action="student_login.php" method="get" autocomplete='off'>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="sno" placeholder="学号">

                        <input type="text" name="sname" class="form-control" id="exampleInputEmail1" placeholder="姓名">
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
<?php include '../include/installed_judge.php';?>
<?php
//登录
if (@$_GET['action'] == "login" && @$_GET['sno']) {

    $sql = "SELECT sno,sname FROM student WHERE sno='" . $_GET['sno'] . "'";   //该变量用于存储sql语句，即在student表中查询sno,sname
    $result = $conn->query($sql);    //该变量用来获取query查询后的对象即查询的结果

    if ($result->num_rows > 0) {    //当结果集行的数量大于0时执行if中的语句
        while ($row = $result->fetch_assoc()) {     //fetch_assoc()的作用,是从结果集中取得一行作为关联数组
            if ($row["sname"] == $_GET['sname']) {  //如果行中变量的sname值为获取到的_GET的值sname即匹配成功
                //创建用户的cookies
                setcookie("user", md5($row['sno'] . '#$%^adf'), time() + 3600);
                /**
                 * setcookie() 函数向客户端发送一个 HTTP cookie。
                cookie 是由服务器发送到浏览器的变量。cookie 通常是服务器嵌入到用户计算机中的小文本文件。每当计算机通过浏览器请求一个页面，就会发送这个 cookie。
                cookie 的名称指定为相同名称的变量。例如，如果被发送的 cookie 名为 "name"，会自动创建名为 $user 的变量，包含 cookie 的值。
                必须在任何其他输出发送前对 cookie 进行赋值。
                如果成功，则该函数返回 true，否则返回 false。
                 */
                header("Location:index.php");   //
                exit();
            } else {
                exit('登录失败！点击此处 <a href="javascript:history.bac
                k(-1);">返回</a> 重试');
            }
        }
        $conn->close();   //将这个连接关闭
    } else {
        exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');  //如果登录错误，即返回一个连接
    }
}
?>
<?php include "../include/footer.php"; ?>