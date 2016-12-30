<?php
    
    if (file_exists('Baza/korisnici.xml'))
    {
        $xml = simplexml_load_file('Baza/korisnici.xml'); 
		
		        $broj_korisnika = 0;
				$broj_korisnika=$xml->children()->count();
				$lista_korisnika = $xml->children(); 

        $naslov = array('Ime' . ',', 'Prezime'. ',', 'Mail'. ',', 'Username');

        $csv = fopen('izvjestaj_korisnici.csv', 'w');
        fputcsv($csv, $naslov);      
        fclose($csv);
		$korisnici = [];
		

        for ($i=0; $i < $broj_korisnika; $i++) 
        {	
            $id	= $lista_korisnika[$i] -> id;
		    $ime = $lista_korisnika[$i] -> ime;
			$prezime = $lista_korisnika[$i] -> prezime;
            $username = $lista_korisnika[$i] ->username;
			
			$korisnici[] = $id . ',' . $ime . ',' . $prezime  . ',' .  $username ;
			 
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
    }
	
?>