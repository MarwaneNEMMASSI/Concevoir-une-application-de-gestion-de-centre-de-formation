<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        
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
            color:#F1F6F9 !important;
            font-family: 'poppins';
        }
        .nav-link{
            color:#F1F6F9 !important;
        }

        #btnFilter{
            background-color: #0D6EFD !important;
            color: white;
        }
        .latestsProductsdiv{
            margin: 5% 0px ;
            
        }

        .card{
            margin: 2% 0px;
        }
        .navbar-toggler{
            background-color: white !important;
        }

        .containerC{
            width: 90%;
            margin: auto;
        }

        .formationCards{
            min-height: 300px;
            
        }
        .card-title{
            font-weight: bold;
        }
        .duration{
            color: #0D6EFD;
            font-weight: bold;
        }



        @media screen and (min-height: 500px) {

            footer{
            margin-top: 16%;
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

<!-- Filter Formations -->

<div class="filterSearch pt-5 row  text-center" style="width: 70%; margin: auto;"> 

    <div class="filterdiv col-md-6 mb-3">

        <form action = "" method = "GET" class="" >

            <select class="btn btn-white mb-3" name="categories" id = "categories">
        
                <option value="" name = "allCategories" >All Categories</option>
        
                <option value="informatique" name = "informatique" >Informatique</option>
                <option value="gaming developement" name = "gaming">Gaming Developement</option>
                <option value="developement" name = "">Developement</option>
                
            </select>
            
        
        
            <input class="btn mb-3" type="submit" value = "Filter" name = "filterbtn" id = "btnFilter">
        
            </form>

    </div>

    <!-- Search -->

    <div class="searchdiv col-md-4">

        <form method = "GET" action = "search_formation.php" class="input-group">
            
            <input type="search" name="searchFormation" id="" class="form-control" placeholder="Search" required/>
            
            <button type="submit" name="searchFormationbtn" class="btn" id="btnFilter"> <i class="fas fa-search"></i> </button>

        </form>

    </div>



</div>


<!-- Filter & Search -->

<div class="albumPrds album">


    <div class="latestsProducts containerC">

<?php

$formationssql = "SELECT * FROM formation";

if(isset($_GET['filterbtn'])){

    $categories = $_GET['categories'];

    if ($categories != ""){

        $formationssql = "SELECT * FROM formation WHERE categorie = '$categories'";
}
}

$result = mysqli_query($conn, $formationssql);

if( mysqli_num_rows ( $result ) > 0 ){

echo ' <div class="latestsProductsdiv row">';

while($row = mysqli_fetch_assoc($result)) {

    $id_formation = $row["id_formation"];

    echo '
    <div class="col-md-6">
    <form method = "GET" action = "formation-details.php" class=" card formationCards"  style=" background-color: white;">
    <img src='.$row['Img'].' class="card-img-top" alt="...">

    <div class="card-body">
        <h4 class="card-title">' .$row['sujet']. '</h4>
        <p class="card-text"><strong>Categorie :</strong> <span class = "duration">'  .$row['categorie']. '</span></p>
        <p class="card-text"><strong>Masse Horaire :</strong><span class = "duration"> '  .$row['masse_horaire']. 'h</span></p>
        <p class="card-text">'  .$row['description']. '</p>

        <input type="hidden" name="id_formation" type = "submit" value ="'.$id_formation.'">
        <input class="btn " type="submit" value = "More" style = "width : 30% ;background-color:#0D6EFD;color:white;margin-top:5%">

    </div>
    
    </form>
    </div>';

}


echo '</div>';

}


else{

    echo '<div class="row latestsProductsdiv">';
            echo '<h1 class ="text-center">There is no Training available :)</h1>';
    echo '</div>';
}


?>




</div>
</div>

<footer class = "">

<div class="text-center p-4" style="background-color: #212A3E; color:white;">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="home.php">Excelsior.com</a>
</div>

</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
    </html>