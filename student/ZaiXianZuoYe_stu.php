<?php
session_start();
require_once('../common/mysql_connect.php');
if(isset($_GET['course_id']) && isset($_GET['class_id']))
{
    $course_id = $_GET['course_id'];
    $class_id = $_GET['class_id'];
    $_SESSION['course_id'] = $course_id;
    $_SESSION['class_id'] = $class_id;
}
else
{
    $course_id = $_SESSION['course_id'];
    $class_id = $_SESSION['class_id'];
}
require ("sidebar_stu.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>个人作业</strong>
                    </div>
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">个人作业情况</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>个人作业</th>
                                            <th>截止时间</th>
                                            <th>完成情况</th>
                                            <th>作业成绩</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require_once('../common/mysql_connect.php');
                                        $query = 'select * from tea_hw WHERE class_id = '.$class_id.' and state <> 0';
                                        $result = mysqli_query($conn, $query);
                                        $count = 1;
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $homework_id = $row['homework_id'];
                                            $title = $row['title'];
                                            $deadline = $row['deadline'];
                                            $query = 'select * from stu_hw WHERE homework_id = '.$homework_id.' and hw_type != 0 and student_id = '.$_SESSION['people_id'];
                                            $result0 = mysqli_query($conn, $query);
                                            if(mysqli_num_rows($result0) == 0) {
                                                $state = "未提交";
                                                $color = "#FF5653";
                                                $grade = "未批改";
                                            } else {
                                                $state = "已提交";
                                                $color = "black";
                                                $query1 = 'select grade from stu_hw WHERE homework_id = '.$homework_id.' and student_id = '.$_SESSION['people_id'];
                                                $result1 = mysqli_query($conn, $query1);
                                                $row1 = mysqli_fetch_assoc($result1);
                                                if($row1['grade']==NULL) {
                                                    $grade = "未批改";
                                                } else {
                                                    $grade = $row1['grade']."/100";
                                                }
                                            }
                                            echo '<tr>';
                                            $print = '<td>'.$title.'</td>'; echo $print;
                                            $print = '<td>'.$deadline.'</td>'; echo $print;
                                            $print = '<td style="Color:'.$color.'">'.$state.'</td>'; echo '<div style="Color:'.$color.'">'.$print.'</div style="Color:'.$color.'">';
                                            $print = '<td>'.$grade.'</td>'; echo $print;
                                            $print = '<td><button class="btn btn-link" type="button"><a href="homework_commit.php?homework_id='.$homework_id.'">答题</a></button></td>'; echo $print;
                                            echo '</tr>';
                                            $count++;
                                        }
                                        mysqli_close($conn);
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <div class="tab-pane fade" id="profile">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-4 -->
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






