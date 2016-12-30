function ucitaj(naziv)
{
	var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
	if (ajax.readyState == 4 && ajax.status == 200)
		if(naziv == "Naslovna.html")
		document.getElementById("okvir").innerHTML = ajax.responseText;
		else
		document.getElementById("glavni").innerHTML = ajax.responseText;
	if (ajax.readyState == 4 && ajax.status == 404)
		document.getElementById("glavni").innerHTML = "Greska: nepoznat URL";
}
ajax.open("GET", naziv, true);
ajax.send();
	
}


function prikaziSliku(naziv)
{

    document.getElementById('VelikaSlika').style.display = 'block'; 
    setTimeout(function () {
        document.getElementById('slikaV').src = naziv;
       }, 1)
}

window.onkeyup = function (event) {
    if (event.keyCode == 27) {
        document.getElementById('VelikaSlika').style.display = 'none';
		document.getElementById('slikaV').src = "";
    }
}