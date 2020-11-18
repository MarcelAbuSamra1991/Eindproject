<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Spicy+Rice&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/5a8735a64a.js" crossorigin="anonymous"></script> <!--load all styles --> <!--load all styles icons -->
      <link href='https://fonts.googleapis.com/css?family=Bungee Shade' Script' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Alike Angular' rel='stylesheet'>
     </head>
   <style>
  
   </style>
     <body>
     <div class='container'>
     <div class='row'>
     <div class='col-md-12'>
     <div class='table-responsive'>
<table class='table table-hover bg-light table table-bordered mt-3 text-center'>
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
          </tr>
        </thead>
      




<?php
include '../classes/dbc.php';
$pdo = new Db();
$pdo = $pdo->connect();

$query="SELECT reservering.klantid, klant.voornaam,reservering.plaatsid,klant.achternaam,reservering.reserveringnr,reservering.reserveringdatum,reservering.aankomstdatum,reservering.vertrekdatum FROM klant INNER JOIN 
reservering ON klant.klantid = reservering.klantid  ORDER BY reservering.reserveringdatum DESC LIMIT 5";

$query_run = $pdo->query($query);
if($query_run){
while($row=$query_run->fetch(PDO::FETCH_OBJ)){
    echo '<tr class="text-dark font-weight-bold"><td class="text-danger">'.$row->klantid.'</td>';
    echo '<td>'.$row->voornaam.'</td>';
    echo '<td>'.$row->achternaam.'</td>';
    echo '<td class="text-success">'.$row->reserveringnr.'</td>';
    echo '<td>'.$row->reserveringdatum.'</td>';
    echo '<td>'.$row->aankomstdatum.'</td>';
    echo '<td>'.$row->vertrekdatum.'</td>';
    echo  "<td><form action='wijzigReservering.php' method='get'>
    <input type='hidden' name='verstopt' value='$row->reserveringnr'>
    <button class='btn btn-sm btn-success' type ='submit' name='Wijzig'>Wijzig</button>
    </form></td>

    <td><form action='aanuleerReservering.php' method='get'>
    <input type='hidden' name='verstopt' value='$row->reserveringnr'>
    <button class='btn btn-sm btn-danger' type = 'submit' name='Annuleren'>Annuleren</button>
</form></td>

<td><form action='../fpdf/factuur.inc.php' method='get'>
<input type='hidden' name='verstopt' value='$row->reserveringnr'>
<button class='btn btn-sm btn-warning' type = 'submit' name='factuur'>Factuur</button>
</form></td></tr>";


}

}
else{
    return  false;
}







?>
</table>
</div>
</div>
</div>


</body>
</html>