<?php
include_once("services.php");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: POST, GET');

$request = json_decode($_POST['body']); 
$obj = new stdClass();

if($request->operation == 'get'){
 if(sizeof(checkUser($request->id)) == 0){
    $data = getDetails("SELECT * FROM `users` WHERE id='$request->id'");
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $insertSql = "INSERT INTO details (`std_id`, `name`, `phone`, `email`) VALUES ('$id','$name','$phone','$email')";  
       if(insertData($insertSql)){ 
        $obj->data = $data;
        $obj->status = false;
        echo json_encode($obj);
      }else{
        $obj->data = [];
        $obj->status = false;
        echo json_encode($obj);
      }
 }else{
    $data = getDetails("SELECT * FROM `details` WHERE std_id='$request->id'");
    $obj->data = $data;
    $obj->status = true;
    echo json_encode($obj);
 }

}elseif($request->operation != 'get'){
  $data = getDetails("SELECT * FROM `details` WHERE $request->operation='$request->id'");
  $obj->data = $data;
  $obj->status = true;
  echo json_encode($obj);
}
// else{
//     $obj->data = json_encode($std_details);
//     $obj->operation = "no operation to done";
//     echo json_encode($obj);
// }
?>