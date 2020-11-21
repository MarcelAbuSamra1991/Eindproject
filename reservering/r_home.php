  <?php include_once '../include/login_medewerker.inc.php';?>
  
  <?php 
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
     
      <link rel="stylesheet" href="../style.medewerkers.css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <title>Reservering omgeving</title>
      <style>
     
      
     


/*:darkslategrey*/


 body{
  background-image:url("../images/campingbg.jpg");
  background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size:100%;
} 

.navbar-collapse.in{
        display:inline-block !important;
      }
     






.versie{
  text-align: center;
  margin-top:2%;
  
}
@media only screen and (min-width: 900px) {
  .footer{
  
  text-align:center;
  padding: 2% 1%;
  position: relative;
  top:550px;
  
  
}


}
@media only screen and (max-width: 899px) {
  .footer{
  
  text-align:center;
  padding: 2% 1%;
  position: relative;
  top: 350px;

  
  
}


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
    margin-top: 110px;
    width:100%;
  
  opacity:0.6 


  
  
}


}

.footer-link{
 
  color:green; 
  padding: 4% 3%;
  

}
.nav-link{
  font-size:1.3rem;
}

.footer-link:hover{
  color:black;
}
i{
  padding:1%;
}




.logo{
  width:70%;
  
}

nav{
    position: relative;
    top: 18px;
  }
  #logout{
    height:60px;
  }



      </style>

 
    

    </head>
  <body class="bg-warning">
  <div class="container-fluid h-100">

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
        <button class="btn btn-bg bg-danger  text-light  font-weight-bold" onclick="window.location.href='../include/logout.inc.php';" id="logout"><i class='fas fa-sign-out-alt'></i><br> Loguit</button>
      </li>
    
    </ul>
    
  </div>
</nav>
   </div>
   </div>
    

<!-- Nav Bar -->


   
    


      
     
    <div class="row">
    <div class="col-12">
    
    <?php echo '<center>'.SuccessMessage().'</center>'; ?>
    
    </div>
    
    </div>
    <div class="container title  bg-dark"   >
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold text-light" style="height: 200px; padding-top: 80px;">Personeel omgeving! Hier kunt u een boeking invoeren, wijzigen of verwijderen voor klanten</h1>
</div>
</div>
</div>


   
    </div>
    

<!-- Title -->

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
   
    
       

<script>
 
 
      </script>
        
      
   
    </body>
  </html>
 