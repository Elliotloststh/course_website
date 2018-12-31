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

if(isset($_POST['content']))
{

}
require ("sidebar_tea.php");
?>
    <script type="text/javascript">
        function del_confirm(id) {
            if(confirm('确认删除改作业吗？'))
            {
                document.getElementById("ahref"+id).href = "post_hw_del.php?homework_id="+id;
            }
        }
    </script>
    <!--    右侧工作区  -->
    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p>
                            作业信息
                            <a href="homework_assignment.php">
                                <button class="btn btn-success" type="submit" style="Float:right;">布置作业</button>
                            </a>
                        </p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>作业描述</th>
                                    <th>状态</th>
                                    <th>提交人数</th>
                                    <th>截止日期</th>
                                    <th>操作</th>
                                    <th></th>
                                </tr>
                                <?php
                                require_once('../common/mysql_connect.php');
                                $query = 'select * from people_type_class WHERE class_id = '.$class_id.' and type = "S"';
                                $result = mysqli_query($conn, $query);
                                $total_num = mysqli_num_rows($result);
                                $query = 'select * from tea_hw WHERE class_id = '.$class_id;
                                $result = mysqli_query($conn, $query);
                                $count = 1;
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $homework_id = $row['homework_id'];
                                    $title = $row['title'];
                                    $deadline = $row['deadline'];
                                    $state0 = $row['state'];
                                    switch ($state0) {
                                        case 0:
                                            $state = "未发布";
                                            $color = "#FF512C";
                                            $op = "编辑";
                                            $href = "homework_assignment.php?homework_id=";break;
                                        case 1:
                                            $state = "已发布";
                                            $color = "black";
                                            $op = "进入批改";
                                            $href = "homework_correct.php?homework_id=";break;
                                        case 2:
                                            $state = "已批改";
                                            $color = "#2FB836";
                                            $op = "进入批改";
                                            $href = "homework_correct.php?homework_id=";break;
                                    }

                                    $query = 'select * from stu_hw WHERE homework_id = '.$homework_id;
                                    $result0 = mysqli_query($conn, $query);
                                    $commit_num = mysqli_num_rows($result0);
                                    echo '<tr>';
                                    $print = '<td>'.$title.'</td>'; echo $print;
                                    $print = '<td style="Color:'.$color.'">'.$state.'</td>'; echo '<div style="Color:'.$color.'">'.$print.'</div style="Color:'.$color.'">';
                                    $print = '<td>'.$commit_num.'/'.$total_num.'</td>'; echo $print;
                                    $print = '<td>'.$deadline.'</td>'; echo $print;
                                    $print = '<td><a target="_blank" href="'.$href.''.$homework_id.'">'.$op.'</a></td>'; echo $print;
                                    $print = '<td><a id="ahref'.$homework_id.'" href="javascript:;" onclick="del_confirm('.$homework_id.')">删除</a></td>'; echo $print;
                                    echo '</tr>';
                                    $count++;
                                }
                                mysqli_close($conn);
                                ?>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
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