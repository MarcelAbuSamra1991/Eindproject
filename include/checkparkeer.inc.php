<?php



include '../classes/dbc.php';

  $pdo = new Db();
  $pdo = $pdo->connect();
 
 
// query die de startdate en enddate checkt en geeft de beschikbare plaatsen.

$query = "SELECT sum(aantal) as aantal FROM voorzieningen  WHERE optienr = 10";
  

  $query_run = $pdo->query($query);
   if($query_run){
    
   while($row = $query_run->fetch(PDO::FETCH_OBJ)){
  $aantal = 200;
  $beschikbareParkeer = $aantal - $row->aantal;
   echo "<input type='text' class='font-weight-bold text-center btn btn-light w-100' value='Aantal beschikbaar: $beschikbareParkeer' min='0' readonly/>";
           
} 
}



    

?>

