<?php
 include '../classes/dbc.php';
 

 
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
       @media only screen and (min-width: 800px) { 
  input[type='text']{
      height:300px;
     
      font-size: 1.7rem;
      border-radius:50%;
      opacity:0.8;
      text-align: center;
      font-family:"Alike Angular";
      font-weight: bold;
  

  }
}
@media only screen and (max-width: 799px) { 
  input[type='text']{
      
      font-size: 1rem;
      border-radius:50%;
      opacity:0.8;
      text-align: center;
      

  }
}


  
</style>
<html>
    <body>
        <?php
          $pdo = new Db();
             $pdo = $pdo->connect();
             $query= "SELECT *  FROM  betaling INNER  JOIN reservering ON  betaling.reserveringnr =reservering.reserveringnr  INNER JOIN 
             plaatsen ON reservering.plaatsid= plaatsen.plaatsid INNER JOIN
             plaatsentarief ON plaatsen.plaatsomschrijvingid = plaatsentarief.plaatsomschrijvingid WHERE betaling.state='voltooid'";
             $query_run = $pdo->query($query);
            
             $totaalPlaatsenPrijs =0;
            
             if($query_run){
                
               
               while($row1= $query_run->fetch(PDO::FETCH_OBJ)){
               
                $reserveringnr = $row1->reserveringnr;
                 $aankomstdatum= $row1->aankomstdatum;
                 $vertrekdatum =  $row1->vertrekdatum;
                 $plaatsprijs = $row1->plaatsprijs;
               
                    
                     // Calculating the difference in timestamps 
                     
                    $diff = strtotime($vertrekdatum) - strtotime($aankomstdatum); 
                       
                     // 1 day = 24 hours 
                     // 24 * 60 * 60 = 86400 seconds 
                   
                     $aantalDagen = abs(round($diff/ 86400)); 
                     $totaalPlaatsenPrijs += $plaatsprijs * $aantalDagen;
                    
         
                    
                 } 
            
             }

            // echo "<input type='text' value='$totaalPlaatsenPrijs'>";//
        
        
           // echo "<input type='text' value='$_SESSION[aankomstdatums]>'";//
         
         //echo "<input type='text' value='$_SESSION[reserveringnr]'>";//
         
            // echo "<input type='text' value='$_SESSION[reserveringnummer]'>";*/
        
            $query2= "SELECT * FROM voorzieningentarieven INNER JOIN voorzieningen ON 
            voorzieningentarieven.optienr = voorzieningen.optienr INNER JOIN betaling ON voorzieningen.reserveringnr = betaling.reserveringnr
             INNER JOIN reservering ON betaling.reserveringnr = reservering.reserveringnr WHERE 
             voorzieningentarieven.optienr BETWEEN 1 AND 4 AND betaling.state='voltooid'";
        $query_run2 = $pdo->query($query2);
       if($query_run2){
        
      
        $totaalOpties1 = 0;
       
    
        while($row2= $query_run2->fetch(PDO::FETCH_OBJ)){
            $reserveringnr = $row2->reserveringnr;
            $aantal1= $row2->aantal;
            $prijs1 = $row2->optieprijs;
            
            $aankomstdatum= $row2->aankomstdatum;
            $vertrekdatum =  $row2->vertrekdatum;
          
        
             
              // Calculating the difference in timestamps 
              
             $diff = strtotime($vertrekdatum) - strtotime($aankomstdatum); 
                
              // 1 day = 24 hours 
              // 24 * 60 * 60 = 86400 seconds 
            
              $aantalDagen = abs(round($diff/ 86400)); 
              $subtotaal1 = (($prijs1 * $aantal1) * $aantalDagen);
              $totaalOpties1 +=  $subtotaal1;
             
  
        }
          } 

           
          $query3= "SELECT * FROM voorzieningentarieven INNER JOIN voorzieningen ON 
          voorzieningentarieven.optienr = voorzieningen.optienr INNER JOIN betaling ON voorzieningen.reserveringnr = betaling.reserveringnr
           INNER JOIN reservering ON betaling.reserveringnr = reservering.reserveringnr WHERE 
           voorzieningentarieven.optienr BETWEEN 5 AND 10 AND betaling.state='voltooid'";
      $query_run3 = $pdo->query($query3);
     if($query_run3){
      
    
      $totaalOpties2 = 0;
     
  
      while($row3= $query_run3->fetch(PDO::FETCH_OBJ)){
          $reserveringnr = $row3->reserveringnr;
          $aantal2= $row3->aantal;
          $prijs2 = $row3->optieprijs;
          
          $aankomstdatum= $row3->aankomstdatum;
          $vertrekdatum =  $row3->vertrekdatum;
        
          $subtotaal2 = ($prijs2 * $aantal2);
          $totaalOpties2 +=  $subtotaal2;
         

           
            // Calculating the difference in timestamps 
            
        
              
            // 1 day = 24 hours 
            // 24 * 60 * 60 = 86400 seconds 
          
         
          
      }
        } 
     
       
     
     $totaalOmzet = ($totaalOpties1 + $totaalOpties2 + $totaalPlaatsenPrijs);
     $currency = iconv("UTF-8", "ISO-8859-1//TRANSLIT", '€');
     $totaalOmzet = "Totaal omzet in euro is: ".$totaalOmzet;
     echo "<input type='text' style='opacity:0.7; width:100%'   value='".$totaalOmzet.' '.$currency."'>";//
     
        
         
         
         
        
      
        
     
       
       
        
     
     
         
             
            ?>



                </body>

                </html>