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
 
  $query = "SELECT * FROM klant  INNER JOIN reservering  
  ON klant.klantid = reservering.klantid  INNER JOIN
   voorzieningen ON reservering.reserveringnr = voorzieningen.reserveringnr 
   INNER JOIN voorzieningentarieven ON voorzieningen.optienr=voorzieningentarieven.optienr 
   WHERE reservering.reserveringnr = '$_SESSION[reserveringnr]'";
 
$query_run = $pdo->query($query);

if($query_run){
    while($row=$query_run->fetch(PDO::FETCH_OBJ)){
        $_SESSION['voornaam'] = $row->voornaam;
        $_SESSION['achternaam'] = $row->achternaam;
        $_SESSION['telefoon'] = $row->telefoon;
        $_SESSION['email'] = $row->email;
        $_SESSION['aankomst'] = $row->aankomstdatum;
        $_SESSION['vertrek'] = $row->vertrekdatum;
        $_SESSION['plaatsid'] = $row->plaatsid;
        $_SESSION['reserveringnr'] = $row->reserveringnr;
       
       
        
    }
  
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
     
     
     
      <title>Wijzigen</title>
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
            margin-top: 1%;
            
            
    }
    label{
      font-family:"Alike Angular";
      
      
      
    }
    .ster{
        font-size:1rem;
        color:red;
    }
   
 
    
    
    
    
</style>
</head>
<body class="bg-warning">

    <div class="container">
  
     <div class="row">
         <div class="col-md-12 col-12">
             <div class="title">
                 <h1 class="text-center mt-2"><span id="title">Wijzig reservering<span></h1>
            </div>
        </div>  
    <div class="row bg-success w-100 text-center p-0">
   
     <div class="col-md-12">
     
     <?php echo '<center>'.ErrorMessage().'</center>'; ?>
     <?php echo '<center>'.SuccessMessage().'</center>'; ?>
     
         <div class="row">
         <div class="offset-md-4 col-md-4 offset-md-4">
         <form method="post" action="../include/wijzigReservering.inc.php">
  <div class="form-group">
    <label for="reserveringNummer">Reservering nummer</label>
    <input type="text" class="form-control" name="reserveringnr" id="reserveringnummer"  placeholder="Reservering nummer" readonly value="<?php if(isset($_SESSION['reserveringnr'])){ echo $_SESSION['reserveringnr'];} ?>">
    
  </div>
  </div>
  </div>
  <div class="row">
             <div class="col-md-4">
    
    <div class="form-group">
    <label for="Voornaam">Voornaam</label> <span class="ster">*</span>
    <input type="text" class="form-control" id="Voornaam" name="voornaam" placeholder="voornaam" pattern="[a-zA-Z]*" value="<?php if(isset($_SESSION['voornaam'])){ echo $_SESSION['voornaam'];} ?>">
    
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label for="achternaam">Achternaam</label> <span class="ster">*</span>
    <input type="text" class="form-control" name="achternaam" id="achternaam"  placeholder="achternaam" pattern="[a-zA-Z]*" value="<?php if(isset($_SESSION['achternaam'])){ echo $_SESSION['achternaam'];} ?>">
    
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label> <span class="ster">*</span>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="email"  value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];} ?>">
    
  </div>
