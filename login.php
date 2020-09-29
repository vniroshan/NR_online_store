

<!DOCTYPE html>
<head>
<title>Login Form Design</title>




<link rel="stylesheet" type="text/css" href="style.css">
<link rel = "icon" href ="images/logo.png"type = "image/x-icon"> 
    </head>
    

<body style="background-color: #81BEF7 ">


    <div class="box">

    <img src="images/user.png" class="user">

        <h1>Login Here</h1>

<?php require_once 'messages.php'; ?>
        <form name="myform"  action="_login.php" method="POST" >

            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username " required="">

            <p>Password</p>
            <input type="password" name="password1" placeholder="Enter Password" required="">


            <input class="submit" type="submit" name="" value="Login">

        </form>
        <form action="index.php">
            <input class="close"   type="submit" name="" value="Close"> 
            <br><br>
            <a href="signup.php">Register for new account ?</a> 
        </form>
        
    </div>

    

</body>
</html>
