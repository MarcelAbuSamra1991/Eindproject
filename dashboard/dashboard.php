<?php include_once '../include/login_admin.inc.php'?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5a8735a64a.js" crossorigin="anonymous"></script> <!--load all styles --> <!--load all styles icons -->
    
    
    <title>Dashboard Admin</title>
    <link  rel="stylesheet" href="../style.medewerkers.css" type="text/css">
    <style>
  #bgFoto{
      width:100%;
  }
  body{
      padding: 0;
    
  }
  
</style>
  </head>
<body>


  
  <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row mt-0">
        <aside class="col-12 col-md-2 p-0 bg-warning flex-shrink-1">
            <nav class="navbar navbar-expand navbar-light font-weight-bold bg-warning flex-column  align-items-start py-3">
              <h3 class="text-white mt-3">Dashboard</h3>
                <div class="collapse navbar-collapse">
                    <ul class="flex-md-column  flex-sm-row   navbar-nav w-100 justify-content-between">
                        
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="#"><i class="fas fa-user-plus"></i><span class="d-inline"> Admins</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="#"><i class="fas fa-euro-sign"></i><span class="d-inline"> Omzet</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="#"><i class="fas fa-user"></i> <span class="d-inline"> Medewerkers</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="#"><i class="fas fa-check"></i><span class="d-inline"> Reserveringen</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="../include/logout.inc.php"><i class="fas fa-sign-out-alt"></i> <span class="d-md-inline">Logout</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <main class="col bg-faded py-3 flex-md-grow-1 bg-success">
            <h2>Dashboard</h2>
            <p>
            <h1><?php echo  '<center>'.SuccessMessage().'</center>'; ?></h1>
            </p> 
            <p>
                Hier kunt u alle reserveringen en omzet bekijken en controleren
            </p> 
            <img src="../images/campingbg.jpg" alt="" id="bgFoto" >
           
        </main>
    </div>
</div>

</div>

  


  
  
    
  
  



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  </body>
</html>
