<?php
session_start();
require("sidebar_stu.php");
?>

    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-8" style="left: 160px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>修改密码</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php $_SERVER['PHP_SELF']?>">
                            <div class="form-group input-group">
                                <span class="input-group-addon">输入新密码</span>
                                <input type="password" name="new" class="form-control" placeholder="new pass">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">重复新密码</span>
                                <input type="password" name="another" class="form-control" placeholder="another">
                            </div>

                            <center>
                                <button class="btn btn-success" type="submit">确认</button>
                                <button class="btn btn-default" type="reset">取消</button>
                            </center>
                        </form>
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

<?php
if(!isset($_POST['new']) || !isset($_POST['another']))
{
}
else
{
    require_once('../common/mysql_connect.php');
    $new_pass = $_POST['new'];
    $another = $_POST['another'];
    if(empty($new_pass) || empty($another)) echo '<script language="JavaScript">alert("密码不能为空")</script>';
    else if($new_pass != $another) echo '<script language="JavaScript">alert("两次输入密码不相同，请重新输入")</script>';
    else
    {
        $sql = 'update people set pswd = "'.md5($new_pass).'" where people_id = '.$_SESSION['people_id'];
        mysqli_query($conn, $sql);
        echo '<script language="JavaScript">alert("修改密码成功")</script>';
    }
    mysqli_close($conn);
}
?>
</body>

</html>



