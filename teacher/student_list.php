<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/18
 * Time: 8:11
 */

session_start();
require ("sidebar_tea.php");
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>学生列表</strong>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>学生姓名</th>
                                    <th>学号</th>
                                    <th>邮箱</th>
                                    <th>电话</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                require_once('../common/mysql_connect.php');
                                $query = 'select * from people_type_class WHERE class_id = '.$_SESSION['class_id'].' and type = "S"';
                                $result = mysqli_query($conn, $query);
                                $people_array = array();
                                $count = 1;
                                while($row = mysqli_fetch_assoc($result)) array_push($people_array, $row['people_id']);
                                for($i = 0; $i < count($people_array); $i++)
                                {
                                    $id = $people_array[$i];
                                    $query = 'select * from people WHERE people_id = '.$id;
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    echo '<tr>';
                                    echo '<td>'.$count++.'</td>';
                                    echo '<td>'.$row['name'].'</td>';
                                    echo '<td>'.$row['stu_number'].'</td>';
                                    echo '<td>'.$row['email'].'</td>';
                                    echo '<td>'.$row['telephone'].'</td>';
                                    echo '</tr>';
                                }
                                mysqli_close($conn);
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
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
