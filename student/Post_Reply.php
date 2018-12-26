<?php
/**
 * Created by PhpStorm.
 * User: Lucifer
 * Date: 2018/12/23
 * Time: 18:48
 */

session_start();
require_once('../common/mysql_connect.php');

if (isset($_GET['reply_level'])) $reply_level = $_GET['reply_level'];
else $reply_level = 0;
if (isset($_GET['reply_name'])) $reply_name = $_GET['reply_name'];
else $reply_name = '';
if (isset($_GET['reply_content'])) $reply_content = $_GET['reply_content'];
else $reply_content = '';
$post_id = $_SESSION['post_id'];
$class_id = $_SESSION['class_id'];
$people_id = $_SESSION['people_id'];

require ("sidebar_stu.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <!-- /.col-lg-6 -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            <strong>回复：<?php  echo $reply_name ?></strong>
                        </h3>
                    </div>
                    <?php
                    $query = 'select * from post where post_id = '. $post_id . ' order by post_level desc;';
                    $result = mysqli_query($conn,$query);
                    $row = mysqli_fetch_assoc($result);

                    echo '<div class="panel-body">';
                    echo '<div class="row show-grid">';
                    echo '<div class="alert alert-info">';
                    echo '<div class="alert alert-info">' . $reply_level . '楼 ' . $reply_name .'</div>';
                    echo '<div class="alert alert-info">' . $reply_content .'</div></div></div>';

                    echo '<div class="row show-grid">';
                    echo '<div class="col-md-12">';
                    echo '<form role="form" action="Post_Send.php" method="get" >';
                    echo '<div class="form-group input-group">';
                    echo '<input name="reply_level" class="hidden" value="'. $reply_level .'">';
                    echo '<input name="send_message" class="form-control" type="text" placeholder="想跟他说什么？">';
                    echo '<span class="input-group-btn"><button type="submit" class="btn btn-default">发射</button></span>';
                    echo '</div></form></div></div></div>';
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
