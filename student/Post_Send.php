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
    $post_id = $_SESSION['post_id'];
    $people_id = $_SESSION['people_id'];
    $class_id = $_SESSION['class_id'];

    $query = 'select * from post where post_id = ' . $post_id . ' order by post_level desc;';
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_row($result);
    if(isset($_GET['reply_level'])) $reply_level = $_GET['reply_level'];
    else $reply_level = 0;
    $query = 'insert into post values(' . $class_id . ',' . $post_id . ',"' . $message . '",' . ($row[3] + 1) . ',' . $people_id . ',0,' . $reply_level . ');';
    mysqli_query($conn,$query);
    header("Refresh:0;url=Post.php?post_id=" . $post_id);
}
?>

