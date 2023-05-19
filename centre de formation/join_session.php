 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message | Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>
    .tt{
        width: 35%;
        background-color: transparent;
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 5% 5%;

    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #F6FFDE;
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

<?php
require 'config.php';
if(!empty($_SESSION["id_apprenant"])){
    $id = $_SESSION["id_apprenant"];
    $result = mysqli_query($conn, "SELECT * FROM apprenant WHERE id_apprenant = $id");
    $row = mysqli_fetch_assoc($result);

    $id_apprenant = $_SESSION['id_apprenant'];
    $id_session = $_GET['id_session'];
    $id_formation = $_GET['id_formation'];


$ChauvechementCount_All =  mysqli_query(
    
$conn,"SELECT COUNT(*) FROM inscription i 
INNER JOIN session s ON s.id_session = i.id_session
WHERE id_apprenant = $id_apprenant

AND ( 
    (s.date_debut >  (SELECT date_debut FROM session s WHERE id_session = $id_session) AND s.date_debut <  (SELECT date_fin FROM session s WHERE id_session = $id_session))

OR  (s.date_fin >  (SELECT date_debut FROM session s WHERE id_session = $id_session) AND s.date_fin < (SELECT date_fin FROM session s WHERE id_session = $id_session) )

OR  (s.date_debut <  (SELECT date_debut FROM session s WHERE id_session = $id_session) AND s.date_fin >  (SELECT date_fin FROM session s WHERE id_session = $id_session)) 
)"
);


$ChauvechementCount = mysqli_fetch_row($ChauvechementCount_All)[0];



$sql_num_session  = mysqli_query($conn, 
            "SELECT s.id_session FROM inscription i 
            INNER JOIN session s ON s.id_session = i.id_session
            WHERE i.id_apprenant = $id
            AND YEAR (s.date_debut) = YEAR (NOW())");

$num_session_Data = mysqli_fetch_all($sql_num_session);


$num_session = COUNT($num_session_Data);

$sql_SameCourseCheck = mysqli_query($conn,
    "SELECT COUNT(*) FROM inscription
INNER JOIN session ON inscription.id_session = session.id_session
INNER JOIN formation ON session.id_formation = formation.id_formation
WHERE inscription.id_apprenant = $id_apprenant AND formation.id_formation = $id_formation"
);

$queryresult = mysqli_fetch_array($sql_SameCourseCheck);
$SameCoursesCount = (int)$queryresult[0];





    if( $num_session < 2 && !checksession($num_session_Data,$_GET["id_session"]) && $ChauvechementCount == 0 && $SameCoursesCount == 0){

        $checkres = mysqli_query($conn, "SELECT * FROM session WHERE id_session = '$id_session'");

        $sqlres= mysqli_query($conn, "INSERT INTO `inscription`(`id_apprenant`, `id_session`) VALUES ('$id_apprenant', '$id_session')");

        echo '<div class="row latestsProductsdiv text-center">
        <h1 class ="col-md-12" style="color : green;">You have Joined The Session :)</h1>
        <a class="px-5 mt-5 btn btn-sm btn-outline-dark col-md-4" href="Formations.php" style = margin:auto>Back</a>
        </div>';
        // echo $ChauvechementCount;
        
    }
    elseif(checksession($num_session_Data,$_GET["id_session"]) ){
        
        echo '<div class="row latestsProductsdiv text-center">
        <h1 class ="col-md-12" style="color : red;">You have already joined this session</h1>
        <a class="px-5 mt-5 btn btn-sm btn-outline-dark col-md-4" href="Formations.php" style = margin:auto>Back</a>
        </div>';
        // echo $ChauvechementCount;

    }elseif($num_session == 2){
        echo '<div class="row latestsProductsdiv text-center">
        <h1 class ="col-md-12" style="color : red;">You have already joined 2 sessions this year</h1>
        <a class="px-5 mt-5 btn btn-sm btn-outline-dark col-md-4" href="Formations.php" style = margin:auto>Back</a>
        </div>';
        // echo $ChauvechementCount;
    }
    elseif($SameCoursesCount != 0){
        echo '<div class="row latestsProductsdiv text-center">
        <h1 class ="col-md-12" style="color : red;">You are already enrolled in a session that concerns the same course</h1>
        <a class="px-5 mt-5 btn btn-sm btn-outline-dark col-md-4" href="Formations.php" style = margin:auto>Back</a>
        </div>';
    }
    else{
        echo '<div class="row latestsProductsdiv text-center">
        <h1 class ="col-md-12" style="color : red;">You can\'t join this session</h1>
        <h3 class ="col-md-12" style="color : red;">There is another session in this date</h3>
        <a class="px-5 mt-5 btn btn-sm btn-outline-dark col-md-2" href="Formations.php" style = margin:auto>Back</a>
        </div>';
    }
    


}
else{
    header("Location: login.php");
}

?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
<?php
function checksession($array,$id){
    
    foreach($array as $item) {
        if ($item[0] == $id) return true;
        return false;
    }
}
?>
