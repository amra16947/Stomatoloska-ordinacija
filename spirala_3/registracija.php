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
<link rel="stylesheet" type="text/css" href="registracija.css">
<link rel="stylesheet" type="text/xml" href="korisnici.xml">
<script src="funkcije.js" type="text/javascript"></script>
<script src="validacijaRegistracija.js" type="text/javascript"></script>
</HEAD>
<body>

<?php

$poruka="";
$greske= false;
 $imeError="";
 $prezimeError="";
 $mailError="";
 $usernameError="";
 $passwordError="";
 
 function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	
 	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["ime"]))
		{
			$imeError = "Morate unijeti ime";
			$greske= true;
		}
		else
		{
			$ime = test_input($_POST["ime"]);
			if (!preg_match("/^[a-zA-Z]{3,15}$/",$ime)) 
			{
				$imeError = "Ime mora sadržavati bar 3 slova."; 
				$greske= true;
			}
		}
		
		
		if (empty($_POST["prezime"]))
		{
			$prezimeError = "Morate unijeti prezime.";
			$greske= true;
		}
		else
		{
			$prezime = test_input($_POST["prezime"]);
			if (!preg_match("/^[a-zA-Z]{3,20}$/",$prezime)) 
			{
				$prezimeError = "Prezime mora sadržavati bar 3 slova,a ne vise od 20"; 
				$greske= true;
			}
		}
		
		
		
		if (empty($_POST["username"]))
		{
			$usernameError = "Morate unijeti username.";
			$greske= true;
		}
		else
		{
			$username = test_input($_POST["username"]);
			if (!preg_match("/^[a-zA-Z0-9]{5,20}$/",$username)) 
			{
				$usernameError = "Username smije sadržavali slova i brojeve, minimalna dužina je 5,a ne vise od 20"; 
				$greske= true;
			}
		}
		
		if (empty($_POST["password"]) || empty($_POST["password1"]))
		{
			$passwordError = "Oba polja password-a su obavezna.";
			$greske= true;
		}
		else
		{
			$password = test_input($_POST["password"]);
			$password1 = test_input($_POST["password1"]);
			if($password!=$password)
			{
				$passwordError = "Neispravan unos passworda.";
				$greske= true;
			}
			elseif (!preg_match("/^[a-zA-Z0-9]{5,}$/",$password)) 
			{
				$passwordError = "Password smije sadržavali slova i brojeve, minimalna dužina je 5."; 
				$greske= true;
			}
		}
		
		
	}
 
   if(isset($_POST['signup']))
   {
      $ime = $_POST['ime'];
	  $prezime = $_POST['prezime'];
	  
	  $username = $_POST['username'];
	  if($username == "admin")
              $privilegija = 'admin';
		    else
			  $privilegija ='gost';
	 
	  $lozinka = md5($_POST['password']);
	  $potvrda_lozinka = md5($_POST['password1']);
	  
	  
	 
	  if(file_exists('Baza/korisnici.xml'))
	  {
	           $xml_novi_korisnik = simplexml_load_file('Baza/korisnici.xml');
			   $broj_korisnika=$xml_novi_korisnik->children()->count();
			   $svi_korisnici=$xml_novi_korisnik->children();
			   
			   for($i=0; $i<$broj_korisnika; $i++)
			   {
			      if(intval($username) == intval($svi_korisnici->username))
				  { $usernameError="Username je već zauzet. Izaberite ponovo.";
                    
					break;			  }
				
			   }
              
		   
		  if($imeError=="" && $prezimeError=="" && $usernameError=="" && $passwordError=="")
		  {
			$korisnik = $xml_novi_korisnik ->addChild("korisnik");
			
			$korisnik->addChild('id',$broj_korisnika+1);
			$korisnik->addChild('titula',$privilegija);
			$korisnik->addChild('ime',$ime);
			$korisnik->addChild('prezime',$prezime);
			$korisnik->addChild('username',$username);
			$korisnik->addChild('password', $lozinka);
			$korisnik->addChild('password1',$potvrda_lozinka);
			$xml_novi_korisnik->asXML("Baza/korisnici.xml");
		
			
			header('Refresh: 1; URL = prijava.php');
		  }
		  else
		  {
			  $greska="Pokusajte ponovo, ispod svih polja koja su neispravna stoji pojašnjenje.";
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
				
				<li><a href="Fotogalerija.html">Fotogalerija</a>
				 <ul>
					 <li> </li>
					 <li> </li>
					 
					 </ul>
			    </li>
				<li><a href="Kontakt.html">Kontakt</a></li>
				<li id = "prijava"><a href="prijava.php">Postani dio tima!</a></li>
			</ul>
			<br>
			</div>
			
			</div> 
			
			
<div id="glavni">
<h4>   </h4>
<div class="prijavaDiv">
<form class ="prijavaFormaclass" id = "prijavaFormaid" onsubmit="return " action="registracija.php" method="post">
		<table>
		        <tr>
					<td> <label> Ime: </label></td>
					<td> <input type="text" name="ime" id ="Ime"></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><?php echo $imeError ?></td>
				</tr>
				
				<tr>
					<td> <label> Prezime: </label></td>
					<td> <input type="text" name="prezime" id ="Prezime"></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><?php echo $prezimeError ?></td>
				</tr>
				
				
				
				
				<tr>
					<td> <label> Username: </label></td>
					<td> <input type="text" name="username" id ="Username"></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><?php echo $usernameError ?></td>
				</tr>
				
				<tr>
					<td> <label> Password:  </label></td>
					<td> <input type="password" name="password" id ="Password" ><td>
				</tr>
				
					<td> <label>  Ponovite password:  </label></td>
					<td> <input type="password" name="password1" id ="Password" ><td>
				</tr>
				

				<tr>
				    <td></td>
					<td><?php echo $passwordError ?></td>
				</tr>

				
				<tr>
					<td> <br> <input type="submit" value="Registruj se" class="dugme" id = "registracija" name = "signup"> </td><br>
		
				</tr>
				<tr>
					
					
				</tr>
			</table>
		</form>
















</div>
</div>
</div>



</body>
<head>