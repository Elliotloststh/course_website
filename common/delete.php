<?php
/**
 * Created by PhpStorm.
 * User: wallance
 * Date: 2018/12/26
 * Time: 2:11 PM
 */

$file_path=$_GET["address"];
//首先要判断给定的文件存在与否
if(!file_exists($file_path))
{
    echo "没有该文件";
    return ;
}

require_once('mysql_connect.php');

$exec="delete from material where local_address = '$file_path'";
$result=mysqli_query($conn, $exec);
if($result) echo "数据库信息删除成功<br>";
else echo "数据库信息删除失败<br>";
mysqli_close($conn);

unlink($file_path);
echo "目录文件已删除<br>";