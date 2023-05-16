<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Kavoon&display=swap');

        *{
            padding: 0;
            margin: 0;
        }
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

        #btnFilter{
            background-color: #0D6EFD !important;
            color: white;
        }

        .detailsContent{
            margin-bottom: 5%;
            color: white;
        }


        .latestsProductsdiv{
            display: flex;
            justify-content: space-between;
            margin: 5% auto;
            
        }

        .card{
            margin: 3% 0px;
        }
        .card-title{
            font-weight: bold;
        }
        .greenItems{
            font-weight: bold;
            color: #1fae51;
        }
        .redItems{
            font-weight: bold;
            color: blue;
        }
        .fa-solid{
            font-size: 1.2rem;
        }


        .navbar-toggler{
            background-color: white !important;
        }
        footer{
            margin-top: 12%;
        }

        

        
        @media screen and (max-width: 767px) {

            .Exemplary{
            margin-bottom: 20%;
        }
        .imgs{
            width: 50%;
        }

            }

    </style>
</head>

<body>
<?php
require 'config.php';
if(!empty($_SESSION["id_apprenant"])){
    $id = $_SESSION["id_apprenant"];
    $result = mysqli_query($conn, "SELECT * FROM apprenant WHERE id_apprenant = $id");
    $row = mysqli_fetch_assoc($result);
?>

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
<?php
}
else{
    ?>
    
    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <a class="nav-link navbar-brand text-brand" href="home.php">Excelsior</a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
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
        <a href="signup.php" class ="btn btn-outline-primary" style="margin-right: 1rem; text-decoration :none;">SignUp</a>

        <a href="login.php" class="btn btn-primary" style="text-decoration :none;">Login</a>
    </button>

    </div>
</nav>
    <?php
}
?>

<!-- Card details -->
<div class="albumPrds album py-5" style="background-color: #212A3E; ">


    <div class="latestsProducts container ">

    <?php

$id_formation = $_GET["id_formation"];

$formations = "SELECT * FROM formation WHERE id_formation = $id_formation";

$result = mysqli_query($conn, $formations);

if( mysqli_num_rows ( $result ) > 0 ){

echo ' <div class="latestsProductsdiv row d-flex justify-content-between " style = "width: 80%; margin: auto; " >';

while($row = mysqli_fetch_assoc($result)) {

    // $id_formation = $row["id_formation"];

    echo '
<div class=" detailsContent col-md-12"  >

    <div class="mb-4"><h2><strong>' .$row['sujet']. '</strong></h2></div> 

    <div class="mb-4"> <h5><strong>Categorie :  </strong><span>' .$row['categorie']. '</span></h5></div> 

    <div class="mb-4"> <h5><strong>Hourly Mass : </strong><span>' .$row['masse_horaire']. 'h</span></h5></div> 

    <div class="mb-4"><p>' .$row['description']. '</p></div>  

</div>';

}


echo '</div>';
}


?>


</div>

</div>


<div class="latestsProducts container mt-5 ">

<h1 class ="text-center">Available sessions</h1>

<div class = "col-md-12">
<div class="filterdiv col-md-6 mb-3">

<form action = "sessions-filter.php" method = "GET" class="" >

    <select class="btn btn-dark" name="etats" id = "etats">

        <option value="en cours" name = "">en cours</option>
        <option value="inscription achevée" name = "">inscription achevée</option>
        <option value="cloturée" name = "">cloturée</option>
        <option value="annulée" name = "">annulée</option>
        
    </select>
    


    <input class="btn " type="submit" value = "Filter" name = "etatFilter" id = "btnFilter">
    <input type="hidden" name="id_formation" type = "submit" value ="<?php echo $id_formation; ?>">

    </form>

</div>
</div>


