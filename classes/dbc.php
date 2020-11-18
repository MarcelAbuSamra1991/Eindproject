<?php
 class Db{

public function connect()
{
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "eindproject2020";
   
    try{
        $dsn = "mysql:host=$servername;dbname=$dbName";
        $pdo = new PDO($dsn,$username,$password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ERRMODE_EXCEPTION);
       
    }catch(PDOException $e){
        echo "Connection failed: ".$e->getMessage();
    }
    return $pdo;


}
/*public function getInfo(){
$query="SELECT reservering.klantid, klant.voornaam,reservering.plaatsid,klant.achternaam,reserveeing.reserveringnr,reservering.reservering.datum,reservering.aankomstdatum,reservering.vertrekdatum FROM klant INNER JOIN 
reservering ON klant.klantid = reservering.klantid";

$query_run = $pdo->query($query);
return $query_run;
}*/
 }


?>