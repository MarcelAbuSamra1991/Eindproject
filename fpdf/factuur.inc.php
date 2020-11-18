<?php
require('fpdf.php');
require('../classes/dbc.php');
class myPDF extends FPDF{
    function header(){
        $pdo= new Db();
        $pdo = $pdo->connect();
       
        if(isset($_GET['verstopt'])){
            $_SESSION['reserveringnr'] = $_GET['verstopt'];
        }
        $query= "SELECT * FROM klant INNER JOIN reservering ON klant.klantid = reservering.klantid  WHERE reservering.reserveringnr = '{$_SESSION['reserveringnr']}'";
        $query_run = $pdo->query($query);
        if($query_run){
          while($row1= $query_run->fetch(PDO::FETCH_OBJ)){
            $voornaam= $row1->voornaam;
            $achternaam= $row1->achternaam;
            $email = $row1->email;
            $reserveringnr = $row1->reserveringnr;
            $reserveringdatum= $row1->reserveringdatum;
            $aankomstdatum= $row1->aankomstdatum;
            $vertrekdatum= $row1->vertrekdatum;
           
            $klantid =$row1->klantid;


        }
    }


    
        $this->Image('../images/Logo.png',10,7,25,25,);
       
        $this->SetFont('Arial','B',10);
        
        $this->cell(280,20,"Naam bedrijf: Camping La Rustiuqe",1,1,'R');
        $this->cell(280,20,"Land: Frankrijk",0,1,'R');
  
        
        $this->Ln();
        
        $this->SetFont('Times','B',30);
        $this->SetXY(42,40);
        $this->SetTextColor(226,175,35);
        $this->cell(5,8,"Factuur",0,1,'R');
        $this->Ln();
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','B',8);
       
        $this->cell(30,5,"Naam klant:",0,1,'L');    
        
        
        $this->cell(30,5,$voornaam." ".$achternaam,0,1,'L');
        
        
        $this->cell(33,5,"Email klant:",0,1,'L');
        $this->cell(40,5,$email,0,1,'L');
        $this->SetFont('Times','B',10);
        $this->SetXY(60,50);
        $this->setFillColor(40,110,40);
        $this->SetTextColor(100,200,100);
        $this->cell(40,10,'Reservering nummer',1,0,'C',1);
        $this->cell(60,10,'Reservering datum',1,0,'C',1);
        $this->cell(40,10,'Aankomstdatum',1,0,'C',1);
        $this->cell(40,10,'Vertrekdatum',1,0,'C',1);
        $this->SetXY(60,100);
        $this->SetFillColor(0,0,0);
        
        $this->SetTextColor(0,0,0);
        $this->SetXY(60,60);
    $this->cell(40,10,$reserveringnr,1,0,'C');
    $this->cell(60,10,$reserveringdatum,1,0,'C');
    $this->cell(40,10,$aankomstdatum,1,0,'C');
    $this->cell(40,10,$vertrekdatum,1,0,'C');
    $this->Ln();
    
        $this->SetFont('Arial','B',8);
        $this->SetXY(60,80);
        $this->SetFillColor(226,175,35);
        $this->SetTextColor(255,255,255);
        $this->cell(70,8,'Omschrijving',1,0,'C',1);
        $this->cell(30,8,'Aantal',1,0,'C',1);
        $this->cell(40,8,'Prijs',1,0,'C',1);
        $this->cell(40,8,'Subtotaal',1,0,'C',1);
        $this->SetTextColor(0,0,0);
      
        $this->SetXY(60,88);
        $query3= "SELECT * FROM reservering INNER JOIN plaatsen ON reservering.plaatsid = plaatsen.plaatsid INNER JOIN plaatsentarief ON plaatsen.plaatsomschrijvingid = plaatsentarief.plaatsomschrijvingid  WHERE reservering.reserveringnr = '{$_SESSION['reserveringnr']}'";
        $query_run3 = $pdo->query($query3);
        if($query_run3){
            while($row3= $query_run3->fetch(PDO::FETCH_OBJ)){
                $plaatsid = $row3->plaatsid;
                $plaatsnaam = $row3->plaatsnaam;
                $plaatsprijs = $row3->plaatsprijs;
                $plaatsomschrijvingid = $row3->plaatsomschrijvingid;
            }
        }
        
        $this->cell(70,8,$plaatsnaam." ".$plaatsid." ".$plaatsomschrijvingid,1,0,'C');
        $this->cell(30,8,1,1,0,'C');
        $this->cell(40,8,number_format($plaatsprijs,2),1,0,'C');
        $this->cell(40,8,number_format($plaatsprijs,2),1,1,'C');
        $this->SetX(60);
       
        $query2= "SELECT * FROM voorzieningentarieven INNER JOIN voorzieningen ON voorzieningentarieven.optienr = voorzieningen.optienr WHERE voorzieningen.reserveringnr = '{$_SESSION['reserveringnr']}'";
        $query_run2 = $pdo->query($query2);
       
        $totaalOptie = 0;
        
        if($query_run2){
           
           for($i=1; $i<=$_SESSION['reserveringnr']; $i++){
            while($row2= $query_run2->fetch(PDO::FETCH_OBJ)){
                
                
                $optienr = $row2->optienr;
                $optienaam = $row2->optienaam;
                $aantal= $row2->aantal;
                $prijs = $row2->optieprijs;
                $subTotaal = $prijs * $aantal;
                
                $totaalOptie += $subTotaal;
            $this->cell(70,8,$optienaam,1,0,'C');
            $this->cell(30,8,$aantal,1,0,'C');
            $this->cell(40,8,number_format($prijs,2),1,0,'C');
            $this->cell(40,8,number_format($subTotaal,2),1,1,'C');
            $this->SetX(60);
         
    
        
            }
           
        }
        $currency = iconv("UTF-8", "ISO-8859-1//TRANSLIT", '€');
        $totaal  = $totaalOptie + $plaatsprijs;
        $this->SetX(200);
        $this->SetFillColor(255, 168, 0);
        $this->cell(40,20,"Totaal te betalen: ".number_format($totaal,2)." ".$currency,1,1,'L',1);
           

        
      
       
    }
    
   
    
         
    
        

        
 

        
  }
       
        
       
     
    
       
    
    
    function footer(){
        $this->SetY(-10);
        $this->SetFont('Arial','',8);
        $this->cell(0,10,"Copy 2020",0,0,'C');

    }
    

    





}
$pdf = new  myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);

$pdf->Output();
?>