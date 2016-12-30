<?php
	session_start();

	
	if(file_exists('Baza/korisnici.xml'))
	{
	 $xml = simplexml_load_file("Baza/korisnici.xml");
		
	
	$prikazi = "";

	$prikazi = $prikazi ."<table>";

    if ((!isset($_GET["ime_p"]) || ($_GET["ime_p"] == "")) && (!isset($_GET["username_p"]) || ($_GET["username_p"] == "")))
	{
		$prikazi = " Nema rezultata";
	}
	else
	{
	
		$svi_korisnici = $xml->korisnik;
		$broj_korisnika = $xml->korisnik->count();
		
		$pretraga_ime = strtolower($_GET["ime_p"]);
		$pretraga_user = strtolower($_GET["username_p"]);
		$broj_rezultata = 0;
		
        
		for($i=0; $i<$broj_korisnika; $i++)
		{
		if ($pretraga_ime == "") $pretraga_ime = "111";
		if ($pretraga_user == "") $pretraga_user = "111";
		if ((substr_count(strtolower($svi_korisnici[$i]->ime), $pretraga_ime) != 0) || (substr_count(strtolower($svi_korisnici[$i]->username), $pretraga_user) != 0))
			{ $broj_rezultata++;
				$ime = $svi_korisnici[$i]->ime;
				$prezime = $svi_korisnici[$i]->prezime;
				$username = $svi_korisnici[$i]->username;
				
				$prikazi = $prikazi . " 
                        <tr>
					    <td> Korisnik  $broj_rezultata:</td>
					       </tr>
		                   <tr>
					      <td>Ime: $ime </td>
					       </tr>
							
							<tr> 
                          <td>Prezime: $prezime </td>	
					        </tr>
							
							
							
							<tr>
                           <td> Username: $username </td>
						   
					        </tr>
							<tr>
                           <td> </td>
						   
					        </tr>
							"  ; 

				

				if (!isset($_GET["trazi"]) && $broj_rezultata == 10)
				{
					break;
				}
			}
		
		}
	}
	
	$prikazi = $prikazi . "</table>";
	echo $prikazi;

	}	
?>