<?php
session_start();
require_once('../common/mysql_connect.php');
$course_id = $_SESSION['course_id'];
$class_id = $_SESSION['class_id'];

if($_POST) {
  // $query = 'Insert into student_class_group VALUES('.$_SESSION['class_id'].',,'.$_POST['group_id'].')';
	if(empty($_POST['group_id']) || empty($_POST['student_id']))
	{
	    echo '<script>
	            alert("输入不能为空");
	            setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
	          </script>';
	    return;
	}

  $query = 'select * from student_class_group WHERE class_id = '.$class_id.' AND group_id = '.$_POST['group_id'];
  $result = mysqli_query($conn, $query);
  if(@mysqli_num_rows($result) == 1){
      echo '<script>
              alert("小组已存在");
              setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
              </script>';
      return;
  }

  $query = "select distinct people_id from people_type_class WHERE people_id = ".$_POST['student_id']." AND type = 'T' ";
  $result = mysqli_query($conn, $query);
  if(@mysqli_num_rows($result) == 1){
      echo '<script>
              alert("老师不能加入小组");
              setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
              </script>';
      return;
  }

  $query = 'select * from people WHERE people_id = '.$_POST['student_id'];
  $result = mysqli_query($conn, $query);
  if(@mysqli_num_rows($result) == 0)
  {
      echo '<script>
              alert("学号不存在");
              // setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
            </script>';
      return;
  }
  
  $query = 'select * from student_class_group WHERE class_id = '.$class_id.' AND student_id = '.$_POST['student_id'];
  $result = mysqli_query($conn, $query);
  if(@mysqli_num_rows($result) == 1){
      echo '<script>
              alert("该学生已经拥有小组");
              setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
              </script>';
      return;
  }

  $query = 'Insert into student_class_group VALUES(1,'.$_POST["student_id"].','.$_POST["group_id"].')';
  $result = mysqli_query($conn, $query);
  echo '<script>
        alert("添加成功");
        setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
      </script>';
  mysqli_close($conn);
  return;
}

?>

<form id="form" action="" method="post">
<input type="hidden" name="group_id" id="group_id" value="">
<input type="hidden" name="student_id" id="student_id" value="">
</form>
<script>
  var str=window.prompt('请输入组号(如 1,2,3,...等) :');
  if(str!=null ){
  var str2=window.prompt('请输入组员学号:');
 	if(str2 == null){
 		setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
 	}
  }
  else{
  	setTimeout("window.location.href=\'../teacher/group_list.php\'", 0);
  }
  document.getElementById("group_id").value =str;
  document.getElementById("student_id").value =str2;  
  document.getElementById("form").submit();
</script>


