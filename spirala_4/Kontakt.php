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

	<br><br><br>
		
		<div class="drugik">
			
			 <form onsubmit="return provjeriFormu()">
			 <br>
			 <h3>Kontaktirajte nas odmah!</h3><br/>
			  <label> Ime: </label>
			  <input id="name" name="name" onblur="return provjera(this)" style="cursor: pointer;">
			  <div id="imeError"></div>
			  <br>  <br>
			  <label> E-mail: </label>
			  <input id="email" name="email" type="email" onblur="return provjera(this)">
			  <div id="mailError"></div>
			  <br>  <br>
			  <label> Poruka: </label>
			  <textarea id="poruka" name="poruka" onblur="return provjera(this)"></textarea>
			  <div id="porukaError"></div>
			  <br> <br><br>
			  <div id="dugmeError"></div>
			  <input id="dugme" name="dugme" value="Pošalji" type="submit">
			  
			  <br>
			  <br><br>
			  </form>
			 </div>
			
			<div class="prvik">
			
            <h4> Adresa: </h4>
			<p> Crkvice, Lamela c1 zgrada solidarnosti, <br>
			pored Caffe Pizzeria Monaco <br>
             Zenica </p>
			 <br><br>
			 
			 <h4> Telefon: </h4>
			 <p>032-488-028</p>
			 <br><br>
			 <br>
			<br>
		
		    <img src="lokacija.jpg" alt="Naša lokacija">
			
			 
			 
			
	</div>

</div>
    
	</body>
</html>


