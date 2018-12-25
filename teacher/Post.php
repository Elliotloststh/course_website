<?php
/**
 * Created by PhpStorm.
 * User: Lucifer
 * Date: 2018/12/23
 * Time: 18:48
 */

session_start();
require_once('../common/mysql_connect.php');

if(isset($_GET['post_id']))
{
    $post_id = $_GET['post_id'];
    $_SESSION['post_id'] = $post_id;
}
else if(isset($_SESSION['post_id']))
{
    $post_id = $_SESSION['post_id'];
}
else $post_id = 0;

$query = 'select * from post where post_id = ' . $post_id . ' and post_level = 1;';
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_row($result);
$times = 1;
$times += $row[5];

$query = 'update post set times = ' . $times . ' where post_id = ' . $post_id . ';';
mysqli_query($conn,$query);

require ("sidebar_stu.php");
?>

    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <!-- /.col-lg-6 -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <?php
                    //查询
                    $class = $_SESSION['class_id'];
                    $query = 'select * from post where post_id = '. $post_id . ' order by post_id asc;';
                    $result = mysqli_query($conn,$query);
                    $post = array();
                    while($row = mysqli_fetch_assoc($result))array_push($post,$row);
                    $level_num = count($post);

                    //帖子标题
                    echo '<div class="panel-heading">';
                    echo '<h3><strong>' . ($post[0])['content'] . '</strong></h3>';
                    echo '</div>';

                    echo '<div class="panel-body">';
                    //帖子内容
                    for($i = 0; $i < $level_num; $i ++)
                    {
                        $people_id = $post[$i]['people_id'];
                        $result = mysqli_query($conn,'select name from people where people_id = ' . $people_id);
                        $name = $result->fetch_assoc()['name'];

                        echo '<div class="row show-grid">';
                        echo '<div class="alert alert-info">';
                        echo '<div class="alert alert-info">' . $post[$i]['post_level'] . '楼 ' . $name;
                        echo '<a href="Post_Reply.php?post_id='. $post_id .
                            '&reply_level=' . $post[$i]["post_level"] .
                            '&reply_name=' . $name .
                            '&reply_content=' . $post[$i]["content"] .
                            '" style="float:right;">' . '回复' . '</a></div>';
                        echo '<div class="alert alert-info">';
                        if ($post[$i]['replied_post_level'] != 0)
                        {
                            echo '<strong>回复' . $post[$i]['replied_post_level'] . '楼' . '</strong><br/>';
                        }
                        echo $post[$i]['content'] .'</div></div></div>';
                    }
                    //发表帖子
                    echo '<div class="row show-grid">';
                    echo '<div class="col-md-12">';
                    echo '<form role="form" action="Post_Send.php" method="get" >';
                    echo '<div class="form-group input-group">';
                    echo '<input name="send_message" class="form-control" type="text" placeholder="说出你的想法！">';
                    echo '<span class="input-group-btn"><button type="submit" class="btn btn-default">发射</button></span>';
                    echo '</div></form></div></div>';

                    echo '</div>';
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
