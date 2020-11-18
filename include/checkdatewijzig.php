<?php
include '../classes/dbc.php';

if(isset($_POST["aankomst"]) && ($_POST["vertrek"]) &&($_POST["reserveringnr"])){
  $pdo = new Db();
  $pdo = $pdo->connect();
  $aankomst = $_POST["aankomst"];
   $vertrek = $_POST["vertrek"];
   $reserveringnr = $_POST["reserveringnr"];
 
// query die de startdate en enddate checkt en geeft de beschikbare plaatsen.
 $query = "SELECT r.plaatsid, p.plaatsid,pt.plaatsomschrijvingid,pt.plaatsomschrijvingid,pt.plaatsnaam, pt.plaatsprijs FROM reservering r RIGHT JOIN plaatsen p 
ON r.plaatsid = p.plaatsid JOIN plaatsentarief pt ON p.plaatsomschrijvingid = pt.plaatsomschrijvingid WHERE p.plaatsid NOT IN(SELECT plaatsid FROM reservering WHERE 
 (aankomstdatum BETWEEN '$aankomst' AND '$vertrek' OR vertrekdatum BETWEEN '$aankomst' AND '$vertrek') 
 OR (aankomstdatum <= '$aankomst' AND vertrekdatum >='$vertrek')) OR r.reserveringnr = '$reserveringnr'  GROUP BY p.plaatsid";
   

  $query_run = $pdo->query($query);

  
  if($query_run){
    
      
   while($row= $query_run->fetch(PDO::FETCH_OBJ))
      {
      
      
        echo  '<option value="'.$row->plaatsid.'">'.$row->plaatsnaam." ".$row->plaatsid." ".$row->plaatsomschrijvingid.'</option>';
        
      
        
  }


        
  }


}
    

?>