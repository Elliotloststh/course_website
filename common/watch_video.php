<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/18
 * Time: 21:10
 */
$addr = $_GET['addr'];
?>

<!DOCTYPE HTML>
<html>
<body>

<center>
<video src="<?php echo $addr;?>" controls="controls" height="630">
    your browser does not support the video tag
</video>
</center>
</body>
</html>



