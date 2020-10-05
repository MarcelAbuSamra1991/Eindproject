<?php
include_once '../classes/dbc.php';
include_once ('sessions.php');
include_once 'functions.php';
?>
<?php
if(isset($_POST["submit-login-m"])){
 $pdo = Db::connect();
 $voornaam = $_POST["voornaam"];
 $wachtwoord = hashWachtwoord($_POST["password"]);
 if(empty($voornaam)||empty($wachtwoord)){
     $_SESSION["ErrorMessage"]= "Vul alle velden in";
     header("Location:../Momgeving/login_medewerker.php");
     exit();
 }
 elseif(loginMedewerker($pdo,$voornaam,$wachtwoord)){
     $_SESSION["SuccessMessage"] = "Welcome ".$voornaam;
    header("Location:../reservering/r_home.php");
 }

 else{
     $_SESSION["ErrorMessage"] = "De voornaam of het wachtwoord zijn onjuist";
     header("Location: ../Momgeving/login_medewerker.php");
     exit();
 }
 
}
//check medewerker of admin logingegevens
 function loginMedewerker($pdo,$voornaam,$wachtwoord){
    $query = $pdo->prepare("
        SELECT * FROM medeadmin WHERE voornaam=:voornaam AND wachtwoord=:wachtwoord
        
        ");
        

        $query->bindParam(":voornaam",$voornaam);
        $query->bindParam(":wachtwoord",$wachtwoord);
         $query->execute();
         if($query->rowCount() == 1){
             return true;
         }
         else{
             return false;
         }

 }
 



?>


