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
					 <li><a href="Pocetna.php" >Početna</a> </li>
					 <li><a href="Usluge.php">Usluge</a> </li>
					 <li><a href="KorisniSavjeti.php">Korisni savjeti</a></li>
					 
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
<br>
<br>
			<div class="prvi">
				<p> Poštovani, <br><br>

                   dobro došli na web stranice naše stomatološke ordinacije.
                  <br><br>
                  Visoko  educirano osoblje naše ordinacije 
                  pobrinut će se za sve vaše probleme vezane uz estetski izgled i zdravstveno stanje vaših zuba.
                  <br><br>
                   Nudimo širok spektar stomatoloških usluga uz 
                  primjenu najnovijih i najboljih znanstvenih novina u radu, kao 
                  i primjenu najsavremenijih uređaja i materijala svrstava nas u sam vrh ponude u regiji.
				</p>
				  <br><br>
				  <p id="potpis"> Vaša Stomatološka ordinacija </p>
				  <br>


			</div>
			<div class="drugi">
             
			 <form class="form1" method="get">
			 <br>
			 <label> Da li ste već posjetili našu ordinaciju? </label> <br><br><br>
			 <input type="radio" name="dailine" value="1" checked>DA <br><br>
			 <input type="radio" name="dailine" value="2" > NE <br>
			 <br><br>
			 <input id="dugme" type="submit" value="Pošalji">
			 <br> <br><br><br>
			 
			 
			 </form>
			
			</div>

          </div>
    
	</body>
</html>