<?php
$currentDate = date('Y-m-d');

    $sessionAfficher = 
        "SELECT * FROM session s 
        INNER JOIN formation f 
        ON f.id_formation = s.id_formation
        INNER JOIN formateur ff ON ff.id_formateur = s.id_formateur
        WHERE s.id_formation = $id_formation 
        AND s.etat = 'en cours d\'inscription'";

            
    
    $result = mysqli_query($conn, $sessionAfficher);
    
    if( mysqli_num_rows ( $result ) > 0 ){

        echo '<div class="row latestsProductsdiv">';

        while($row = mysqli_fetch_assoc($result)) {

    $session_id = $row["id_session"];

    $placesReserverResult  = mysqli_query($conn, "SELECT COUNT(*) FROM inscription i INNER JOIN apprenant a ON a.id_apprenant = i.id_apprenant WHERE id_session = $session_id");

    $placesReserverData = mysqli_fetch_assoc($placesReserverResult);

    $placesReserver = $placesReserverData['COUNT(*)'];

    if($row['nombre_places_max'] == $placesReserver){
        $etat_session_inscriptionachevée = mysqli_query($conn, "UPDATE `session` SET `etat` = 'inscription achevée' WHERE `id_session` = '$session_id'");
    }
    elseif($placesReserver < 3 && $row['date_debut'] == $currentDate){
        $etat_session_encours = mysqli_query($conn, "UPDATE `session` SET `etat` = 'annulée' WHERE `id_session` = '$session_id'");
    }
    elseif($placesReserver >= 3 && $row['date_debut'] == $currentDate){
        $etat_session_annulée = mysqli_query($conn, "UPDATE `session` SET `etat` = 'en cours' WHERE `id_session` = '$session_id'");
    }

    if(!empty($_SESSION["id_apprenant"])){

        // echo $currentDate;

        echo ' <div class="card col-md-5" style=" background-color: white;">

        <div class="card-body">
            <h4 class="card-title">Session ID '.$row["id_session"].'</h4>
            <p class="card-text"><strong>Date debut :</strong><span class="greenItems"> ' .$row['date_debut']. ' </span>   |     <strong>Date fin :</strong> <span class="redItems">' .$row['date_fin']. '</span></p>
            
            <p class="card-text"><strong>Fomateur :</strong> ' .$row['firstname']. ' ' .$row['lastname']. '</p>
            <p class="card-text"><strong>Les Places :</strong> <span class="greenItems">' .$row['nombre_places_max'].'</span></p>
            <p class="card-text"><strong>Les Places Disponibles :</strong> <span class="redItems">' .$row['nombre_places_max'] - $placesReserver.'</span></p>
            <p class="card-text"><strong>Etat :</strong> <span class="greenItems">' .$row['etat']. '</span></p>
    
            <button type="button" id="joinSessionbtn" class="btn" style = background-color:blue;color:white;" data-bs-toggle="modal" data-bs-target="#joinSession' .$row['id_session']. '">
            Join Session
            </button>
            
            
        </div>
    
    
        <div class="modal fade" id="joinSession'.$row["id_session"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title fs-5" id="exampleModalLabel">Join Session</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        <form action="join_session.php" method="get" enctype="multipart/form-data">
        
            <label for="ID">Are you sure want to join this Session ?</label>
            <input type="hidden" name="id_session" id="ID"  value="'.$row["id_session"].'">
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input class="btn btn-success" type="submit" name="joinSession" value="Join">
        
            </div>
        </form>
            
        
        </div>
        </div>
        </div>
        </div>';
        
}

else{

    echo ' <div class="card col-md-5" style=" background-color: white;">

    <div class="card-body">
        <h4 class="card-title">Session ID '.$row["id_session"].'</h4>
        <p class="card-text"><strong>Date debut :</strong><span class="greenItems"> ' .$row['date_debut']. ' </span>   |     <strong>Date fin :</strong> <span class="redItems">' .$row['date_fin']. '</span></p>
        
        <p class="card-text"><strong>Fomateur :</strong> ' .$row['firstname']. ' ' .$row['lastname']. '</p>
        <p class="card-text"><strong>Les Places :</strong> <span class="greenItems">' .$row['nombre_places_max'].'</span></p>
        <p class="card-text"><strong>Les Places Disponibles :</strong> <span class="redItems">' .$row['nombre_places_max'] - $placesReserver.'</span></p>
        <p class="card-text"><strong>Etat :</strong> <span class="greenItems">' .$row['etat']. '</span></p>

        <a type="button" href="login.php" class="btn " style =" background-color:blue;color:white;">
        Join Session
        </a>
        
    </div>
        </div>
    ';

}

}
    
    
    echo '</div>';



    }
    else{

   

         echo'<div class="alert alert-danger latestsProductsdiv row" role="alert">
         <h1 class ="text-center">There is no sessions available for this course</h1>
       </div>';
    }
    ?>



</div>

<footer >

<div class="text-center p-4 " style="background-color: #212A3E; color:white;">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="home.php">Excelsior</a>
</div>

</footer>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>