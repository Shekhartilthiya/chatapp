<?php
include "db.php";
session_start();

if(isset($_POST["name"]) && isset($_POST["phone"])){
  
  $name=$_POST["name"];
  $phone=$_POST["phone"];

  $q="SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";
  
  if($rq=mysqli_query($db,$q)){

    if(mysqli_num_rows($rq)==1){
      
      $_SESSION["userName"]=$name;
      $_SESSION["phone"]=$phone;
      header("location: index.php");



    }else{


      $q="SELECT * FROM `users` WHERE phone='$phone'";
      if($rq=mysqli_query($db,$q)){
        if(mysqli_num_rows($rq)==1){
          echo "<script>alert($phone+' is already taken by another person')</script>";
        }else{

          $q="INSERT INTO `users`(`uname`, `phone`) VALUES ('$name','$phone')";
          if($rq=mysqli_query($db,$q)){
            $q="SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";
            if($rq=mysqli_query($db,$q)){
              if(mysqli_num_rows($rq)==1){

                $_SESSION["userName"]=$name;
                $_SESSION["phone"]=$phone;
                header("location: index.php");

              }
            }

          }

        }
      }
    }
  }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HarmonYRoom</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">
  
</head>
<body>
  
  <h1> HarmonYRoom</h1>
  <div class="login">
  <img src="image/harmonybg.png" class="img1">
    <h2>Login</h2>
    <p>This ChatRoom Is The Best For Creating Freindship.</p>
    <form action="" method="post">

      <h3>UserName</h3>
      <input type="text" placeholder="Short Name" name="name" >

      <h3>Mobile No:</h3>
      <input type="number" placeholder="with country code" min="1111111" max="999999999999999" name="phone">

      <button>Login / Register</button>

    </form>
  </div>
</body>
</html>
