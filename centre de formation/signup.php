<?php
require 'config.php';
if(!empty($_SESSION["id_apprenant"])){
  header("Location: home.php");
}
if(isset($_POST["submit"])){
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];


  $duplicate = mysqli_query ( $conn, "SELECT * FROM apprenant WHERE  email = '$email' ");

  if(mysqli_num_rows($duplicate) > 0){

    echo "<script> alert('Email Has Already Taken'); </script>";
  }
  else{

    if($password == $confirmpassword){
      $query = "INSERT INTO apprenant  VALUES('','$firstname','$lastname','$email','$password')";
      // header("window.Location: login-admin.php");
      
      mysqli_query($conn, $query);

      echo"<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>
  *{
    margin: 0;
    padding: 0;
  }

  .tt{
        width: 70%;
        margin : auto;
        background-color: transparent;
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 5% 5%;


    }
    body{

        display: flex;
        justify-content: center;
        align-items: center;
        /* background-color: wheat; */
        min-height: 100vh;
        background-image: url(img/centre.jpg) ;
        background-size: cover;
        background-position: center;
    }

.inputs ,select{
  margin-top: 8%;
}

.par{
  color : white;
  
}

.labelinputs{
  color: white;
  font-weight: bold;
  margin-bottom: 1%;
  display: flex;
  justify-content: flex-start;
}

@media screen and (max-width: 850px ) {

.tt{
  width: 100%;
}


}

</style>
</head>
<body>

  <div class="container mt-3">
    <div class=" formSU text-center">
        
        <form class="tt row" method = "POST" action = ""  autocomplete="off">
        <h2 class="par">Create your Account</h2>
            <div class="col-md-6">
                <div class="inputs"> <label for="firstname" class ="labelinputs">First Name</label><input class="form-control" type="text" name = "firstname" placeholder="First Name" required value=""> </div>
            </div>
            <div class="col-md-6">
              <div class="inputs">  <label for="lastname" class ="labelinputs">Last Name</label><input class="form-control" type="text" name = "lastname" placeholder="Last Name" required value=""> </div>
          </div>


      <div class="col-md-6">
        <div class="inputs"><label for="email" class ="labelinputs">Email</label><input class="form-control" type="email" name = "email" placeholder="Email" required value=""> </div>
    </div>

    <div class="col-md-6">
      <div class="inputs"><label for="password" class ="labelinputs">Password</label><input class="form-control" type="password" name = "password" placeholder="Password" required value=""> </div>
  </div>

  <div class="col-md-6">
    <div class="inputs"><label for="confirmpassword" class ="labelinputs">Confirm Password</label><input class="form-control" type="password" name = "confirmpassword" placeholder="Confirm password" required value=""> </div>
</div>

<div class="col-md-12">
    <div class="inputs"><p class= "par">Already have an Account ? <span><a href="login.php">Log in</a></span></p></div>
</div>

        <div class="mt-3 ">
          <button class="px-3 btn btn-sm btn-primary" type = "submit" name = "submit" >Sign Up</button>
        </div>

        </form>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>