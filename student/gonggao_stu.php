<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/7
 * Time: 22:38
 */

session_start();
if(isset($_GET['course_id']) && isset($_GET['class_id']))
{
    $course_id = $_GET['course_id'];
    $class_id = $_GET['class_id'];
    $user_type = $_GET['type'];
    $_SESSION['course_id'] = $course_id;
    $_SESSION['class_id'] = $class_id;
    $_SESSION['user_type'] = $user_type;
}
else
{
    $course_id = $_SESSION['course_id'];
    $class_id = $_SESSION['class_id'];
}
require("sidebar_stu.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            课程公告列表
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>课程公告</th>
                                        <th>发布人</th>
                                        <th>发布时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        require_once('../common/mysql_connect.php');
                                        $query = 'select * from class_notice WHERE class_id = '.$class_id.' ORDER BY pub_date DESC';
                                        $result = mysqli_query($conn, $query);
                                        $count = 1;
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $content = $row['notice_content'];
                                            $date = $row['pub_date'];
                                            $tea_name = $row['teacher_name'];
                                            echo '<tr>';
                                            $print = '<td>'.$count.'</td>'; echo $print;
                                            $print = '<td>'.$content.'</td>'; echo $print;
                                            $print = '<td>'.$tea_name.'</td>'; echo $print;
                                            $print = '<td>'.$date.'</td>'; echo $print;
                                            echo '</tr>';
                                            $count++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
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
