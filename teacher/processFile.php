<?php
    header("Content-type: application/octet-stream");

    //处理中文文件名
    $ua = $_SERVER["HTTP_USER_AGENT"];
    $encoded_filename = urlencode($_GET['filename']);
    $encoded_filename = str_replace("+", "%20", $encoded_filename);
	
	$filePath = $_GET['filename'];
	$arr = explode('/',$filePath);

	$fileName = $arr[2];
    if (preg_match("/MSIE/", $ua)) {
		header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
    } else if (preg_match("/Firefox/", $ua)) {
		header("Content-Disposition: attachment; filename*=\"utf8''" . $_GET['filename'] . '"');
    } else {
		header('Content-Disposition: attachment; filename="' . $fileName . '"');
    }
	header("Content-Length: ". filesize($_GET['filename']));
    readfile($_GET['filename']);
?>