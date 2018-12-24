<?php
require_once('../common/mysql_connect.php');
$query = 'select name, stu_number, telephone, email, introduction from people WHERE people_id = 1';
$result = mysqli_query($conn, $query);

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
                        <a href="class_notice_tea.php"><i class="fa fa-dashboard fa-fw"></i> 课程公告</a>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-dashcube fa-fw"></i> 课程信息<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="course_brief.php"> 课程简介</a>
                            </li>
                            <li>
                                <a href="tea_information.php"> 教师介绍</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="tea_calendar.php"><i class="fa fa-table fa-fw"></i> 教学日历</a>
                    </li>
                    <li>
                        <a href="course_dagang.php"><i class="fa fa-eject fa-fw"></i> 教学大纲</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> 课程资料<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="course_material.php"> 课件</a>
                            </li>
                            <li>
                                <a href="#"> 教学视频</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="group_list.php"><i class="fa fa-users fa-fw"></i> 课程小组</a>
                    </li>
                    <li>
                        <a href="homework.php"><i class="fa fa-tablet fa-fw"></i> 作业管理</a>
                    </li>
                    <li>
                        <a href="student_list.php"><i class="fa fa-edge fa-fw"></i> 学生列表</a>
                    </li>
                    <li>
                        <a href="luntan_tea.php"><i class="fa fa-ellipsis-h fa-fw"></i> 课程论坛</a>
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
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i>小组信息 
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs " >
                                    <a href="group_manage.php">
                                    编辑删除 <i class="fa fa-times-circle"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                 <!-- .panel-info -->
                                 <?php 
                                    require_once('../common/mysql_connect.php');
                                    $query = 'select distinct group_id FROM student_class_group WHERE class_id = 1';
                                    $result = mysqli_query($conn, $query);
                                    $group_id_array = array();
                                    while($row = mysqli_fetch_assoc($result)) array_push($group_id_array, $row['group_id']);
                                    $Collapse_Alphabet = array("One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Eleven","Twelve","Thirteen","Fourteen","Fifteen","Sixteen","Seventeen","Eighteen","Nineteen","Twenty");
                                    // Collapse_Alphabet is used for the collapsible effect 
                                    for ($i = 0; $i < count($group_id_array); $i++)
                                    {
                                        $group_id = $group_id_array[$i];
                                    echo '<div class="panel panel-info">';
                                        echo '<div class="panel-heading">';
                                            echo '<h4 class="panel-title">';
                                            if($group_id < 10){
                                                echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$Collapse_Alphabet[$i].'">小组人员信息 G0'.$group_id.'</a>';
                                            }
                                            else {
                                                echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$Collapse_Alphabet[$i].'">小组人员信息 G'.$group_id.'</a>';
                                            }
                                            echo '</h4>';
                                        echo '</div>';

                                         echo '<div id="collapse'.$Collapse_Alphabet[$i].'" class="panel-collapse collapse">';
                                            echo '<div class="panel-body"> ';
                                                echo '<div class="table-responsive">';
                                                    echo '<table class="table table-striped table-hover">';
                                                        echo '<thead>';
                                                        echo '<tr>';
                                                            echo '<th>#</th>';
                                                            echo '<th>姓名</th>';
                                                            echo '<th>学号</th>';
                                                        echo '</tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                        $query = 'select student_id from student_class_group WHERE class_id = 1 AND group_id = '.$group_id;
                                        $result = mysqli_query($conn, $query);
                                        $student_id_array = array();
                                        while ($row = mysqli_fetch_assoc($result)) array_push($student_id_array, $row['student_id']);
                                        for($j=0; $j < count($student_id_array) ; $j++ )
                                        {
                                            $no = $j + 1;
                                            $student_id = $student_id_array[$j];
                                            $query = "select stu_number from people WHERE people.people_id = $student_id ";
                                            $result = mysqli_query($conn, $query);
                                            $stu_number = mysqli_fetch_assoc($result)['stu_number'];
                                            $query = 'select name from people WHERE people.people_id = '.$student_id ;
                                            $result = mysqli_query($conn, $query);
                                            $name = mysqli_fetch_assoc($result)['name'];
                                                        echo '<tr>';
                                                            echo '<td>'.$no.'</td>';
                                                            echo '<td>'.$name.'</td>';
                                                            echo '<td>'.$stu_number.'</td>';
                                                        echo '</tr>';
                                        }
                                                        echo '</tbody>';
                                                    echo '</table>';
                                                echo '</div>';
                                                echo ' <a href="#">';
                                                                echo '<i class="fa fa-plus fa-fw"></i> 添加小组成员 <i class="fa fa-user fa-fw"></i>';
                                                        echo '</a>';
                                            echo '</div>';
                                        echo '</div>';
                                echo '</div>';
                                }
                                ?>
                                <!-- /.panel-info -->
                            </div>
                                <div class="panel-footer">     
                                    <a href="#">
                                            <i class="fa fa-plus fa-fw"></i> 添加小组 <i class="fa fa-users fa-fw"></i>
                                    </a>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
