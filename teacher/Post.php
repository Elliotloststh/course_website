<?php
/**
 * Created by PhpStorm.
 * User: Lucifer
 * Date: 2018/12/23
 * Time: 18:48
 */

session_start();
require_once('../common/mysql_connect.php');

if(isset($_GET['post_id']))
{
    $post_id = $_GET['post_id'];
    $_SESSION['post_id'] = $post_id;
}
else if(isset($_SESSION['post_id']))
{
    $post_id = $_SESSION['post_id'];
}
else $post_id = 0;

$query = 'select * from post where post_id = ' . $post_id . ' and post_level = 1;';
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_row($result);
$times = 1;
$times += $row[5];

$query = 'update post set times = ' . $times . ' where post_id = ' . $post_id . ';';
mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--                <h3 class="navbar">软件工程教学网站G03</h3>-->
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="gerenjianjie_stu.php"><i class="fa fa-user fa-fw"></i> 个人信息</a>
                    </li>
                    <li><a href="ChangePassword_stu.php"><i class="fa fa-gear fa-fw"></i> 修改密码</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="../common/logout.php"><i class="fa fa-sign-out fa-fw"></i> 注销</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="gonggao_stu.php"><i class="fa fa-dashboard fa-fw"></i> 课程公告</a>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-dashcube fa-fw"></i> 课程信息<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="kechengjianjie_stu.php"> 课程简介</a>
                            </li>
                            <li>
                                <a href="JiaoShiJieShao_stu.php"> 教师介绍</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="JiaoXueRiLi_stu.php"><i class="fa fa-table fa-fw"></i> 教学日历</a>
                    </li>
                    <li>
                        <a href="JiaoXueDaGang_stu.php"><i class="fa fa-eject fa-fw"></i> 教学大纲</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> 课程资料<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="KeJian_stu.php"> 课件</a>
                            </li>
                            <li>
                                <a href="video_stu.php"> 教学视频</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> 我的小组<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="XiaoZuXinXi_stu.php"> 小组信息</a>
                            </li>
                            <li>
                                <a href="XiaoZuZuoYe_stu.php"> 小组作业</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="ZaiXianZuoYe_stu.php"><i class="fa fa-tablet fa-fw"></i> 在线作业</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-edge fa-fw"></i> 实验作业</a>
                    </li>
                    <li>
                        <a href="LunTan.php"><i class="fa fa-ellipsis-h fa-fw"></i> 课程论坛</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> 友情链接<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="http://jwbinfosys.zju.edu.cn/">浙江大学教务网</a>
                            </li>
                            <li>
                                <a href="https://www.cc98.org/">CC98</a>
                            </li>
                            <li>
                                <a href="http://cspo.zju.edu.cn/">浙大计算机学院</a>
                            </li>
                            <li>
                                <a href="https://github.com/">Github</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <!-- /.col-lg-6 -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <?php
                    //查询
                    $class = $_SESSION['class_id'];
                    $query = 'select * from post where post_id = '. $post_id . ' order by post_id asc;';
                    $result = mysqli_query($conn,$query);
                    $post = array();
                    while($row = mysqli_fetch_assoc($result))array_push($post,$row);
                    $level_num = count($post);

                    //帖子标题
                    echo '<div class="panel-heading">';
                    echo '<h3><strong>' . ($post[0])['content'] . '</strong></h3>';
                    echo '</div>';

                    echo '<div class="panel-body">';
                    //帖子内容
                    for($i = 0; $i < $level_num; $i ++)
                    {
                        $people_id = $post[$i]['people_id'];
                        $result = mysqli_query($conn,'select name from people where people_id = ' . $people_id);
                        $name = $result->fetch_assoc()['name'];

                        echo '<div class="row show-grid">';
                        echo '<div class="alert alert-info">';
                        echo '<div class="alert alert-info">' . $post[$i]['post_level'] . '楼 ' . $name;
                        echo '<a href="Post_Reply.php?post_id='. $post_id .
                            '&reply_level=' . $post[$i]["post_level"] .
                            '&reply_name=' . $name .
                            '&reply_content=' . $post[$i]["content"] .
                            '" style="float:right;">' . '回复' . '</a></div>';
                        echo '<div class="alert alert-info">';
                        if ($post[$i]['replied_post_level'] != 0)
                        {
                            echo '<strong>回复' . $post[$i]['replied_post_level'] . '楼' . '</strong><br/>';
                        }
                        echo $post[$i]['content'] .'</div></div></div>';
                    }
                    //发表帖子
                    echo '<div class="row show-grid">';
                    echo '<div class="col-md-12">';
                    echo '<form role="form" action="Post_Send.php" method="get" >';
                    echo '<div class="form-group input-group">';
                    echo '<input name="send_message" class="form-control" type="text" placeholder="说出你的想法！">';
                    echo '<span class="input-group-btn"><button type="submit" class="btn btn-default">发射</button></span>';
                    echo '</div></form></div></div>';

                    echo '</div>';
                    ?>
                    <!-- .panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
