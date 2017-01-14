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
 
 <div>
			
	<br><br>
        <h3>Tim zadužen za Vaš blistavi osmijeh</h3>
        <hr><br>
        <div class="red">
        <div class="kolona">
        <img class="img1" src="Slike/tim1.jpg" alt="Osoblje" onclick="prikaziSliku('Slike/tim1.jpg');">
        </div>
<div class="kolona">
<img class="img1" src="Slike/tim2.jpg" alt="Osoblje" onclick="prikaziSliku('Slike/tim2.jpg');">
</div>
<div class="kolona">
<img class="img1" src="Slike/tim3.jpg" alt="Osoblje" onclick="prikaziSliku('Slike/tim3.jpg');">
</div>
</div>

 
  
  			
			<br><br><br>
  <h3>Naši pacijenti</h3>
  <hr><br>
    <div class="red">
   <div class="kolona">
<img class="img1" src="Slike/pac2.jpg" alt="Pacijenti" onclick="prikaziSliku('Slike/pac2.jpg');">
</div>
<div class="kolona">
<img class="img1" src="Slike/pac3.jpg" alt="Pacijenti" onclick="prikaziSliku('Slike/pac3.jpg');">
</div>
<div class="kolona">
<img class="img1" src="Slike/pac4.jpg" alt="Pacijenti" onclick="prikaziSliku('Slike/pac4.jpg');">
</div>
<div class="kolona">
<img class="img1" src="Slike/pac5.jpg" alt="Pacijenti" onclick="prikaziSliku('Slike/pac5.jpg');">
</div>
</div>
			
<br><br><br>
</div>

</body>
</html>