<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/8
 * Time: 0:04
 */

require_once('../common/mysql_connect.php');
$query = 'select name, stu_number, telephone, email, introduction from people WHERE people_id = 1';
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result))
{
    $name = $row['name'];
    $stu_id = $row['stu_number'];
    $phone = $row['telephone'];
    $mail = $row['email'];
    $intro = $row['introduction'];
}

if(isset($_POST['phone']) || iss    et($_POST['mail']) || isset($_POST['intro']))
{
    $phone = ($_POST['phone'] == '') ? $phone : $_POST['phone'];
    @$mail = ($_POST['mail'] == '') ? $mail : $_POST['mail'];
    $intro = ($_POST['intro'] == '') ? $intro : $_POST['intro'];
    $sql = 'update people set telephone = "'.$phone.'", email = "'.$mail.'", introduction = "'.$intro.'" where people_id = 1';
    mysqli_query($conn, $sql);
    echo '<script>alert("修改个人信息成功")</script>';
}
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
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> 注销</a>
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
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> 课程资料<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="KeJian_stu.php"> 课件</a>
                            </li>
                            <li>
                                <a href="#"> 教学视频</a>
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
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>用户个人信息</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php $_SERVER['PHP_SELF']?>">
                            <div class="form-group input-group">
                                <span class="input-group-addon">姓名</span>
                                <input type="text" class="form-control" placeholder="Username" name="name" style="width: 50%"
                                       value="<?php echo $name?>"
                                >
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">学号</span>
                                <input type="text" class="form-control" placeholder="id" name="stu_id" style="width: 50%"
                                       value="<?php echo $stu_id?>"
                                >
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">手机</span>
                                <input type="text" class="form-control" placeholder="phone" name="phone" style="width: 50%"
                                       value="<?php echo $phone?>"
                                >
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">邮箱</span>
                                <input type="text" class="form-control" placeholder="email" name="email" style="width: 50%"
                                       value="<?php echo $mail?>"
                                >
                            </div>
                            <div class="form-group">
                                <label>个人简介</label>
                                <textarea class="form-control" rows="4" name="intro"><?php echo $intro?></textarea>
                            </div>

                            <center>
                                <button class="btn btn-success" type="submit">保存</button>
                                <button class="btn btn-default" type="reset">取消</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>绑定课程</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="yanzhengma_stu.php">
                            <div class="form-group input-group">
                                <span class="input-group-addon"> 姓名 </span>
                                <input type="text" class="form-control" placeholder="Username" name="name">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">验证码</span>
                                <input type="text" class="form-control" placeholder="验证码（通过老师获取）" name="recode">
                            </div>
                            <center>
                                <button class="btn btn-success" type="submit">绑定</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>已绑课程</strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>课程</th>
                                    <th>姓名</th>
                                    <th>学号</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                require_once('../common/mysql_connect.php');
                                $query = 'select * from people_type_class WHERE people_id = 1';
                                $result = mysqli_query($conn, $query);

                                $class_id_array = array();
                                while ($row = mysqli_fetch_assoc($result)) array_push($class_id_array, $row['class_id']);
                                for ($i = 0; $i < count($class_id_array); $i++)
                                {
                                    $class_id = $class_id_array[$i];
                                    $query = "select * from course INNER JOIN class ON class.class_id = $class_id AND class.course_id = course.course_id";
                                    $result = mysqli_query($conn, $query);
                                    $course_name = mysqli_fetch_assoc($result)['course_name'];
                                    echo '<tr>';
                                    echo '<td>'.$course_name.'</td>';
                                    echo '<td>黄亦非</td>';
                                    echo '<td>3160104367</td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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




