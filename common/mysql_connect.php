<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/15
 * Time: 21:29
 */

DEFINE('DB_USER', 'course_web');
DEFINE('DB_PASSWORD', '123456');
DEFINE('DB_HOST', '39.108.218.249');
DEFINE('DB_NAME', 'course_website');
$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not to MySQL:'.mysqli_connect_error());
?>