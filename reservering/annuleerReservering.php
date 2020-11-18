<?php

  $date = new DateTime();
 
  include_once '../include/login_medewerker.inc.php';
  
 

  
  $_SESSION["TrackingURL"]= $_SERVER["PHP_SELF"];
  varificatie();
 
  
  
  $pdo = new Db();
  $pdo = $pdo->connect();
  if(isset($_GET['verstopt'])){
      $_SESSION['reserveringnr'] = $_GET['verstopt'];
    }


//fetch aantal gekozen voorzieningen

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
      <link href='https://fonts.googleapis.com/css?family=Bungee Shade'  rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Alike Angular' rel='stylesheet'>
     
     
     
      <title>Annuleren</title>
      <link rel="stylesheet" href="../style.medewerkers.css">
<style>
    body{
        background-image: url("../images/campingbg.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
       
    }
   
    @media only screen and (min-width: 800px) {
 
        #title{
        font-size:3rem;
        font-family:"bungee shade";
        color:black;
        
    }
   
    
    }
    @media only screen and (max-width: 799px) {
 
 .container{
 width:100%;
 text-align: center;
 color:white;
 font-family:"Alike Angular";
 
 
}
    }

    
    .row{
            margin:1.8%;
            margin-top: 3%;
            
            
    }
    #terug{
      position: relative;
      top:10px;
      height:45px;
      text-align: center;
    }
  
 
    
    
    
    
</style>
</head>
<body class="bg-warning">

    <div class="container">
    
     <div class="row">
         <div class="col-md-12 col-12">

             <div class="title">
                 <h1 class="text-center mt-5"><span id="title">Annuleren reservering<span></h1>
            </div>
        </div> 
        </div>
      
      <div class="row bg-success w-100 text-center p-0">
   
   <div class="col-md-12">
   <?php echo '<center>'.ErrorMessage().'</center>'; ?>
     <?php echo '<center>'.SuccessMessage().'</center>'; ?>
      <form method="post" action="../include/annuleerReservering.inc.php">
      <div class="row">
   <div class="offset-md-4 col-md-4 offset-md-4">
      <div class="form-group"> 
    <label for="Reserveringnr" class="text-dark">Reservering nummer</label>
    <input type="text" class="form-control text-center bg-light" id="Reserveringnr" name="reserveringnr" readonly value="<?php echo $_SESSION['reserveringnr'];?>">
      </div>
      </div>
      </div>
  <div class="row">
         <div class="col-md-12">
        
         
         <div class='table table-responsive'>
         <table class='table table-hover bg-light table table-bordered mt-3'>
        <thead class='bg-dark text-light'>
          <tr>
            <td>ID</td>
            <td>Voornaam</td>
            <td>Achternaam</td>
            <td>Reserveringnr</td>
            <td>Reservering datum</td>
            <td>Aankomstdatum</td>
            <td>Vertrekdatum</td>
            
          </tr>
        </thead>

        <?php



$query="SELECT * FROM klant INNER JOIN 
reservering ON klant.klantid = reservering.klantid WHERE reservering.reserveringnr = '$_SESSION[reserveringnr]'";

$query_run = $pdo->query($query);
if($query_run){
while($row=$query_run->fetch(PDO::FETCH_OBJ)){
    echo '<tr class="text-dark font-weight-bold"><td>'.$row->klantid.'</td>';
    echo '<td>'.$row->voornaam.'</td>';
    echo '<td>'.$row->achternaam.'</td>';
    echo '<td>'.$row->reserveringnr.'</td>';
    echo '<td>'.$row->reserveringdatum.'</td>';
    echo '<td>'.$row->aankomstdatum.'</td>';
    echo '<td>'.$row->vertrekdatum.'</td></tr>';
    

}

}








?>
</table>
</div>
      

        </div>
          
          
        
         
        
     
     
 

        </div>
        
       <div class="row">
        <div class="col-md-12 col-sm-12">
          <h2 class="text-center text-light font-weight-bold p-2"> Weet je het zeker dat je deze boeking wilt aanuleren?</h2>
        </div>
       </div>
       <div class="row">
        <div class="col-md-6 col-sm-6">
          <input type="submit" name="submit-annuleren" class="btn btn-lg bg-danger text-light font-weight-bold" value="JA"> 
        </div>
        <div class="col-md-6 col-sm-6">
        <input type="button" id="terug" class="btn btn-lg bg-info text-light font-weight-bold w-100 text-center" value="Terug" onclick="window.location.href='reserveringOverzicht.php';"> 
        </div>
       </div>
       </form>
       </div>
       </div>
        </div>
</body>
</html>