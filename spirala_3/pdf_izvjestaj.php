<?php
require('./fpdf181/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Times', 'B', 20);
		$this->SetX(40);
		$this->Cell(20, 20, 'Izvjestaj u .pdf formatu - Svi korisnici');
	
		
    }

    function Footer()
    {
		$this->SetY(-20);
		$this->SetFont('Arial', '', 12);
		$this->Cell(0, 10, 'Stranica '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    function BasicTable($naslov, $xml)
    {
        $this->SetX(40);
       
        $this->Ln();
        $this->SetX(40);
        $this->SetY(5);
        $this->SetFont('Times', '', 16);
		$broj_korisnika = 0;
		$broj_korisnika=$xml->children()->count();
		$lista_korisnika = $xml->children(); 
		$this->Ln(20);
		
		
		$this->Cell(30,30,"Trenutni broj korisnika je: $broj_korisnika." );
		$this->Ln(10);
		
	    $this->SetFont('Times', '', 12);
		 for ($i=0; $i <$broj_korisnika; $i++) 
        {			
		    $ime = $lista_korisnika[$i] -> ime;
			$prezime = $lista_korisnika[$i] -> prezime;
			
            $username = $lista_korisnika[$i] ->username;
		
			$this->Cell(30, 30, "Ime: $ime", 0, 0);
				$this->Ln(5);
			$this->Cell(30, 30, "Prezime: $prezime", 0, 0);
				$this->Ln(5);
			$this->Cell(30, 30, "Username: $username", 0, 0);
			/*$this->Cell(30, 50, $prezime, 0, 0);
			$this->Cell(30, 30, $ime, 0, 0);
			$this->Cell(30, 30, $ime, 0, 0);*/
			$this->Ln(15);
			
        }
		$this->Ln();
    }
}

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 14);
    $naslov = array('Pacijenti/korisnici');
    $xml = simplexml_load_file('Baza/korisnici.xml');
    $pdf->BasicTable($naslov, $xml);
    $pdf->SetX(15);
    $pdf->SetY(40);
    $pdf->Output();
?>