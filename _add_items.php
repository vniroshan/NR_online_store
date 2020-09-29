<?php
session_start();
include('db.php');

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["btnsignup"])){

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

   


 
    $itemname = trim($_POST["itemname"]);
    $price=trim($_POST["price"]);
    $username = $_SESSION["username"];
    $imageurl = $target_dir . basename($_FILES["image"]["name"]);
    

    

  
         
    

         


      
              $sqlquery= "insert into supplier (username,itemname,price,itemphoto) values(:un,:in,:p,:ip)";
              $stmt = $conn->prepare($sqlquery);
                 
                
                
                
                $stmt->bindParam(':un',$username);
                $stmt->bindParam(':in',$itemname);
                $stmt->bindParam(':p',$price);
                
                $stmt->bindParam(':ip',$imageurl);
                $stmt->execute(); 
               
                
              
      
    
  

}
?>
