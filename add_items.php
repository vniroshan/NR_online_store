<!DOCTYPE html>
<head>
<title>signup</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<link rel = "icon" href ="images/logo.png"type = "image/x-icon"> 
<body style="background-color: #81BEF7 ">

    <div class="box">
    <img src="images/user.png" class="user">

        <h1>Add Here</h1>
        <?php require_once 'messages.php'; ?>
        <form name="myform2" action="_add_items.php" method="POST" enctype="multipart/form-data">

            <p>Itemname</p>
            <input type="text" name="itemname" placeholder="Enter Item name">

            <p>Price</p>
            <input type="text" name="price" placeholder="Enter Price">

            <p for="drivelink">Item's Photo</p>
            <input type="file" name="image" placeholder="Upload image">
            
            <input class="submit" type="submit" name="btnsignup" value="Add">

            
        </form>
        </form>
        <form action="index.php">
            <input class="close"   type="submit" name="" value="Close"> 
            <br><br>
            <a href="login.php">existing user, login !?</a>
        </form>
    </div>





   
</body>
</head>
</html>

