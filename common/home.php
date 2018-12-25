<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/16
 * Time: 21:56
 */
session_start();
if(isset($_GET['type'])) {
    $_SESSION['user_type'] = "youke";
    $_SESSION['name'] = "游客";
}
require("sidebar_home.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <h4>网站公告</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>公告内容</th>
                                <th>发布时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once('mysql_connect.php');
                            $query = 'select * from website_notice ORDER BY pub_date DESC';
                            $result = mysqli_query($conn, $query);
                            $count = 1;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo '<tr>';
                                echo '<td>'.($count++).'</td>';
                                echo '<td>'.$row['content'].'</td>';
                                echo '<td>'.$row['pub_date'].'</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-6">
                <div class="panel panel-primary" style="height: 335px">
                    <div class="panel-heading">
                        <h4>我的课程</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php
                        require_once('mysql_connect.php');
                        if($_SESSION['user_type'] != "youke") {
                            $people_id = $_SESSION['people_id'];

                            $query = 'select * from people_type_class WHERE people_id = ' . $people_id;
                            $result = mysqli_query($conn, $query);
                            $array_s = array();
                            $array_t = array();
                            $array_z = array();

                            //for every type
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['type'] == 'S') array_push($array_s, $row);
                                else if ($row['type'] == 'T') array_push($array_t, $row);
                                else array_push($array_z, $row);
                            }

                            if (count($array_s) != 0) {
                                echo '<p>在以下课程当中您是学生：<br/></p>';
                                for ($i = 0; $i < count($array_s); $i++) {
                                    $class_id = ($array_s[$i])['class_id'];
                                    $query = "select * from course INNER JOIN class ON class.class_id = $class_id AND class.course_id = course.course_id";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $course_id = $row['course_id'];
                                    $course_name = $row['course_name'];
                                    echo '<a href="../student/gonggao_stu.php?class_id=' . $class_id . '&course_id=' . $course_id . '&type=S">' . $course_name . '</a>';
                                    echo '<br/>';
                                }
                            }

                            if (count($array_t) != 0) {
                                echo '<p>在以下课程当中您是老师：<br/></p>';
                                for ($i = 0; $i < count($array_t); $i++) {
                                    $class_id = ($array_t[$i])['class_id'];
                                    $query = "select * from course INNER JOIN class ON class.class_id = $class_id AND class.course_id = course.course_id";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $course_id = $row['course_id'];
                                    $course_name = $row['course_name'];
                                    echo '<a href="../teacher/class_notice_tea.php?class_id=' . $class_id . '&course_id=' . $course_id . '&type=T">' . $course_name . '</a>';
                                    echo '<br/>';
                                }
                            }

                            if (count($array_z) != 0) {
                                echo '<p>在以下课程当中您是助教：<br/></p>';
                                for ($i = 0; $i < count($array_z); $i++) {
                                    $class_id = ($array_z[$i])['class_id'];
                                    $query = "select * from course INNER JOIN class ON class.class_id = $class_id AND class.course_id = course.course_id";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $course_id = $row['course_id'];
                                    $course_name = $row['course_name'];
                                    echo '<a href="../student/gonggao_stu.php?class_id=' . $class_id . '&course_id=' . $course_id . '&type=Z">' . $course_name . '</a>';
                                    echo '<br/>';
                                }
                            }
                            mysqli_close($conn);
                        }
                        ?>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
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
