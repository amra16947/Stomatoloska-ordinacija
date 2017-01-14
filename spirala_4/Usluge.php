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
					  <li><a href="xml_u_bazu.php">xml -> baza </a><li>
			</ul>
			<br>
			</div>
			
			</div> 
<div id="glavni">

	<br>
	<div class="drugi1">
		        

		<br>
	   <h2>Nudimo usluge:</h2><br><br>
			<ul class="lista1">
		    <li> preventivni pregledi </li> 
			<li>  liječenje zuba </li>
			<li> fiksna protetika </li>
			<li> mobilna protetika </li>
			<li> implantati </li>
			<li> ortodoncija </li>
			<li> ugradnja zubnog nakita </li>
			<li> ultrazvučno skidanje kamenca </li>
				 
		    </ul>	 
	</div>
				 
    <div class="prvi1">
			
			<?php

//$veza = new PDO("mysql:dbname=ordinacija;host=localhost;charset=utf8", "root", "");
$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=ordinacija', 'admin', 'admin');
			
$upit = $veza->prepare("SELECT naslov, tekst FROM novost;");
$upit->execute();
$novosti = $upit->fetchAll();

	  /* if(file_exists('Baza/novosti.xml'))
	  {
	           $xml = simplexml_load_file('Baza/novosti.xml');
                
				$broj_novosti = 0;
				$broj_novosti=$xml->children()->count();
				$lista_novosti = $xml->children(); */
?>
				 
				 <?php
		        foreach($novosti as $n)
			   {  ?>
				    
				       <form class ="lista">
					   
					   	<table id="nova">
		                   <tr>
					      <br>
							
                            <h2 id="naslov_clanak1"><?php echo $n["naslov"] ?></h2>
					       
							
					        </tr>
							<br><br>
							<tr>
					        
                            <label id="tekst_clanak1"><?php echo $n["tekst"] ?></label>
					        <br>
					        </tr>
							
					 
					    </table>
						<br>
						
					   
					</form>
					<hr>
				  
				<?php
			   }
			   
	  
	?>
			
	</div>
			

</div>
</body>
</html>