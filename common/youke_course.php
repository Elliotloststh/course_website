<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/15
 * Time: 21:43
 */
require("sidebar_home.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>课程简介</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">软件需求工程</a>
                            </li>
                            <li><a href="#profile" data-toggle="tab">软件工程管理</a>
                            </li>
                            <li><a href="#messages" data-toggle="tab">软件质量保证与测试</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <h5 style="margin: 10px;line-height: 30px">
                                    <?php
                                        require_once('../common/mysql_connect.php');
                                        $query = 'select introduction from course WHERE course_id = 1';
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            echo $row['introduction'];
                                        }
                                    ?>
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <h5 style="margin: 10px;line-height: 30px">
                                    <?php
                                    require_once('../common/mysql_connect.php');
                                    $query = 'select introduction from course WHERE course_id = 2';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo $row['introduction'];
                                    }
                                    ?>
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <h5 style="margin: 10px;line-height: 30px">
                                    <?php
                                    require_once('../common/mysql_connect.php');
                                    $query = 'select introduction from course WHERE course_id = 3';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo $row['introduction'];
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </h5>
                            </div>
                        </div>
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

