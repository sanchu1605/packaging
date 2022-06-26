<?php
require_once 'image.php';
$app = new Image;


if (isset($_POST['upload'])) {
    $image      = $_FILES['image']['name'];
    $image_tmp  = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_ext  = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $id = $_POST['id'];
    $size = $_POST['size'];
    $rate = $_POST['rate'];
    $des=$_POST['description'];

   
    if (empty($image)) {
        header("Location: ./?upload&error=Select image to upload.");
        die;
    }

    
    $valid_ext = ['jpeg', 'jpg', 'JPEG', 'JPG', 'png', 'PNG'];

    
    if (in_array($image_ext, $valid_ext)) {
        
        if ($image_size > 1000000) {
            header("Location: ./?upload&error=Image must not be more than 1MB.");
            die;
        }
        if ($app->upload($image, $image_tmp, $image_ext, $id, $size, $rate,$des)) {
            header("Location: ./");
        }
    } else {
        header("Location: ./?upload&error=Image doesn't have a valid extension.");
    }
}

