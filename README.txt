Stomatolo�ka ordinacija

Amra Mujcinovic - 16947

Opis teme: 
Stranica sluzi za informisanje vezano za usluge koje pruza 
ordinacija.

CETVRTA SPIRALA:


I  - Sta je uradeno?


-napravljena baza
-napravljeno dugme xml_u_bazu koje se nalazi na prijava.php i prebacila sam sve podatke iz xml-a u bazu uz pomoc tog dugmeta
-sve forme, unosi, izmjene se sada snimaju i brisu iz baze
-web servisi uradjeni na primjeru nalaza, moguca pretraga po id-u korisnika ili po doktoru koji je lijecio pacijenta, 
ili da se prikazu svi nalazi

http://spirala-spirala4.44fs.preview.openshiftapps.com/spirala_4/Usluge.php
-nisam dobro povezala sa bazon


II  - �ta nije uradeno?
III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rje�enje (opis rje�enja)
Nisam stigla pdf prebacit da je povezan sa bazom, i nisam stigla prebacit Search da je povezan sa bazom, 
radi se na isti nacin kao i ostale php kao sto su uradjene.
IV  - Bug-ovi koje ste primijetili ali ne znate rje�enje




TRECA SPIRALA:

I  - Sta je uradeno?

a)Uradena serijalizacija podataka u XML, i to serijalizirani korisnici, zatim novosti te nalazi. Sve je izvalidirano u phpu i
stranica je za�ticena od XSS-a, koriten je html special chars.
Korisnik mo�e pregledat svoje nalaze, dok admin dodaje, ureduje i brise novosti, admin moze brisati korisnike, i moze dodavati nalaze(ne 
moze ih brisati i uredivati-iz razloga jer i mi kad odemo doktoru jedno sto se napise ne mjenja se).
Adminov username je admin, a password je admin123

b) Adminu je omogucen download podataka o korisnicima/pacijentima. U csv fajl su ubaceni podaci o korisniku: ime, prezime, username

c)Moguce je preuzeti pdf file sa podacima o korisniku.

d)Uradena pretraga koja  se vr�i po poljima ime i username.

II  - �ta nije uradeno?
III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rje�enje (opis rje�enja)
Indekse korisnicima u xml-u nisam dodavala na najbolji nacin, a rje�enje je kada se budu koristile baze da se koriste sekvence.
IV  - Bug-ovi koje ste primijetili ali ne znate rje�enje


PRVA SPIRALA:


--Sta je uradeno?
- mockup-ovi
- 5 stranica koje su responzivne i imaju grid-view
- izgled za mobilne uredaje koristeci media query-e
- implementirane 3 html forme
- meni koji je vidljiv na svim podstranicama
- izgled stranice je konzistentan, elementi na stranici su poravnati


-- Sta nije uradeno i Bug-ovi

Nisam primjetila bug-ove.


--Lista fajlova

Folder mockup - sadrzi skice svih stranica: 
Fotogalerija 
FotogalerijaMob
Kontakt
KontaktMob
Korisni_savjeti 
Korisni_savjetiMob 
Pocetna 
PocetnaMob
Usluge
UslugeMob


Folder spirala_1 - u folderu se nalaze html stranice, css kao i slike koje su koristene:

Pocetna.html
Usluge.html
KorisniSavjeti.html
Fotogalerija.html
Kontakt.html

so.css
pocetna.css
usluge.css
korisnisavjeti.css
fotogalerija.css
kontakt.css

_________________________________________________________________________________________

DRUGA SPIRALA:

I  - Sta je uradeno?
-sva polja formi imaju JavaScript validaciju, nevalidan unos onemogucava submit i ispisuje
se poruka
-Dropdown meni
-Galerija slika uradena na stranici Fotogalerija sa opcijom ra�iri sliku preko cijelog ekrana
-Ajax uraden -pocetna stranica je Naslovna.html ostale su podstranice
-JavaScript je odvojen u posebne fajlove
-

II  - �ta nije uradeno?
III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rje�enje (opis rje�enja)
IV  - Bug-ovi koje ste primijetili ali ne znate rje�enje

V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne recenice �ta se u fajlu nalazi

sprala_2 - sadrzi JavaScript fajlove, html, css i sve pratece slike
validacija.js - funkcije vezane za validaciju
funkcije.js - nalaze se funkcije za ajax i galeriju
Novosti.html - glavna stranica, ostalo su podstranice 
___________________________________________________