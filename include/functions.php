<?php
function desinfectieString($string){
    $string = strip_tags($string);
    $string=str_replace(" ","",$string);
    return $string;
}

function hashWachtwoord($string)
{
    $string = md5($string);
    return $string;
}

function varificatie(){
if(!isset($_SESSION["authentication"]))
{
header("Location:../Momgeving/login_medewerker.php");
    
}
else{
    return true;
}


}



 
?>


