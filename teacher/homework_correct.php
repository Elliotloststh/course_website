<?php
session_start();
require_once('../common/mysql_connect.php');
$teacherId = $_SESSION['people_id'];
if(isset($_GET['homework_id'])) {
    $homework_id = $_GET['homework_id'];
    $query = "select * from tea_hw where homework_id=".$homework_id;
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==0) {
        header('HTTP/1.1 404 Not Found');exit('404 Not Found');
    } else {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $resume = $row['homework_resume'];
        $deadline = $row['deadline'];
        $deadline_t = strtotime($deadline);
        $address = $row['address'];
    }
} else {
    header('HTTP/1.1 404 Not Found');exit('404 Not Found');
}
$query = "select * from stu_hw where homework_id=".$homework_id." and student_id=".$_SESSION['people_id'];
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==0) {
    $flag = false;
    $stu_file_name = "无";
} else {
    $row = mysqli_fetch_assoc($result);
    $flag = true;
    $stu_address = $row['local_address'];
    $stu_file_name = $row['hw_name'];
    $stu_names = explode('/',$stu_address);

    $stu_method = "../common/download.php?filename=";
    for($i=0;$i<count($stu_names);++$i) {
        $stu_method = $stu_method.$stu_names[$i];
        if($i<count($stu_names)-1) {
            $stu_method=$stu_method.'%2F';
        }
    }
}
require ("sidebar_tea.php");
?>

<div id="wrapper">
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-primary">
					<div class="panel-heading">
                        <p>
                            学生作业提交信息
                        </p>
                    </div>
                    <div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
                                    <th>课程作业编号</th>
                                    <th>作业提交编号</th>
                                    <th>学生编号</th>
                                    <th>作业成绩</th>
                                    <th>作业下载</th>
                                </tr>
								<?php
									$sql = "select * from stu_hw, people where homework_id = {$homeworkId} and stu_hw.student_id = people.people_id";
									$result = mysqli_query($conn,$sql);
									if(!empty($result)){
										while($row = mysqli_fetch_assoc($result)){
											$homeworkName = $row['hw_name'];
											$url = "../common/download.php?filename={$row['local_address']}";
											echo '<tr>';
											echo '<td>'.$homeworkId.'</td>';
											echo '<td>'.$row['id'].'</td>';
											echo '<td>'.$row['name'].'</td>';
											if($row['grade']!=null)
												echo '<td>'.$row['grade'].'</td>';
											else
												echo '<td>'.'未批改'.'</td>';
											echo '<td>'."<a href= $url>$homeworkName</a>".'</td>';
											echo '</tr>';
										
										}
									}
									mysqli_close($conn);
								?>							
							</table>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p>
                            作业信息
                        </p>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <?php
                            function download($local) {
                                $file=fopen($local,"r");
                                header("Content-Type: application/octet-stream");
                                header("Accept-Ranges: bytes");
                                header("Accept-Length: ".filesize('文件地址'));
                                header("Content-Disposition: attachment; filename=文件名称");
                                echo fread($file,filesize('文件地址'));
                                fclose($file);
                            }
                            echo '<tr>';
                            $print = "<td><b>描述</b></td>"; echo $print;
                            echo '</tr>';
                            echo '<tr>';
                            $print = "<td>$resume</td>"; echo $print;
                            echo '</tr>';
                            echo '<tr>';
                            $print = "<td><b>截止时间</b></td>"; echo $print;
                            echo '</tr>';
                            echo '<tr>';
                            $print = "<td>$deadline</td>"; echo $print;
                            echo '</tr>';
                            echo '<tr>';
                            $print = "<td><b>作业资料</b></td>"; echo $print;
                            echo '</tr>';
                            if($address==NULL) {
                                echo '<tr>';
                                $print = "<td>无</td>"; echo $print;
                                echo '</tr>';
                            } else {
                                $names = explode('/',$address);
                                $name = $names[sizeof($names)-1];
                                $method = "../common/download.php?filename=";
                                for($i=0;$i<count($names);++$i) {
                                    $method = $method.$names[$i];
                                    if($i<count($names)-1) {
                                        $method=$method.'%2F';
                                    }
                                }
                                echo '<tr>';
                                $print = "<td><a href=\"$method\">$name</a></td>"; echo $print;
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p>作业打分</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="height: 300px">
                        <form role="form" method="post" action="grade_submit.php">
                            <label>作业编号</label>
                            <input type="number" name="judgeHomeworkId" class="form-control"><br/>
                            <label>分数</label>
                            <input type="number" name="grade" class="form-control"><br/>
                            <center><button class="btn btn-primary" type="submit">确认打分</button></center>
                        </form>
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
