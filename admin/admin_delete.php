<?php include "../common/mysql_connect.php";
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
if ($type != "forum") {
    switch ($type) {
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
        case "curriculum":
            $table = "course";
            $primaryKey = "course_id";
            break;
        case "account":
            $table = "people";
            $primaryKey = "people_id";
            break;
    }

//$sql = "delete from website_notice where notice_id='{$id}'";
    $sql = "delete from $table where $primaryKey='$id'";// '/$var is incorrect


} else if ($type == "forum") {
    $table = "post";
//    $arr = explode('*', $id);
//    $post_id = $arr[0];
//    $post_level = $arr[1];
    list($post_id,$post_level) = explode("|",$id);
//    error_log(print_r((string)$id), true);
//    error_log(print_r(str_split('{',(string)$id), true));
    $sql = "delete from $table where post_id = '$post_id' and post_level = '$post_level'";
}

if ($result = mysqli_query($conn, $sql)) {
    echo "200";
} else {
    echo "502";
}


