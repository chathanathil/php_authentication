<?php
 session_start();

  $email=$_POST['email'];
  $password=$_POST['password'];
  $passwordHash=password_hash($password,PASSWORD_DEFAULT);

  // Db connection
  $conn=new mysqli('localhost','root','','auth_form');
  if($conn->connect_error){
     die('Connection Failed :' .$conn->connect_error);
  }else{
    if($email==null||$password==null){
        echo "Fill the form";
      }else{
      $sql=" select * from users where email='$email' ";
      $result=mysqli_query($conn,$sql);
      $num=mysqli_num_rows($result);

      if($num==1){
        $row = mysqli_fetch_assoc($result);
        $pswd=$row['password'];
        $user_name=$row['name'];
        $verify=password_verify($password,$pswd);
        if($verify==1){
          $_SESSION['name']=$user_name;
        header("Location:http://localhost/auth_form/home.php");
        }
        else{
            echo "Incorrect password";
        }
      }else{
        echo "User not exist";

      }
    }
  }
?>