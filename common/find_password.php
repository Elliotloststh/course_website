<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/21
 * Time: 21:29
 */

require_once('mysql_connect.php');
if (isset($_REQUEST['authcode'])) {
    session_start();
    if (strtolower($_REQUEST['authcode'])==$_SESSION['authcode']) {//strtolower转化为小写的函数
        $tmp_password = '123';
        $query = "update people set pswd = '".md5($tmp_password)."' where name = '".$_POST['name']."' and stu_number = '".$_POST['stu_num']."'";
        mysqli_query($conn, $query);

        echo '<script>
                alert("密码已重置为\'123\'，请尽快登录修改密码");
                setTimeout("window.location.href=\'../login.html\'", 0);
              </script>';
        return;
    }
    else{
        echo '<script>
                alert("验证码错误，请再次输入");
                setTimeout("window.location.href=\'find_password.php\'", 0);
              </script>';
        return;
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>密码找回</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <strong>找回密码</strong>
        </div>
        <div class="panel-body">
            <form method="post" action="./find_password.php" role="form">
                <div class="form-group">
                    <p>验证码图片: <img src="code.php" onClick="this.src='code.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/> 点击图片可更换验证码 </p>
                    <label>输入验证码</label>
                    <input class="form-control" name="authcode" type="text" style="width: 50%"><br/>
                    <label>输入姓名</label>
                    <input class="form-control" name="name" type="text" style="width: 50%"><br/>
                    <label>学工号</label>
                    <input class="form-control" name="stu_num" type="text" style="width: 50%"><br/>
                    <button class="btn btn-primary" type="submit">提交</button>
                </div>
            </form>
        </div>
    </div>

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
