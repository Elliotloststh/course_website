<?php
session_start();
require_once('../common/mysql_connect.php');
$course_id = $_SESSION['course_id'];
$class_id = $_SESSION['class_id'];

$query = 'delete from student_class_group WHERE class_id = '.$class_id.' AND group_id = '.$_GET['group_id'];
mysqli_query($conn, $query);
echo '<script>
                alert("删除成功");
                setTimeout("window.location.href=\'../teacher/group_manage.php\'", 0);
              </script>';
              return;
mysqli_close($conn);
?>
