<?php
/**
 * Created by PhpStorm.
 * User: elliot
 * Date: 2018/12/25
 * Time: 上午12:03
 */
session_start();
require_once('../common/mysql_connect.php');
$student_id = $_SESSION['people_id'];
$homework_id = $_GET['homework_id'];
$query = "select local_address from stu_hw where homework_id = $homework_id and student_id = $student_id";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
if($num==0) {
    $file = $_FILES['file'];
    $fileName=$file['name'];
    $address = "../../Documents/stu_hw/homework$homework_id/$fileName";
    move_uploaded_file($file['tmp_name'], $address);
    $insert = "INSERT INTO `stu_hw` VALUES (NULL, '$homework_id','$student_id', NULL, '$fileName', '1', '$address')";
    mysqli_query($conn, $insert);
} else {
    $row=mysqli_fetch_assoc($result);
    if($row['local_address']!=NULL) {
        $myFile = $row['local_address'];
        unlink($myFile);
    }
    $file = $_FILES['file'];
    $fileName=$file['name'];
    $address = "../../Documents/stu_hw/homework$homework_id/$fileName";
    move_uploaded_file($file['tmp_name'], $address);
    $update = "UPDATE `stu_hw` SET `hw_name` = '$fileName', `local_address` = '$address' where homework_id = $homework_id and student_id = $student_id";
    mysqli_query($conn, $update);
}

mysqli_close($conn);
header("Location: ZaiXianZuoYe_stu.php");

