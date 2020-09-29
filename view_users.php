<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel = "icon" href ="images/logo.png"type = "image/x-icon"> 
<head >
    <title>All Users</title>
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
   <li ><a onclick="myFunction()" href="#">DELETE USER</a></li>
   
   <li style="float:right"><a href="login.php">LOGIN</a></li>
   <li style="float:right"><a href="sigunp.php">SIGNUP</a></li>
   
  <li id="kaatu" style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>
</div>
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
    
    $stmt = $conn->prepare("SELECT username, email, password1 ,contactnumber,address FROM user WHERE role ='user'");
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
<div id="delete_box" >
<?php require_once 'messages.php'; ?>
        <form name="myform"  action="delete_user.php" method="POST" >

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
</body>


</html>