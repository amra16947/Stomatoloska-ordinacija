<?php

$veza = new PDO("mysql:dbname=ordinacija;host=localhost;charset=utf8", "root", "");
$veza->exec("set names utf8");
$upit = $veza->prepare("SELECT id, ime, prezime, username FROM korisnik;");
$upit->execute();
$kor = $upit->fetchAll(); 
   /* if (file_exists('Baza/korisnici.xml'))
    {
        $xml = simplexml_load_file('Baza/korisnici.xml'); 
		
		        $broj_korisnika = 0;
				$broj_korisnika=$xml->children()->count();
				$lista_korisnika = $xml->children(); 
*/
        $naslov = array('Ime' . ','. 'Prezime' .','.'Username');

        $csv = fopen('izvjestaj_korisnici.csv', 'w');
        fputcsv($csv, $naslov);      
        fclose($csv);
		$korisnici = [];
		

        foreach($kor as $k)
        {	
           
		    $ime = $k["ime"];
			$prezime = $k["prezime"];
            $username = $k["username"];
			
			$korisnici[] = $ime . ',' . $prezime  . ',' .  $username ;
			 
			$csv = fopen('izvjestaj_korisnici.csv', 'a');
            fputcsv($csv, $korisnici);      
			fclose($csv);
            $korisnici = [];
          
        }
         
		  
        $contenttype = "application/force-download";
        header("Content-Type: " . $contenttype);
        header("Content-Disposition: attachment; filename=\"" . basename('izvjestaj_korisnici.csv') . "\";");
        readfile('izvjestaj_korisnici.csv');
        exit();
    
	
?>