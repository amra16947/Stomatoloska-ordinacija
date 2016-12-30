function trazi_jedan() {
	
	
    var req = new XMLHttpRequest();
	req.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200) 
		{
			document.getElementById('rezultati').innerHTML = this.responseText;
		}
	}
  	var ime = document.getElementById('trazi_ime1').value;
  	var username = document.getElementById('trazi_username1').value;
	
	
    req.open("GET","trazi_ime_i_username.php?ime_p=" + ime + "&username_p=" + username, true);
	req.send();
}

function trazi_sve()
{
	var req = new XMLHttpRequest();

	req.onreadystatechange = function() 
	{
	    if (this.readyState == 4 && this.status == 200) 
		{
			document.getElementById('rezultati').innerHTML = this.responseText;	      
    	}
  	}
	var ime = document.getElementById('trazi_ime1').value;
  	var username = document.getElementById('trazi_username1').value;
	
    req.open("GET","trazi_ime_i_username.php?trazi=1&ime_p=" + ime + "&username_p=" + username, true);
	req.send();	
}