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
	
   $poruka = "";
   $poruka1 = "";
   
   function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

 	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($_POST["naslov"]) || empty($_POST["tekst"]) )
		{
			$poruka1="Popunite oba polja!";
		}
		else
		{
			$naslov = test_input($_POST["naslov"]);
			$tekst = test_input($_POST["tekst"]);
			if(strlen($tekst)<5) 
			{
				$poruka1="Tekst je prekratak";
			}
			
		} 
	}
	
 	
	   
   if(isset($_POST['login']))
   {
	   if(isset($_POST['username']) && isset($_POST['password'])){
      $username = $_POST['username'];
	  $password = md5($_POST['password']);
	  
	  if(file_exists('Baza/korisnici.xml'))
	  {
	           $xml = simplexml_load_file('Baza/korisnici.xml');
			   
			   foreach($xml->children() as $un)
			   { 
			   if($un->username == $username &&  $password == $un->password)
			     {
			            
					     $_SESSION['username'] = $username;
						   $_SESSION['password'] = $password;;
						 $poruka = "Uspješna prijava"; 
						 header('Refresh: 1; URL = prijava.php');
					
				 }
				 else
					$poruka = "Pokušajte ponovo!";

			   }
			   
	  }
      else
	  $poruka = "Nije pronađen XML fajl!";
   }
   else
	   $poruka = "Prazna polja!";
   }
   
   
   
    if(isset($_POST['dodaj_novost']))
	{
	  $naslov = $_POST['naslov'];
	  $tekst = $_POST['tekst'];
	  
	  $naslov_je_zauzet = false;
	  $potvrda = false;
	  if(file_exists('Baza/novosti.xml'))
	  {
	    $xml_novosti = simplexml_load_file('Baza/novosti.xml');
	
	if($poruka1=="")
	{
		   $broj_novosti=$xml_novosti->children()->count();
			$novost = $xml_novosti ->addChild("novost");
			
			$novost->addChild('id',$broj_novosti+1);
			$novost->addChild('naslov',$naslov);
			$novost->addChild('tekst',$tekst);
			
			$xml_novosti->asXML("Baza/novosti.xml");
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

<div class="prijavaDiv">

<?php if(isset($_SESSION['username']) &&  $_SESSION['username']=="admin")  
{

?>

<div> <h4 id="obavijest"> Dobro došao Admin!</h4> </div>

<div id = "admin_meni">
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
</div>

<div id="admin_forma_novost">

 <form class ="novosti_forma" id = "novosti_forma" action="prijava.php" method="post" >
		<table id="nova_novost">
		        <tr>
					  <td colspan="2" > <label id="novost1"> Dodaj novost</label> </td>
				</tr>
				<tr>
					<td> <label> Naslov: </label></td>
					<td> <input type="text" name="naslov" id = "naslov_novost"></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "naslovError"></div></td>
				</tr>
				
				<tr>
					<td> <label> Tekst:  </label></td>
					<td> <textarea type="text" name="tekst" id = "tekst_novost" ></textarea><td>
				</tr>
				
				<tr>
				    <td></td>
					
				</tr>
				
                <tr>
					<td> <br> <input type="submit" value="Dodaj novost" class="dugme" id = "dugme_dodaj" name = "dodaj_novost"> </td>
			    </tr>
					<tr><td> <?php echo $poruka ?> </td> </tr>
	
        </table>
	</form>


</div>



<?php

}

 elseif(isset($_SESSION['username']) && $_SESSION['username']!="admin")  
{


?>

<div id="pacijent_podaci">

<div id = "admin_meni">
<br>
<h2 id="pozdrav"> Dobro došli </h2>
<br>
<br>
      <ul id = "admin_meni_lista" >
	      <li><a href="odjava.php">Odjavi se</a></li>
      </ul>
</div>

</div>

<div id="pacijent_nalazi">
<br><br><br>
<h2 id="pozdrav"> Moji nalazi </h2>
 </div>
<?php
 if(file_exists('Baza/nalazi.xml') && file_exists('Baza/korisnici.xml'))
	  {    
	           $xml = simplexml_load_file('Baza/nalazi.xml');
			   $xml_k = simplexml_load_file('Baza/korisnici.xml');
			   $broj_korisnika=$xml_k->children()->count();
			   $svi_korisnici=$xml_k->children();
			 
			   
			   for($i=0; $i<$broj_korisnika; $i++) /* nadji id koji je korisnik*/
			   {
			   if($_SESSION['username'] == $svi_korisnici[$i]->username)
			   {  
				$id_korisnika = $svi_korisnici[$i]->id;
				
			    
			   
			   
			    $broj_nalaza = 0;
				$broj_nalaza=$xml->nalaz->count();
				$lista_nalaza = $xml->nalaz; 
				$brojac=0;
				
				
		        for($i=0; $i<$broj_nalaza; $i++ )
			   {  
		         
		             $doktor = $lista_nalaza[$i]->doktor;
					 $biljeske = $lista_nalaza[$i]->biljeske;
					 $terapija = $lista_nalaza[$i]->terapija;
					 $id = $lista_nalaza[$i]->id;
					 $id_k = $lista_nalaza[$i] -> id_korisnika;
					
					
					 if(intval($id_k)  == intval($id_korisnika))
					 { 
				       $brojac++;
				       
				         
					 ?>
					
				     <div id="forma_1">
					 
				       <form class ="lista_korisnika">
					   
					   	<table id="nova_novost12">
		                   <tr>
					      <br>
							 <td><?php echo "Nalaz br. $brojac" ?></td>

					        </tr>
							
							<tr>
					        <td><?php echo "Doktor: $doktor" ?> </td>
                   
					        </tr>
							
							<tr>
					        <td><?php echo "Bilješke: $biljeske" ?> </td>
					        <br>
					        </tr>
							
							<tr>
					        <td><?php echo "Terapija: $terapija" ?></td>
					        <br>
					        </tr>	
					 
					    </table>
					   
					</form>
					</div>
				  
				<?php
			   }
			   }
			    break;
				}
			   }
	  }
	?>
</div>


<?php 
}
elseif(!isset($_SESSION['username']))
{

?>

<form class ="prijavaFormaclass" id = "prijavaFormaid" action="prijava.php" method="post">
		<table>
				<tr>
					<td> <label> Username: </label></td>
					<td> <input type="text" name="username" id ="Username"></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id ="uGreska"></div></td>
				</tr>
				
				<tr>
					<td> <label> Password:  </label></td>
					<td> <input type="password" name="password" id ="Password" ><td>
				</tr>
				

				<tr>
				    <td></td>
					<td><div id = "pGreska"></div></td>
				</tr>

				
				<tr>
					<td> <br> <a href = "registracija.php" id = "registracija"> Registruj se </td>
					<td> <br> <input type="submit" value="Prijavi se" class="dugme" id = "prijava" name = "login"> </td>
					
				</tr>
				<tr>
				<td></td>
					<td><?php echo $poruka ?></td>
				</tr>
			</table>
		</form>

<?php
}

?>














</div>
</div>
</div>



</body>
</html>