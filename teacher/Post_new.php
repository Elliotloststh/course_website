<?php
/**
 * Created by PhpStorm.
 * User: Lucifer
 * Date: 2018/12/23
 * Time: 22:55
 */

session_start();
require_once('../common/mysql_connect.php');

if (isset($_GET['send_message']))
{
    $message = $_GET['send_message'];
    $people_id = $_SESSION['people_id'];
    $class_id = $_SESSION['class_id'];
    $post_id = 1;

    $query = 'select * from post order by post_id desc;';
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_row($result);
    $post_id += $row[1];
    if($result != null)
    {
        $query = 'insert into post values(' . $class_id . ',' . $post_id . ',"' . $message . '",1,' . $people_id . ',0,0);';
        mysqli_query($conn,$query);
        header("Refresh:0;url=Post.php?post_id=" . $post_id);
    }
}
?>

