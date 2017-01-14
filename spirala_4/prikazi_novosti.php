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
<script src="forma_sa_dva_submita.js" type="text/javascript"></script>
</HEAD>
<body>
<?php

//$veza = new PDO("mysql:dbname=ordinacija;host=localhost;charset=utf8", "root", "");
$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=ordinacija', 'admin', 'admin');
$veza->exec("set names utf8");

 /*if(isset($_POST['obrisi']))
 {
	 $naslov = $_POST['naslov_clanak'];
	 $tekst = $_POST['tekst_clanak'];
	 
	 
	   $xml_obrisi = simplexml_load_file('Baza/novosti.xml');
	   $prebroj = $xml_obrisi->children()->count();
	   $novost = $xml_obrisi->children();
	   
			   for($i=0; $i < $prebroj; $i++)
			   {
				   if($novost[$i] -> naslov == $naslov && $novost[$i] -> tekst == $tekst)
				   {
					   echo $novost[$i];
					   unset($novost[$i]);
					   break;
				      
				   }
			   }
			   $xml_obrisi->asXML('Baza/novosti.xml');
			    header('Refresh: 1; URL = prikazi_novosti.php');     
	   
 }
*/   
if (isset($_POST['obrisi']))
	{
		
		$id = $_POST['id_clanak'];
		$upit = $veza->prepare("DELETE FROM novost WHERE id=?;");
		$upit->bindValue(1, $id, PDO::PARAM_INT);
		$obrisano = $upit->execute();

		if (!$obrisano) {
			
			$greska_info = $veza->errorInfo();
	        print "Greška: niste uspjeli obrisati novost.";
	        exit();
	    }
	    else
	    {
			
			$poruka = "Uspješno obrisana novost";
	    }
	}
 
/*if (isset($_POST['izmjena_novost123']))
 {    

	
      $naslov1 = $_POST['naslov2'];
	  $tekst1 = $_POST['tekst2'];
	  $id = $_POST['izmjena_novost123'];
	
	  if(file_exists('Baza/novosti.xml'))
	  {
	           $xml_izmjena_novosti = simplexml_load_file('Baza/novosti.xml');
			   $broj=$xml_izmjena_novosti->children()->count();
			   $lista_novosti = $xml_izmjena_novosti->children(); 
			   
			   for($i=0; $i<$broj; $i++)
			   {  
			          if($lista_novosti[$i] -> id == $id)
					  {   
				  
				          $lista_novosti[$i] -> naslov = $naslov1;
						  $lista_novosti[$i] -> tekst = $tekst1;
                		  break;			  
					  }
                    
     
			   }
			   
			$xml_izmjena_novosti->asXML('Baza/novosti.xml');
			header('Refresh: 1; URL = prikazi_novosti.php');
    
 }
 
 
 }
*/
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

<div id="novosti_a">
<?php

$upit = $veza->prepare("SELECT id, naslov, tekst FROM novost;");
$upit->execute();
$novosti = $upit->fetchAll();

	  /* if(file_exists('Baza/novosti.xml'))
	  {
	           $xml = simplexml_load_file('Baza/novosti.xml');
                
				$broj_novosti = 0;
				$broj_novosti=$xml->children()->count();
				$lista_novosti = $xml->children(); 
				<h3 id="brojac"> <?php echo "Broj novosti je: $broj_novosti"?></h3>;*/
?>
				 
				 <?php
		        foreach($novosti as $novost)
			   {  ?>
				    
				       <form class ="lista_novosti" id = "novosti" action="prikazi_novosti.php" method="post">
					   
					   	<table id="nova_novost1">
						
						<tr>
					      <br>
							 <label> ID: </label>
                            <input id="naslov_clanak" name="id_clanak" Value="<?php echo $novost["id"] ?>" readonly></input>
					          <br>
							     <br>
							
					        </tr> 
		                   <tr>
					      <br>
							 <label> Naslov: </label><br>
                            <input id="naslov_clanak" name="naslov_clanak" Value="<?php echo $novost["naslov"] ?>" readonly></input>
					       <br>
							
					        </tr>
							
							<tr>
					        <label> Tekst: </label>
                            <input id="tekst_clanak" name="tekst_clanak" Value="<?php echo $novost["tekst"] ?>" readonly></input>
					        <br>
					        </tr>
							
							<?php
							
							
							?>
							
                      <td> <br> <a href = "uredi_novost.php?id_novosti=<?php echo $novost["id"]?>" id = "dugme_novosti_uredi" name = "dugme_uredi"> Uredi novost </td>
					    <td> <input type="submit" value="Obriši" class="dugme_obrisi" id = "dugme1" name = "obrisi" > </td>
					 
					    </table>
					   
					</form>
				  
				<?php
			   }
			   
	  	?>

</div>

</div>
</div>
</html>
