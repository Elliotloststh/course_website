<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/19
 * Time: 0:27
 */
session_start();
unset($_SESSION['people_id']);
unset($_SESSION['name']);
unset($_SESSION['user_type']);
unset($_SESSION['course_id']);
unset($_SESSION['class_id']);
header("Location: ../login.html");