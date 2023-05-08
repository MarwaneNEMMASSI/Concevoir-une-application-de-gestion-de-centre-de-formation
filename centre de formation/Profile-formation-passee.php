<?php
require 'config.php';
if(!empty($_SESSION["id_apprenant"])){
    $id = $_SESSION["id_apprenant"];
    $result = mysqli_query($conn, "SELECT * FROM apprenant WHERE id_apprenant = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kavoon&display=swap');
        body{
            background-color: #F1F6F9;
        }

        nav{
            background-color: #212A3E;
            font-family: 'Poppins';
            margin-bottom: 3%;
        }
        .nav-link{
            color:#F1F6F9 !important;
        }

        .profileLinksSection{
            width: 100%;
            background-color: #212A3E;
            margin: 0px;
            padding: 2.5% 0px 2.5% 0px;

        }

        .profileLinks{
            color: black;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            
        }

        .profileLinks:hover{

            background-color: rgb(153, 158, 163);
            padding: 2.5%;
        }


        .formSU{
        width: 40%;
        margin: 5% 30% 0px 30%;
        }


        .inputs ,select{
        margin-top: 8%;
        }

        form{
            margin-bottom: 15%;
        }

        .scoreDate{
            margin: 2% 0px 2% 5%;
        }
        .navbar-toggler{
            background-color: white !important;
        }

        @media screen and (max-width: 1000px) {
            .formSU{
        width: 80%;
        margin: auto;
        }

        .inputs ,select{
            margin: 4% 0px 4% 0px;
        }
        }

        @media screen and (max-width: 768px) {

            .profileLinksdiv{
                margin: 1.5% 0px;
            }
        }


    </style>
</head>

<body>


   <!-- ======= Header/Navbar ======= -->
   <nav class="navbar navbar-default navbar-trans navbar-expand-lg ">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <a class="nav-link navbar-brand text-brand" href="home.php">Excelsior</a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault" >
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link " href="home.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="Formations.php">Courses</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="">Contact</a>
        </li>
        </ul>
    </div>



    <button class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-target="#loginModal">
        <a href="Profile-personal.php" style="margin-right: 1rem; color: white; text-decoration :none;"><span><?php echo $row["firstname"] ; ?></span><i class="fa-solid fa-user mx-1"></i></a>

        <a href="logout-user.php" style="color: white;"><i class="fa-solid fa-right-from-bracket"></i></a>
    </button>

    </div>
</nav>

<!-- Side-Bar -->

<div class="row profileLinksSection  text-center">
    

    <div class=" profileLinksdiv col-md-6">    <a href="Profile-inscription.php" class="profileLinks" style="color : blue;">Formations en cours</a>
    </div>
    
    <div class=" profileLinksdiv col-md-6">    <a href="Profile-formation-passee.php" class="profileLinks" style="text-decoration: underline; color : blue;">Formations passées</a>
    </div>

    <!-- <div class=" profileLinksdiv col-md-4">    <a href="" class="profileLinks">Historiques</a>
    </div> -->


</div>

    <!-- Infos -->

        <div class="container mt-3">

        <?php


$sql = "SELECT * FROM inscription i
INNER JOIN session s ON s.id_session = i.id_session
INNER JOIN formation f ON f.id_formation = s.id_formation 
WHERE id_apprenant = $id 
AND (etat = 'cloturée' OR etat = 'annulée')
ORDER BY i.id_session DESC";


$result = mysqli_query($conn, $sql);


if( mysqli_num_rows ( $result ) > 0 ){

echo ' <table class="table table-dark mt-5">
    <thead>
    <tr>
    <th scope="col">id_session</th>
    <th scope="col">Fromations</th>
    <th scope="col">Categorie</th>
    <th scope="col">Resultat</th>
    <th scope="col">Date Evaluation</th>
    </tr>
    </thead>
    ';

while($row = mysqli_fetch_assoc($result)) {


    echo '

    <tbody>
    <tr>
        <th>' .$row['id_session']. '</th>
        <th scope="row">' .$row['sujet']. '</th>
        <td>' .$row['etat']. '</td>
        <td>' .$row['resultat']. '</td>
        <td>' .$row['date_validation']. '</td>
    </tr>
    </tbody>
';

}


echo '</table>';
}
else{

    echo'<div class="alert alert-danger mt-5 latestsProductsdiv row" role="alert">
    <h1 class ="text-center">There is no sessions available</h1>
  </div>';
}


?>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>