<?php




include '../classes/dbc.php';

if(isset($_POST['reserveringnr'])){
  
  $pdo = new Db();
  $pdo = $pdo->connect();
  $reserveringnr = $_POST["reserveringnr"];

 
// query die aantal parkeer plaatsen haalt.

$query = "SELECT sum(aantal) as aantal FROM voorzieningen  WHERE optienr = 10 AND reserveringnr != '$reserveringnr'";
  

  $query_run = $pdo->query($query);
   if($query_run){
    
   while($row = $query_run->fetch(PDO::FETCH_OBJ)){
  $aantal = 200;
  $beschikbareParkeer = $aantal - $row->aantal;
   echo "<input type='text' class='font-weight-bold text-center btn btn-light w-100' value='Aantal beschikbaar: $beschikbareParkeer' min='0' readonly/>";
           
} 
}
}



    

?>

