<?php
/**
 * @Author 陈西洪1920170577
 *
 * @var $conn
 * @var $servername
 * @var $username
 * @var $password
 * @var $dbname
 */

//该php文件用于与mysql建立连接
include '../include/settings.php';    //通过 include 或 require 语句，可以将 PHP 文件的内容插入另一个 PHP 文件（在服务器执行它之前）。
$conn = new mysqli($servername, $username, $password, $dbname);   //MySQLi-面向对象方式，连接到mysql服务器，先创建一个变量conn，通过mysqli函数创建一个连接对象
/**
 * 打开一个到 MySQL 服务器的新连接
 * 一共有5个端口号分别是$hostname、$username、$password、$database、$port、$socket
 */

// 检测连接
if ($conn->connect_error) {   // ->用来引用对象的成员（属性与方法）
    header("refresh:0;url=../install.php");   //header() 函数向客户端发送原始的 HTTP 报头。必须在任何实际的输出被发送之前调用 header() 函数
    die("Connection failed: " . $conn->connect_error);  //die() 函数输出一条消息，并退出当前脚本。如果没带任何参数，可以不带括号调用他
}
?>