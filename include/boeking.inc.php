<?php
include '../classes/dbc.php';
include 'sessions.php';
include 'functions.php';
if(isset($_POST["submit-boeking"]))
{
 
    $pdo = new Db();
   $pdo = $pdo->connect();
   
   
    $voornaam = desinfectieString($_POST["voornaam"]);
    $achternaam = desinfectieString($_POST["achternaam"]);
    $email =$_POST["email"];
    $telefoon = $_POST["telefoon"];
    $aankomstdatum = $_POST["aankomstdatum"];
    $vertrekdatum = $_POST["vertrekdatum"];
    $volwassene = $_POST["volwassene"];
    $twaalf = $_POST["twaalf"];
    $vier = $_POST["vier"];
   
   
    $huisdier = $_POST["huisdier"];
    $stroom = $_POST["stroom"];
    $bezoekers = $_POST["bezoekers"];
    $douchemunt = $_POST["douchemunten"];
  
    $wasmachine = $_POST["wasmachine"];
    $wasdroger = $_POST["wasdroger"];
    
    $parkeer = $_POST["parkeer"];
    $kiescamping = $_POST["kiescamping"];
    $plaatsid = fetchCampingId($pdo);
    $aantalParkeer = aantalParkeer($pdo);
   
   
  
    if(empty($voornaam)||empty($achternaam)|| empty($email)||empty($telefoon)||empty($aankomstdatum)||
    empty($vertrekdatum) || empty($kiescamping) || empty($volwassene)){
    $_SESSION["ErrorMessage"] = "Vul alle velden met een ster";
    header("Location:../reservering/boeken.php");
    exit();
    
    }
    elseif(strlen($voornaam)>15 || strlen($achternaam)>15){
      $_SESSION["ErrorMessage"] = "Voornaam of achternaam mag niet langer dan 20 letters zijn";
      header("Location:../reservering/boeken.php");
      exit();
   }
   elseif(strtotime($vertrekdatum) < strtotime($aankomstdatum)){
   
      $_SESSION["ErrorMessage"] = "De aankomstdatum mag niet groter dan de vertrekdatum";
      header("Location:../reservering/boeken.php");
      exit();
   }
   elseif((($kiescamping > 0 && $kiescamping <=25) || ($kiescamping >50 && $kiescamping <=75)) && ($stroom > 0)){
   
    $_SESSION["ErrorMessage"] = "De kleine camping voorzien niet van stroom";
    header("Location:../reservering/boeken.php");
    exit();
 }
 elseif(($aantalParkeer + $parkeer) > 200){
   
   
  $_SESSION["ErrorMessage"] = "Check aantal beschikbare parkeerplaatsen";
  header("Location:../reservering/boeken.php");
  exit();
}
  
   // invoeren klant
   $query = $pdo->prepare("
   INSERT INTO klant(voornaam,achternaam,email,telefoon) VALUES(?,?,?,?)
     ");

     $query->execute([$voornaam,$achternaam,$email,$telefoon]);
     $last = $pdo->lastInsertId();
     //invoeren reservering
   $query2= $pdo->prepare("
 INSERT INTO reservering(klantid,plaatsid,aankomstdatum,vertrekdatum)VALUES(?,?,?,?) 
    ");
 

 $query2->execute([$last,$plaatsid,$aankomstdatum,$vertrekdatum]); 
 $lastReserveringId = $pdo->lastInsertId();



 if(!empty($volwassene)){
  $query3 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
  ((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'volwassene'),'$lastReserveringId','$volwassene')";
 }
   if(!empty($twaalf)){
      $query4 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
   ((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'twaalf'),'$lastReserveringId','$twaalf')";
   }
   if(!empty($vier)){
    $query5 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
 ((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'vier'),'$lastReserveringId','$vier')";
 }
  if(!empty($huisdier)){
  $query6 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'huisdier'),'$lastReserveringId','$huisdier')";
}
  if(!empty($stroom)){
  $query7 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'stroom'),'$lastReserveringId','$stroom')";
}
 if(!empty($bezoekers)){
  $query8 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'bezoekers'),'$lastReserveringId','$bezoekers')";
}
 if(!empty($douchemunt)){
  $query9 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'douchemunten'),'$lastReserveringId','$douchemunt')";
}
 if(!empty($wasmachine)){
  $query10 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'wasmachine'),'$lastReserveringId','$wasmachine')";
}
  if(!empty($wasdroger)){
  $query11 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'wasdroger'),'$lastReserveringId','$wasdroger')";
}
if(!empty($parkeer)){
  $query12 ="INSERT INTO voorzieningen(optienr,reserveringnr,aantal)VALUES
((SELECT optienr FROM voorzieningentarieven WHERE optienaam = 'parkeer'),'$lastReserveringId','$parkeer')";
}
  
  
  
 
$query_run1 = $pdo->prepare($query3);
$query_run2 = $pdo->prepare($query4);
$query_run3 = $pdo->prepare($query5);
$query_run4 = $pdo->prepare($query6);
$query_run5 = $pdo->prepare($query7);
$query_run6 = $pdo->prepare($query8);
$query_run7 = $pdo->prepare($query9);
$query_run8 = $pdo->prepare($query10);
$query_run9 = $pdo->prepare($query11);
$query_run10 = $pdo->prepare($query12);


$query_run1->execute();
$query_run2->execute();

$query_run3->execute();
$query_run4->execute();

 
$query_run5->execute();
$query_run6->execute();

 
$query_run7->execute();
$query_run8->execute();

 
$query_run9->execute();
$query_run10->execute();

 


 



 

 





  
  
 
 
if(($query) && ($query2) && ($query_run1) && ($query_run2) && ($query_run3) && ($query_run4) && ($query_run5) && ($query_run6)
  && ($query_run7) && ($query_run8) && ($query_run9) && ($query_run10)){
 
   $_SESSION["SuccessMessage"] = "De boeking is successvol ingevoerd";
   header("Location:../reservering/boeken.php");
  
}


   

else{
 header("Location:../reservering/r_home.php");
}


    
  }
     
function fetchCampingId($pdo)
{
  global $kiescamping;
  $query = "SELECT plaatsid FROM plaatsen  WHERE plaatsid ='$kiescamping' ORDER BY plaatsid";
  

  $query_run = $pdo->query($query);
   if($query_run){
    
   $row = $query_run->fetch(PDO::FETCH_OBJ);
  
        $plaatsIdCheck = $row->plaatsid;
           
}  
// fetch plaatsid


  else{
    return false;
  }
 return $plaatsIdCheck;
  
}
function aantalParkeer($pdo)
{
  global $parkeer;
  $query = "SELECT sum(aantal) as aantal FROM voorzieningen  WHERE optienr = 10";
  

  $query_run = $pdo->query($query);
   if($query_run){
    
   $row = $query_run->fetch(PDO::FETCH_OBJ);
  
        $aantalParkeer = $row->aantal;
           
}  
// fetch plaatsid


  else{
    return false;
  }
 return $aantalParkeer;
  
}



  

 



?>