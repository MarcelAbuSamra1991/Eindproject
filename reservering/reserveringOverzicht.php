<?php


include_once '../include/login_medewerker.inc.php';

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
         body{
  background-image:url("../images/campingbg.jpg");
  background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size:100%;
} 
        .nav-link{
  font-size:1.3rem;
}
@media only screen and (min-width: 899px) {
  .logo{
    width:70%;
  }
}
  @media only screen and (min-width: 899px) {
  #logout{
    height: 62px;
  }
}

  nav{
    position: relative;
    top: 18px;
  }
  #logout{
    height:60px;
  }
 
        </style>
        <script>
   
    </script>
        </head>
<body class="bg-warning">
<div class="container-fluid">
  <?php echo '<center>'.SuccessMessage().'</center>'; ?>
  <div class="row">
  <div class="col-12">
  <nav class="navbar navbar-expand-lg navbar-light bg-warning ml-auto">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"  aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><img  class="logo" src="../images/Logo.png"></a>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0 pr-5">
      <li class="nav-item">
        <a class="nav-link text-success font-weight-bold" href="boeken.php">Reservering boeken <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success font-weight-bold" href="reserveringOverzicht.php">Reservering overzicht</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success font-weight-bold" href="r_home.php">Home</a>
      </li>
      <li class="nav-item">
      <button class="btn btn-bg bg-danger text-light  font-weight-bold" onclick="window.location.href='../include/logout.inc.php';" id="logout"><i class='fas fa-sign-out-alt'></i><br> Loguit</button>
      </li>
    
    </ul>
    
  </div>
</nav>
   </div>
   </div>
    

<!-- Nav Bar -->


   
    


      </div>

    <div class="container-fluid" style="margin-top:40px;">
    <div class="row">
    <div class="offset-md-2 col-md-8 text-center offset-md-2 pb-3">
    <h2 class="text-light" style="font-family:Bungee Shade;">Reserveringen overzicht</h2>
    </div>
    </div>
    
      <div class="row mt-3">
        <div class="offset-md-2 col-md-6">
        
        <div class="form-group">
          
          <input type="text" id="search"  name="Search" placeholder="Search ..." class="w-100 border-success" style="height:40px;">
          
          </div>
          </div>
          <div class="col-md-2">
          <div class="form-group">
          
          <input type="button" id="btnShow" value="Refresh"  class="w-100 bg-info font-weight-bold text-light btn btn-responsive" style="height:40px;">
          </div>
          
      
          </div>
          </div>

      








       <div class="row">
         <div class="offset-md-2 col-md-8 offset-md-2 col-12">
         <div id="overzicht">
         <div class='table table-responsive'>
         <table class='table table-hover bg-light table table-bordered mt-3 text-center' id="rOverzicht">
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

        <?php

$pdo = new Db();
$pdo = $pdo->connect();

$query="SELECT * FROM klant INNER JOIN 
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
<button class='btn btn-sm btn-primary' type = 'submit' name='betaald'>Betaald</button>
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
         
        
      

   <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script type="text/javascript">
     
 $(document).ready(function(){
$('#search').keyup(function(){  
    
    var search = $(this).val();  
      if(search != '')  
      {  
       $.ajax({  
            url:"../include/search.inc.php",  
            type:'GET',  
            data:{search:search},  
            success:function(data)  
            {  
              $('#overzicht').html(data);  
            }  
       });  
      }
     
     
 });
});    
$(document).ready(function(){
      $('#btnShow').click(function(){
        $('#overzicht').load('../include/reserveringOverzicht.inc.php');
      });
    });   
    $(document).ready(function(){
      $('#BetaaldBtn').click(function(){
        $('#overzicht').load('../include/reserveringOverzicht.inc.php');
      });
    });   
    
    
     </script>



</body>
</html>


