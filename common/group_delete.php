<?php
require_once('mysql_connect.php');
$query = 'delete from student_class_group WHERE class_id = 1 AND group_id = '.$_GET['group_id'];
mysqli_query($conn, $query);
echo '<script>
                alert("删除成功");
                setTimeout("window.location.href=\'../teacher/group_manage.php\'", 0);
              </script>';
              return;
mysqli_close($conn);
?>
