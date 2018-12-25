<?php
require ("sidebar_stu.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>个人作业</strong>
                    </div>
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">个人作业情况</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>个人作业</th>
                                            <th>截止日期</th>
                                            <th>完成情况</th>
                                            <th>作业成绩</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#"> 作业1 UML时序图</a></td>
                                            <td>12.8</td>
                                            <td>已完成</td>
                                            <td>97/100</td>
                                            <td><button class="btn btn-link disabled" type="button">重新答题</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"> 作业2 UML用例图</a></td>
                                            <td>12.15</td>
                                            <td>已完成</td>
                                            <td>尚未评分</td>
                                            <td><button class="btn btn-link" type="button">重新答题</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"> 作业3 UML类图</a></td>
                                            <td>12.18</td>
                                            <td>未完成</td>
                                            <td>尚未评分</td>
                                            <td><button class="btn btn-link" type="button">开始答题</button></td>
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






