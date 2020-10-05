  <?php include_once '../include/login_medewerker.inc.php'?>

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
      <title>Reservering omgeving</title>
      <style>
     
      
     


/*:darkslategrey*/


body{
  background-image:url("../images/campingbg.jpg");
  background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size:98.4%;
}
.navbar-collapse.in{
        display: block !important;
      }
     

.nav-link{
  font-size:1.4rem;
  
  
}
.navbar{
  height:140px;
}
.nav-item{
  padding: 30px;
}

.versie{
  text-align: center;
  margin-top:3%;
  
}
.footer{
  margin-top:25.2%;
  text-align:center;
  padding: 1.3% 4%;
  
}
.footer-link{
 
  color:green; 
  padding:8% 7%;
  
  

}
.footer-link:hover{
  color:black;
}
i{
  padding:1%;
}


      </style>
    

    </head>
  <body class="bg-warning">
  <div class="container-fluid">
    <?php echo  '<center>'.SuccessMessage().'</center>'; ?>
   
    

<!-- Nav Bar -->

<div class="row">
  <div class="col-12 ">
<nav class="navbar navbar-expand-lg bg-warning">
  <a class="navbar-brand" href="#"><img src="../images/Logo.png" style="height:150px;"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse"  id="navbarToggle">

    <ul class="navbar-nav ml-auto mt-0" id="nav-Items">

      <li class="nav-item">
        <a class="nav-link  text-success font-weight-bolder" href="boeken.php">Reservering boeken</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link text-success font-weight-bolder" href="reserveringOverzicht.php">Reservering overzicht</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../include/logout.inc.php"><button  type="button"   class="btn btn-outline-dark"><i class="fas fa-sign-out-alt"></i>Logout</button></a>
      </li>
     
  </div>
  

</nav>
    </div>
    </div>
    <div class="datum">
    <div class="row m-auto bg-dark text-center">
      <div class="offset-md-4 col-md-4 offset-md-4">
        <form>
      <div class="form-group">
    <label>Beschikbare dagen</label>
    <input type="date" class="form-control bg-light text-dark" id="exampleInputEmail1" aria-describedby="emailHelp">
      </form>
    </div>
    
    </div>


      </div>
    </div>
    <div class="footer bg-warning">
  <footer>
    <a class="footer-link" href="https://www.linkedin.com/in/marcel-abu-samra-ba082615"><i class="fab fa-linkedin-in fa-3x"></i></a>
    <a class="footer-link" href="https://www.instagram.com/marcelo_abusamra/?hl=nl"><i class="fab fa-instagram fa-3x"></i></a>
    <a class="footer-link" href="https://www.facebook.com/marcel.abusamra"> <i class="fab fa-facebook-square fa-3x"></i></a>
    <p class="versie text-muted">© Copyright 2020 La Rustique Camping</p>

  </footer>
  </div>

   
    </div>

<!-- Title -->



  
    
       

    
        
      
   
    </body>
  </html>
 