</div>
</div>
<div class="row">
             <div class="col-md-4">
  <div class="form-group">
  <label class="text-light" for="phone">Telefoonnnummer:</label> <span class="ster">*</span>
            <div class="input-group">
            <div class="input-group-prepend">
            <div class="input-group-text">06</div>
            </div>
        <input type="tel" class="form-control" id="phone" name="telefoon" min="8" max="8" pattern="[0-9]{8}"  value="<?php if(isset($_SESSION['telefoon'])){ echo $_SESSION['telefoon'];} ?>">
      </div>
    </div>

    </div>
    <div class="col-md-4">
  <div class="form-group">
    <label for="aankomst">aankomst datum</label> <span class="ster">*</span>
    <input type="date" class="form-control" id="aankomst" name="aankomstdatum" value="<?php if(isset($_SESSION['aankomst'])){ echo $_SESSION['aankomst'];} ?>">
  </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
    <label for="vertrek">vertrek datum</label> <span class="ster">*</span>
    <input type="date" class="form-control" id="vertrek" name="vertrekdatum" value="<?php if(isset($_SESSION['vertrek'])){ echo $_SESSION['vertrek'];} ?>">
    </div>
    </div>
    
    </div>
    <div class="row">
        <div class="col-md-4">
  <div class="form-group">
    <label for="volwassen">Aantal volwassenen</label> <span class="ster">*</span>
    <input type="number" class="form-control" id="volwassen" name="volwassene" placeholder="volwassenen" value="<?php
    
  $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}'AND optienr=1";
  $query_run2 = $pdo->query($query2);
    if($query_run2){
      while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
          $_SESSION['optienr']= $row2->optienr;
         $_SESSION['aantal'] = $row2->aantal;

         
       
         echo $_SESSION['aantal'];
        
         
      }
     
      }
    
      

  
  

  
  
    ?>">
        
    
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group">
    <label for="twaalf">kinderen van 4 tot 12</label>
    <input type="number" name="twaalf" class="form-control" placeholder="kinderen van 4 tot 12" id="twaalf" value="<?php 
 $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}'AND optienr=2";
 $query_run2 = $pdo->query($query2);
   if($query_run2){
     while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
         $_SESSION['optienr']= $row2->optienr;
        $_SESSION['aantal'] = $row2->aantal;

        
      
        echo $_SESSION['aantal'];
       
        
     }
    
     }


  ?>">
         
        
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label for="vier">Aantal kinderen tot 4</label>
    <input type="number" class="form-control" id="vier" name="vier"  value="<?php
  
  $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}'AND optienr=3";
  $query_run2 = $pdo->query($query2);
    if($query_run2){
      while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
          $_SESSION['optienr']= $row2->optienr;
         $_SESSION['aantal'] = $row2->aantal;
 
         
       
         echo $_SESSION['aantal'];
        
         
      }
     
      }
     ?>">
  </div>
</div>



</div>
<div class="row">
    <div class="col-md-8">
<div class="form-group">
<label for="selCamp">Kies je gewenste camping:</label> <span class="ster">*</span>

  <select class="form-control" id="selCamp" name="kiescamping">
  <option value="">Select Camping</option>
  
<?php


  
    ?>
   
  
  
 
    
    
    
  </select>
  </div>
  </div>
  <div class="col-md-2 col-6">
  <div class="form-group">
    <label for="gereserveerd">Gereserveerd</label>
    <input type="text" class="form-control" id="gereserveerd" name="gerserveerd" readonly value="<?php if(isset($_SESSION['plaatsid'])){ echo $_SESSION['plaatsid'];} ?>">
  </div>
  </div>
  <div class="col-md-2 col-6">
  <div class="form-group">
    <label for="huisdieren">Huisdier</label>
    <input type="number" class="form-control" id="huisdieren" name="huisdier" min="0" max="1"  value="<?php
     $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}' AND optienr=4";
     $query_run2 = $pdo->query($query2);
       if($query_run2){
         while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
             $_SESSION['optienr']= $row2->optienr;
            $_SESSION['aantal'] = $row2->aantal;
    
            
          
            echo $_SESSION['aantal'];
           
            
         }
        
         }
  
    ?>">
  </div>
  </div>
  </div>


 
    




<div class="row">
        
  
 

<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="stroom">Elektriciteit</label>
    <input type="number"  class="form-control" class="badgebox" id="stroom" name="stroom" min="0"  value="<?php
     $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}'AND optienr=5";
     $query_run2 = $pdo->query($query2);
       if($query_run2){
         while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
             $_SESSION['optienr']= $row2->optienr;
            $_SESSION['aantal'] = $row2->aantal;
    
            
          
            echo $_SESSION['aantal'];
           
            
         }
        
         }
   
    ?>">
  </div>
</div>


<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="bezoeker">Bezoekers</label>
    <input type="number" class="form-control" id="bezoeker" name="bezoekers" min="0"  value="<?php
     $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}'AND optienr=6";
     $query_run2 = $pdo->query($query2);
       if($query_run2){
         while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
             $_SESSION['optienr']= $row2->optienr;
            $_SESSION['aantal'] = $row2->aantal;
    
            
          
            echo $_SESSION['aantal'];
           
            
         }
        
         }
    
     ?>">
  </div>
</div>

<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="douchemunt">Douche</label>
    <input type="number" class="form-control" id="douchemunt" name="douchemunten" min="0"  value="<?php
     $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}'AND optienr=7";
     $query_run2 = $pdo->query($query2);
       if($query_run2){
         while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
             $_SESSION['optienr']= $row2->optienr;
            $_SESSION['aantal'] = $row2->aantal;
    
            
          
            echo $_SESSION['aantal'];
           
            
         }
        
         }
 
    ?>">
  </div>
