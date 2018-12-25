<?php
/**
 * Created by PhpStorm.
 * User: Lucifer
 * Date: 2018/12/23
 * Time: 18:48
 */
session_start();
require_once('../common/mysql_connect.php');
require ("sidebar_stu.php");
?>

    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><strong>热门话题</strong></h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php
                        $class = $_SESSION['class_id'];
                        $query = 'select * from post where class_id = '. $class . ' and post_level = 1 order by times desc;';
                        $result = mysqli_query($conn,$query);
                        $array = array();

                        while($row = mysqli_fetch_assoc($result))array_push($array,$row);
                        $num = count($array);

                        for($i = 0;$i < ($num <= 5 ? $num : 5);$i ++)
                        {
                            echo '<div class="alert alert-info">';
                            echo '<a href="Post.php?post_id=' . $array[$i]['post_id'] . '" class="alert-link">' . '【' . $array[$i]['times'] . '】' . $array[$i]['content']  .  '</a>';
                            echo '</div>';
                        }
                        ?>
                        <div class="alert alert-info">
                            <a href="Posts.php" class="alert-link">--MORE--</a>
                        </div>
                    </div>
                    <!-- .panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><strong>课程论坛</strong></h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php
                        require_once('../common/mysql_connect.php');
                        $class = $_SESSION['class_id'];
                        $query = 'select * from post where class_id = '. $class . ' and post_level = 1 order by post_id desc;';
                        $result = mysqli_query($conn,$query);
                        $array = array();

                        while($row = mysqli_fetch_assoc($result))array_push($array,$row);
                        $num = count($array);

                        for($i = 0;$i < ($num <= 5 ? $num : 5);$i ++)
                        {
                            echo '<div class="alert alert-info">';
                            echo '<a href="Post.php?post_id=' . $array[$i]['post_id'] . '" class="alert-link">' . ($array[$i])['content'] . '</a>';
                            echo '</div>';
                        }
                        ?>
                        <div class="alert alert-info">
                            <a href="Posts.php" class="alert-link">--MORE--</a>
                        </div>
                    </div>
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







