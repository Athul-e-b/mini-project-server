<?php
include_once("services.php");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: POST, GET');

$request=json_decode($_POST['body']); 
$obj = new stdClass();

$mark = json_encode($request->marks);
$sql = "UPDATE `details` SET `mark`='$mark' WHERE `std_id`='$request->id'";

if(updateDetails($sql,$request->id,'details')){
    $obj->message = 'Details updated successfully';
    $obj->status = true;
    echo json_encode($obj);
}else{
    $obj->message = 'Cant update details retry';
    $obj->status = false;
    echo json_encode($obj); 
}
?>