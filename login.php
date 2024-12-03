<?php
$showAlert=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'ankit/db.php';
  $username=$_POST["username"];
  $password=$_POST["password"];
  
 $sql="select*from users where username='$username' AND password='$password'";
 $result=mysqli_query($conn,$sql);
 $num=mysqli_num_rows($result);
 if($num==1){
    $login=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    header("location: admin.php");
 }
 if($showAlert){
  echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success!</strong> you successfully created your account.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else{
   echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Your are not loggedin successfully!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

}
  ?>
  <!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>signin</title>
  </head>
  <body>
    
    <?php require 'ankit/wel.php' ?>
<h1> <u>Login Now</u> </h1>
<div class="container1">
<form action="login.php" method="post">
  <div class="mb-3">
    <label for="Email"> Enter Username</label>
    <input type="text"  id="username"  name="username" class="col-md-4">

  </div>
  <div class="mb-3">
    <label for="Password" >Enter Password</label>
    <input type="password"  id="Password" name="password" class="col-md-4">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
