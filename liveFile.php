<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: POST, GET');
$filename = $_GET['data'];
$publicFolderPath = 'photos/';  // Replace with the actual path to your public folder  // Replace with the name of the file you want to make available
$filePath = $publicFolderPath . $filename;
$mime = mime_content_type($filePath);
header('Content-Type: ' . $mime);
readfile($filePath);
?>