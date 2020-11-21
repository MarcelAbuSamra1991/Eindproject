<?php

include '../classes/dbc.php';
include '../include/sessions.php';
include '../include/functions.php';

if(isset($_POST['submit-verwijder'])){

    $pdo = new Db();
   $pdo = $pdo->connect();
   
  $id = $_POST['id'];
  $query="DELETE  FROM medeadmin  WHERE  id = '{$_SESSION['id']}'";
  
  
  




$query_run = $pdo->prepare($query);
$query_run->execute();

$query_run->execute();
if($query_run){
$_SESSION["SuccessMessage"] = "Medewerker is successvol verwijderd";
header("Location:verwijderPersoneel.php");

}




else{
header("Location:personeelOverzicht.php");
}


}
?>