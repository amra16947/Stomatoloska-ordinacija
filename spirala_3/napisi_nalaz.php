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
		if(empty($_POST['biljeske']) || empty($_POST['terapija']) )
		{
			$poruka1="Popunite oba polja!";
		}
		else
		{
			$naslov = test_input($_POST["biljeske"]);
			$tekst = test_input($_POST["terapija"]);
			if(strlen($naslov )<5 || strlen($tekst)<5 ) 
			{
				$poruka1="Tekst je prekratak";
			}
			
		} 
	}


 if(isset($_POST['sacuvaj_nalaz']))
 {
	
	
		  if(file_exists('Baza/nalazi.xml') && file_exists('Baza/korisnici.xml'))
	  {   
		 $xml_nalazi = simplexml_load_file('Baza/nalazi.xml');
		  $broj_nalaza = $xml_nalazi->children()->count();
		 $xml_korisnici = simplexml_load_file('Baza/korisnici.xml');
		 $broj_korisnika = $xml_korisnici->children()->count();
			 
			
		  $id_korisnik =$_POST["sacuvaj_nalaz"];
		  if($id_korisnik>0)
		  {
		  $doktor = $_POST['doktor'];
		  $biljeske = $_POST['biljeske'];
		  $terapija = $_POST['terapija'];
		  
		  if($poruka1=="")
		  {
		   
		   $broj_nalaza=$xml_nalazi->children()->count();
			$nalaz = $xml_nalazi -> addChild("nalaz");
			
			$nalaz->addChild('id',$broj_nalaza+1);
			$nalaz->addChild('id_korisnika',$id_korisnik);
			$nalaz->addChild('doktor',$doktor);
			$nalaz->addChild('biljeske',$biljeske);
			$nalaz->addChild('terapija',$terapija);
			
			$xml_nalazi->asXML("Baza/nalazi.xml");
			header('Refresh: 1; URL = prikazi_korisnike.php');
		  }
		  }

		 
	  
	  }
	  else
		  $poruka1="greska";
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

<div> <h4 id="obavijest"> Dobro došao Admin!</h4> </div>

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
</div>

<div id="napisi_nalaz">
<?php
$id_korisnika=-1;
if (isset($_GET["id_korisnika"]))
{
	  
	  $id_korisnika= intval($_GET['id_korisnika']);	  
      
	  
}
	  ?>
<form class ="nalaz" id = "nalaz" action="napisi_nalaz.php" method="post">
		<table id="nova_novost">
		       <tr>
					  <td colspan="2" > <label id="novost1"> Novi nalaz</label> </td>
					
				</tr>
				
				<tr>
				            <td><label> Doktor: </label></td>
							<td><select id="doktor" name="doktor">
						    <option value="Nermin">Zahirović Nermin</option>
						    <option value="Dijana">Tolić Dijana</option>

							</select>
							</td>
				</tr>
				
				<tr>
					<td> <label> Bilješke: </label></td>
					<td> <input type="bilj" id = "bilj" name="biljeske" ></input></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "naslovError"></div></td>
				</tr>
				
				<tr>
					<td> <label> Terapija:  </label></td>
					<td> <input type="ter" id = "ter" name="terapija"  ></input></td>
				</tr>
				

				<tr>
				    <td></td>
					<td></td>
				</tr>
<tr>
					<td> <br> <button type="submit" value=<?php echo $id_korisnika ?> class="dugme" id = "dugme_izmjena" name = "sacuvaj_nalaz"> Sačuvaj nalaz <button></td>
</tr>
<tr>
				    
					<td><?php echo $poruka1 ?></td>
				</tr>
        </table>
		</form>
		<?php


	?>
<h1>
<?php 

?>
		
	
</div>
</html>