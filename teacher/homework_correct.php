<?php
session_start();
require_once('../common/mysql_connect.php');
$homeworkId = $_GET['homework_id'];
$teacherId = $_SESSION['people_id'];
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
