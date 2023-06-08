<?php 
include_once("connection.php");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: POST, GET');

$request=json_decode($_POST['body']); 
$obj = new stdClass();

    $fetchData = "SELECT * FROM admin_details WHERE email='$request->email' and password ='$request->password'";
    $result = mysqli_query($connect,$fetchData);
    $user = mysqli_fetch_array($result);

  if(mysqli_num_rows($result) != 0){ 
     if($request->email == $user['email'] && $request->password == $user['password']){
        $obj->message = 'Login successfull';
        $obj->id = $user['id'];
        $obj->name = $user['name'];
        $obj->email = $user['email'];
        $obj->status = true;
        echo json_encode($obj);
    }else{
        $obj->message = 'Invalid credinals1';
        $obj->status = false;
        echo json_encode($obj);
    }
}else{
        $obj->message = 'Invalid credinals2';
        $obj->status = false;
        echo json_encode($obj);
}


?>
