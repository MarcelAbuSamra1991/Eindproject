<?php
class Db{

public static function connect()
{
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "eindproject2020";
   
    try{
        $dsn = "mysql:host=$servername;dbname=$dbName";
        $pdo = new PDO($dsn,$username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    }catch(PDOException $e){
        echo "Connection failed: ".$e->getMessage();
    }
    return $pdo;


}
}

?>