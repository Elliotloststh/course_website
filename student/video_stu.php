<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/8
 * Time: 13:36
 */
session_start();
require ("sidebar_stu.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>教学视频</strong>
                    </div>
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">观看视频</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>标题</th>
                                            <th>类型</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require_once('../common/mysql_connect.php');
                                        $query = 'select * from material WHERE class_id = '.$_SESSION['class_id'];
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            echo '<tr>';
                                            echo "<td>".$row['material_name']."</td>";
                                            echo "<td>".$row['material_type']."</td>";
                                            echo "<td><a target='_blank' href='../common/watch_video.php?addr=".$row['local_address']."'>观看视频</a> </td>";
                                            echo '</tr>';
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