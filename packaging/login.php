<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
    
    $email=$_POST['email'];
	$pwd=$_POST['pwd'];
   
   $sql = "SELECT * FROM admin where email='$email' AND password='$pwd';";
   $result=mysqli_query($conn,$sql);
   if ($result->num_rows > 0) 
   {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['pwd'] = $row['pwd'];
    
  //  echo "<script>alert('admin page')</script>";
    header("Location: admin.php");
} 
else {
   
    $sql = "SELECT * FROM user where email='$email' AND password='$pwd';";
    $result=mysqli_query($conn,$sql);
    if ($result->num_rows > 0) 
   {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['pwd'] = $row['pwd'];
    
  //  echo "<script>alert('admin page')</script>";
    header("Location: shopping.php");
} 

}	

   

}
else
{
	echo "<h1>hello</h1>";
}

?>