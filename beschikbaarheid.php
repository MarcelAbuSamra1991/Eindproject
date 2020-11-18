<?php



  $date = new DateTime();
 

 

 
  

  


    

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
      <link rel="stylesheet" href="style.medewerkers.css">
      <style>
       
       h1{
           font-size: 2.2rem;
           color:#ff9966;
       }
       .container{
           margin-top:8%;
           font-family:"Alike Anguler";
           font-size: 1.6rem;
           padding: 2% 2%;
       }
       input{
           margin-bottom:25px;
       }
      </style>
</head>
<body class="bg-warning">
<div class="container bg-success">

<div class="row">

<div class="col-md-12">

  <h1 style="font-family:'Bungee Shade'" class="mt-3 mb-5"> Check Beschikbare plaatsen </h1>
  </div>
    </div>

<div class="row">

<div class="col-md-6 col-sm-12">
<div class="form-group">
    <label for="aankomst">Aankomst datum</label>
    <input type="date" class="form-control" id="aankomst" name="aankomstdatum" value="<?php echo($date->format('Y-m-d')); ?>">
  </div>
    </div>
    <div class="col-md-6 col-sm-12">
    <div class="form-group">
    <label for="vertrek">Vertrek datum</label>
    <input type="date" class="form-control" id="vertrek" name="vertrekdatum" value="<?php $date->add(new DateInterval('P2W')); echo($date->format('Y-m-d')); ?>">
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
       <div class="form-group">
<label for="selCamp">Kies je gewenste camping:</label>

  <select class="form-control" id="selCamp" name="kiesCamping">
  <option value="">Select Camping</option>
  

  <?php
  
  ?>
  
 
    
    
    
  </select>
 </div>
    </div>
    </div>
   
    <div class="row mt-5 mb-4">
  
    <div class="offset-md-1 col-md-4 oofset-md-1">
    <div class="form-group">
      <input  type="button" class="w-100 btn btn-danger btn btn-lg"   onclick="location.href='indexKlant.php'" value="Terug naar home">
    
    </div>
    </div>

    <div class="col-md-4 offset-md-2">
    <div class="form-group">
        <input id="check"  style="background-color:#ff9966" class=" w-100 btn  btn btn-lg" value="Check beschikbaarheid">
       </div>
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
      if(aankomst != '' && vertrek!= '' && vertrek >= aankomst)  
      {  
       $.ajax({  
            url:"include/checkDates.inc.php",  
            method:"POST",  
            data:{aankomst:aankomst, vertrek:vertrek},  
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
 </body>
 </html>