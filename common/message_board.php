<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/16
 * Time: 12:37
 */

require_once('mysql_connect.php');
session_start();
if(isset($_POST['message']) && !empty($_POST['message']))
{
    $content = $_POST['message'];
    $date = date("Y-m-d");
    $name = $_SESSION['name'];
    $sql = 'select * from message_board';
    $result = mysqli_query($conn, $sql);
    $new_id = mysqli_num_rows($result) + 1;
    $sql = 'insert into message_board VALUES ('.$new_id.', "'.$content.'", "'.$date.'", "'.$name.'")';

    mysqli_query($conn, $sql);
}
require("sidebar_home.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>网站留言板</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>留言内容</th>
                                <th>留言者</th>
                                <th>留言时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once('mysql_connect.php');
                            $query = 'select * from message_board ORDER BY pub_date DESC';
                            $result = mysqli_query($conn, $query);
                            $count = 1;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo '<tr>';
                                echo '<td>'.($count++).'</td>';
                                echo '<td>'.$row['content'].'</td>';
                                echo '<td>'.$row['name'].'</td>';
                                echo '<td>'.$row['pub_date'].'</td>';
                                echo '</tr>';
                            }
                            mysqli_close($conn);
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>我要留言</h4>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="message_board.php">
                            <div class="form-group">
                                <label>留言内容</label>
                                <textarea class="form-control" rows="4" name="message" placeholder="message"></textarea>
                            </div>
                            <center>
                                <button class="btn btn-success" type="submit">确认</button>
                                <button class="btn btn-default" type="reset">取消</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
