<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile Card</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>

    <!--Profile card start-->
    <div class="card">
      <div class="card-image">
        <img src="1.png" alt="">
      </div>
      <div class="profile-image">
        <img src="2.png" alt="">
      </div>
      <div class="card-content">
        <h3>Andrea Joe</h3>
        <br>
<?php 
include "db.php";
session_start(); 
$query = "SELECT role FROM user WHERE username = :name";
$statement = $conn->prepare($query);
$params = array(
    'name' => isset($_SESSION["username"])
);
$statement->execute($params);
$user_data = $statement->fetch();
$_SESSION['myrole'] = $user_data['role'];
 ?> 
      </div>
      <div class="icons">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-youtube"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-whatsapp"></a>
      </div>
    </div>
    <!--Profile card end-->

  </body>
</html>

















































































































<!---->
