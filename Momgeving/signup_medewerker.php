
<?php

  include_once '../include/signup_medewerker.inc.php';
 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5a8735a64a.js" crossorigin="anonymous"></script> <!--load all styles --> <!--load all styles icons -->
    
    
    <title>Signup pagina</title>
    <link  rel="stylesheet" href="../style.medewerkers.css" type="text/css">
  </head>
<body style="background-color:#ffcc00">


  
  
 
<div class="container sub-container">
  
  
  <?php echo  '<center>'.SuccessMessage().'</center>'; ?>
  <?php echo '<center>'.ErrorMessage().'</center>';?>
  
  
<h1>Medewerker aanmelden</h1>
<form method="post" action="../include/signup_medewerker.inc.php" >

  <div class="form-group">
    <label for="Voornaam">Voornaam</label>
    <input type="text"  name="voornaam" class="form-control" id="Voornaam" placeholder="voer voornaam in">
  </div>
  <div class="form-group">
    <label for="Achternaam">Achternaam</label>
    <input type="text" class="form-control" id="Achternaam" name="achternaam" placeholder="voer achternaam in">
  </div>
  <div class="form-group"></br>
  <select name="soort" class="browser-default custom-select">
  <option selected>Kies soort gebruiker</option>
  <option value="medewerker">Medewerker</option>
  <option value="admin">Admin</option>
  
</select>
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email"  name="email" class="form-control" id="Email" placeholder="voer email in">
  </div>
  <div class="form-group">
    <label for="Password">Wachtwoord</label>
    <input type="password" class="form-control" name="wachtwoord" id="Password" placeholder="voer wachtwoord in">
  </div>

  <div class="form-group">
    <input type="submit" name="submit-signup" class="btn btn-success btn btn-lg"  value="Verzenden">
  </div>

  
    
  
 
</form>

</div>
  </body>
</html>
