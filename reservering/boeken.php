<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Spicy+Rice&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/5a8735a64a.js" crossorigin="anonymous"></script> <!--load all styles --> <!--load all styles icons -->
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
        font-size:2.5rem;
        
    }
    }
    .btn-lg{
        width:50%;
    }
    .row{
            margin:3%;
            margin-top: 1%;
            
            
    }
    
    
    
    
    
</style>
</head>
<body class="bg-warning">
    <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="title">
                 <h1 class="text-center text-dark mt-5"><span id="title">Boek camping<span></h1>
            </div>
        </div>  
    <div class="row bg-success w-100 text-center p-2">
     <div class="col-md-12">
         <div class="row">
             <div class="col-md-4">
    <form>
    <div class="form-group">
    <label for="exampleInputEmail1">Voornaam</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Achternaam</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
</div>
</div>
<div class="row">
             <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputPassword1">telefoon</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    </div>
    <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputPassword1">aankomst datum</label>
    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
    <label for="exampleInputPassword1">vertrek datum</label>
    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputPassword1">Aantal volwassenen</label>
    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputPassword1">kinderen van 4 tot 12</label>
    <input type="number" class="form-control" id="exampleInputPassword1">
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputPassword1">Aantal kinderen tot 4</label>
    <input type="number" class="form-control" id="exampleInputPassword1">
  </div>
</div>



</div>
<div class="row">
    <div class="col-md-12">
<div class="form-group">
  <label for="sel1">Kies je gewenste camping:</label>
  <select class="form-control" id="sel1">
    <option>Caravan of camper (grote plaats)</option>
    <option>Caravan of camper (kleine plaats)</option>
    <option>Tent (grote plaats)</option>
    <option>Tent (kleine plaats)</option>
  </select>
</div>
</div>




</div>
<div class="row">
        <div class="col-md-2 col-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Parkeer</label>
    <input type="checkbox" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  </div>
  <div class="col-md-2 col-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Elektriciteit</label>
    <input type="checkbox" class="form-control" id="exampleInputPassword1">
  </div>
</div>
<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Hond</label>
    <input type="checkbox" class="form-control" id="exampleInputPassword1">
  </div>
</div>
<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Douche</label>
    <input type="checkbox" class="form-control" id="exampleInputPassword1">
  </div>
</div>
<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Wasmachine</label>
    <input type="checkbox" class="form-control" id="exampleInputPassword1">
  </div>
</div>
<div class="col-md-2 col-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Wasdroger</label>
    <input type="checkbox" class="form-control" id="exampleInputPassword1">
  </div>
</div>

</div>




  
  <div class="row">
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary btn btn-lg">Submit</button>
 
        </div>
        <div class="col-md-6">
        <button type="button" onclick="location.href='r_home.php'" class="btn btn-danger btn btn-lg">Terug</button>
 
        </div>
        </form>
</div>

     
    </div>
</div> 
</body>
</html>