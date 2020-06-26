<?php 
session_start();

if($_SESSION['name']==null){
    header("Location:http://localhost/auth_form/login.html");
}

?>

<html>
 <head>
     <title>Home</title>
 </head>
 <body>
     <a href="logout.php">Logout</a>
     <h1>Welcome <?php echo $_SESSION['name']; ?> </h1>
</body>
 </html>