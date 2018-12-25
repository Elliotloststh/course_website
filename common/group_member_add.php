<?php
require_once('mysql_connect.php');
echo '<script language="javascript">
		<!--
               	student_id = prompt("请输入组号");
                if (student_id != null){
                	alert("添加成功");
                }
                else{
                	alert("取消操作");
                }
         //-->
              </script>';

$query = 'Insert into student_class_group VALUES(1,'.$student_id','.$_GET[group_id]')';
mysqli_query($conn, $query);
echo '<script>
                alert("删除成功");
                setTimeout("window.location.href=\'../teacher/group_manage.php\'", 0);
              </script>';
mysqli_close($conn);
?>
