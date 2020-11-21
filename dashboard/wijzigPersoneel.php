
<?php
include '../classes/dbc.php';
include '../include/sessions.php';
include '../include/functions.php';
$_SESSION["TrackingURL"]= $_SERVER["PHP_SELF"];
varificatie();

$pdo = new Db();
$pdo = $pdo->connect();
if(isset($_GET['verstopt'])){
    $_SESSION['id'] = $_GET['verstopt'];
}
$query="SELECT * FROM medeadmin WHERE id= '{$_SESSION['id']}'";
$query_run = $pdo->query($query);
while($row = $query_run->fetch(PDO::FETCH_OBJ)){
    $id = $row->id;
    $voornaam = $row->voornaam;
    $achternaam = $row->achternaam;
    $soort = $row->soort;
    $email = $row->email;
    $wachtwoord = $row->wachtwoord;

}
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
<style>
.sub-container{
    margin-top: 100px;
}
</style>
<body style="background-color:#ffcc00">



<div class="container sub-container">


<?php echo  '<center>'.SuccessMessage().'</center>'; ?>
<?php echo '<center>'.ErrorMessage().'</center>';?>


<h1>Wijzig personeel gegevens</h1>
<form method="post" action="wijzigPersoneel.inc.php">


<div class="form-group">
  <label for="Voornaam">Voornaam</label>
  <input type="text"  name="voornaam" class="form-control" id="Voornaam" placeholder="voer voornaam in" value="<?php echo $voornaam ?>">
</div>
<div class="form-group">
  <label for="Achternaam">Achternaam</label>
  <input type="text" class="form-control" id="Achternaam" name="achternaam" placeholder="voer achternaam in" value="<?php echo $achternaam?> ">
</div>
<div class="form-group">
  <label for="Soort">Soort functie</label>
  <input type="text" class="form-control" id="Soort" name="soort" readonly value="<?php echo $soort?> ">
</div>
<div class="form-group"></br>
<select name="kiesSoort"  class="browser-default custom-select">
<option selected  value="">Kies soort gebruiker</option>

<option value="medewerker">Medewerker</option>
<option value="admin">Admin</option>

</select>
</div>
<div class="form-group">
  <label for="Email">Email</label>
  <input type="email"  name="email" class="form-control" id="Email" placeholder="voer email in" value="<?php echo $email?>">
</div>
<div class="form-group">
  <label for="Password">Wachtwoord</label>
  <input type="password" class="form-control" name="wachtwoord" id="Password" placeholder="voer wachtwoord in" value="<?php echo $wachtwoord ?>">
</div>
<div class="row">
  <div class="col-md-6 col-12">
<div class="form-group">
  <input type="submit" name="submit-wijzig" class="btn btn-success btn btn-lg"  value="Verzenden">
</div>
</div>
<div class="col-md-6 col-12">
<div class="form-group">
  <input type="button"  onclick="location.href='personeelOverzicht.php'"   class="btn btn-danger btn btn-lg w-100" style="position:relative; top:9px;" value="Terug">
</div>
</div>
</div>




  


</form>

</div>
</body>
</html>
