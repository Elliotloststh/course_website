<?php
require_once('../common/mysql_connect.php');
if(empty($_POST['group_id']))
{
    echo '<script>
            alert("输入不能为空，重新输入");
            setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
          </script>';
    return;
}

$group_id = $_POST['group_id'];
$query = "Insert into student_class_group VALUES(1,null,'$group_id')";
mysqli_query($conn, $query);
mysqli_close($conn);
echo '<script>
    alert("添加成功");
    setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
    </script>';
    return;
?>
