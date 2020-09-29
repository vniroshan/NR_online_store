
<?php
include "db.php";
    session_start();
    $username=trim($_REQUEST["username"]);

$isValid = true;

   // Check fields are empty or not
   if($username == ''){
      $isValid = false;
     $_SESSION['messages'][]='Please fill required field!';
header('location: view_suppliers.php');
exit;
   }


   if($isValid){

     // Check if Email-ID already exists
     $stmt = $conn->prepare("SELECT * FROM user WHERE username = :un");
     $stmt->bindParam(':un', $username);
     $stmt->execute();
     if($stmt->rowCount() == 0){
       $isValid = false;
       $_SESSION['messages'][]='User name is invalid.';   
   header('location: view_suppliers.php');
   exit;
     }

   }

   // deleted records
   if($isValid){
     $insertSQL = "DELETE  FROM user WHERE username=:un";
     $stmt = $conn->prepare($insertSQL);
     $stmt->bindParam(':un',$username);
     $stmt->execute();
     
     $_SESSION['messages'][]='deleted!';
header('location: view_suppliers.php');
exit;
     
  }
else{
	$_SESSION['messages'][]='User name is invalid.';   
   header('location: view_suppliers.php');
   exit;
}
?>