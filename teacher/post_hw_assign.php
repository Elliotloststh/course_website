<?php
session_start();
require_once('../common/mysql_connect.php');
$class_id = $_SESSION['class_id'];
if($_GET['action'] == 'create') {
    $title = $_POST['title'];
    $resume = $_POST['resume'];
    $deadline = date("Y-m-d H:i:s",strtotime($_POST['deadline']));
    if (isset($_POST['checkbox'])) {
        $state = 1;
    } else {
        $state = 0;
    }
    if(!empty($_FILES['file']['name'])){
        $file = $_FILES['file'];
        $fileName=$file['name'];
        $address = "../../Documents/tea_hw/".$fileName;
        move_uploaded_file($file['tmp_name'], $address);
        $insert = "INSERT INTO `tea_hw` VALUES ('$class_id', NULL,'$title', '$resume', '$deadline', '$state', '$address')";
        mysqli_query($conn, $insert);
        $id = mysqli_insert_id($conn);
    }else{
        $insert = "INSERT INTO `tea_hw` VALUES ('$class_id', NULL,'$title', '$resume', '$deadline', '$state', NULL)";
        mysqli_query($conn, $insert);
        $id = mysqli_insert_id($conn);
    }
    $dir = iconv("UTF-8", "GBK", "../../Documents/stu_hw/homework$id");
    if (!file_exists($dir)){
        mkdir ($dir,0777,true);
    }
} else {
    $title = $_POST['title'];
    $resume = $_POST['resume'];
    $deadline = date("Y-m-d H:i:s",strtotime($_POST['deadline']));
    if (isset($_POST['checkbox'])) {
        $state = 1;
    } else {
        $state = 0;
    }
    $homework_id = $_GET['homework_id'];
    if($_GET['re_up']==1) {
        $query = "select address from tea_hw where homework_id = '$homework_id'";
        $result = mysqli_query($conn, $query);
        $row=mysqli_fetch_assoc($result);
        if($row['address']!=NULL) {
            $myFile = $row['address'];
//            $fh = fopen($myFile, 'w') or die("can't open file");
//            fclose($fh);
            unlink($myFile);
        }
        if(!empty($_FILES['file']['name'])){
            $file = $_FILES['file'];
            $fileName=$file['name'];
            $address = "../../Documents/tea_hw/".$fileName;
            move_uploaded_file($file['tmp_name'], $address);
            $update = "UPDATE `tea_hw` SET `title` = '$title', `homework_resume` = '$resume', `deadline` = '$deadline',`state` = '$state', `address` = '$address' WHERE `tea_hw`.`homework_id` = '$homework_id'";
            mysqli_query($conn, $update);
        }else{
            $update = "UPDATE `tea_hw` SET `title` = '$title', `homework_resume` = '$resume', `deadline` = '$deadline',`state` = '$state', `address` = NULL WHERE `tea_hw`.`homework_id` = '$homework_id'";
            mysqli_query($conn, $update);
        }
    } else {
        $update = "UPDATE `tea_hw` SET `title` = '$title', `homework_resume` = '$resume', `deadline` = '$deadline',`state` = '$state' WHERE `tea_hw`.`homework_id` = '$homework_id'";
        mysqli_query($conn, $update);
    }
}

mysqli_close($conn);
header("Location: homework.php");
