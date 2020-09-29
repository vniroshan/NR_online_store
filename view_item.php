<!DOCTYPE html>
<html>
<head>
    <link href="style.css" type="text/css" rel="stylesheet">
    <link rel = "icon" href ="images/logo.png"type = "image/x-icon"> 
    <title>View suppliers</title>
</head>
<body style="background-color: #81BEF7 ">
<div class="header">
    <div>
        <img class="name" src="images//name.png">
        
    </div>
<ul>
  <li><a href="index.php">HOME</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
   <li><a href="admin.php">ADMIN PANEL</a></li>
   <li ><a onclick="Add_suppliers()" href="#">ADD SUPPLIER</a></li>
   <li ><a onclick="myFunction()" href="#">DELETE SUPPLIER</a></li>
   <li style="float:right"><a href="login.php">LOGIN</a></li>
   <li style="float:right"><a href="sigunp.php">SIGNUP</a></li>
  <li id="kaatu" style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>

</div>
<br>
<?php require_once 'messages.php'; ?>
<br>
<?php
echo "<table bgcolor='#040870'  style='border: solid 4px white; border='3' bordercolor='white' cellpadding='4px' cellspacing='1' text-color=white'>";
 echo "<tr style= 'color:white';><th>Username</th><th>Email</th><th>Password</th><th>Contact number</th><th>Address</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 3px solid white; color:white;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

 include "db.php";

try {
    
    $stmt = $conn->prepare("SELECT username, email, password1 ,contactnumber,address FROM user WHERE role ='supplier'");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
<div id="Add_suppliers">

    <img src="images/user.png" class="user">

        <h1>Register Here</h1>
        
        <form name="myform2" action="_supplier.php" method="POST">

            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">

            <p>Email</p>
            <input type="Email" name="email" placeholder="Enter email id">

            <p>Password</p>
            <input type="password" name="password1" placeholder="Enter Password">

            <p>Retype Password</p>
            <input type="password" name="password2" placeholder="Re-Enter Password">
            
            <p>Contact Number</p>
            <input type="text" name="contactnumber" placeholder="Enter Phone number">
            <p>Address</p>
            <input type="text" name="address" placeholder="Enter Address">


            <input class="submit" type="submit" name="btnsignup" value="Register">

            
        </form>
        </form>
        <form action="index.php">
            <input class="close"   type="submit" name="" value="Close"> 
            <br><br>
            <a href="login.php">existing user, login !?</a>
        </form>
    
</div>

<div id="delete_box" >

        <form name="myform"  action="delete_supplier.php" method="POST" >

            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username " >
            <input class="close" type="submit" name="" value="Delete">

        </form>   
    </div>

<script>
function myFunction() {
  var x = document.getElementById("delete_box");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

<script>
function Add_suppliers() {
  var x = document.getElementById("Add_suppliers");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>
</html>