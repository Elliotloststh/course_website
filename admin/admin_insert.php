<?php include"../common/mysql_connect.php";
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/12/26
 * Time: 19:04
 */

$type = $_POST["type"];
$table = "";
$sql ="";
$current_date = date('Y-m-d',time());
switch ($type){
    case "notice":
        $table = "website_notice";
        $content = $_POST["notice_content"];
        $sql = "insert into website_notice(content,pub_date) VALUES ('$content','$current_date')";
        break;
    case "message":
        $table = "message_board";
        $content = $_POST["content"];
        $name = $_POST["name"];
        $sql = "insert into message_board(content,pub_date,name) VALUES ('$content','$current_date','$name')";
        break;

}


if($result = mysqli_query($conn,$sql)){
    echo "200";
}else{
    echo "502";
}