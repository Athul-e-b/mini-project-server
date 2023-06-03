<?php
include_once("connection.php");
header('Access-Control-Allow-Origin: *');
header('Allow-Access-Control-Method:POST,GET');

$request=json_decode($_POST['body']); 
$obj = new stdClass();

$fetchData = "SELECT * FROM users WHERE email='$request->email' or phone='$request->phone'";
$result = mysqli_query($connect,$fetchData);

if(mysqli_num_rows($result) == 0){
    $insertData = "INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES ('$request->name','$request->email','$request->phone','$request->password')";
     if(mysqli_query($connect,$insertData)){
        $obj->message = 'Registration successfull';
        $obj->status = true;
        echo json_encode($obj);
     }else{
        $obj->message = 'Registration failed';
        $obj->status = false;
        echo json_encode($obj);
     }
}else{
    $obj->message = 'User already exist';
    $obj->status = false;
    echo json_encode($obj);
  
}

?>