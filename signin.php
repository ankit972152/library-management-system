<?php
include 'ankit/db.php';

$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $username=$_POST["username"];
  $email=$_POST["email"];
  $number=$_POST["number"];
  $dob=$_POST["dob"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  $exist=false;
  if(($password==$cpassword) && $exist==false){
 $sql="INSERT INTO `users` ( `username`,`email`,`number`,`dob`, `password`,`dt`) VALUES ( '$username','$email','$number','$dob', '$password',current_timestamp())";
 $result=mysqli_query($conn,$sql);
 if($result){
    $showAlert=true;
 }
}
else{
    $showError="password do not match";
}
}
if($showAlert){
  echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success!</strong> you successfully created your account.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else{
   echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Your account not created successfully!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
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
    <title>Login</title>
  </head>
  <body>
    <?php require 'ankit/wel.php' ?>
  
<h1> <u>Signup Now</u> </h1>
<div class="container1">
<form action="signin.php" method="post">
  <div class="mb-3">
    <label for="username"> Enter Username</label>
    <input type="text"  id="username"  name="username" class="col-md-2">
  </div>
  <div class="mb-3">
    <label for="email" >Enter E-mail</label>
    <input type="email"  id="email" name="email" class="col-md-2">
  </div>
  <div class="mb-3">
    <label for="number" >Enter Number</label>
    <input type="text"  id="number" name="number" class="col-md-2">
  </div>
  <div class="mb-3">
    <label for="dob" >Enter DOB </label>
    <input type="text"  id="dob" name="dob" class="col-md-2">
  </div>
  <div class="mb-3">
    <label for="Password" >Enter Password</label>
    <input type="password"  id="Password" name="password" class="col-md-2">
  </div>
  <div class="mb-3">
    <label for="Password" > Confirm Password</label>
    <input type="password"id="cPassword" name="cpassword" class="col-md-2">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>