<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Spicy+Rice&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/5a8735a64a.js" crossorigin="anonymous"></script> <!--load all styles --> <!--load all styles icons -->
      
    <title>Document</title>
</head>
<body>
    

<div>
<?php
include_once '../classes/dbc.php';
$pdo = Db::connect();
   $query1= $pdo->prepare("
   SELECT * FROM reservering WHERE plaatsid=10
");
$query1->bindParam(":plaatsid",$plaatsid);
$query1->bindParam(":aankomstdatum",$aankomstdatum);
$query1->bindParam(":vertrekdatum",$vertrekdatum);
$query1->execute();
echo "<table class='bg-dark text-light' width:300px;>";


 while($row=$query1->fetch(PDO::FETCH_OBJ)){
     echo '<tr><td>'.
      $row->aankomstdatum.'</td>';
      echo"</tr>";
  echo '<tr><td>'.$row->vertrekdatum.'</td></tr>';
   echo '<tr><td>'.$row->plaatsid.'</td></tr>';
       

 };
 
echo "</table>";
$dateAankomst = strtotime($row->aankomstdatum);
$dateVertrek = strtotime($row->vertrekdatum);
echo $dateAankomst;
if($dateAankomst <= $dateVertrek ){

echo "true";
}

?>
</div>
<h1>Marcel</h1>
</body>
</html>