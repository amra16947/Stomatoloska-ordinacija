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
<script src="Search.js" type="text/javascript"></script>
</HEAD>
<body>

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


<br>

<div class = "admin_meni_trazi">
      <ul id = "admin_meni_lista1" >
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


<div class="trazi_forma">
<form onsubmit="trazi_sve(); return false;">
<table class="trazi_tabela">
		<tr><td>Pretraga imena:</td>
		<td><input type="text" id="trazi_ime1" oninput="trazi_jedan();" name="trazi_ime1"></td><br>
		</tr>
		<tr><td>Pretraga username-a:</td>
		<td><input type="text" id="trazi_username1" oninput="trazi_jedan();" name="trazi_username1"></td>
		</tr>
		<tr><td></td><td><input id="dugme_trazi" type="submit" value="Traži"><td></tr>
		</table>
	</form>
	

</div>

<div id="rezultati">
</div>

<div id="pomoc">
</div>



</div>

</html>