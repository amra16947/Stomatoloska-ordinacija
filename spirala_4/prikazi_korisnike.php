<?php
	
	session_start();
?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<META name="viewport" content="width=device-width" />
<TITLE>Stomatoloska ordinacija</TITLE>
<link rel="stylesheet" type="text/css" href="so.css">
<link rel="stylesheet" type="text/css" href="pocetna.css">
<link rel="stylesheet" type="text/css" href="prijava.css">
<link rel="stylesheet" type="text/xml" href="korisnici.xml">
<script src="funkcije.js" type="text/javascript"></script>
<script src="validacija.js" type="text/javascript"></script>
</HEAD>
<body>
<?php

//$veza = new PDO("mysql:dbname=ordinacija;host=localhost;charset=utf8", "root", "");
$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=ordinacija', 'admin', 'admin');
$veza->exec("set names utf8");

function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

/* if(isset($_POST['obrisi']))
 {
	 $username = $_POST['user_korisnika'];
	 
	 
	 
	   $xml_obrisi = simplexml_load_file('Baza/korisnici.xml');
	   $prebroj = $xml_obrisi->children()->count();
	   $novost = $xml_obrisi->children();
	   
			   for($i=0; $i < $prebroj; $i++)
			   {
				   if($novost[$i] -> username == $username)
				   {
					  
					   unset($novost[$i]);
					   break;
				      
				   }
			   }
			   $xml_obrisi->asXML('Baza/korisnici.xml');
			    header('Refresh: 1; URL = prikazi_korisnike.php');     
	   
 }*/
 
 if (isset($_POST['obrisi']))
	{
		$username = test_input($_POST['user_korisnika']);
		$id1 = test_input($_POST["id_kor"]);
		
		
		//svi nalazi
		$upit2 = $veza->prepare("SELECT * FROM nalaz WHERE id_korisnika=?;");
		$upit2->bindValue(1, $id1, PDO::PARAM_INT);
		$rezultat = $upit2->execute();
		foreach($upit2 as $kon)
			{
				if ($kon["id_korisnika"] == $id1)
				{
					$upitNalaz2 = $veza->prepare("DELETE FROM nalaz WHERE id=?;");
					$upitNalaz2->bindValue(1, $kon["id"], PDO::PARAM_INT);
					$rezultat2 = $upitNalaz2->execute();
					
					if (!$rezultat2)
					{
						
						$poruka1="Greska prilikom brisanja korisnikovih nalaza.";
					}
			    }
			}
			
		//svi komentari
				
        $upit2 = $veza->prepare("SELECT * FROM komentar WHERE id_korisnika=?;");
		$upit2->bindValue(1, $id1, PDO::PARAM_INT);
		$rezultat = $upit2->execute();
		foreach($upit2 as $kon)
			{
				if ($kon["id_korisnika"] == $id1)
				{
					$upitKom2 = $veza->prepare("DELETE FROM komentar WHERE id=?;");
					$upitKom2->bindValue(1, $kon["id"], PDO::PARAM_INT);
					$rezultat2 = $upitKom2->execute();
					
					if (!$rezultat2)
					{
						
						$poruka1="Greska prilikom brisanja korisnikovih komentara.";
					}
			    }
			}				

		$upit1 = $veza->prepare("DELETE FROM korisnik WHERE id=?;");
		$upit1->bindValue(1, $id1, PDO::PARAM_INT);
		$rezultat = $upit1->execute();

		if (!$rezultat) {
			
	        print "Greška: niste uspjeli obrisati korisnika.";
	        exit();
	    }
	    else
	    {
			
			$poruka1= "Uspješno obrisan korisnik sa svim svojim komentarima i nalazima";
	    }
	}
			
?>
<div id="okvir">
    <div id="zaglavlje">
	        <br>
	<h1> Stomatološka ordinacija </h1>
	 <br>
         <div class="meni">
		 <br>
           <ul >
				<li><a href="Usluge.php">Novosti</a></li>
				
				<li><a href="Fotogalerija.php">Fotogalerija</a>
				 <ul>
					 <li> </li>
					 <li> </li>
					 
					 </ul>
			    </li>
				<li><a href="Kontakt.php">Kontakt</a></li>
				<li id = "prijava"><a href="prijava.php">Postani dio tima!</a></li>
			</ul>
			<br>
			</div>
			
			</div> 
			
<div id="glavni">

<div class="prijavaDiv">
<br>

<div class = "admin_meni">
      <ul id = "admin_meni_lista" >
	      <li><a href="prijava.php">Dodaj Novost</a></li>
	      <li><a href="prikazi_novosti.php"> Uredi/Obriši Novost</a></li>
          <li><a href="prikazi_korisnike.php">Korisnici</a></li>
		  <li><a href="pretraga_korisnika.php">Pretraga korisnika</a></li>
		  <li><a href="odjava.php">Odjavi se</a></li>
		  <br>
		  <label>Novo!</label>
		  <li><a href="csv.php">Preuzmi sve korisnike(csv)</a><li>
		  <li><a href="pdf_izvjestaj.php">Preuzmi sve korisnike(pdf)</a><li>
      </ul>
	  <br>
	
</div>

<?php

$upit = $veza->prepare("SELECT id, ime, prezime, username FROM korisnik;");
$upit->execute();
$korisnici = $upit->fetchAll();
				
		        foreach($korisnici as $k)
			   {  
		             $ime = $k["ime"];
					 $prezime = $k["prezime"];
					 $username = $k["username"];
					 $id = $k["id"];
					 
					 ?>
				     
				       <form class ="lista_korisnici" id = "novosti" action="prikazi_korisnike.php" method="post">
					   
					   	<table id="nova_novost1">
						<tr>
					      <br>
							 <label> ID:</label>
                            <input id="ime_korisnika" name="id_kor" Value="<?php echo $k["id"] ?>" readonly></input>
					       
							
					        </tr>
							
		                   <tr>
					      <br>
							 <label> Ime i prezime:</label>
                            <input id="ime_korisnika" name="ime_korisnika" Value="<?php echo "$ime $prezime" ?>" readonly></input>
					       
							
					        </tr>
							
							<tr>
					        <label> Username: </label>
                            <input id="user_korisnika" name="user_korisnika" Value="<?php echo $username?>" readonly></input>
					        <br>
					        </tr>
							
							<?php if($username!="admin") { ?>
                       <td> <br> <a href = "napisi_nalaz.php?id_korisnika=<?php echo $id ?>" id = "dugme_nalaz"> Napiši nalaz </td>
					    <td> <input type="submit" value="Obriši korisnika" class="dugme_obrisi" id = "dugme_obrisi" name = "obrisi"> </td>
					
				
				 
				
							<?php } ?>
					 
					    </table>
					   
					</form>
				  
				<?php
			   }
			   
	  
	?>

</div>

</div>
</div>
</html>
