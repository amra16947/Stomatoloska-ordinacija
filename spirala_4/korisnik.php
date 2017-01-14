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
<link rel="stylesheet" type="text/xml" href="novosti.xml">
<link rel="stylesheet" type="text/xml" href="nalazi.xml">
<script src="funkcije.js" type="text/javascript"></script>
<script src="validacija.js" type="text/javascript"></script>
</HEAD>
<body>
<?php
//$veza = new PDO("mysql:dbname=ordinacija;host=localhost;charset=utf8", "root", "");
$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=ordinacija', 'admin', 'admin');
$veza->exec("set names utf8");


 if (isset($_POST['dodaj_komentar']))
	{
		$pomoc =$_POST['tekst'];		
		if(!isset($_POST['tekst']))
		{
			
			
		}
		elseif(strlen($pomoc)<2)
		{
			
			print "Tekst mora da sadrži bar 2 slova.";
		}
		else
		{
			$username = $_SESSION['username'];
			$upit1 = $veza->prepare("SELECT id FROM korisnik WHERE username=?");
			$upit1->bindValue(1, $username, PDO::PARAM_STR);
			$upit1->execute();
            $korisnik = $upit1->fetch();
			
			if ($korisnik) {
			$id_korisnik = $korisnik["id"];
			$tekst = $_POST['tekst'];
			$upit = $veza->prepare("INSERT INTO komentar (id_korisnik, tekst) VALUES (?, ?);");
			$upit->bindValue(1, $id_korisnik, PDO::PARAM_STR);
			$upit->bindValue(2, $tekst, PDO::PARAM_STR);
			$rezultat = $upit->execute();

			if (!$rezultat) {
				
		        print "Greska komentar nije sacuvan.";
		        exit();
		    }
		    else
		    {
				print "Uspješno dodan komentar";
		    }
			}
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
<div id="pacijent_podaci">

<div id = "korisnik_meni">
<br>
<h2 id="pozdrav"> Dobro došli </h2>
<br>
<br>
      <ul id = "korisnik_meni_lista" >
	      
		  <li><a href="prijava.php">Moji nalazi</a></li>
		  <li><a href="korisnik.php">Komentar</a></li>
		   <li><a href="odjava.php">Odjavi se</a></li>
      </ul>
	  


</div>

</div>

<div>
<br><br>
	   <form class ="novosti_forma" id = "novosti_forma" action="korisnik.php" method="post" >
		<table id="nova_novost">
		        <tr>
					  <td colspan="2" > <label id="novost1"> Ostavi komentar:</label> </td>
				</tr>
				<tr>
					<td> <label> Komentar: </label></td>
					<td> <input type="text" name="tekst" id = "naslov_novost"></td>
				</tr>
				
                <tr>
					<td> <br> <input type="submit" value="Pošalji komentar" class="dugme" id = "dugme_dodaj" name = "dodaj_komentar"> </td>
			    </tr>
				
	
        </table>
	</form>
	  
	  
	  
</div>
</body>
</HTML>