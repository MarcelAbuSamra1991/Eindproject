<?php
include_once ('../classes/dbc.php');
include_once ('../include/functions.php');

include_once ('../include/sessions.php');
if(isset($_POST['submit-wijzig']))
{
   // $pdo = Db::connect();
    $pdo = new Db();
    $pdo->connect();
    $voornaam = desinfectieString($_POST["voornaam"]);
    $achternaam = desinfectieString($_POST["achternaam"]);
    $soort = $_POST["kiesSoort"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];
    if(empty($voornaam)||empty($achternaam)||empty($soort)||empty($email)||empty($wachtwoord)){
        $_SESSION["ErrorMessage"]= "Vul alle velden in";
        header("Location:wijzigPersoneel.php");
        exit();
    }
    elseif(wijzigMedewerker($pdo,$voornaam,$achternaam,$soort,$email,$wachtwoord)){
       
        
        $_SESSION["SuccessMessage"]= "Medewereker is succescvol gewijzigd";
        header("Location:wijzigPersoneel.php");

    }
}
    function wijzigMedewerker($pdo,$voornaam,$achternaam,$soort,$email,$wachtwoord)
    {   
        $query = $pdo->connect()->prepare("
        UPDATE medeadmin SET voornaam = :voornaam, achternaam = :achternaam,  soort= :soort , email =:email, wachtwoord =:wachtwoord 
        
        ");
        
        
        $query->bindParam(":voornaam",$voornaam);
        $query->bindParam(":achternaam",$achternaam);
        $query->bindParam(":soort",$soort);
        $query->bindParam(":email",$email);
        $query->bindParam(":wachtwoord",$wachtwoord);
        return $query->execute();
    }

   


?>