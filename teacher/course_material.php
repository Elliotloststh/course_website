<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/8
 * Time: 0:52
 */
session_start();
require ("sidebar_tea.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>课件资料</strong>
                    </div>
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">课件</a>
                            </li>
                            <li><a href="#video" data-toggle="tab">视频</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>标题(点击下载)</th>
                                            <th>类型</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require_once('../common/mysql_connect.php');
                                        $query = 'select * from material WHERE material_type != "mp4" and class_id = '.$_SESSION['class_id'];
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            echo '<tr>';
                                            $filename = $row['material_name'];
                                            $add = $row['local_address'];
                                            echo "<td>
                                                        <form action=\"../common/download_material.php\" method=\"get\">
                                                        <input type='hidden' name=\"address\" value = '$add'>
                                                        <input type=\"submit\" value='$filename'>
                                                        </form>
                                                  </td>";
                                            echo "<td>".$row['material_type']."</td>";
                                            echo "<td>
                                                        <form action=\" ../common/delete.php\" method=\"get\">
                                                        <input type='hidden' name=\"address\" value = '$add'>
                                                        <input type=\"submit\" value=\"删除\">
                                                        </form>
                                                  </td>";
                                            echo '</tr>';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <div class="tab-pane fade" id="video">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>标题</th>
                                        <th>类型</th>
                                        <th>操作</th>
                                        <th>管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once('../common/mysql_connect.php');
                                    $query = 'select * from material WHERE material_type = "mp4" and class_id = '.$_SESSION['class_id'];
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($result))
                                    {
                                        echo '<tr>';
                                        $filename = $row['material_name'];
                                        $add = $row['local_address'];
                                        echo "<td>".$filename."</td>";
                                        echo "<td>".$row['material_type']."</td>";
                                        echo "<td><a target='_blank' href='../common/watch_video.php?addr=".$row['local_address']."'>观看视频</a> </td>";
                                        echo "<td>
                                                    <form action=\" ../common/delete.php\" method=\"get\">
                                                    <input type='hidden' name=\"address\" value = '$add'>
                                                    <input type=\"submit\" value=\"删除\">
                                                    </form>
                                              </td>";
                                        echo '</tr>';
                                    }
                                    mysqli_close($conn);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>上传课件</strong>
                    </div>
                    <div class="panel-body">
                        <form action="../common/upload_file.php" method="post" enctype="multipart/form-data">
                            <label for="file">课件文件名：</label>
                            <input type="text" placeholder="在这里输入课件名称" name = "tmpname"><br>
                            <input type="file" name="file" id="file"><br>
                            <button class="btn btn-primary" type="submit">提交</button>
                        </form>
                    </div>
                </div>
            </div>
<!--            <div class="col-lg-6">-->
<!--                <div class="panel panel-info">-->
<!--                    <div class="panel-heading">-->
<!--                        <strong>上传视频(目前仅支持mp4文件)</strong>-->
<!--                    </div>-->
<!--                    <div class="panel-body">-->
<!--                        <form action="../common/upload_file.php" method="post" enctype="multipart/form-data">-->
<!--                            <label for="file">视频文件名：</label>-->
<!--                            <input type="hidden" name = "isvideo" value ="yes">-->
<!--                            <input type="file" name="file" id="file"><br>-->
<!--                            <button class="btn btn-primary" type="submit">提交</button>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
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



