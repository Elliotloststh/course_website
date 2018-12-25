<?php 
require ("sidebar_tea.php"); 
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i>小组信息 
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                 <!-- .panel-info -->
                                 <?php 
                                    require_once('../common/mysql_connect.php');
                                    $query = 'select distinct group_id FROM student_class_group WHERE class_id = 1';
                                    $result = mysqli_query($conn, $query);
                                    $group_id_array = array();
                                    while($row = mysqli_fetch_assoc($result)) array_push($group_id_array, $row['group_id']);
                                    $Collapse_Alphabet = array("One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Eleven","Twelve","Thirteen","Fourteen","Fifteen","Sixteen","Seventeen","Eighteen","Nineteen","Twenty");
                                    // Collapse_Alphabet is used for the collapsible effect 
                                    for ($i = 0; $i < count($group_id_array); $i++)
                                    {
                                        $group_id = $group_id_array[$i];
                                    echo '<div class="panel panel-info">';
                                        echo '<div class="panel-heading">';
                                            echo '<h4 class="panel-title">';
                                            if($group_id < 10){
                                                echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$Collapse_Alphabet[$i].'">小组人员信息 G0'.$group_id.'</a>';
                                                    echo'<div class="btn-group pull-right">';
                                                        echo'<button type="button" class="btn btn-default btn-xs">';
                                                            echo'<a href="group_delete.php?group_id='.$group_id.'">';
                                                            echo'删除 <i class="fa fa-times-circle"></i>';
                                                            echo '</a>';
                                                       echo'</button>';
                                                    echo'</div>';
                                            }
                                            else {
                                                echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$Collapse_Alphabet[$i].'">小组人员信息 G'.$group_id.'</a>';
                                                    echo'<div class="btn-group pull-right">';
                                                        echo'<button type="button" class="btn btn-default btn-xs">';
                                                            echo'<a href="group_delete.php?group_id='.$group_id.'">';
                                                            echo'删除 <i class="fa fa-times-circle"></i>';
                                                            echo '</a>';
                                                       echo'</button>';
                                                    echo'</div>';
                                            }
                                            echo '</h4>';
                                        echo '</div>';

                                         echo '<div id="collapse'.$Collapse_Alphabet[$i].'" class="panel-collapse collapse in">';
                                            echo '<div class="panel-body"> ';
                                                echo '<div class="table-responsive">';
                                                    echo '<table class="table table-striped table-hover">';
                                                        echo '<thead>';
                                                        echo '<tr>';
                                                            echo '<th>#</th>';
                                                            echo '<th>姓名</th>';
                                                            echo '<th>学号</th>';
                                                            echo '<th>操作</th>';
                                                        echo '</tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                        $query = 'select student_id from student_class_group WHERE class_id = 1 AND group_id = '.$group_id;
                                        $result = mysqli_query($conn, $query);
                                        $student_id_array = array();
                                        while ($row = mysqli_fetch_assoc($result)) array_push($student_id_array, $row['student_id']);
                                        for($j=0; $j < count($student_id_array) ; $j++ )
                                        {
                                            $no = $j + 1;
                                            $student_id = $student_id_array[$j];
                                            $query = "select stu_number from people WHERE people.people_id = $student_id ";
                                            $result = mysqli_query($conn, $query);
                                            $stu_number = mysqli_fetch_assoc($result)['stu_number'];
                                            $query = 'select name from people WHERE people.people_id = '.$student_id ;
                                            $result = mysqli_query($conn, $query);
                                            $name = mysqli_fetch_assoc($result)['name'];
                                                        echo '<tr>';
                                                            echo '<td>'.$no.'</td>';
                                                            echo '<td>'.$name.'</td>';
                                                            echo '<td>'.$stu_number.'</td>';
                                                            echo '<td><a href="group_member_delete.php?student_id='.$student_id.'">删除 </td></a>';
                                                        echo '</tr>';
                                        }
                                                        echo '</tbody>';
                                                    echo '</table>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                echo '</div>';
                                }
                                mysqli_close($conn);
                                ?>
                                <!-- /.panel-info -->
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
