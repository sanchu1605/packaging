<?php 
// Include the database configuration file  
require_once 'dbConfig.php'; 

// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            $id=$_POST["id"];
            $size=$_POST["size"];
            $rate=$_POST["rate"];
            $desc=$_POST["description"];
            $insert = $db->query("INSERT into images (id,image,size,rate,description) VALUES ('$id','$imgContent','$size','$rate','$desc')"); 
             
            if($insert){ 
                echo '<script>alert("File upload successfull")</script>';
                header("Location: admin.php");
            }else{ 
                $statusMsg = 'File upload failed, please try again.//'; 
                header("Location: admin.php");
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 echo $statusMsg ;
?>