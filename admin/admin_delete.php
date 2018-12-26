<?php include"../common/mysql_connect.php";
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/12/26
 * Time: 19:04
 */
$type = $_POST["type"];
$id = $_POST["id"];
$table;
$primaryKey;
switch ($type){
    case "notice":
        $table = "website_notice";
        $primaryKey = "notice_id";
        break;
    case "message":
        $table = "message_board";
        $primaryKey = "message_id";
        break;
    case "link":
        $table = "link";
        $primaryKey = "id";
        break;
    case "forum":
        $table = "post";
        $primaryKey ="id";
        break;
    case "curriculum":
        $table = "course";
        $primaryKey = "course_id";
        break;
}

//$sql = "delete from website_notice where notice_id='{$id}'";
$sql = "delete from $table where $primaryKey='$id'";// '/$var is incorrect
if($result = mysqli_query($conn,$sql)){
    echo "200";
}else{
    echo "502";
}


