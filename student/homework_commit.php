<?php
session_start();
require_once('../common/mysql_connect.php');
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

function msg($deadline) {
    date_default_timezone_set('PRC');
    $current_t = time();
    $deadline_t = strtotime($deadline);
    if($current_t > $deadline_t) {
        echo "<script>document.getElementById('msg').style.display=\"\";</script>";
        echo "<script>document.getElementById('submit_btn').disabled=true;</script>";
    }
}
require ("sidebar_stu.php");
?>
    <script>
        function getQueryString(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return decodeURI(r[2]);
            return null;
        }
        function Submit() {
            var timestamp = Date.parse(new Date()).toString();
            timestamp = timestamp.substr(0,10);
            var deadline = "<?php echo $deadline_t?>";
            deadline = deadline.toString();
            // document.getElementById('submit_btn').disabled=true;
            if(timestamp > deadline) {
                document.getElementById('msg').style.display="";
                document.getElementById('submit_btn').disabled=true;
            }
            if(document.getElementById('submit_btn').disabled==false) {
                document.getElementById('mainform').action = "post_homework_commit.php?homework_id="+getQueryString("homework_id");
                // document.getElementById('mainform').submit();
            }

        }
    </script>

    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong><h4><?php echo $title; ?></h4></strong>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-warning" style="display: none" name="msg" id="msg">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            作业已过期，无法提交
                        </div>

                        <div class="table-responsive">
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
                            <hr>
                            <form id="mainform" role="form" method="post" action=" " enctype="multipart/form-data">
                                <div id="file_div">
                                    <label>&nbsp;&nbsp;上传作业（重复提交将覆盖&nbsp;&nbsp;&nbsp;已上传：<a href="<?php echo $stu_method;?>"><?php echo $stu_file_name;?></a>）</label>
                                    <input type="file" required='required' name="file" id="file" accept=".docx,.doc,.zip,.pdf,.rar,.gz,.tar,.7z,.md,.sql,.txt,.ppt,.pptx" class="form-control"/><br/>
                                </div>
                                <center><input type="submit" class="btn btn-primary" name="submit_btn" id="submit_btn" value="提交作业" onclick="Submit()"/></center>
                            </form>
                            <?php
                                msg($deadline);
                            ?>
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






