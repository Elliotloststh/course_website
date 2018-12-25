<?php
$address = $_GET['filename'];
$names = explode('/',$address);

$encoded_filename = $names[count($names)-1];

$encoded_filename = str_replace("+", "%20", $encoded_filename);
$encoded_filename = urlencode($encoded_filename);

if(file_exists($address)) {
    $file=fopen($address,"r");

    header("Content-type:text/html;charset=utf-8");

    header('Content-type: application/octet-stream');

    header('Accept-Ranges: bytes');

    header('Accept-Length: '.filesize($address));

    header("Content-Disposition: attachment;filename=\"$encoded_filename\"");

    fclose ( $file );

    exit ();
}


