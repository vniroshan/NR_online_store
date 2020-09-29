<!DOCTYPE html>
<html>
<head>
	<link href="style.css" type="text/css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NR online store</title>
<link rel = "icon" href ="images/logo.png"type = "image/x-icon"> 
</head>
<body style="background: -webkit-radial-gradient( #1C3FF4,#BCC4F0,#4663F8); background-position:center; " onload="show_or_not()">


<?php 
include "db.php";
session_start(); 
if(isset($_SESSION["username"])){

$query = "SELECT * FROM user WHERE username = :name";
$statement = $conn->prepare($query);
$params = array('name' => $_SESSION["username"]);
$statement->execute($params);
$user_data = $statement->fetch();
$_SESSION['myrole'] = $user_data['role'];
$_SESSION['myphoto']=$user_data['profilephoto'];
}
 ?> 

<?php 
include "db.php";



$query = "SELECT itemphoto FROM supplier ";
$statement = $conn->prepare($query);
$statement->execute();
foreach ($statement->fetchAll() as $photo) {
  $photooo[]=$photo[0];
};

 ?> 

<div class="header">
    <div>
        <img class="name" src="images//name.png">
        
    </div>
<ul>
  <li><a class="active" href="index.php">HOME</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
   <li id="admin"><a href="admin.php">ADMIN PANEL</a></li>
   <li id="login" style="float:right"><a href="login.php">LOGIN</a></li>
   <li id="signup" style="float:right"><a href="signup.php">SIGNUP</a></li>
  <li id="kaatu" style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>
</div>
<br>
<ul id="wellcome_messages" style="float:right">
 
<?php 


if(isset($_SESSION['username']) || isset($_SESSION['myrole'])){
	echo "Wellcome ";echo $_SESSION['myrole']; 
	$flag=0;
}else $flag=1;

?> 
</li> 
<li><div class="profile">
  <img style="width: 100%; border-radius: 100px;" src="<?php echo $_SESSION["myphoto"]  ?>">

</div></li>
<li style="float:right"><a href="logout.php">LOGOUT</a></li>
<li style="float:right"><a href="#">VIEW PROFILE</a></li>
<li id="supplier" style="float:right"><a href="supplier.php">SUPPLIER PANEL</a></li>

</ul>
</body>



<div class="items">
  <?php 
  foreach ($photooo as $url) {
    echo "<img class=\"itemimg\" src=$url>";
  }
  
  ?>
</div>
 


 

<script type="text/javascript">var flag="<?php  echo $flag ?>";

function show_or_not(){if(flag=="1"){
document.getElementById("wellcome_messages").style.display="none"
document.getElementById("login").style.display="block"
document.getElementById("signup").style.display="block"
document.getElementById("admin").style.display="none"


}
else{
document.getElementById("wellcome_messages").style.display="block"
document.getElementById("login").style.display="none"
document.getElementById("signup").style.display="none"
if("<?php echo $_SESSION['myrole']?>"=="admin"){
  document.getElementById("admin").style.display="block"
}else{
document.getElementById("admin").style.display="none"

}

if("<?php echo $_SESSION['myrole']?>"=="supplier"){
  document.getElementById("supplier").style.display="block"
}else{
document.getElementById("supplier").style.display="none"

}

}
}
</script>

 
</html>


