<?php
include_once ('../classes/dbc.php');
include_once ('functions.php');

include_once ('sessions.php');
if(isset($_POST['submit-signup']))
{
    $pdo = Db::connect();
    $voornaam = desinfectieString($_POST["voornaam"]);
    $achternaam = desinfectieString($_POST["achternaam"]);
    $soort = $_POST["soort"];
    $email = $_POST["email"];
    $wachtwoord = hashWachtwoord($_POST["wachtwoord"]);
    if(empty($voornaam)||empty($achternaam)||empty($soort)||empty($email)||empty($wachtwoord)){
        $_SESSION["ErrorMessage"]= "Vul alle velden in";
        header("Location: ../Momgeving/signup_medewerker.php");
        exit();
    }
    elseif(invoerMedewerker($pdo,$voornaam,$achternaam,$soort,$email,$wachtwoord)){
       
        
        $_SESSION["SuccessMessage"]= "Medewereker is succescvol ingevoerd";
        header("Location:../Momgeving/signup_medewerker.php");

    }
}
    function invoerMedewerker($pdo,$voornaam,$achternaam,$soort,$email,$wachtwoord)
    {   
        $query = $pdo->prepare("
        INSERT INTO medeadmin(voornaam,achternaam,soort,email,wachtwoord)
        VALUES(:voornaam,:achternaam,:soort,:email,:wachtwoord)
        ");
        
        
        $query->bindParam(":voornaam",$voornaam);
        $query->bindParam(":achternaam",$achternaam);
        $query->bindParam(":soort",$soort);
        $query->bindParam(":email",$email);
        $query->bindParam(":wachtwoord",$wachtwoord);
        return $query->execute();
    }

   


?>