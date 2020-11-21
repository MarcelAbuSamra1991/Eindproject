<?php

include '../classes/dbc.php';
include 'sessions.php';
include 'functions.php';

if(isset($_POST['submit-annuleren'])){

    $pdo = new Db();
   $pdo = $pdo->connect();
   
  $reserveringnr = $_POST['reserveringnr'];
  $query ="DELETE FROM betaling WHERE reserveringnr ='$reserveringnr';";
  $query.="DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr';";
  $query.= "DELETE  reservering,klant FROM reservering INNER JOIN klant ON reservering.klantid = klant.klantid WHERE reserveringnr = '$reserveringnr'";
 




$query_run = $pdo->prepare($query);
$query_run->execute();

if(($query_run)){
$_SESSION["SuccessMessage"] = "De boeking is successvol geannuleerd";
header("Location:../reservering/annuleerReservering.php");

}




else{
header("Location:../reservering/r_home.php");
}


}
?>