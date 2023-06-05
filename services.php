<?php

function checkUser($id){
    include("connection.php");
    $chackQuery = "SELECT * FROM details WHERE std_id='$id'";
    $result = mysqli_query($connect,$chackQuery);
    if(mysqli_num_rows($result) == 1){
        return mysqli_fetch_array($result);
    }else{
        return [];
    }
}

function getDetails ($sql){
    include("connection.php");
    $result = mysqli_query($connect,$sql);
    return mysqli_fetch_array($result);
}
function updateDetails($sql,$id,$table){
    include("connection.php");
    if(mysqli_query($connect,$sql)){
        return true;
    }else{
        return false;
    }   
}

function insertData($sql){
    include("connection.php");
    if(mysqli_query($connect,$sql)){
        return true;
    }else{
        return false;
    }
}
?>