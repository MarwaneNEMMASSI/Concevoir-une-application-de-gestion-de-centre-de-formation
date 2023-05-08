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

        .imgSt{
            margin-bottom: 5%;
        }

        .imgs{
            margin-bottom: 5%;
        }
        
        .OuvrageDetails{
            margin-bottom: 5%;
        }


        .ExemplariesTitle{
            font-family: 'Poppins';
        }

        .latestsProductsdiv{
            display: flex;
            justify-content: space-between;
            margin: 5% auto;
            
        }

        .card{
            margin: 3% 0px;
        }

        .navbar-toggler{
            background-color: white !important;
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

<div class="latestsProducts container mt-5 ">

<?php
$currentDate = date('Y-m-d');

$id_formation = $_GET["id_formation"];
$etat_session = $_GET['etats'];

    if ($etat_session != ""){

        $sessionAfficher = "SELECT * FROM session s WHERE s.id_formation = $id_formation AND etat = '$etat_session'";
}


$result = mysqli_query($conn, $sessionAfficher);
    
if( mysqli_num_rows ( $result ) > 0 ){

    echo '<div class="row latestsProductsdiv">';

    while($row = mysqli_fetch_assoc($result)) {

$session_id = $row["id_session"];

$placesReserverResult  = mysqli_query($conn, "SELECT COUNT(*) FROM inscription i INNER JOIN apprenant a ON a.id_apprenant = i.id_apprenant WHERE id_session = $session_id");

$placesReserverData = mysqli_fetch_assoc($placesReserverResult);

$placesReserver = $placesReserverData['COUNT(*)'];


if($row['date_fin'] == $currentDate){
    $etat_session_cloturée = mysqli_query($conn, "UPDATE `session` SET `etat` = 'cloturée' WHERE `id_session` = '$session_id'");
}


    echo ' <div class="card col-md-6" style=" background-color: white;">

    <div class="card-body">

        <h4 class="card-title">Session ID '.$row["id_session"].'</h4>
        <p class="card-text"><strong>Date debut :</strong><span class="greenItems"> ' .$row['date_debut']. ' </span>   |     <strong>Date fin :</strong> <span class="redItems">' .$row['date_fin']. '</span></p>
        <p class="card-text"><strong>Les Places :</strong> <span class="greenItems">' .$row['nombre_places_max'].'</span></p>
        <p class="card-text"><strong>Les Places Disponibles :</strong> <span class="redItems">' .$row['nombre_places_max'] - $placesReserver.'</span></p>
        <p class="card-text"><strong>Etat :</strong> <span class="redItems">' .$row['etat']. '</span></p>

        <button type="button" disabled id="joinSessionbtn" class="btn btn-primary">
        Join Session
        </button>
        
    </div>
    </div>

    ';
    

    }
    echo '</div>';
}

else{

    echo'<div class="alert alert-danger latestsProductsdiv row" role="alert">
    <h1 class ="text-center">There is no Session in this Formation :(</h1>
    </div>';
}

?>

</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>