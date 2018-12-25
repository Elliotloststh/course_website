<?php
require ("sidebar_stu.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>小组作业</strong>
                    </div>
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">小组作业情况</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>作业序号</th>
                                            <th>截止日期</th>
                                            <th>提交情况</th>
                                            <th>下载</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>小组作业1</td>
                                            <td>12.8</td>
                                            <td>已提交</td>
                                            <td><button class="btn btn-link" type="button">[G03]作业1.pdf</button></td>
                                            <td><button class="btn btn-link" type="button">重新提交</button></td>
                                        </tr>
                                        <tr>
                                            <td>小组作业2</td>
                                            <td>12.15</td>
                                            <td>未提交</td>
                                            <td><button class="btn btn-link" type="button"></button></td>
                                            <td><button class="btn btn-link" type="button">提交</button></td>
                                        </tr>
                                        <tr>
                                            <td>小组作业3</td>
                                            <td>12.18</td>
                                            <td>未提交</td>
                                            <td><button class="btn btn-link" type="button"></button></td>
                                            <td><button class="btn btn-link" type="button">提交</button></td>
                                        </tr>
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





