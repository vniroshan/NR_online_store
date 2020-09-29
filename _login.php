
<?php
    include "db.php";
    session_start();
    $uname=trim($_REQUEST["username"]);
    $pass=trim($_REQUEST["password1"]);

    
    $sql="SELECT * FROM user WHERE username=:un AND password1=:pw";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':un',$uname);
    $stmt->bindParam(':pw',$pass);

    $stmt->execute();

    




 
 
/*
$sql="SELECT * FROM user WHERE username='".$uname."' AND password='".$pass."'";
$stmt=$conn->prepare($sql);
echo $sql;
$stmt->execute();
*/

    if($stmt->rowCount()==1){  
        
        
        echo "<script>window.open('index.php','_self')</script>";  
        
        $_SESSION['username']=$uname;//here session is used and value of $user_email store in $_SESSION.  
 
            
  
    }  
    else  
    {  
      $_SESSION['messages'][]='Email or password is incorrect.!';
header('location: login.php');
exit; 
    }  
?>