function validacijaRegistracije()
{
	document.getElementById("prezimeError").innerHTML = "Polje prezime mora da sadrzi min 3 slova";
	var ime = document.getElementById("ime");
	var prezime = document.getElementById("prezime");
	var mail = document.getElementById("mail");
	var username= document.getElementById("username");
	var sifra= document.getElementById("password");
	var sifra1= document.getElementById("password1");
	var ne_postoji_greska=true;
	
	if(ime.value == "")
	{
	document.getElementById("imeError").innerHTML = "Ime je obavezno polje!";
	ne_postoji_greska=false;
	}
	if(!provjeriPrezime(prezime.value))
	{
	document.getElementById("prezimeError").innerHTML = "Polje prezime mora da sadrzi min 3 slova";
	ne_postoji_greska=false;
	}
	if(!provjeriMail(mail.value))
	{
	document.getElementById("mailError").innerHTML = "Polje prezime mora da sadrzi min 3 slova";
	ne_postoji_greska=false;
	}
	if(!provjeriUsername(username.value))
	{
	document.getElementById("usernameError").innerHTML = "Polje username mora da sadrzi min 5 slova";
	%provjeri da li je zauzet username vec
	ne_postoji_greska=false;
	}
	if(sifra.value!=sifra1.value)
	{
	   document.getElementById("passwordError").innerHTML = "Unesite ispravne sifre";
	   document.getElementById("password").innerHTML = "";
	   document.getElementById("password1").innerHTML = "";
	   ne_postoji_greska=false;
	}
	
	return 	ne_postoji_greska;
}


function provjeriPrezime(p)
{
	
	var regex = /^[a-zA-Z ]{3,30}$/;
	
	return regex.test(p);
}


function provjeriUsername(u) 
{
	
	var regex = /^[a-zA-Z ]{5,30}$/;
	
	return regex.test(u);
}

function provjeriPass(p) 
{
	
	var regex = /^[a-zA-Z ]{5,30}$/;
	
	return regex.test(p);
}


function provjeriMail(m)
{
	var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	return regex.test(m);
}