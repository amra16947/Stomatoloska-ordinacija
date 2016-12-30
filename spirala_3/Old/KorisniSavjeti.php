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
<script src="funkcije.js" type="text/javascript"></script>
<script src="validacija.js" type="text/javascript"></script>
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
				<li><a>Novosti</a>
				     <ul>
					 <li><a href="Pocetna.php" id="ucitana">Početna</a> </li>
					 <li><a href="KorisniSavjeti.php">Korisni savjeti</a></li>
					 <li id = "prijava"><a href="prijava.php"></a></li>
					 
					 </ul>
			    </li>
				
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
			<br><br>
	<div class="prvi">
           <h2> Korisni savjeti </h2>
			
			<section>
			<hr><br>
			<h3> Prirodna njega zubi </h3><br>
			
			<p>
			Priroda nam je podarila zdrave i čvrste zube, 
			a isključivo o nama ovisi kako ćemo taj dar čuvati. 
			Karijes i trulež zuba uzrokovan bakterijama su dva najčešća faktora 
			koja uzrokuju kvarenje, pa i gubitak zuba. No, pravilnom i stalnom njegom to možemo izbjeći!
			</p>
			<u><a href="http://www.savjetnica.com/prirodna-njega-zubi/" target="_blank">[Detaljnije...]</a></u>
			<br><br>
			</section>
			
			<section>
			<hr><br>
			<h3> Prirodno izbjeljivanje zubi </h3><br>
			
			<p>
			Jako dobar prirodni izbjeljivač zubi su jagode, čije minijaturne sjemenke od kojih se sastoje, rade odličan piling na zubima.
			</p>
			<u><a href="http://www.savjetnica.com/prirodno-izbjeljivanje-zubi/" target="_blank">[Detaljnije...]</a></u>
			<br><br>
			</section>
			
			<section>
			<hr><br>
			<h3> Kako ukloniti neugodan zadah</h3><br>
			
			<p>
			Halitoza ili neugoda zadah iz usta stanje je s kojim se nosi 
			velik broj populacije. Prema posljednje provedenom istraživanju 
			pokazalo se kako 95% populacije pati od neugodnog zadaha uzrokovanog raznim bakterijama.
			</p>
			<u><a href="http://www.savjetnica.com/kako-ukloniti-neugodan-zadah/" target="_blank">[Detaljnije...]</a></u>
			<br><br>
			</section>
			
	</div>
			
	<div class="drugi2">
			
			<form method="get">
			 <br>
			 <label> Koliko često perete zube? </label> <br><br>
			 <input type="radio" name="dailine" value="1" checked>Nakon svakog jela<br>
			 <input type="radio" name="dailine" value="2" > Dva puta na dan<br>
			 <input type="radio" name="dailine" value="3" > Jednom dnevno<br>
			 <br>
			 <input id="dugme" type="submit" value="Pošalji">
			 <br> <br><br>
			 </form>
			
	</div>
			
</div>
    
	</body>
</html>
