<?php
/**
 * Created by PhpStorm.
 * User: elliot
 * Date: 2018/12/22
 * Time: 下午9:55
 */
session_start();
require_once('../common/mysql_connect.php');
if(isset($_GET['course_id']) && isset($_GET['class_id'])) {
    $course_id = $_GET['course_id'];
    $class_id = $_GET['class_id'];
    $_SESSION['course_id'] = $course_id;
    $_SESSION['class_id'] = $class_id;
} else {
    $course_id = $_SESSION['course_id'];
    $class_id = $_SESSION['class_id'];
}
$flag = false;
$title = "";
$resume = "";
$deadline = "";
$file_name = "";
$method = "";
if(isset($_GET['homework_id'])) {
    $homework_id = $_GET['homework_id'];
    $query = "select * from tea_hw where homework_id=".$homework_id;
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==0) {
        header("homework_assignment.php");
    } else {
        $row=mysqli_fetch_assoc($result);
        $title = $row['title'];
        $resume = $row['homework_resume'];
        $deadline = date('Y-m-d\TH:i', strtotime($row['deadline']));
        $address = $row['address'];

        if($address==NULL) {
            $file_name = "无";
        } else {
            $names = explode('/',$address);
            $file_name = $names[sizeof($names)-1];

            $method = "../common/download.php?filename=";
            for($i=0;$i<count($names);++$i) {
                $method = $method.$names[$i];
                if($i<count($names)-1) {
                    $method=$method.'%2F';
                }
            }

        }
        $flag = true;
    }
}
require ("sidebar_tea.php");
?>
    <script>
        function checkboxOnclick(checkbox){
            if (checkbox.checked){
                if(!confirm('勾选将直接发布，无法编辑'))
                {
                    document.getElementById("checkbox").checked = false;
                } else {
                    document.getElementById("submit_btn").value = "确认发布";
                }
            } else {
                document.getElementById("submit_btn").value = "保存编辑";
            }
        }
        function getQueryString(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return decodeURI(r[2]);
            return null;
        }
        function Submit() {
            var re_up;
            if(document.getElementById("re_up").checked) {
                re_up = 1;
            } else {
                re_up = 0;
            }
            if(getQueryString("homework_id") == null) {
                document.getElementById('mainform').action = "post_hw_assign.php?action=create";
                // document.getElementById('mainform').submit();
            } else {
                document.getElementById('mainform').action = "post_hw_assign.php?action=edit&homework_id="+getQueryString("homework_id")+"&re_up="+re_up;
                // document.getElementById('mainform').submit();
            }
        }
        function checkboxOnclick2(checkbox){
            if (checkbox.checked){
                document.getElementById('file_div').style.display="";
            } else {
                document.getElementById('file_div').style.display="none";
            }
        }
        function load_history() {
            let title = "<?php echo $title ?>";
            let resume = "<?php echo $resume ?>";
            let deadline = "<?php echo $deadline ?>";
            document.getElementById("title").value = title;
            document.getElementById("resume").value = resume;
            document.getElementById("deadline").value = deadline;
        }
    </script>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p>布置作业</p>

                    </div>
                    <!-- /.panel-heading -->

                    <div class="panel-body">
                        <form id="mainform" role="form" method="post" action=" " enctype="multipart/form-data">
                            <label>标题</label>
                            <input name="title" id="title" type="text" class="form-control" maxlength="32" required="required"><br/>
                            <label>描述</label>
                            <textarea name="resume" id="resume" type="text" class="form-control" cols="" rows="5" style="vertical-align:top;outline:none;" maxlength="10000" required="required"></textarea><br>
                            <label>截止时间</label>
                            <input name="deadline" id="deadline" type="datetime-local" class="form-control" required="required"><br/>
                            <div id="re_up_div">
                                <label>更改上传文件</label>
                                <input type="checkbox" name="re_up" id="re_up" onchange="checkboxOnclick2(this)"  />
                                <?php
                                if($method=="") {
                                    echo "<label>&nbsp;&nbsp;&nbsp;已上传：<a>$file_name</a></label><br/><br/>";
                                } else {
                                    echo "<label>&nbsp;&nbsp;&nbsp;已上传：<a href=\"$method\">$file_name</a></label><br/><br/>";
                                }
                                ?>

                            </div>
                            <div id="file_div">
                                <label>上传文件（可选），支持类型：.docx,.doc,.zip,.pdf,.rar,.gz,.tar,.7z,.md,.sql,.txt,.ppt,.pptx</label>
                                <input type="file" name="file" id="file" accept=".docx,.doc,.zip,.pdf,.rar,.gz,.tar,.7z,.md,.sql,.txt,.ppt,.pptx" class="form-control"/><br/>
                            </div>
                            <label>直接发布</label>
                            <input type="checkbox" name="checkbox" id="checkbox" onchange="checkboxOnclick(this)" /><br/><br/>
                            <center><input type="submit" class="btn btn-primary" name="submit_btn" id="submit_btn" value="保存编辑" onclick="Submit()"/></center>
                        </form>
                    </div>
                    <?php
                    if($flag) {
                        echo "<script type='text/javascript'>load_history();</script>";
                    }
                    ?>
                    <script>
                        if(getQueryString("homework_id") == null) {
                            document.getElementById('file_div').style.display="";
                            document.getElementById('re_up_div').style.display="none";
                        } else {
                            document.getElementById('file_div').style.display="none";
                            document.getElementById('re_up_div').style.display="";
                        }
                    </script>

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

