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


$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmpassword = $_POST["confirmpassword"];

if( (!empty($firstname)) && (!empty($lastname)) && (!empty($email))
    && (empty($password) || empty($confirmpassword) ) ){

    $upd = mysqli_query($conn, "UPDATE `apprenant` SET `firstname` = '$firstname', `lastname` = '$lastname',`email` = '$email' WHERE `id_apprenant` = '$id'");

}
elseif
( (!empty($firstname)) && (!empty($lastname)) && (!empty($email))
    && (!empty($password) && !empty($confirmpassword) ) && ($password == $confirmpassword)){

        $upd = mysqli_query($conn, "UPDATE `apprenant` SET `firstname` = '$firstname', `lastname` = '$lastname',`email` = '$email' , `password` = '$password' WHERE `id_apprenant` = '$id'");


}


header("Location:Profile-personal.php");
exit();


?>