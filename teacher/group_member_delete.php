<?php
session_start();
require_once('../common/mysql_connect.php');
$class_id = $_SESSION['class_id'];


$query = 'delete from student_class_group WHERE class_id = '.$class_id.' AND student_id = '.$_GET['student_id'];
mysqli_query($conn, $query);
echo '<script>
                alert("删除成功");
                setTimeout("window.location.href=\'../teacher/group_manage.php\'", 0);
              </script>';
              return;
mysqli_close($conn);
?>
