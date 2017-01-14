<?php

$veza = new PDO("mysql:dbname=ordinacija;host=localhost;charset=utf8", "root", "");

$veza->exec("set names utf8");

 if(file_exists('Baza/nalazi.xml'))
	 $xml_nalazi = simplexml_load_file('Baza/nalazi.xml');
 
 if(file_exists('Baza/korisnici.xml') )
$xml_korisnici = simplexml_load_file('Baza/korisnici.xml');

 if(file_exists('Baza/novosti.xml'))
$xml_novosti = simplexml_load_file('Baza/novosti.xml');

if(file_exists('Baza/komentari.xml'))
$xml_komentari = simplexml_load_file('Baza/komentari.xml');


$veza->exec("CREATE TABLE IF NOT EXISTS korisnik 
		(
			id int NOT NULL AUTO_INCREMENT,
			uloga varchar(30) NOT NULL,
			ime varchar(40) NOT NULL,
			prezime varchar(50) NOT NULL,
			username varchar(50) NOT NULL,
			sifra varchar(50) NOT NULL,
			PRIMARY KEY (id)
		)
		CHARACTER SET utf8 COLLATE utf8_slovenian_ci ENGINE=InnoDB;");

$veza->exec("CREATE TABLE IF NOT EXISTS nalaz 
		(
			id int NOT NULL AUTO_INCREMENT,
			id_korisnika NOT NULL,
			doktro varchar(50) NOT NULL,
			boljeske text,
			terapija varchar(150) NOT NULL,
			PRIMARY KEY (id)
			FOREIGN KEY (id_korisnika) REFERENCES tabela(korisnik)
		    ON DELETE CASCADE
	       	ON UPDATE CASCADE
		)
		CHARACTER SET utf8 COLLATE utf8_slovenian_ci ENGINE=InnoDB;");

$veza->exec("CREATE TABLE IF NOT EXISTS novost
		(
			id int NOT NULL AUTO_INCREMENT,
			naslov varchar(50) NOT NULL,
			boljeske text NOT NULL,
			PRIMARY KEY (id)
		)
		CHARACTER SET utf8 COLLATE utf8_slovenian_ci ENGINE=InnoDB;");
		
$veza->exec("CREATE TABLE IF NOT EXISTS komentar 
		(
			id int NOT NULL AUTO_INCREMENT,
			id_korisnika NOT NULL,
			komentar text NOT NULL,
			PRIMARY KEY (id)
			FOREIGN KEY (id_korisnika) REFERENCES tabela(korisnik)
		    ON DELETE CASCADE
	       	ON UPDATE CASCADE
		)
		CHARACTER SET utf8 COLLATE utf8_slovenian_ci ENGINE=InnoDB;");


print "Prebacivanje podataka u mysql bazu...<br>";
print "Molimo za strpljenje...<br>";

foreach($xml_korisnici->korisnik as $k)
{
	$id = $k->id;
	$uloga = $k->titula;
	$ime = $k->ime;
	$prezime = $k->prezime;
	$username = $k->username;
	$sifra = $k->password;
	
	
	$upit = $veza->prepare("SELECT COUNT(*) FROM korisnik WHERE id=?;");
	$upit->bindValue(1, $id, PDO::PARAM_INT);

	$postoji = $upit->execute();
	
	if (!$postoji) {
	  $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 	}
 	else
 	{
 		$vec_u_bazi = intval($upit->fetchColumn());

 		if ($vec_u_bazi == 0)
 		{
			$upit = $veza->prepare("INSERT INTO korisnik (id, uloga, ime, prezime, username, sifra) VALUES (?, ?, ?, ?, ?, ?);");
			$upit->bindValue(1, $id, PDO::PARAM_INT);
			$upit->bindValue(2, $uloga, PDO::PARAM_STR);
			$upit->bindValue(3, $ime, PDO::PARAM_INT);
			$upit->bindValue(4, $prezime, PDO::PARAM_INT);
			$upit->bindValue(5, $username, PDO::PARAM_STR);
			$upit->bindValue(6, $sifra, PDO::PARAM_INT);
			$uspjelo = $upit->execute();

			if (!$uspjelo) {
				$greska = $veza->errorInfo();
		        print "SQL greška: " . $greska[2];
		        exit();
		    }
 		}
	}
 		/*else 
 		{   /*mislim da je bespotrebno jer se samo na pocetku upisuje u bazu inace ovaj dio radi update
 			$upit = $veza->prepare("UPDATE tabela SET naziv=?,bodovi=? WHERE id=?;");
 			$upit->bindValue(1, $naziv, PDO::PARAM_STR);
 			$upit->bindValue(2, $bodovi, PDO::PARAM_INT);
 			$upit->bindValue(3, $id, PDO::PARAM_INT);
 			$uspjeh = $upit->execute();
			if (!$uspjeh) {
				$greska = $veza->errorInfo();
		        print "SQL greška: " . $greska[2];
		        exit();
		    }
 		}
		*/
 	}
	
	print "Korisnici upisani...<br>";
	print "Priprema za upis nalaza...<br>";

foreach($xml_nalazi->nalaz as $n)
{
	$id = $n->id;
	$id_korisnika = $n->id_korisnika;
	$doktor = $n->doktor;
	$biljeske = $n->biljeske;
	$terapija = $n->terapija;
	
	
	
	$upit = $veza->prepare("SELECT COUNT(*) FROM nalaz WHERE id=?;");
	$upit->bindValue(1, $id, PDO::PARAM_INT);

	$postoji = $upit->execute();
	
	if (!$postoji) {
	  $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 	}
 	else
 	{
 		$vec_u_bazi = intval($upit->fetchColumn());

 		if ($vec_u_bazi == 0)
 		{
			$upit = $veza->prepare("INSERT INTO nalaz (id, id_korisnika, doktor, biljeske, terapija) VALUES (?, ?, ?, ?, ?);");
			$upit->bindValue(1, $id, PDO::PARAM_INT);
			$upit->bindValue(2, $id_korisnika, PDO::PARAM_STR);
			$upit->bindValue(3, $doktor, PDO::PARAM_INT);
			$upit->bindValue(4, $biljeske, PDO::PARAM_INT);
			$upit->bindValue(5, $terapija, PDO::PARAM_STR);
			$uspjelo = $upit->execute();

			if (!$uspjelo) {
				$greska = $veza->errorInfo();
		        print "SQL greška: " . $greska[2];
		        exit();
		    }
 		}
	}
}

print "Nalazi upisani...<br>";
print "Priprema za upis novosti...<br>";

foreach($xml_novosti->novost as $n)
{
	$id = $n->id;
	$naslov = $n->naslov;
	$tekst = $n->tekst;
	
	
	$upit = $veza->prepare("SELECT COUNT(*) FROM novost WHERE id=?;");
	$upit->bindValue(1, $id, PDO::PARAM_INT);

	$postoji = $upit->execute();
	
	if (!$postoji) {
	  $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 	}
 	else
 	{
 		$vec_u_bazi = intval($upit->fetchColumn());

 		if ($vec_u_bazi == 0)
 		{
			$upit = $veza->prepare("INSERT INTO novost (id, naslov, tekst) VALUES (?, ?, ?);");
			$upit->bindValue(1, $id, PDO::PARAM_INT);
			$upit->bindValue(2, $naslov, PDO::PARAM_STR);
			$upit->bindValue(3, $tekst, PDO::PARAM_INT);
			$uspjelo = $upit->execute();

			if (!$uspjelo) {
				$greska = $veza->errorInfo();
		        print "SQL greška: " . $greska[2];
		        exit();
		    }
 		}
	}
}
	
print "Novosti upisane...<br>";
print "Priprema za upis komentara...<br>";

foreach($xml_komentari->komentar as $k)
{
	$id = $k->id;
	$id_korisnik = $k->id_korisnik;
	$tekst = $k->tekst;
	
	
	$upit = $veza->prepare("SELECT COUNT(*) FROM komentar WHERE id=?;");
	$upit->bindValue(1, $id, PDO::PARAM_INT);

	$postoji = $upit->execute();
	
	if (!$postoji) {
	  $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 	}
 	else
 	{
 		$vec_u_bazi = intval($upit->fetchColumn());

 		if ($vec_u_bazi == 0)
 		{
			$upit = $veza->prepare("INSERT INTO komentar (id, id_korisnik, tekst) VALUES (?, ?, ?);");
			$upit->bindValue(1, $id, PDO::PARAM_INT);
			$upit->bindValue(2, $id_korisnik, PDO::PARAM_STR);
			$upit->bindValue(3, $tekst, PDO::PARAM_INT);
			$uspjelo = $upit->execute();

			if (!$uspjelo) {
				$greska = $veza->errorInfo();
		        print "SQL greška: " . $greska[2];
		        exit();
		    }
 		}
	}
}
print "Upis završen...<br>";
	
	

	













?>