</div>
<div class="col-md-2 col-6">
  <div class="form-group"> 
    <label for="wasmachine">Wasmachine</label>
    <input type="number" class="form-control" id="wasmachine" name="wasmachine" min="0" value="<?php
     $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}'AND optienr=8";
     $query_run2 = $pdo->query($query2);
       if($query_run2){
         while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
             $_SESSION['optienr']= $row2->optienr;
            $_SESSION['aantal'] = $row2->aantal;
    
            
          
            echo $_SESSION['aantal'];
           
            
         }
        
         }
    
    ?>">
  </div>
</div>
<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Wasdroger</label>
    <input type="number" class="form-control" id="wasdroger" name="wasdroger" min="0"  value="<?php
     $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}'AND optienr=9";
     $query_run2 = $pdo->query($query2);
       if($query_run2){
         while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
             $_SESSION['optienr']= $row2->optienr;
            $_SESSION['aantal'] = $row2->aantal;
    
            
          
            echo $_SESSION['aantal'];
           
            
         }
        
         }
    
     ?>">
  </div>
</div>

<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="parkeer">Parkeer</label>
    <input type="number" class="form-control" id="parkeer" name="parkeer" min="0" max="2" value="<?php
    
    $query2 = "SELECT * FROM voorzieningen WHERE reserveringnr = '{$_SESSION['reserveringnr']}'AND optienr=10";
    $query_run2 = $pdo->query($query2);
      if($query_run2){
        while($row2=$query_run2->fetch(PDO::FETCH_OBJ)){
            $_SESSION['optienr']= $row2->optienr;
           $_SESSION['aantal'] = $row2->aantal;
   
           
         
           echo $_SESSION['aantal'];
          
           
        }
       
        }
     ?>">
     
  </div>
  </div>
</div>




  
  <div class="row">

        <div class="col-md-4">
    
        <input type="button"  onclick="location.href='reserveringOverzicht.php'" class="btn btn-danger w-100 font-weight-bold mb-2" value="Terug">
        
        </div>
        <div class="col-md-4">
        
        <input   style="background-color:#ffc266;" type="submit" class="w-100 mt-0 btn btn-sm font-weight-bold text-light" name="submit-wijzigen" value="Verzenden">
          
        </div>
        <div class="col-md-4">
        
        <input type="button"  id="check"    class="btn btn-info w-100 font-weight-bold" value="Check datum">
       
        </div>
        <div class="offset-md-2 col-md-4">
        
        <input type="button"  id="checkParkeerBtn"    class="btn btn-dark w-100 font-weight-bold" value="Check Parkeer">
       
        </div>
        <div class=" col-md-4">
        <div id="checkParkeer">
      
        <input type="text"   name="checkParkeer" id="checkparkeer"   class="btn btn-light w-100 font-weight-bold" value="">
       </div>
        </div>
        </form>
</div>

      
 
        

     
    </div>
</div> 
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('#check').click(function(){  
    var aankomst = $('#aankomst').val();  
    var vertrek = $('#vertrek').val();  
    var reserveringnr = $('#reserveringnummer').val(); 
      if(aankomst != '' && vertrek!= '' && vertrek >= aankomst)  
      {  
       $.ajax({  
            url:"../include/checkdatewijzig.php",  
            method:"POST",  
            data:{aankomst:aankomst, vertrek:vertrek,reserveringnr:reserveringnr},  
            success:function(data)  
            {  
              $('#selCamp').html(data);  
            }  
       });  
      }  
      else  
      {  
        alert("kies een juiste tijdslot");  
      } 
 });
}); 

</script>
<script>
$(document).ready(function(){
$('#checkParkeerBtn').click(function(){  

  var reserveringnr = $('#reserveringnummer').val(); 
    if(reserveringnr != '')
    {
      $.ajax({  
            url:"../include/checkparkeerwijzig.inc.php",  
            type:'post',  
           data:{reserveringnr:reserveringnr},
            success:function(data)  
            {  
              $('#checkParkeer').html(data);  
            }  
       });
      }
      else  
      {  
        alert("iets fout gegaan");  
      }  
     });
});
      
 
</script>
</body>
</html>