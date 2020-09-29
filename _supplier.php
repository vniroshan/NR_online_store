<?php
session_start();
include "db.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Register user
if(isset($_POST['btnsignup'])){

    $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
  echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
  $_SESSION['messages'][]='Successful!.';
header('location: add_items.php');
} else {
  echo "Sorry, there was an error uploading your file.";
}

   $username = trim($_POST['username']);
   $email = trim($_POST['email']);
   $password1 = trim($_POST['password1']);
   $password2 = trim($_POST['password2']);
   $address = trim($_POST['address']);
   $contactnumber = trim($_POST['contactnumber']);
   $imageurl = $target_dir . basename($_FILES["image"]["name"]);
   $role = 'supplier';

   $isValid = true;

   // Check fields are empty or not
   if($username == '' || $email == '' || $password1 == '' || $password2 == '' || $address=='' || $contactnumber= ''){
      $isValid = false;
     $_SESSION['messages'][]='Please fill all required fields!';
header('location: signup.php');
exit;
   }

   // Check if confirm password matching or not
   if($isValid && ($password1 != $password2) ){
     $isValid = false;
     
     $_SESSION['messages'][]='Confirm password not matching';   
   header('location: signup.php');
   exit;
   }

   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $_SESSION['messages'][]='Invalid Email-ID.';   
   header('location: signup.php');
   exit;
   }

if($isValid){

     // Check if Email-ID already exists
     $stmt = $conn->prepare("SELECT * FROM user WHERE username = :un");
     $stmt->bindParam(':un', $username);
     $stmt->execute();
     if($stmt->rowCount() > 0){
       $isValid = false;
       $_SESSION['messages'][]='User Name is already existed.';   
   header('location: signup.php');
   exit;
     }

   }

   if($isValid){

     // Check if Email-ID already exists
     $stmt = $conn->prepare("SELECT * FROM user WHERE email = :em");
     $stmt->bindParam(':em', $email);
     $stmt->execute();
     if($stmt->rowCount() > 0){
       $isValid = false;
       $_SESSION['messages'][]='Email-ID is already existed.';   
   header('location: signup.php');
   exit;
     }

   }

   // Insert records
   if($isValid){
     $insertSQL = "INSERT INTO user(username,email,password1,address,contactnumber,role,profilephoto ) values(:un,:em,:pss,:add,:con,:rol,:pp)";
     $stmt = $conn->prepare($insertSQL);
     $stmt->bindParam(':un',$username);
     $stmt->bindParam(':em',$email);
     $stmt->bindParam(':pss',$password1);
     $stmt->bindParam(':add',$address);
     $stmt->bindParam(':con',$contactnumber);
     $stmt->bindParam(':rol',$role);
       $stmt->bindParam(':pp',$imageurl);
     $stmt->execute();
     
     $_SESSION['messages'][]='Thank you for your registration.!';
header('location: signup.php');
exit;
     
  }
}
?>