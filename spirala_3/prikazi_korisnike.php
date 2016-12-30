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

 if(isset($_POST['obrisi']))
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
	   if(file_exists('Baza/korisnici.xml'))
	  {
	           $xml = simplexml_load_file('Baza/korisnici.xml');
                
				$broj_korisnika = 0;
				$broj_korisnika=$xml->children()->count();
				$lista_korisnika = $xml->children(); 
				?>
				
				 <?php
		        for($i=0; $i<$broj_korisnika; $i++ )
			   {  
		              $ime = $lista_korisnika[$i]->ime;
					 $prezime = $lista_korisnika[$i]->prezime;
					 $username = $lista_korisnika[$i]->username;
					 ?>
				     
				       <form class ="lista_korisnici" id = "novosti" action="prikazi_korisnike.php" method="post">
					   
					   	<table id="nova_novost1">
		                   <tr>
					      <br>
							 <label> Ime i prezime:</label>
                            <input id="ime_korisnika" name="ime_korisnika" Value="<?php echo "$ime $prezime" ?>" readonly></input>
					       
							
					        </tr>
							
							<tr>
					        <label> Username: </label>
                            <input id="user_korisnika" name="user_korisnika" Value="<?php echo $lista_korisnika[$i]->username ?>" readonly></input>
					        <br>
					        </tr>
							
							<?php if($username!="admin") { ?>
                       <td> <br> <a href = "napisi_nalaz.php?id_korisnika=<?php echo $lista_korisnika[$i]->id ?>" id = "dugme_nalaz"> Napiši nalaz </td>
					    <td> <input type="submit" value="Obriši korisnika" class="dugme_obrisi" id = "dugme_obrisi" name = "obrisi"> </td>
					
						
							<?php } ?>
					 
					    </table>
					   
					</form>
				  
				<?php
			   }
			   
	  }
	?>

</div>

</div>
</div>
</html>
