<?php
 session_start();

  $name=$_POST["name"];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $passwordHash=password_hash($password,PASSWORD_DEFAULT);

  // Db connection
  $conn=new mysqli('localhost','root','','auth_form');
  if($conn->connect_error){
     die('Connection Failed :' .$conn->connect_error);
  }else{
     if($name==null|| $email==null||$password==null){
       echo "Fill the form";
     }else{
      $sql=" select * from users where email='$email'";
      $result=mysqli_query($conn,$sql);
      $num=mysqli_num_rows($result);
      if($num==1){
        echo "Email is already exist";
      }else{
        $reg=" insert into users(name,email,password) values('$name','$email','$passwordHash')";
        mysqli_query($conn,$reg);
       header("Location:http://localhost/auth_form/login.html");

      }
    }
  }
?>