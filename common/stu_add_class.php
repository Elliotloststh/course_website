<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/25
 * Time: 14:15
 */
session_start();

require_once("mysql_connect.php");
if(isset($_POST['name']) && isset($_POST['recode']))
{
    $name = $_POST['name'];
    $code = $_POST['recode'];

    $query = 'select * from class WHERE register_code = "'.$code.'"';
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0)
    {
        echo "<script type=\"text/javascript\">
            alert(\"无效注册码，请重新输入\");
            setTimeout(\"window.location.href='stu_add_class.php'\",0);
          </script>";
        return;
    }

    $class_id = mysqli_fetch_assoc($result)['class_id'];
    $people_id = $_SESSION['people_id'];

//检验是否已经注册过该课程
    $query = 'select * from people_type_class WHERE class_id = '.$class_id.' and people_id = '.$people_id;
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) != 0)
    {
        echo "<script type=\"text/javascript\">
            alert(\"已注册该课程\");
            setTimeout(\"window.location.href='stu_add_class.php'\",0);
          </script>";
        return;
    }

    $query = 'insert into people_type_class VALUES ('.$people_id.', "S", '.$class_id.')';
    @mysqli_query($conn, $query);

    echo "<script type=\"text/javascript\">
            alert(\"绑定课程成功！\");
            setTimeout(\"window.location.href='stu_add_class.php'\",0);
          </script>";

    mysqli_close($conn);
}
require("sidebar_home.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>绑定课程</strong>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="stu_add_class.php">
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
                            $query = 'select * from people_type_class WHERE people_id = '.$_SESSION['people_id'];
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
                                echo '<td>'.$_SESSION['name'].'</td>';
                                echo '<td>'.$_SESSION['stu_num'].'</td>';
                                echo '</tr>';
                            }
                            mysqli_close($conn);
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

