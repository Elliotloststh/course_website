<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/17
 * Time: 10:23
 */

$name = $_POST['name'];
$code = $_POST['recode'];

require_once('../common/mysql_connect.php');

$query = 'select * from class WHERE register_code = "'.$code.'"';
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0)
{
    echo "<script type=\"text/javascript\">
            alert(\"无效注册码，请重新输入\");
            setTimeout(\"window.location.href='gerenjianjie_stu.php'\",100);
          </script>";
    return;
}

$class_id = mysqli_fetch_assoc($result)['class_id'];
$people_id = 1;

//检验是否已经注册过该课程
$query = 'select * from people_type_class WHERE class_id = '.$class_id.' and people_id = '.$people_id;
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) != 0)
{
    echo "<script type=\"text/javascript\">
            alert(\"已注册该课程\");
            setTimeout(\"window.location.href='gerenjianjie_stu.php'\",100);
          </script>";
    return;
}


$query = 'insert into people_type_class VALUES ('.$people_id.', "S", '.$class_id.')';
mysqli_query($conn, $query);

echo "<script type=\"text/javascript\">
            alert(\"绑定课程成功！\");
            setTimeout(\"window.location.href='gerenjianjie_stu.php'\",100);
          </script>";
