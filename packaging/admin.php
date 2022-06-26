<html>
    <head>
</head>
<body>

<form action="upload1.php" method="post" enctype="multipart/form-data">
    <label>Select Image:</label>
    <input type="file" name="image"><br><br>
    id:<input type="text" name="id"><br><br>
    Size:<input type="text" name="size"><br><br>
    rate:<input type="text" name="rate"><br><br>
    Description:<textarea  name="description"></textarea><br><br>
    <input type="submit" name="submit" value="Upload">
</form>
</body>
    </html>
<?php 
// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// Get image data from database 
$result = $db->query("SELECT image FROM images ORDER BY id DESC"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?> " width="200" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>