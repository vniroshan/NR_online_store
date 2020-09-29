<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
// Include the database configuration file  
require_once 'db.php'; 
 
// Get image data from database 
$result = $conn->query("SELECT image FROM images "); 
?>

<?php if($result->rowCount() > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
</body>
</html>