<!DOCTYPE html>
<html>
<head>
  <link href="style.css" type="text/css" rel="stylesheet">
  <link rel = "icon" href ="images/logo.png"type = "image/x-icon"> 
  <title>admin</title>
</head>
<body style="background: -webkit-radial-gradient( #1C3FF4,#BCC4F0,#4663F8); background-position:center; " onload="show_or_not()">
<div class="header">
    <div>
        <img class="name" src="images//name.png">
        
    </div>
<ul>
  <li><a href="index.php">HOME</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
   <li><a class="active" href="admin.php">SUPPLIER PANEL</a></li>
   <li style="float:right"><a href="login.php">LOGOUT</a></li>
  <li id="kaatu" style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>
</div>


<br>
<ul id="wellcome_messages" style="float:right">
  <li>
<?php 
session_start(); 
if(isset($_SESSION['username'])){
  echo "Wellcome ";echo $_SESSION['username']; 
  $flag=0;
}else $flag=1;

?> </li>
<li style="float:right"><a href="logout.php">LOGOUT</a></li>
<li style="float:right"><a href="logout.php">VIEW PROFILE</a></li>

</ul>

<br><br><br>
<div class="admin_table" align="center">    <table bgcolor="#040870" border="5" bordercolor="white" cellpadding="100px" cellspacing="6">
  
<tr class="admin_menu">
  <th><a href="add_items.php"> Add items</a></th>
  <th><a href="view_suppliers.php"> Remove items</a></th>
  <th><a href="view_admin.php"> Edit items</a></th>
  <th><a href="about_us.html"> View item</a></th>
  <th><a onclick="add_suppliers()"  > ABOUT US</a></th>

</tr>
</table>

</div><br> <br>


</body>



<script type="text/javascript">var flag="<?php  echo $flag ?>";
function show_or_not(){if(flag=="1"){document.getElementById("wellcome_messages").style.display="none"}else{document.getElementById("wellcome_messages").style.display="block"}}</script>
</html>