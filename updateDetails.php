
<?php
  include_once("services.php");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

  $file = null;
  $response = new stdClass();
  $id =$_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $branch = $_POST['branch'];
  $regno = $_POST['regno'];
  $address = $_POST['address'];

  if (isset($_FILES['file'])) {
    $targetDirectory = 'photos/';  // Replace with your target folder path
    $targetFileName = basename($_FILES['file']['name']);
    $targetPath = $targetDirectory.$targetFileName;
    // Move the uploaded file to the target directory
    $currentFileName = getDetails("SELECT * FROM details WHERE std_id='$id'");
    if($currentFileName['photo'] != ""){
      $currentPath = 'photos/' . $currentFileName['photo'];
      if (file_exists($currentPath)){
        unlink($currentPath);
      }
    }
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
      $sql = "UPDATE `details` SET `reg_number`='$regno',`name`='$name',`branch`='$branch',`phone`='$phone',`email`='$email',`photo`='$targetFileName',`address`='$address' WHERE `std_id`='$id'";
      if(updateDetails($sql,$id,'details')){
        $response->message = 'Details updated successfully';
        $response->status = true;
        echo json_encode($response);
      }else{
        $response->message = 'Cant upadate details !';
        $response->status = false;
        echo json_encode($response);
      }
    } else {
      $response->message = 'Cant upadate details error in image upload !';
        $response->status = false;
        echo json_encode($response);
    }
  } else {
    $sql = "UPDATE `details` SET `reg_number`='$regno',`name`='$name',`branch`='$branch',`phone`='$phone',`email`='$email',`address`='$address' WHERE `std_id`='$id'";
    if(updateDetails($sql,$id,'details')){
      $response->message = 'Details updated successfully';
      $response->status = true;
      echo json_encode($response);
    }else{
      $response->message = 'Cant upadate details !';
      $response->status = false;
      echo json_encode($response);
    }
  
  }

?>