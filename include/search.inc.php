  <?php
include '../classes/dbc.php';
$output='';
 if(isset($_GET["search"])){
  
  $pdo = new Db();

  $pdo = $pdo->connect();

  $query="SELECT * FROM klant INNER JOIN 
  reservering ON klant.klantid = reservering.klantid
   WHERE klant.voornaam LIKE '%".$_GET["search"]."%' OR klant.achternaam LIKE '%".$_GET["search"]."%' OR klant.email LIKE '%".$_GET["search"]."%'";
   
 }


$query_run = $pdo->query($query);

if($query_run->rowCount()){

                $output= "<div class='table-responsive'>
         <table  class='table table-hover bg-light table table-bordered mt-3 text-center'>
         <thead class='bg-dark text-light'>
          <tr>
            <td>ID</td>
            <td>Voornaam</td>
            <td>Achternaam</td>
            <td>Reserveringnr</td>
            <td>Reservering datum</td>
            <td>Aankomstdatum</td>
            <td>Vertrekdatum</td>
            <td> Wijzigen</td>
            <td>Annuleren</td>
            <td>Factuur</td>
            <td>Betaling</td>
          </tr>
        </thead>
        </tbody>";

if($query_run){
  while($row = $query_run->fetch(PDO::FETCH_OBJ)){

   
    $output .= "<tr class='text-dark font-weight-bold'><td class='text-danger'>".$row->klantid."</td>
    <td>".$row->voornaam."</td>
     <td>".$row->achternaam."</td>
    <td class='text-success'>".$row->reserveringnr."</td>
     <td>".$row->reserveringdatum."</td>
    <td>".$row->aankomstdatum."</td>
     <td>".$row->vertrekdatum."</td>
     <td><form action='wijzigReservering.php' method='get'>
                    <input type='hidden' name='verstopt' value='$row->reserveringnr'>
                    <button class='btn btn-sm btn-success' type ='submit' name='Wijzig'>Wijzig</button>
                    </form></td>

     <td><form action='annuleerReservering.php' method='get'>
                    <input type='hidden' name='verstopt' value='$row->reserveringnr'>
                    <button class='btn btn-sm btn-danger' type = 'submit' name='Annuleren'>Annuleren</button>
                </form></td>
                <td><form action='../fpdf/factuur.inc.php' method='get'>
                <input type='hidden' name='verstopt' value='$row->reserveringnr'>
                <button class='btn btn-sm btn-warning' type = 'submit' name='Factuur'>Factuur</button>
            </form></td>

               <td><form action='../include/betaling.inc.php' method='get'>
                <input type='hidden' name='verstopt' value='$row->reserveringnr'>
                <button class='btn btn-sm btn-primary' type = 'submit' name='Factuur'>Betaald</button>
            </form></td></tr>";
    
     

  }
 
}
$output .= "</tbody></table></div>";
echo $output;
}
else{
  echo "<h2 class='text-danger p-2 bg-light font-weight-bold' style='opacity:0.7;'>Geen records gevonden</h2>";
}


  



?>

