<?php


include_once '../include/login_medewerker.inc.php';
include 'sidebar.php';

 $_SESSION["TrackingURL"]= $_SERVER["PHP_SELF"];
  varificatie();
  ?>
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
       
       
       
        <title>Boeken</title>
        <link rel="stylesheet" href="../style.medewerkers.css">
       



        <style>
  
 
        </style>
        <script>
   
    </script>
        </head>
<body class="bg-warning">

        <div id="main">
    <div class="container" style='margin-top:15px;'>
    <div class="row">
    <div class="offset-md-2 col-md-8 text-center offset-md-2 pb-3">
    <h2 class="text-light" style="font-family:Bungee Shade;">Personeel overzicht</h2>
    </div>
    </div>
    
      <div class="row mt-3">
       
         
          <div class="col-md-6">
          <div class="form-group">
          
          <input type="button" id="btnTerug" value="Terug" onclick="location.href='dashboard.php'" class="w-100 bg-danger font-weight-bold text-light btn btn-responsive" style="height:40px;">
          </div>
            </div>
          <div class="col-md-6">
          <div class="form-group">
          
          <input type="button"  value="Toevoegen" onclick="location.href='../Momgeving/signup_medewerker.php'" class="w-100 bg-success font-weight-bold text-light btn btn-responsive" style="height:40px;">
          </div>
            
          
      
          </div>
          </div>

      
         









       <div class="row">
         <div class="col-md-12">
         
         <div class='table table-responsive'>
         <table class='table table-hover bg-light table table-bordered mt-3 text-center'>
        <thead class='bg-dark text-light'>
          <tr>
            <td>ID</td>
            <td>Voornaam</td>
            <td>Achternaam</td>
            <td>Soort</td>
            <td>Email</td>
           >
            <td> Wijzigen</td>
            <td>Verwijderen</td>
        
          </tr>
        </thead>

        <?php

$pdo = new Db();
$pdo = $pdo->connect();

$query="SELECT * FROM medeadmin";

$query_run = $pdo->query($query);
if($query_run){
while($row=$query_run->fetch(PDO::FETCH_OBJ)){
    echo '<tr class="text-dark font-weight-bold"><td class="text-danger">'.$row->id.'</td>';
    echo '<td>'.$row->voornaam.'</td>';
    echo '<td>'.$row->achternaam.'</td>';
    echo '<td>'.$row->soort.'</td>';
    echo '<td>'.$row->email.'</td>';
   
    echo  "<td><form action='wijzigPersoneel.php' method='get'>
    <input type='hidden' name='verstopt' value='$row->id'>
    <button class='btn btn-sm btn-warning' type ='submit' name='Wijzig'>Wijzig</button>
    </form></td>

    <td><form action='verwijderPersoneel.php' method='get'>
    <input type='hidden' name='verstopt' value='$row->id'>
    <button class='btn btn-sm btn-danger' type = 'submit' name='Annuleren'>Verwijderen</button>
</form></td></tr>";

 

}

}








?>
</table>
</div>
      
</div>
        </div>
          
          
        
         
        
     
     
 

        </div>
        
       </div>
         </div>
         
        
      

   <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script type="text/javascript">
     

     </script>



</body>
</html>


