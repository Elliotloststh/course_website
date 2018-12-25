<?php
require_once('../common/mysql_connect.php');

if($_POST) {
  // $query = 'Insert into student_class_group VALUES('.$_SESSION['class_id'].','.$_POST['student_id'].','.$_SESSION['group_id'].')';
  $query = 'Insert into student_class_group VALUES(1,'.$_POST["student_id"].','.$_GET['group_id'].')';
  mysqli_query($conn, $query);

  echo '<script>
        alert("添加成功");
        setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
      </script>';
  mysqli_close($conn);
  return;
}
?>

<form id="form" action="" method="post">
<input type="hidden" name="student_id" id="student_id" value="">
</form>
<script>
  var str=window.prompt('请输入学生学号 :');
  document.getElementById("student_id").value =str;
  document.getElementById("form").submit();
</script>

?>

