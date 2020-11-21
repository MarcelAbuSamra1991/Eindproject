<?php
include '../classes/dbc.php';
include '../include/sessions';
if(isset($_GET['verstopt'])){
    $reserveringnr = $_GET['verstopt'];
}

  
$pdo = new Db();
$pdo = $pdo->connect();

$query="UPDATE betaling SET state='voltooid' WHERE reserveringnr = '$reserveringnr'";

$query_run = $pdo->prepare($query);
$query_run->execute();
if($query_run){

    $_SESSION["SuccessMessage"] = "voltooid betaling ".$reserveringnr;
    header("Location:../reservering/reserveringOverzicht.php");
}
else{
    $_SESSION["ErrorMessage"] = "Er is wat mis gegaan";
    header("Location:../reservering/reserveringOverzicht.php");
}






?>