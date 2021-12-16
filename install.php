<?php
//该php文件的主要作用主要是初识化整个项目

// 包含配置文件
include './include/settings.php';   //引入setting.php
// 创建连接
$conn = new mysqli($servername, $username, $password);  //通过mysqli创建数据库连接对象

if ($conn->connect_error) {    //检测连接
    die("Connection failed: " . $conn->connect_error);   //如果出现错误就直接结束掉
}


$sql = "CREATE DATABASE " . $dbname;   // 创建一个变量用来创建数据库
if ($conn->query($sql) === true) {     //执行该sql语句,如果执行结果的对象为true，文档中会重点讲解query的用法
    echo "Database created successfully";   //输出数据库创建成功的提示
    $conn2 = new mysqli($servername, $username, $password, $dbname);    //创建一个变量conn2,也是用来创建与数据库连接的对象。这里需要区分与conn的区别

    if ($conn2->connect_error) {   // 检测连接
        die("Connection failed: " . $conn2->connect_error);   //如果出错就结束进程
    }

    // 教师表
    $sql10 = "CREATE TABLE users(
        id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
        username varchar(30) NOT NULL,
        passwd varchar(66) NOT NULL
        )ENGINE=INNODB  DEFAULT CHARSET=utf8";
    // 考生表
    $sql11 = "CREATE TABLE student(
        sno varchar(15) PRIMARY KEY  NOT NULL,
        sname varchar(30) NOT NULL,
        ssex varchar(5) NOT NULL,
        sclass varchar(30) not null,
        sdept varchar(30) not null
        )ENGINE=INNODB  DEFAULT CHARSET=utf8";
    // 试题表
    $sql12 = "CREATE TABLE question(
        quest_no int PRIMARY KEY AUTO_INCREMENT NOT NULL,
        quest_type varchar(64) NOT NULL,
        quest_diff varchar(8) NOT NULL,
        stem varchar(512) NOT NULL,
        choice_a varchar(64) not null,
        choice_b varchar(64) not null,
        choice_c varchar(64) not null,
        choice_d varchar(64) not null,
        right_choice varchar(8) not null,
        choose_flag int NOT NULL DEFAULT 0
        )ENGINE=INNODB  DEFAULT CHARSET=utf8";
    // 试卷表
    $sql13 = "CREATE TABLE quiz(
        quiz_no int PRIMARY KEY AUTO_INCREMENT NOT NULL,
        quiz_diff varchar(8) NOT NULL,
        counts int NOT NULL,
        per_score int NOT NULL,
        questions varchar(512) NOT NULL
        )ENGINE=INNODB  DEFAULT CHARSET=utf8";
    // 考试规则表
    $sql14 = "CREATE TABLE rule(
        rule_no int PRIMARY KEY AUTO_INCREMENT NOT NULL,
        quiz_diff varchar(8) NOT NULL,
        counts int NOT NULL,
        per_score int NOT NULL        
        )ENGINE=INNODB  DEFAULT CHARSET=utf8";
    //考试记录表
    $sql15 = "CREATE TABLE quiz_record(
        md5_sno varchar(66) NOT NULL,
        quiz_no int NOT NULL,
        score int not null,
        datetime DATETIME NOT NULL DEFAULT NOW(),
        dead_time varchar(32) NOT NULL,
        summit_flag int NOT NULL DEFAULT 0,
        PRIMARY KEY(md5_sno,quiz_no),
        FOREIGN KEY(quiz_no) REFERENCES quiz(quiz_no)
        )ENGINE=INNODB  DEFAULT CHARSET=utf8";


    // 初始化,插入测试数据
    $sql20 = "insert into student values
    ('1920170577', '陈西洪','男','1607202','软件工程'),
    ('160400222', '朱创飞','男','1604202','软件工程'),
    ('160400223', '曾立行','男','1604202','计算机'),
    ('160800101', '彭永宇','男','1608202','信息'),
    ('160800102', '钱二','男','1608202','信息'),
    ('160800103', '孙三','男','1608202','信息'),
    ('160210212', '刘二','女','1602102','经管')
    ";
    $sql21 = "insert into question values
    (1, '数学','易','1+1=?','2','4','6','8','A',0),
    (2, '物理','易','电压4v,纯电阻电路,电阻2欧姆,电流多少?','1A','2A','3A','6A','B',0),
    (3, '化学','中','氧气的化学式?','Cu','O2','O3','H2O','B',0),
    (4, '计算机','难','TCP/IP协议中,HTTP请求报文返回状态码404代表?','请求成功','目标被重定位','服务器繁忙','URL错误','D',0),
    (5,'数学','易','1-8=?','1','2','3','-7','D',0),
    (6,'数学','易','1-8=?','1','2','3','-7','D',0),
    (7,'数学','易','1-8=?','1','2','3','-7','D',0),
    (8,'数学','易','1-8=?','1','2','3','-7','D',0),
    (9,'数学','易','1-8=?','1','2','3','-7','D',0),
    (10,'数学','易','1-8=?','1','2','3','-7','D',0),
    (11,'数学','易','1-8=?','1','2','3','-7','D',0),
    (12,'数学','易','1-8=?','1','2','3','-7','D',0),
    (13,'数学','易','1-8=?','1','2','3','-7','D',0),
    (14,'数学','易','1-8=?','1','2','3','-7','D',0),
    (15,'数学','易','1-8=?','1','2','3','-7','D',0),
    (16,'数学','易','1-8=?','1','2','3','-7','D',0),
    (17,'数学','易','1-8=?','1','2','3','-7','D',0),
    (18,'数学','易','1-8=?','1','2','3','-7','D',0),
    (19,'数学','易','1-8=?','1','2','3','-7','D',0),
    (20,'数学','中','2*3=?','4','5','6','7','C',0),
    (21,'数学','中','2*3=?','4','5','6','7','C',0),
    (22,'数学','中','2*3=?','4','5','6','7','C',0),
    (23,'数学','中','2*3=?','4','5','6','7','C',0),
    (24,'数学','中','2*3=?','4','5','6','7','C',0),
    (25,'数学','中','2*3=?','4','5','6','7','C',0),
    (26,'数学','中','2*3=?','4','5','6','7','C',0),
    (27,'数学','中','2*3=?','4','5','6','7','C',0),
    (28,'数学','中','2*3=?','4','5','6','7','C',0),
    (29,'数学','中','2*3=?','4','5','6','7','C',0),
    (30,'数学','难','3!=?','4','5','6','7','C',0),
    (31,'数学','难','3!=?','4','5','6','7','C',0),
    (32,'数学','难','3!=?','4','5','6','7','C',0),
    (33,'数学','难','3!=?','4','5','6','7','C',0),
    (34,'数学','难','3!=?','4','5','6','7','C',0),
    (35,'数学','难','3!=?','4','5','6','7','C',0),
    (36,'数学','难','3!=?','4','5','6','7','C',0),
    (37,'数学','难','3!=?','4','5','6','7','C',0),
    (38,'数学','难','3!=?','4','5','6','7','C',0),
    (39,'数学','难','3!=?','4','5','6','7','C',0),
    (40,'数学','难','3!=?','4','5','6','7','C',0),
    (41,'数学','难','3!=?','4','5','6','7','C',0),
    (42,'数学','难','3!=?','4','5','6','7','C',0),
    (43,'数学','难','3!=?','4','5','6','7','C',0),
    (44,'数学','难','3!=?','4','5','6','7','C',0)
    ";
    $sql22 = "insert into rule values(1,'难',10,5)";

    //默认管理员
    $pass = md5('123456');    //这里的md5方法是计算字符串(123456)的 md5 哈希值

    $sql23 = "insert into users values(1,'admin','" . $pass . "'),(2,'user','" . $pass . "')";   //创建变量用于将管理与插入users表

    //multi_query()的方法是对数据库执行操作(同时执行多条查询语句)而query()是执行单条语句
    if ($conn2->multi_query($sql10) && $conn2->multi_query($sql11) && $conn2->multi_query($sql12) &&
        $conn2->multi_query($sql13) && $conn2->multi_query($sql14) && $conn2->multi_query($sql15)
        && $conn2->query($sql20) && $conn2->query($sql21) && $conn2->query($sql22) && $conn2->query($sql23)) {
        echo "insert successfully";
    } else {
        echo "Error insert: " . $conn2->error;
    }
    $conn2->close();
    //安装完成,跳转到主页
    echo "正在跳转到<a href='./front/index.php'>主页</a>";
    header("refresh:1;url=./front/index.php");      //跳转页面
} else {
    // 安装失败/重复安装
    echo "Error creating database: " . $conn->error;
}
$conn->close();   //执行完关闭连接
?>