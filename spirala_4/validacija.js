function provjera(string)
{
	if(string.name == "name")
	{
		if(string.value =="" || !provjeriIme(string.value))
		{
			string.style.backgroundColor = "red";
			document.getElementById("imeError").innerHTML = "Ime je obavezno polje - 3 ili vise slova";
			return false;
		}
		else
			{
			string.style.backgroundColor = "white";
			document.getElementById("imeError").innerHTML = "";
			document.getElementById("dugmeError").innerHTML = "";
			return true;
			
		    }
	}
	else if(string.name == "email")
	{
		if(!provjeriEmail(string.value))
		{
			string.style.backgroundColor = "red";
			document.getElementById("mailError").innerHTML = "Unesite ispravan email: primjer@primjer.com";
			return false;
		}
		else
		{
			string.style.backgroundColor = "white";
			document.getElementById("mailError").innerHTML = "";
			document.getElementById("dugmeError").innerHTML = "";
			return true;
		
		}
	}
	else if(string.name == "poruka")
	{
	
		if(string.value =="")
		{
			string.style.backgroundColor = "red";
			document.getElementById("porukaError").innerHTML = "Molimo Vas unesite poruku";
			return false;
		}
		else 
		{
			string.style.backgroundColor = "white";
			document.getElementById("porukaError").innerHTML = "";
			document.getElementById("dugmeError").innerHTML = "";
			return true;
	
		}
	}
}

function provjeriEmail(mail)
{
	
	var regex = /^[^\s@]+\@[^\s@]+\.[^\s@]+$/g;
	
	return regex.test(mail);
}

function provjeriIme(ime)
{
	
	var regex = /^[a-zA-Z ]{3,30}$/;
	
	return regex.test(ime);
}

function provjeriPoruku(poruka)
{
	if(poruka =="")
		{
			document.getElementById("porukaError").innerHTML = "Molimo Vas unesite poruku";
			return false;
		}
		
		return true;
}

function provjeriFormu() //posalji
{
	var ime = document.getElementById("name");
	var mail = document.getElementById("email");
	var poruka= document.getElementById("poruka");


	if(!provjeriIme(ime.value))
	{
	document.getElementById("dugmeError").innerHTML = "Molimo Vas unesite sva polja ispravno!";
	return false;
	}
	else if(!provjeriEmail(mail.value))
	{
	document.getElementById("dugmeError").innerHTML = "Molimo Vas unesite sva polja ispravno!";
		return false;
	}
	else if(!provjeriPoruku(poruka.value))
	{
	document.getElementById("dugmeError").innerHTML = "Molimo Vas unesite sva polja ispravno!";
		return false;
	}
	else
	{
	document.getElementById("dugmeError").innerHTML = "";
	return true;
	}
	
	
	
}



function provjeriNovosti()
{
	var naziv = document.getElementById("naslov_novost");
	var tekst = document.getElementById("tekst_novost");
	
	if(naziv=="")
		document.getElementById("naslovError").innerHTML = "Unesite naslov.";
	else if (naziv.length<4)
		document.getElementById("naslovError").innerHTML = "Naslov prekratak.";
	else
		document.getElementById("naslovError").innerHTML = "";
	if(tekst=="")
	document.getElementById("textError").innerHTML = "Unesite tekst";
    else if(tekst.length<10)
	document.getElementById("textError").innerHTML = "Minimalna dužina teksta je 10.";
    else
		document.getElementById("naslovError").innerHTML = "";
	
	
	
}

