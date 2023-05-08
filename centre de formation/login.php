<?php
require 'config.php';
if(!empty($_SESSION["id_apprenant"])){
  header("Location: home.php");
}
if(isset($_POST["submit"])){

  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM apprenant WHERE email = '$email'");

  $row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result) > 0){

    if($password == $row['password']){

      $_SESSION["login"] = true;
      $_SESSION["id_apprenant"] = $row["id_apprenant"];

      header("Location: home.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>
    .tt{
        width: 35%;
        background-color: transparent;
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 5% 5%;
        /* justify-content: center; */


    }
    body{
        /* background-color: #F2E4DD; */
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: wheat;
        min-height: 100vh;
        background-image: url(img/centre.jpg) ;
        background-size: cover;
        background-position: center;
    }
    h1{
        font-size: 3rem;
    }

    .par{
  color : white;
}

    @media screen and (max-width: 850px ) {

      .tt{
        width: 60%;
      }


    }
</style>
</head>
<body>
  
    <form class="tt" action="" method="POST" autocomplete="off">

        <div class="form-outline mb-4">
        <h2 class="par">Log In</h2>
          </div>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="text" name = "email" id = "email" class="form-control" required value="">
          <label class="par" class="form-label" for="form2Example1">Email</label>
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" name = "password" id="password" class="form-control" required value="">
          <label class="par" class="form-label" for="form2Example2">Password</label>
        </div>
      

      
        <!-- Submit button -->
        <button type="submit" name = "submit" class="btn btn-primary btn-block mb-4">Sign in</button>
      
        <!-- Register button -->
        <div class="text-center">
          <p class="par">Not a member? <a href="signup.php">Register</a></p>
        </div>
      </form>
    <!-- </div> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>