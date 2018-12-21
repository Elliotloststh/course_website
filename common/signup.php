<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/16
 * Time: 21:56
 */

require_once('mysql_connect.php');
if(isset($_POST['password'])) {
    if ($_POST['password'] != $_POST['another_password']) {
        echo '<script>
                alert("两次输入密码不一致，请重新输入");
                setTimeout("window.location.href=\'signup.php\'", 0);
              </script>';
        return;
    }

    $query = 'select * from people WHERE usr_name = '.$_POST['account'];
    $result = mysqli_query($conn, $query);
    if(@mysqli_num_rows($result) == 1)
    {
        echo '<script>
                alert("该账号已被注册");
                setTimeout("window.location.href=\'signup.php\'", 0);
              </script>';
        return;
    }

    $query = "select max(people_id) as 'value' from people";
    $result = mysqli_query($conn, $query);
    $new_people_id = mysqli_fetch_assoc($result)['value'] + 1;
    $account = $_POST['account'];
    $password = md5($_POST['password']);
    $name = $_POST['name'];
    $stu_num = $_POST['stu_num'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $intro = $_POST['intro'];
    $query = "insert into people VALUES ($new_people_id, '$account', '$name', '$password', '$stu_num', '$phone', '$email', '$intro')";
    mysqli_query($conn, $query);

    echo '<script>
                alert("注册成功");
                setTimeout("window.location.href=\'../login.html\'", 0);
              </script>';
    return;
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

    <title>注册</title>

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
            <strong>注册界面</strong>
        </div>
        <div class="panel-body">
            <form role="form" method="post" action="signup.php">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>账号</label>
                            <input class="form-control" placeholder="account" name="account">
                        </div>
                        <div class="form-group">
                            <label>密码</label>
                            <input class="form-control" placeholder="password" type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>再次输入密码</label>
                            <input class="form-control" placeholder="another-password" type="password" name="another_password">
                        </div>
                        <div class="form-group">
                            <label>姓名</label>
                            <input class="form-control" placeholder="name" name="name">
                        </div>
                        <div class="form-group">
                            <label>学号</label>
                            <input class="form-control" placeholder="stu_num" name="stu_num">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>电话</label>
                            <input class="form-control" placeholder="phone" type="tel" name="phone">
                        </div>
                        <div class="form-group">
                            <label>注册邮箱</label>
                            <input class="form-control" placeholder="email" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label>个人介绍</label>
                            <textarea class="form-control" rows="7" name="intro"></textarea>
                        </div>
                    </div>
                </div>
                <center>
                    <button class="btn btn-primary" type="submit">确认注册</button>
                    <button class="btn btn-danger" onclick="window.location.href='../login.html'">取消</button>
                </center>
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