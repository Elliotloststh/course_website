<?php include "../common/mysql_connect.php";
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/12/26
 * Time: 19:04
 */

$type = $_POST["type"];
$table = "";
$sql = "";
$current_date = date('Y-m-d', time());
switch ($type) {
    case "notice":
        $content = $_POST["notice_content"];
        $sql = "insert into website_notice(content,pub_date) VALUES ('$content','$current_date')";
        break;
    case "message":
        $content = $_POST["content"];
        $name = $_POST["name"];
        $sql = "insert into message_board(content,pub_date,name) VALUES ('$content','$current_date','$name')";
        break;
    case "link":
        $table = "link";
        $content = $_POST["content"];
        $sql = "insert into link(content,pub_date) VALUES ('$content','$current_date')";
        break;
    case "curriculum":
        $table = "course";
        $name = $_POST["name"];
        $intro = $_POST["intro"];
        $sql = "insert into course(course_name,introduction) VALUES ('$name','$intro')";
        break;
    case "account":
        $res = mysqli_query($conn, "select max(people_id) from people");
        $arr = @mysqli_fetch_row($res);
        $new_id = $arr[0] + 1;//取出来的表有2列

        $atype = $_POST["atype"];
        $user = $_POST["user"];
        $pswd = $_POST["pswd"];
        $name = $_POST["name"];
        $number = $_POST["number"];
        $telephone = $_POST["telephone"];
        $email = $_POST["email"];
        $intro = $_POST["intro"];
        $sql = "insert into people(people_id, usr_name, name, pswd, stu_number, telephone, email, introduction) VALUES ('$new_id','$user','$name','$pswd','$number','$telephone', '$email','$intro')";
        if ($result =mysqli_query($conn, $sql)) {
            $sql = "insert into people_type_class(people_id, type, class_id) VALUES ('$new_id','$atype',1)";
        }
        break;

}


if ($result = mysqli_query($conn, $sql)) {
    echo "200";
} else {
    echo "502";
}