<?php
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
                            成绩修改结果
                        </p>
                    </div>
                    <div class="panel-body">
						<?php
							require_once('../common/mysql_connect.php');
							$studentHomeworkId = $_POST["judgeHomeworkId"];
							$judge = "select * from stu_hw where id = {$studentHomeworkId}";
							$rows = mysqli_query($conn,$judge);
							if (mysqli_num_rows($rows) < 1){
								echo '作业编号不存在！';
							}
							else{
								$grade = $_POST["grade"];
								$sql = "update stu_hw set grade = $grade,hw_type = 2 where id = {$studentHomeworkId}";
								$result = mysqli_query($conn,$sql);
								if($result){
									echo "学生成绩上传成功";
								}
								else{
									echo "学生成绩上传失败";
								}
							}
							$target = $_SERVER["HTTP_REFERER"];
							mysqli_close($conn);
							//header("Refresh:3;url=$target");
						?>

                    </div>
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
  