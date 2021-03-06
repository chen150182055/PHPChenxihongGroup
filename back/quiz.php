<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>考试规则</title>
</head>
<body>
<!--判断是否已安装,若已经安装则进行数据库连接-->
<?php include '../include/installed_judge.php'; ?>
<!-- 导航栏 -->
<?php include '../include/back_nav.php'; ?>

<?php

/**
 * @Author 陈西洪1920170577
 *
 * @var $conn
 */

//查询出题规则
if (@$_GET['action'] == 'index') {
    $sql = "SELECT * FROM rule WHERE rule_no=1 ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<div class="container">
        <ul class="list-group">';
        while ($row = $result->fetch_assoc()) {

            echo '
            <li class="list-group-item">
            <div class="row">
                <div class="col">难度:' . $row["quiz_diff"] . '</div>
                <div class="col">题数:' . $row["counts"] . '</div>
                <div class="col">每题分数:' . $row["per_score"] . '</div>
                
                <form method="GET" action="quiz.php">
                <input type="hidden" name="action" value="alter">
                <input type="hidden" name="quiz_no" value=' . $row["rule_no"] . '>
                <input type="submit" value="修改" class="btn btn-primary">
                </form>
                

            </div>
            </li>';
        }
        echo '
        </ul>
    </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">没有哦~</div>';
    }

} else if (@$_GET['action'] == 'alter') {           //如果传入的action值是alter
    $sql = "SELECT * FROM rule WHERE rule_no=1";    //从rule表中查询rule_no为1的记录
    $result = $conn->query($sql);                   //执行该语句并返回结果集
    if ($result->num_rows > 0) {                    //如果结果集大于0,即查询到记录

        while ($row = $result->fetch_assoc()) {     //将结果集中的结果行取出，直到读取到最后一行
            echo '
            
                <form method="GET" action="quiz.php">   <!-- 表单提交方法是GET,处理的页面为quiz.php -->
                <div class="form-row">                  <!--  -->
                <div class="col">                       <!-- -->
                        <div class="form-check form-check-inline">   <!-- -->
                            <input class="form-check-input" ';       //
            if ($row["quiz_diff"] == '难') {             //如果取出的行中字段quiz_diff为难
                echo ' checked ';                       //输出checked
            }
            echo ' type="radio" name="quiz_diff" id="inlineRadio1" value="难"> 
                            <label class="form-check-label" for="inlineRadio1">难</label>    <!-- 把难的标签也显示出来 -->
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" ';
            if ($row["quiz_diff"] == '中') {             //如果查询出来的字段quiz_diff为中
                echo ' checked ';                       //输出checked
            }
            echo ' type="radio" name="quiz_diff" id="inlineRadio2" value="中">
                            <label class="form-check-label" for="inlineRadio2">中</label>    <!-- 把中的标签也显示出来 -->
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" ';
            if ($row["quiz_diff"] == '易') {             //如果查询出来的字段quiz_diff为易
                echo ' checked ';                       //输出checked
            }
            echo ' type="radio" name="quiz_diff" id="inlineRadio3" value="易">
                            <label class="form-check-label" for="inlineRadio3">易</label>    <!-- 把易的标签也显示出来 -->
                        </div>
                
                    
                  <div class="col">
                
                        <input type="text" class="form-control" name="counts" value=' . $row["counts"] . '>      <!--  -->
                       </div>  
                    <div class="col">
                        <input type="text" class="form-control" name="per_score" value=' . $row["per_score"] . '>
                  </div>  
                
                
                <input type="hidden" name="action" value="alteraction">
                <input type="hidden" name="rule_no" value=1>
                <input type="submit" value="修改" class="btn btn-primary">
                </div>  
                </form>
                
           ';
        }
        echo '
        </ul>
    </div>';
    }

} else if (@$_GET['action'] == 'alteraction') {
    if ($_COOKIE["user"] == md5('admin#$%^adf')) {
        $sql = "UPDATE rule SET quiz_diff='" . $_GET['quiz_diff'] . "', counts=" . $_GET['counts'] . " ,per_score=" . $_GET['per_score'] . " WHERE rule_no=1";
        if ($conn->query($sql)) {
            header("refresh:0;url=quiz.php?action=index");
        } else {
            echo '<div class="alert alert-danger" role="alert">Error: ' . $conn->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">你的权限不够!请联系管理员</div>';
    }

} else {
    header("refresh:1;url=admin.php");
    exit();
}
?>
<?php include "../include/footer.php"; ?>