<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/18
 * Time: 19:17
 */

$homework_id = $_GET['homework_id'];
require ("sidebar_tea.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p>作业1信息</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="height: 300px">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" >
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>姓名</th>
                                    <th>学号</th>
                                    <th>分数</th>
                                    <th>作业文件</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Huang</td>
                                    <td>316010xxxx</td>
                                    <td>99/100</td>
                                    <td><a href="#">316010xxxx-Huang-作业1</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Roth</td>
                                    <td>315010xxxx</td>
                                    <td>尚未批改</td>
                                    <td><a href="#">315010xxxx-Roth-作业1</a> </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>schild</td>
                                    <td>315030xxxx</td>
                                    <td>尚未批改</td>
                                    <td><a href="#">315030xxxx-schild-作业1</a> </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p>作业打分</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="height: 300px">
                        <form role="form" method="post" action="<?php $_SERVER['PHP_SELF']?>">
                            <label>学生序号</label>
                            <input type="number" class="form-control"><br/>
                            <label>分数</label>
                            <input type="number" class="form-control"><br/>
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
