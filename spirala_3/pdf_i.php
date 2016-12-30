<?php
require('./fpdf181/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Times', 'B', 18);
		$this->Cell(20, 20, 'Izvjestaj u .pdf formatu za stranicu DFuBiH');
    }

    function Footer()
    {
		$this->SetY(-20);
		$this->SetFont('Arial', '', 12);
		$this->Cell(0, 10, 'Stranica '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    function BasicTable($naslov, $podaci)
    {
        $this->SetX(10);
        foreach($naslov as $kolona)
		{
            $this->SetFont('Times', 'B', 14);
            $this->Cell(40, 50, $kolona, 0);
        }
        $this->Ln();

        $this->SetY(45);
        $this->SetFont('Times', '', 12);
		foreach($podaci->korisnici->user as $user)
		{
			$username = $user->username;
			$this->Cell(41, 8, $username, 0, 0);
			$this->Ln();
        }
		$this->Ln();
    }
}

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 14);
    $naslov = array('Korisnici');
    $xml = simplexml_load_file('korisnici.xml');
    $pdf->BasicTable($naslov, $xml);
    $pdf->SetX(15);
    $pdf->SetY(40);
    $pdf->Output();
?>