<?php
include_once '../classes/dbc.php';
include_once 'sessions.php';
include_once 'functions.php';
?>
<?php
if(isset($_POST["submit-login"])){
 $pdo = new Db();
 $pdo = $pdo->connect();
 $voornaam = $_POST["voornaam"];
 $wachtwoord = hashWachtwoord($_POST["password"]);
 if(empty($voornaam)||empty($wachtwoord)){
     $_SESSION["ErrorMessage"]= "Vul alle velden in";
     header("Location: ../Momgeving/login_admin.php");
     exit();
 }
 elseif(loginAdmin($pdo,$voornaam,$wachtwoord)){
    $_SESSION["SuccessMessage"] = "Welcome ".$voornaam;
    $_SESSION["authentication"]= true;
    if(isset($_SESSION["TrackingURL"])){
        header("Location:".$_SESSION["TrackingURL"]);
    }
    else{
     
    header("Location:../dashboard/dashboard.php");
 }
}

 else{
     $_SESSION["ErrorMessage"] = "De voornaam of het wachtwoord zijn onjuist";
     header("Location: ../Momgeving/login_admin.php");
     exit();
 }
}
 
 function loginAdmin($pdo,$voornaam,$wachtwoord){
    $query = $pdo->prepare("
        SELECT * FROM medeadmin WHERE voornaam=:voornaam AND wachtwoord=:wachtwoord AND soort='admin'
        
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