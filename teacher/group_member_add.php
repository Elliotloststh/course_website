<?php
session_start();
require_once('../common/mysql_connect.php');
$course_id = $_SESSION['course_id'];
$class_id = $_SESSION['class_id'];

if($_POST) {
  if(empty($_POST['stu_number']))
  {
      echo '<script>
              alert("输入不能为空");
              setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
            </script>';
      return;
  }

  $query = "select * from people,people_type_class WHERE people_type_class.people_id = people.people_id AND people_type_class.class_id = ".$_SESSION['class_id']." AND people.stu_number = ".$_POST['stu_number']." AND people_type_class.type = 'T'";
  $result = mysqli_query($conn, $query);
  if(@mysqli_num_rows($result) == 1){
      echo '<script>
              alert("老师不能加入小组");
              setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
              </script>';
      return;
  }

  $query = 'select * from student_class_group,people WHERE class_id = '.$_SESSION['class_id'].' AND student_class_group.student_id = people.people_id AND stu_number = '.$_POST['stu_number'];
  $result = mysqli_query($conn, $query);
  if(@mysqli_num_rows($result) == 1){
      echo '<script>
              alert("该学生已经拥有小组");
              setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
              </script>';
      return;
  }
  

  $query = 'select * from people WHERE stu_number = '.$_POST['stu_number'];
  $result = mysqli_query($conn, $query);
  if(@mysqli_num_rows($result) == 0)
  {
      echo '<script>
              alert("学号不存在");
              setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
            </script>';
      return;
  }

  $query = 'Insert into student_class_group (class_id,student_id,group_id) 
Select '.$_SESSION['class_id'].',people_id,'.$_GET['group_id'].' from people where stu_number = '.$_POST['stu_number'];
  mysqli_query($conn, $query);
  echo '<script>
        setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
        alert("添加成功");
      </script>';
  mysqli_close($conn);
  return;
}
?>

<form id="form" action="" method="post">
<input type="hidden" name="stu_number" id="stu_number" value="">
</form>
<script>
  var str=window.prompt('请输入学生学号 :');
  document.getElementById("stu_number").value =str;
  document.getElementById("form").submit();
</script>

?>

