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
       
       
       
        <title>omzet</title>
        <link rel="stylesheet" href="../style.medewerkers.css">
       



        <style>
         body{
  background-image:url("../images/omzet1.png");
  background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size:100%;

       
} 
@media only screen and (min-width: 699px) {
   #checkOmzetBtn{
  
  font-size:1.5rem;
  
  
}
}
@media only screen and (max-width: 700px) {
  #checkOmzetBtn{
  
  font-size:0.7rem;
  
  
}
}
 
 
 
        </style>
        <script>
   
    </script>
        </head>
<body class="bg-warning">
<div id="main">


<div class="container-fluid">
    <div class="row">
    <div class="offset-md-4 col-md-4 offset-md-4 offset-2 col-8 offset-2 text-center pb-3">
    <h2 class="text-dark" style="font-family:Bungee Shade; opacity:1">Totaal Omzet</h2>
    </div>
</div>

    <div class="row">
        <div class="offset-md-4 col-md-4 offset-md-4 offset-2 col-8 offset-2">
       <form>
            <input type="button" id="checkOmzetBtn"    class="btn btn-dark  font-weight-bold w-100" style="opacity:0.6" value="Check het totale omzet in euro">
        </div>
        <div class="offset-md-4 col-md-4 offset-md-4 offset-2 col-8 offset-2 w-100">
        <div id="checkOmzet">
        
      
      
      </div>
</div>
</form>
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
$('#checkOmzetBtn').click(function(){  

      $.ajax({  
            url:"checkOmzet.inc.php",  
            type:'post',  
           
            success:function(data)  
            {  
              $('#checkOmzet').html(data);  
            }  
       });  
     });
});
      
 

     </script>



</body>
</html>


