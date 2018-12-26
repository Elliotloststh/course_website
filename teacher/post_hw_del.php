<?php
function delDirAndFile( $dirName )
{
    if ( $handle = opendir( "$dirName" ) ) {
        while ( false !== ( $item = readdir( $handle ) ) ) {
            if ( $item != "." && $item != ".." ) {
                if ( is_dir( "$dirName/$item" ) ) {
                    delDirAndFile( "$dirName/$item");
                } else {
                    unlink("$dirName/$item");
                }
            }
        }
        closedir( $handle );
        rmdir( $dirName );
    }
}

session_start();
require_once('../common/mysql_connect.php');
if(isset($_SESSION['people_id']) && isset($_SESSION['class_id']) && isset($_GET['homework_id'])) {
    $homework_id = $_GET['homework_id'];
    $people_id = $_SESSION['people_id'];
    $class_id = $_SESSION['class_id'];
    $query0 = "select * from tea_hw WHERE homework_id = $homework_id and class_id = $class_id";
    $result0 = mysqli_query($conn, $query0);
    $query = "select * from people_type_class WHERE people_id = $people_id and type = 'T' and class_id = $class_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==0 || mysqli_num_rows($result0)==0) {
        header('HTTP/1.1 403 Forbidden');
    } else {
        $row=mysqli_fetch_assoc($result0);
        if($row['address']!=NULL) {
            $myFile = $row['address'];
            unlink($myFile);
        }
        $delete = "delete from tea_hw where homework_id = $homework_id";
        $result = mysqli_query($conn, $delete);
        delDirAndFile("../../Documents/stu_hw/homework$homework_id");
        header("Location: homework.php");
    }
} else {
    header('HTTP/1.1 403 Forbidden');
}


