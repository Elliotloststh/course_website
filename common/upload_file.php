<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/18
 * Time: 10:17
 */
$name = $_FILES["file"]["name"];
$ftype = substr(strrchr($name, "."), 1);
if($ftype == "mp4")
{
    $address = "../video/";
}
else $address="../material/";
$address = $address.$name;
$fname = $_POST["tmpname"];
if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
else
    {
        echo "Upload: " . $fname . "<br />";
        echo "Type: " .$ftype. "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("../material/" . $_FILES["file"]["name"]))
        {
            echo $fname . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], $address);
            echo "文件" . $fname."上传成功"."<br />";
        }
    }

require_once('mysql_connect.php');
session_start();

$class_id=$_SESSION['class_id'];

$exec="insert into material values($class_id,'$fname','$ftype','$address')";
$result=mysqli_query($conn, $exec);
if($result) echo "上传文件信息已添加到数据表中<br>";
else echo "上传文件信息没有添加进数据表。<br>";
mysqli_close($conn);


