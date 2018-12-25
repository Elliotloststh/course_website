<?php
session_destroy();

if(isset($_GET['type']))
{
    header('Location: ./common/home.php?type=youke');
    return;
}

if(empty($_POST['username']) || empty($_POST['password']))
{
    echo '<script>
            alert("输入不能为空，重新输入");
            setTimeout("window.location.href=\'login.html\'", 0);
          </script>';
    return;
}

require_once('./common/mysql_connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
$query = 'select * from people WHERE usr_name = "'.$username.'"';
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0)
{
    echo '<script>
            alert("用户名不存在");
            setTimeout("window.location.href=\'login.html\'", 0);
          </script>';
    return;
}

while($row = mysqli_fetch_assoc($result))
{
    $real_password = $row['pswd'];
    $people_id = $row['people_id'];
    $name = $row['name'];
    $stu_num = $row['stu_number'];
}

if(md5($password) != $real_password)
{
    echo '<script>
            alert("密码错误");
            setTimeout("window.location.href=\'login.html\'", 0);
          </script>';
    return;
}

session_start();
$_SESSION['user_type'] = "user";
$_SESSION['people_id'] = $people_id;
$_SESSION['name'] = $name;
$_SESSION['stu_num'] = $stu_num;

mysqli_close($conn);
header("Location: ./common/home.php");
