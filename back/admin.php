<!doctype html>
<html>

<?php
/**
 * @Author 陈西洪1920170577
 *
 * @var $conn
 */
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- 引入 echarts.js -->
    <script src="../static/echarts.js"></script>  <!-- ECharts 是一个使用 JavaScript 实现的开源可视化库，涵盖各行业图表，满足各种需求。 -->
    <title>后台主页</title>

</head>

<body>

<!--判断是否已安装,若已经安装则进行数据库连接-->
<?php include '../include/installed_judge.php'; ?>
<!-- 导航栏 -->
<?php include '../include/back_nav.php'; ?>    <!-- 引入上部导航栏,即功能选择栏目 -->
<div class="container">
    <div class="row">   <!-- 该处的class是一个类名而row是bootstrap中的一个样式，以下部分如此所示 -->
        <div class="col">
            <div id="bb" style="width: 600px;height:400px;"></div>
        </div>
        <div class="col">
            <div id="cc" style="width: 600px;height:400px;"></div>
        </div>
        <div class="col">
            <div id="dd" style="width: 600px;height:400px;"></div>
        </div>
        <div class="col">
            <div id="ee" style="width: 600px;height:400px;"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    echarts.init(document.getElementById('bb')).setOption({
        title: {
            text: '男女比',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            x: 'left',
            data: ['男生', '女生']
        },
        series: [
            {
                name: '男女比',
                type: 'pie',
                radius: ['50%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    normal: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        show: true,
                        textStyle: {
                            fontSize: '30',
                            fontWeight: 'bold'
                        }
                    }
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                data: [
                    {
                        value: <?php
                        $sql = "SELECT COUNT(*) FROM student WHERE ssex='男'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['COUNT(*)'];
                            }
                        }
                        ?>, name: '男生'
                    },
                    {
                        value: <?php
                        $sql = "SELECT COUNT(*) FROM student WHERE ssex='女'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['COUNT(*)'];
                            }
                        }
                        ?>, name: '女生'
                    }

                ]
            }
        ]
    });

    echarts.init(document.getElementById('cc')).setOption({
        title: {
            text: '试题统计',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['数学', '物理', '化学', '计算机']
        },
        series: [
            {
                name: '试题统计',
                type: 'pie',
                radius: '55%',
                center: ['50%', '60%'],
                data: [
                    {
                        value:<?php
                        $sql = "SELECT COUNT(*) FROM question WHERE quest_type='数学'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['COUNT(*)'];
                            }
                        }
                        ?>, name: '数学'
                    },
                    {
                        value:<?php
                        $sql = "SELECT COUNT(*) FROM question WHERE quest_type='物理'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['COUNT(*)'];
                            }
                        }
                        ?>, name: '物理'
                    },
                    {
                        value:<?php
                        $sql = "SELECT COUNT(*) FROM question WHERE quest_type='化学'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['COUNT(*)'];
                            }
                        }
                        ?>, name: '化学'
                    },
                    {
                        value:<?php
                        $sql = "SELECT COUNT(*) FROM question WHERE quest_type='计算机'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['COUNT(*)'];
                            }
                        }
                        ?>, name: '计算机'
                    }
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    });

    echarts.init(document.getElementById('dd')).setOption({
        title: {
            text: '院系情况'
        },
        tooltip: {},
        legend: {
            data: ['人数']
        },
        xAxis: {
            data: ["信息", "海洋", "经管", "计算机"]
        },
        yAxis: {},
        series: [{
            name: '人数',
            type: 'bar',
            data: [<?php
                $sql = "SELECT COUNT(*) FROM student group by sdept";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo $row['COUNT(*)'] . ',';
                    }
                }
                ?>]
        }]
    });
</script>
<?php include "../include/footer.php"; ?>  <!-- 导入footer.php文件，该文件主要是引入一些js文件 -->




