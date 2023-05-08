<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kavoon&display=swap');
        body{
            background-color: #F1F6F9;
        }

        nav{
            background-color: #F1F6F9;
            font-family: 'poppins';
        }

        h1{
            padding-top:15%;
            padding-bottom: 5%;
            font-size: 4rem;
            font-family: 'poppins';
            color: #FFFFFF;
            
        }

        .backgroundPhoto{
            background-image: url('img/Excelsior.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;  

        }

        .btnMore{
            font-family: 'poppins';
            color: white;
            background-color: #212A3E;

        }

        h2{
            font-family: 'poppins';
            color: #212A3E;
        }

        .latestsProducts{
        margin: 5% auto;
        
        }

        .formationCards{
            min-height: 320px;
        }
        .card-title{
            font-weight: bold;
        }
        .duration{
            color: #1fae51;
            font-weight: bold;
        }

        .cardsAbout{
            font-weight: bold;

        }

        .cardslink {
            text-decoration: none;
            color: white;

        }



        @media screen and (max-width: 1100px) {

            h1{
            padding-top: 10%;
            padding-bottom: 10%;
            font-size: 4rem;
            }

            h2{
            padding-bottom: 10%;
            }


            }

        @media screen and (max-width: 770px) {

            h1{
            padding-top: 20%;
            padding-bottom: 10%;
            font-size: 3rem;
            }

        h2{
            padding-bottom: 10%;
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

    <!-- ======= Header/Navbar if connected======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg ">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <a class="navbar-brand text-brand" href="home.php">Excelsior</a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="Formations.php">Courses</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="">Contact</a>
        </li>
        </ul>
    </div>



    <button class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-target="#loginModal">
        <a href="Profile-personal.php" style="margin-right: 1rem; color: black; text-decoration :none;"><span><?php echo $row["firstname"] ; ?></span><i class="fa-solid fa-user mx-1"></i></a>

        <a href="logout-user.php" style="color: black;"><i class="fa-solid fa-right-from-bracket"></i></a>
    </button>

    </div>
</nav>
<?php
}
else{
    ?>
    
    <!-- ======= Header/Navbar if not connected======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <a class="navbar-brand text-brand" href="home.php">Excelsior</a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="Formations.php">Courses</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="">Contact</a>
        </li>
        </ul>
    </div>



    <button class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-target="#loginModal">
        <a href="signup.php" class ="btn btn-outline-primary" style="margin-right: 1rem; text-decoration :none;">Sign Up</a>

        <a href="login.php" class="btn btn-primary" style="text-decoration :none;">Login</a>
    </button>

    </div>
</nav>
    <?php
}
?>


<!--  Cover Title-->
    <div class="backgroundPhoto bg-image p-5 text-center shadow-1-strong mb-3 text-white">

    <h1 class="">Open up to a new world of opportunities </h1>
    <a class="btnMore btn btn-dark px-5 py-2" href="formations.php" style="">More</a>

    </div>


<!-- 2 Cards -->

<div class="albumPrds album py-3">
    <h2 class="text-center">Available Sessions</h2>

<div class="latestsProducts container">

<?php


$formations = "SELECT  * FROM session s 
                INNER JOIN formation f ON f.id_formation = s.id_formation
                WHERE s.etat = 'en cours d\\'inscription'
                ORDER BY s.id_formation DESC LIMIT 6";


$result = mysqli_query($conn, $formations);

if( mysqli_num_rows ( $result ) > 0 ){

echo ' <div class="latestsProductsdiv row">';

while($row = mysqli_fetch_assoc($result)) {

    $id_formation = $row["id_formation"];

    echo '
<div class="col-md-4 x">
    <form method = "GET" action = "formation-details.php" class="card formationCards"  style=" background-color: white;">
    <div class="card-body">
        <h4 class="card-title">' .$row['sujet']. '</h4>
        <p class="card-text"><strong>Categorie :</strong> <span class = "duration">'  .$row['categorie']. '</span></p>
        <p class="card-text"><strong>Masse Horaire :</strong><span class = "duration"> '  .$row['masse_horaire']. 'h</span></p>
        <p class="card-text">'  .$row['description']. '</p>

        <input type="hidden" name="id_formation" type = "submit" value ="'.$id_formation.'">
        <input class="btn " type="submit" value = "More" style = "width : 50% ;background-color:#1fae51;color:white;margin-top:5%">

    </div>
    
    </form>
    </div>';

}


echo '</div>';
}


?>

</div>

</div>

<footer>

<div class="text-center p-4" style="background-color: #212A3E; color:white;">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="home.php">Excelsior.com</a>
</div>
    <!-- Copyright -->
    
</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
    </html>