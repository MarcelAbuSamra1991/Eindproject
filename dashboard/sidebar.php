<?php include_once '../include/login_admin.inc.php';
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
  
  .sidebar {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
   /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
}

/* The sidebar links */
.sidebar a {
  padding: 32px 32px 32px 32px;
  text-decoration:none;
  font-size: 20px;
  color: white;
  
  display: block;
  transition: 0.3s;
  font-family:"Arial";
}

/* When you mouse over the navigation links, change their color */
.sidebar a:hover {
  color: black;
  text-decoration:none;
}

/* Position and style the close button (top right corner) */
.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* The button used to open the sidebar */
@media only screen and (min-width: 800px) {



.openbtn {
  font-size: 20px;
  cursor: pointer;
  width: 200px;
  
  color: white;
  padding: 10px 15px;
  border: none;
}
}
@media only screen and (max-width: 799px) {



.openbtn {
  font-size: 20px;
  cursor: pointer;
  width: 150px;
  
  color: white;
  padding: 10px 15px;
  border: none;
}
}
.openbtn:hover {
  background-color: #444;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: .4s; /* If you want a transition effect */
  padding: 38px;
  margin-left:60px;

 
 
  
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

body{
  background-image:url("../images/campingbg.jpg");
  background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size:100%;
} 

  
</style>
  </head>
<body class="bg-warning">


  
  <div class="container-fluid">
  <div id="mySidebar" class="sidebar bg-success">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href='dashboard.php'><i class="fas fa-house-user"></i> Home</a>
  
  <a href='personeelOverzicht.php'><i class="fas fa-users"></i> Personeel</a>
  
  <a href="omzet.php"><i class="fas fa-money-bill-wave"></i> Omzet</a>

  <a href='../include/logoutadmin.inc.php' id="logout"><i class='fas fa-sign-out-alt'></i> Loguit</a>
  
</div>

<div id="main">
  <button class="openbtn btn btn-dark" onclick="openNav(x)">&#9776; Open Sidebar</button>
  
</div>
</div>

    
  
  



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script>
        function openNav(x) {
            if(x.matches){
  document.getElementById("mySidebar").style.width = "320px";
  document.getElementById("main").style.marginLeft = "320px";
}
else{
    document.getElementById("mySidebar").style.width = "200px";
  document.getElementById("main").style.marginLeft = "200px";

}
}
var x = window.matchMedia("(min-width: 700px)");



/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav(y) {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}


    </script>
  </body>
</html>
