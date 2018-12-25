<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/8
 * Time: 0:04
 */

session_start();
require_once('../common/mysql_connect.php');
$query = 'select name, stu_number, telephone, email, introduction from people WHERE people_id = '.$_SESSION['people_id'];
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result))
{
    $name = $row['name'];
    $stu_id = $row['stu_number'];
    $phone = $row['telephone'];
    $mail = $row['email'];
    $intro = $row['introduction'];
}

if(isset($_POST['phone']) || isset($_POST['mail']) || isset($_POST['intro']))
{
    $phone = ($_POST['phone'] == '') ? $phone : $_POST['phone'];
    @$mail = ($_POST['mail'] == '') ? $mail : $_POST['mail'];
    $intro = ($_POST['intro'] == '') ? $intro : $_POST['intro'];
    $sql = 'update people set telephone = "'.$phone.'", email = "'.$mail.'", introduction = "'.$intro.'" where people_id = '.$_SESSION['people_id'];
    mysqli_query($conn, $sql);
    echo '<script>alert("修改个人信息成功")</script>';
}
require ("sidebar_stu.php");
?>
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




