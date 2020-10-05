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
?>