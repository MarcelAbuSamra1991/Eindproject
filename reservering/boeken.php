<?php
  $date = new DateTime();
 
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
    
    #btn1{
     background-color: #ff9966;
    }
   
 .ster{
   color:red;
   font-size:1rem;
 }
    
    
    
    
</style>
<script>
/*const numInputs = document.querySelectorAll('input[type=number]')

numInputs.forEach(function(input) {
  input.addEventListener('change', function(e) {
    if (e.target.value == '') {
      e.target.value = 0
    }
  })
})*/
</script>
</head>
<body class="bg-warning">

    <div class="container">
   
     <div class="row">
         <div class="col-md-12">
             <div class="title">
                 <h1 class="text-center  mt-5"><span id="title">Boek camping<span></h1>
            </div>
        </div>  
    <div class="row bg-success w-100 text-center p-2">
   
     <div class="col-md-12">
     
     <?php echo '<center>'.ErrorMessage().'</center>'; ?>
     <?php echo '<center>'.SuccessMessage().'</center>'; ?>
         <div class="row">
        
             <div class="col-md-4">
    <form method="post" action="../include/boeking.inc.php">
    <div class="form-group">
    <label for="Voornaam">Voornaam</label> <span class="ster">*</span>
    <input type="text" class="form-control" id="Voornaam" name="voornaam" placeholder="voornaam" pattern="[a-zA-Z]*">
    
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label for="achternaam">Achternaam</label> <span class="ster">*</span>
    <input type="text" class="form-control" name="achternaam" id="achternaam"  placeholder="achternaam" pattern="[a-zA-Z]*">
    
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label> <span class="ster">*</span>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="email"> 
    
  </div>
</div>
</div>
<div class="row">
             <div class="col-md-4">
  <div class="form-group">
  <label class="text-light" for="phone">Telefoonnnummer:</label> <span class="ster">*</span>
            
            
        <input type="tel" class="form-control" id="phone" name="telefoon" min="8">
        </div>
        </div>
    <div class="col-md-4">
  <div class="form-group">
    <label for="aankomst">Aankomst datum</label> <span class="ster">*</span>
    <input type="date" class="form-control" id="aankomst" name="aankomstdatum" value="<?php echo($date->format('Y-m-d')); ?>">
  </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
    <label for="vertrek">Vertrek datum</label> <span class="ster">*</span>
    <input type="date" class="form-control" id="vertrek" name="vertrekdatum" value="<?php $date->add(new DateInterval('P2W')); echo($date->format('Y-m-d')); ?>">
    </div>
    </div>
    
    </div>
    <div class="row">
        <div class="col-md-4">
  <div class="form-group">
    <label for="volwassen">Aantal volwassenen</label> <span class="ster">*</span>
    <input type="number" class="form-control" id="volwassen" name="volwassene" placeholder="volwassenen" min="0">
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group">
    <label for="twaalf">kinderen van 4 tot 12</label>
    <input type="number" name="twaalf" class="form-control" id="twaalf" min="0">
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label for="vier">Aantal kinderen tot 4</label>
    <input type="number" class="form-control" id="vier" name="vier" min="0">
  </div>
</div>



</div>
<div class="row">
    <div class="col-md-10">
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
    <label for="huisdier">Huisdier</label>
    <input type="number" class="form-control" id="huisdier" name="huisdier" min="0" max="1">
  </div>
</div>
  </div>


 
    




<div class="row">
<div class="col-md-2 col-12">
  <div class="form-group">
    <label for="Bezoekers">Bezoekers</label>
    <input type="number" class="form-control" id="Bezoekers" name="bezoekers" min="0">
  </div>
  </div>


<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="stroom">Elektriciteit</label>
    <input type="number"  class="form-control" class="badgebox" id="stroom" name="stroom" min="0">
  </div>
</div>
 
  <div class="col-md-2 col-6">
  <div class="form-group">
    <label for="douche">Douche</label>
    <input type="number" class="form-control" id="douche" name="douchemunten" min="0">
  </div>
</div>
 



<div class="col-md-2 col-6">
  <div class="form-group"> 
    <label for="wasmachine">Wasmachine</label>
    <input type="number" class="form-control" id="wasmachine" name="wasmachine" min="0">
  </div>
</div>
<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Wasdroger</label>
    <input type="number" class="form-control" id="wasdroger" name="wasdroger" min="0">
  </div>
</div>

<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="parkeer">Parkeer</label>
    <input type="number" class="form-control" id="parkeer" name="parkeer" min="0" max="2">
  </div>
  </div>

</div>

<div class="row">

        <div class="col-md-4">
    
        <input type="button"  onclick="location.href='r_home.php'" class="btn btn-danger font-weight-bold w-100 mb-2" value="Terug">
        
        </div>
        <div class="col-md-4">
        
        <input   style="background-color:#ffc266;" type="submit" class="w-100 mt-0 btn btn-sm font-weight-bold text-light" name="submit-boeking" value="Verzenden">
          
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
      if(aankomst != '' && vertrek!= '' && vertrek >= aankomst)  
      {  
       $.ajax({  
            url:"../include/checkDates.inc.php",  
            type:"POST",  
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
<script>
$(document).ready(function(){
$('#checkParkeerBtn').click(function(){  

      $.ajax({  
            url:"../include/checkparkeer.inc.php",  
            type:'post',  
           
            success:function(data)  
            {  
              $('#checkParkeer').html(data);  
            }  
       });  
     });
});
      
 
</script>

</body>
</html>
