<?php
session_start();
require_once('../common/mysql_connect.php');
require ("sidebar_stu.php");
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
                            <li class="active"><a href="#home" data-toggle="tab">参考教材</a>
                            </li>
                            <li><a href="#profile" data-toggle="tab">成绩评定</a>
                            </li>
                            <li><a href="#messages" data-toggle="tab">实验</a>
                            </li>
                            <li><a href="#brief" data-toggle="tab">简介信息</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <h5>
                                    《软件需求（第2版）》[美] Karl E. Wiegers 著，刘伟琴、刘洪涛译，清华大学出
                                    版社，2004 年 11 月第 1 版<br/><br/>
                                    《计算机软件文档编制规范》<br/><br/>
                                    《软件需求规格说明书》<br/><br/>
                                    《软件工程管理》
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <h5>
                                    期末考试：50%<br><br>
                                    作业（homework）：10%<br><br>
                                    课堂练习：7%<br><br>
                                    实验报告：9%<br><br>
                                    实验验收：12%<br><br>
                                    课堂演讲：12%<br><br>
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <h5>
                                    上机、验收时间周六：下午7、8节<br><br>
                                    地点： 玉泉校区计算机学院机房，曹西503机房， 本人计算机<br><br>
                                    实验验收在周六下午，地点曹西503机房<br><br>
                                    助教在周六总是在机房<br><br>
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="brief">
                                <h5 style="margin: 10px;line-height: 30px">
                                    <?php
                                    require_once('../common/mysql_connect.php');
                                    $course = $_SESSION['course_id'];
                                    $query = 'select introduction from course WHERE course_id = '.$course;
                                    $result = mysqli_query($conn, $query);
                                    $intro = (mysqli_fetch_assoc($result))['introduction'];
                                    echo $intro;
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

