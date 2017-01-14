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

//$veza = new PDO("mysql:dbname=ordinacija;host=localhost;charset=utf8", "root", "");
$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=ordinacija', 'admin', 'admin');
$veza->exec("set names utf8");

	  $greska="";
	  $poruka1="";
	  $naslov="";
	  $tekst="";
   
   function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

 /*	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($_POST['naslov2']) || empty($_POST['tekst2']) )
		{
			$poruka1="Popunite oba polja!";
			echo $poruka1;
		}
		else
		{
			$naslov = test_input($_POST['naslov']);
			$tekst = test_input($_POST['tekst']);
			if(strlen($tekst)<5) 
			{
				$poruka1="Tekst je prekratak";
			}
			
		} 
	}
	 */
	  
/*
if (isset($_POST['izmjena_novost123']))
 {    

	
      $naslov1 = $_POST['naslov2'];
	  $tekst1 = $_POST['tekst2'];
	  $id = $_POST['izmjena_novost123'];
	
	  if(file_exists('Baza/novosti.xml'))
	  {
	           $xml_izmjena_novosti = simplexml_load_file('Baza/novosti.xml');
			   $broj=$xml_izmjena_novosti->children()->count();
			   $lista_novosti = $xml_izmjena_novosti->children();
			   
	   if($poruka1 == "")
	   {
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
 else
	 $poruka1="Greska prilikom ucitavanja XML-a.";
 
 }*/
 
 	if (isset($_REQUEST['izmjena_novost123']))	
	{   
		$naslov1 = test_input($_POST["naslov2"]);
	    $tekst1 = test_input($_POST["tekst2"]);
		
	
			
		if(empty($_POST["naslov2"]) || empty($_POST["tekst2"]) )
		{
			$poruka1="Popunite oba polja!";
		}
		elseif(strlen($naslov1)>=50 || strlen($naslov1)<5) 
		{
			
			
				$poruka1="Naslov minimalno mora imati 5 slova, a ne više od 50.";
			
			
		} 
		elseif(strlen($tekst1)<5)
		{
			$poruka1="Tekst mora imati min 5 slova.";
		}
		else
		{
		    $id = $_POST['izmjena_novost123'];
			$naslov = $_POST['naslov2'];
			$tekst = $_POST['tekst2'];
			$upit = $veza->prepare("UPDATE novost SET naslov=?, tekst=? WHERE id=?;");
			$upit->bindValue(1, $naslov1, PDO::PARAM_STR);
			$upit->bindValue(2, $tekst1, PDO::PARAM_STR);
			$upit->bindValue(3, $id, PDO::PARAM_INT);

			$rezultat = $upit->execute();


			if (!$rezultat) {
				$greska_info = $veza->errorInfo();
				
		  		print "SQL greška: " . $greska_info[2];
		        exit();
		    }
		    else
		    {
				$poruka1 = "Uspješno editovana  novost";
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

 <?php
	 
	  
	  /*if (isset($_GET["id_novosti"]))
	  { 
	  $id= intval($_GET['id_novosti']);	  
      $xml_izmjeni = simplexml_load_file('Baza/novosti.xml');
	  $prebroj = $xml_izmjeni->children()->count();	
     
     
		  $xml_izmjeni = simplexml_load_file('Baza/novosti.xml');
	       $prebroj = $xml_izmjeni->children()->count();
	       $novost = $xml_izmjeni->children();
	   
			   for($i=0; $i < $prebroj; $i++)
			   { 
		  
				   if($novost[$i] -> id == $id)
				   {
					   $naslov = $novost[$i] -> naslov;
					   $tekst =  $novost[$i] -> tekst;
					  
					    break;
				      
				   }
			   }
			   $greska="";*/
			   
	
	 if(isset($_GET["id_novosti"]))
	{  
		  $id=($_GET['id_novosti']);	
	  
		  $upit = $veza->prepare("SELECT naslov, tekst  FROM novost WHERE id=?;");
		  $upit->bindValue(1, $id, PDO::PARAM_INT);
          $upit->execute();
		  $novosti = $upit->fetchAll();
		  
		  foreach($novosti as $n)
		  {
			  $naslov = $n["naslov"];
			  $tekst =  $n["tekst"];
		  }
       

		
			 
    }		 
			   
	  ?> 

       		 

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
	
	  
	  
	  
	
	<div class="izmjena_novosti">
	
   
	 <form class ="novosti_izmjena" id = "novosti_izmjena" action="uredi_novost.php" method="post" >
		<table id="nova_novost">
		       <tr>
					  <td colspan="2" > <label id="novost1"> Uredi novost:</label> </td>
					
				</tr>
				<tr>
					<td> <label> Naslov: </label></td>
					<td> <input type="text" id = "naslov_novost" name="naslov2" Value="<?php echo $naslov ?>" ></input></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "naslovError"></div></td>
				</tr>
				
				<tr>
					<td> <label> Tekst:  </label></td>
					<td> <input type="text" id = "text_novost" name="tekst2" Value="<?php echo $tekst ?>" ></input></td>
				</tr>
				

				<tr>
				    <td></td>
					<td><?php echo $greska ?></td>
				</tr>
<tr>
					<td><button type="submit"  class="dugme" id = "dugme_izmjena" value="<?php echo  $id ?>" name = "izmjena_novost123"> Sacuvaj izmjene </button></td>
</tr>
				<tr>
				  
					<td><?php echo $poruka1 ?></td>
				</tr>
        </table>
		</form>
	
	
	
	
	</div>

</div>

</div>

</body>

</html>


