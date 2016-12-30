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
	
  
	   session_unset();
	   
	   if(isset($_POST['login']))
	   {
		   header('Refresh: 1; URL = prijava.php');
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
			</table>
		</form>
















</div>
</div>
</div>



</body>
</html>