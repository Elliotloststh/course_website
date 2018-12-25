<?php
require_once('../common/mysql_connect.php');
// $query = 'select distinct group_id FROM student_class_group WHERE class_id ='.$_SESSION['class_id'].'AND student_id ='.$_SESSION['student_id']'';
$query = 'select distinct group_id FROM student_class_group WHERE class_id = 1 AND student_id = 1';
$result = mysqli_query($conn, $query);
$group_id_array = array();
while($row = mysqli_fetch_assoc($result)) array_push($group_id_array, $row['group_id']);
$group_id = $group_id_array[0];
require ("sidebar_stu.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php 
                        if($group_id<10){
                            echo '<h3>我的小组：G0'.$group_id.'</h3>';
                        }
                        else echo '<h3>我的小组：G'.$group_id.'</h3>';
                         ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>姓名</th>
                                    <th>学号</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $Color=array("success","warning","info","danger");
                                   $query = 'select student_id from student_class_group WHERE class_id = 1 AND group_id = '.$group_id;
                                    $result = mysqli_query($conn, $query);
                                    $student_id_array = array();
                                    while ($row = mysqli_fetch_assoc($result)) array_push($student_id_array, $row['student_id']);

                                     for ($i = 0; $i < count($student_id_array); $i++){
                                        $no = $i + 1;
                                        $student_id = $student_id_array[$i];
                                        $query = "select stu_number from people WHERE people.people_id = $student_id ";
                                        $result = mysqli_query($conn, $query);
                                        $stu_number = mysqli_fetch_assoc($result)['stu_number'];
                                        $query = 'select name from people WHERE people.people_id = '.$student_id ;
                                        $result = mysqli_query($conn, $query);
                                        $name = mysqli_fetch_assoc($result)['name'];
                                        echo '<tr class = '.$Color[$i%4].'>';
                                        echo '<td>'.$no.'</td>';
                                        echo '<td>'.$name.'</td>';
                                        echo '<td>'.$stu_number.'</td>';
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



