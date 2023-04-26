<?php
header('Access-Control-Allow-Origin:*');
header('Allow-Access-Control-Method:POST,GET');

$request=json_decode($_POST['data']);

$obj = new stdClass();
$obj->key = $request->name;
echo json_encode($obj);
?>