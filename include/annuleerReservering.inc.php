<?php

include '../classes/dbc.php';
include 'sessions.php';
include 'functions.php';

if(isset($_POST['submit-annuleren'])){

    $pdo = new Db();
   $pdo = $pdo->connect();
   
  $reserveringnr = $_POST['reserveringnr'];
  $query="DELETE  FROM voorzieningen  WHERE reserveringnr = '$reserveringnr';";
  $query2 = "DELETE klant, reservering FROM reservering INNER JOIN  klant ON reservering.klantid = klant.klantid WHERE reserveringnr = '$reserveringnr'";
  
  




$query_run = $pdo->prepare($query);
$query_run->execute();
$query_run2 = $pdo->prepare($query2);
$query_run2->execute();
if(($query_run) && ($query_run2)){
$_SESSION["SuccessMessage"] = "De boeking is successvol geannuleerd";
header("Location:../reservering/annuleerReservering.php");

}




else{
header("Location:../reservering/r_home.php");
}


}
?>