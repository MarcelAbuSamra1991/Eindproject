<?php include_once '../include/login_admin.inc.php';
include 'sidebar.php';
  $_SESSION["TrackingURL"]= $_SERVER["PHP_SELF"];
  varificatie();
?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Spicy+Rice&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/5a8735a64a.js" crossorigin="anonymous"></script> <!--load all styles --> <!--load all styles icons -->
        <link href='https://fonts.googleapis.com/css?family=Bungee Shade' Script' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Alike Angular' rel='stylesheet'>
    
    <title>Dashboard Admin</title>
    <link  rel="stylesheet" href="../style.medewerkers.css" type="text/css">
    <style>
  
body{
  background-image:url("../images/campingbg.jpg");
  background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size:100%;
} 
@media only screen and (min-width: 899px) {
  .title{
    margin-top: 190px;
  
    opacity:0.6 

  
  
}


}
@media only screen and (max-width:900px) {
  h1{
   
    padding-top: 20px;
    height: 75px;
    font-size: 1.2rem;
    
  
}


}
@media only screen and (max-width: 899px) {
  .title{
   
  
    opacity:0.6 ;
    margin-top: 27px;
    width:100%;
  
  opacity:0.6 


  
  
}


}
  
</style>
  </head>
<body class="bg-warning">


  
  

<div id="main">
<?php echo  '<center>'.SuccessMessage().'</center>'; ?>
<div class="container  title bg-dark">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold text-light" style="height: 200px; padding-top: 80px;">Dashboard voor Admins! Hier kunt u alle medewerekers gegevens, totale omzet bekijken en controleren</h1>
</div>
</div>
</div>
</div>

  
    
  
  



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script>

    </script>
  </body>
</html>
