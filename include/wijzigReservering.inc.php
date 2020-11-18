<?php
include '../classes/dbc.php';
include 'sessions.php';
include 'functions.php';


if(isset($_POST["submit-wijzigen"]))
{
    
    $pdo = new Db();
   $pdo = $pdo->connect();
 
    $reserveringnr = $_POST['reserveringnr'];
    $voornaam = desinfectieString($_POST["voornaam"]);
    $achternaam = desinfectieString($_POST["achternaam"]);
    $email =$_POST["email"];
    $telefoon = $_POST["telefoon"];
    $aankomstdatum = $_POST["aankomstdatum"];
    $vertrekdatum = $_POST["vertrekdatum"];
    $volwassene = $_POST["volwassene"];
    $twaalf = $_POST["twaalf"];
    $vier = $_POST["vier"];
    $parkeer = $_POST["parkeer"];
    $douchemunt = $_POST["douchemunten"];
    $huisdier = $_POST["huisdier"];
    $stroom = $_POST["stroom"];
    $wasmachine = $_POST["wasmachine"];
    $wasdroger = $_POST["wasdroger"];
    $bezoekers = $_POST["bezoekers"];
    $kiescamping = $_POST["kiescamping"];
    $gereserveerd = $_POST['gerserveerd'];
    $plaatsid = fetchCampingId($pdo);
    $aantalParkeer = aantalParkeer($pdo);
  
    
  
    if(empty($voornaam)||empty($achternaam)|| empty($email)||empty($telefoon)||empty($aankomstdatum)||
    empty($vertrekdatum) || empty($kiescamping) ||empty($volwassene)){
    $_SESSION["ErrorMessage"] = "Vull alle velden met een ster in";
    header("Location:../reservering/wijzigReservering.php");
    exit();


    }
    elseif(strlen($voornaam)>15 || strlen($achternaam)>15){
        $_SESSION["ErrorMessage"] = "Voornaam of achternaam mag niet langer dan 20 letters zijn";
        header("Location:../reservering/wijzigReservering.php");
        exit();
     }
     elseif(strtotime($vertrekdatum) < strtotime($aankomstdatum)){
     
        $_SESSION["ErrorMessage"] = "De aankomstdatum mag niet groter dan de vertrekdatum";
        header("Location:../reservering/wijzigReservering.php");
        exit();
     }
     elseif((($kiescamping > 0 && $kiescamping <=25) || ($kiescamping >50 && $kiescamping <=75)) && ($stroom > 0)){
   
        $_SESSION["ErrorMessage"] = "De kleine camping voorzien niet van stroom";
        header("Location:../reservering/wijzigReservering.php");
        exit();
     }
     elseif(($aantalParkeer + $parkeer) > 200){
   
   
        $_SESSION["ErrorMessage"] = "Check aantal beschikbare parkeerplaatsen";
        header("Location:../reservering/wijzigReservering.php");
        exit();
      }


         $query = $pdo->prepare("
         UPDATE klant INNER JOIN reservering ON klant.klantid = reservering.klantid SET klant.voornaam = :voornaam,klant.achternaam = :achternaam,
         klant.email =:email, klant.telefoon = :telefoon, reservering.aankomstdatum = :aankomstdatum, reservering.vertrekdatum = :vertrekdatum, reservering.plaatsid =:plaatsid WHERE reservering.reserveringnr = :reserveringnr;
        
         ");
         
         
         $query->bindParam(":voornaam",$voornaam);
         $query->bindParam(":achternaam",$achternaam);
         $query->bindParam(":email",$email);
         $query->bindParam(":telefoon",$telefoon);
         $query->bindParam(":aankomstdatum",$aankomstdatum);
         $query->bindParam(":vertrekdatum",$vertrekdatum);
         $query->bindParam(":plaatsid",$plaatsid);
         $query->bindParam(":reserveringnr",$reserveringnr);
         $query->execute();
         
         
         
      
           $check = "SELECT * FROM voorzieningen WHERE reserveringnr = '$reserveringnr'";
           $check_run = $pdo->query($check);
           while($row=$check_run->fetch(PDO::FETCH_OBJ)){
             $checkOptienr = $row->optienr;
             $checkReserveringnr = $row->reserveringnr;
             $checkAantal = $row->aantal;
             
           }

            
            if(!empty($volwassene)){
            $query1  ="UPDATE voorzieningen SET aantal= '$volwassene' WHERE reserveringnr = '$reserveringnr' AND optienr =1;";
            }
          
            if(empty($twaalf)){
              $query2 = "DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr' AND  optienr =2;";
            }

           if(isset($twaalf)){
            if(!empty($twaalf) && ($checkOptienr ==2)){
              $query2 ="UPDATE  voorzieningen SET aantal='$twaalf' WHERE reserveringnr = '$reserveringnr' AND optienr=2;";
               
              }
            
           
              elseif(!empty($twaalf) && ($checkOptienr !=2)){
              $query2 = "INSERT INTO voorzieningen (optienr,reserveringnr,aantal) 
                SELECT 2,'$reserveringnr','$twaalf'
                    WHERE NOT EXISTS(SELECT optienr From voorzieningen WHERE reserveringnr = '$reserveringnr' AND optienr =2) LIMIT 1";
              }
            
            
            }
            



              // vier vakje delete update of insert
            if(empty($vier)){
              $query3 = "DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr' AND  optienr =3;";
            }


        
            if(isset($vier)){
            if(!empty($vier) && ($checkOptienr ==3)){
              $query3 ="UPDATE voorzieningen SET aantal= '$vier' WHERE reserveringnr = '$reserveringnr' AND optienr =3;";
            
            }
            elseif(!empty($vier) && ($checkOptienr !=3)){
              $query3 = "INSERT INTO voorzieningen (optienr,reserveringnr,aantal) 
                SELECT 3,'$reserveringnr','$vier'
                    WHERE NOT EXISTS(SELECT optienr From voorzieningen WHERE reserveringnr = '$reserveringnr' AND optienr =3) LIMIT 1";
              }
            
            }



            if(empty($huisdier)){
              $query4 = "DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr' AND  optienr =4;";
            }


        
            if(isset($huisdier)){
            if(!empty($huisdier) && ($checkOptienr ==4)){
              $query4 ="UPDATE voorzieningen SET aantal= '$huisdier' WHERE reserveringnr = '$reserveringnr' AND optienr =4;";
            
            }
            elseif(!empty($huisdier) && ($checkOptienr !=4)){
              $query4 = "INSERT INTO voorzieningen (optienr,reserveringnr,aantal) 
                SELECT 4,'$reserveringnr','$huisdier'
                    WHERE NOT EXISTS(SELECT optienr From voorzieningen WHERE reserveringnr = '$reserveringnr' AND optienr =4)LIMIT 1";
              }
            
            }
           
          
            
           

            if(empty($stroom)){
              $query5 = "DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr' AND  optienr =5;";
            }


        
            if(isset($stroom)){
            if(!empty($stroom) && ($checkOptienr ==5)){
              $query5 ="UPDATE voorzieningen SET aantal= '$stroom' WHERE reserveringnr = '$reserveringnr' AND optienr =5;";
            
            }
            elseif(!empty($stroom) && ($checkOptienr !=5)){
              $query5 = "INSERT INTO voorzieningen (optienr,reserveringnr,aantal) 
                SELECT 5,'$reserveringnr','$stroom'
                    WHERE NOT EXISTS(SELECT optienr From voorzieningen WHERE reserveringnr = '$reserveringnr' AND optienr =5)LIMIT 1";
              }
            
            }



            if(empty($bezoekers)){
              $query6 = "DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr' AND  optienr =6;";
            }


        
            if(isset($bezoekers)){
            if(!empty($bezoekers) && ($checkOptienr ==6)){
              $query6 ="UPDATE voorzieningen SET aantal= '$bezoekers' WHERE reserveringnr = '$reserveringnr' AND optienr =6;";
            
            }
            elseif(!empty($bezoekers) && ($checkOptienr !=6)){
              $query6 = "INSERT INTO voorzieningen (optienr,reserveringnr,aantal) 
                SELECT 6,'$reserveringnr','$bezoekers'
                    WHERE NOT EXISTS(SELECT optienr From voorzieningen WHERE reserveringnr = '$reserveringnr' AND optienr =6)LIMIT 1";
              }
            
            }


            if(empty($douchemunt)){
              $query7 = "DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr' AND  optienr =7;";
            }


        
            if(isset($douchemunt)){
            if(!empty($douchemunt) && ($checkOptienr ==7)){
              $query7 ="UPDATE voorzieningen SET aantal= '$douchemunt' WHERE reserveringnr = '$reserveringnr' AND optienr =7;";
            
            }
            elseif(!empty($douchemunt) && ($checkOptienr !=7)){
              $query7 = "INSERT INTO voorzieningen (optienr,reserveringnr,aantal) 
                SELECT 7,'$reserveringnr','$douchemunt'
                    WHERE NOT EXISTS(SELECT optienr From voorzieningen WHERE reserveringnr = '$reserveringnr' AND optienr =7)LIMIT 1";
              }
            
            }

            

            if(empty($wasmachine)){
              $query8 = "DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr' AND  optienr =8;";
            }


        
            if(isset($wasmachine)){
            if(!empty($wasmachine) && ($checkOptienr ==8)){
              $query8 ="UPDATE voorzieningen SET aantal= '$wasmachine' WHERE reserveringnr = '$reserveringnr' AND optienr =8;";
            
            }
            elseif(!empty($wasmachine) && ($checkOptienr !=8)){
              $query8 = "INSERT INTO voorzieningen (optienr,reserveringnr,aantal) 
                SELECT 8,'$reserveringnr','$wasmachine'
                    WHERE NOT EXISTS(SELECT optienr From voorzieningen WHERE reserveringnr = '$reserveringnr' AND optienr =8)LIMIT 1";
              }
            
            }


            
            if(empty($wasdroger)){
              $query9 = "DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr' AND  optienr =9;";
            }


        
            if(isset($wasdroger)){
            if(!empty($wasdorger) && ($checkOptienr ==9)){
              $query9 ="UPDATE voorzieningen SET aantal= '$wasdroger' WHERE reserveringnr = '$reserveringnr' AND optienr =9;";
            
            }
            elseif(!empty($wasdroger) && ($checkOptienr !=9)){
              $query9 = "INSERT INTO voorzieningen (optienr,reserveringnr,aantal) 
                SELECT 9,'$reserveringnr','$wasdroger'
                    WHERE NOT EXISTS(SELECT optienr From voorzieningen WHERE reserveringnr = '$reserveringnr' AND optienr =9)LIMIT 1";
              }
            
            }
           
          
              
            if(empty($parkeer)){
              $query10 = "DELETE FROM voorzieningen WHERE reserveringnr = '$reserveringnr' AND  optienr =10;";
            }


        
            if(isset($parkeer)){
            if(!empty($parkeer) && ($checkOptienr ==10)){
              $query10 ="UPDATE voorzieningen SET aantal= '$parkeer' WHERE reserveringnr = '$reserveringnr' AND optienr =10;";
            
            }
            elseif(!empty($parkeer) && ($checkOptienr !=10)){
              $query10 = "INSERT INTO voorzieningen (optienr,reserveringnr,aantal) 
                SELECT 10,'$reserveringnr','$parkeer'
                    WHERE NOT EXISTS(SELECT optienr From voorzieningen WHERE reserveringnr = '$reserveringnr' AND optienr =10)LIMIT 1";
              }
            
            }

           
                   
           
            
            
            $query_run1 = $pdo->prepare($query1);
            $query_run2 = $pdo->prepare($query2);
            
            $query_run3 = $pdo->prepare($query3);
            $query_run4 = $pdo->prepare($query4);
            $query_run5 = $pdo->prepare($query5);
            $query_run6 = $pdo->prepare($query6);
            $query_run7 = $pdo->prepare($query7);
            $query_run8 = $pdo->prepare($query8);
            $query_run9 = $pdo->prepare($query9);
            $query_run10 = $pdo->prepare($query10);
            
           
            $query_run1->execute();
            $query_run2->execute();
            
            
            $query_run3->execute();
            $query_run4->execute();
            
             
            $query_run5->execute();
            $query_run6->execute();
            
             
            $query_run7->execute();
            $query_run8->execute();
            
             
            $query_run9->execute();
            $query_run10->execute();
            
        
        
         
   
    
       
        
       
    
    
    
       

if(($query) && ($query_run1)  && ($query_run2)&& ($query_run3)&& ($query_run4) && ($query_run5) && ($query_run6)&& ($query_run7)&& ($query_run8)&& ($query_run9) && ($query_run10)){
    $_SESSION["SuccessMessage"] = "De boeking is successvol gewijzigd";
   
    header("Location:../reservering/wijzigReservering.php");
    
 }
 else{
     echo "verkeerd";
     header("Location:../reservering/wijzigReservering.php");
 }
}
function fetchCampingId($pdo)
{
  global $kiescamping;
  
  $query = "SELECT plaatsid FROM plaatsen  WHERE plaatsid ='$kiescamping'  ORDER BY plaatsid";
  

  $query_run = $pdo->query($query);
   if($query_run){
    
   $row = $query_run->fetch(PDO::FETCH_OBJ);
  
        $plaatsIdCheck = $row->plaatsid;
           
}  
// fetch plaatsid


  else{
    return false;
  }
 return $plaatsIdCheck;
  
}
function aantalParkeer($pdo)
{
    global $reserveringnr;
  $query = "SELECT sum(aantal) as aantal FROM voorzieningen  WHERE optienr = 10 AND reserveringnr != '$reserveringnr'";
  

  $query_run = $pdo->query($query);
   if($query_run){
    
   $row = $query_run->fetch(PDO::FETCH_OBJ);
  
        $aantalParkeer = $row->aantal;
           
}  
// fetch plaatsid


  else{
    return false;
  }
 return $aantalParkeer;
  
}

    ?>