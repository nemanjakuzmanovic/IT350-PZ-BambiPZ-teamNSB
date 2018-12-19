<?php
$title = "upiti";
include('header.php');
?>
<form class="formStyle">
	<p>Napisati SQL upite za sledeće probleme i omogućiti njihovo izvršavanje i prikaz rezultata kroz aplikaciju: </p>
</form>	
<form action="upit1.php" method="POST" class="formStyle">	
	<p>1. Prikazati naziv i mesto proizvodne jedinice, kao i ukupnu cenu svih proizvoda koje je ona napravila. </p>
	<textarea name="prvi" form="usrform" rows="10" cols="70">SELECT proizvodna_jedinica.id_proizvodne_jedinice, proizvodna_jedinica.ime_pj, proizvodna_jedinica.mesto_pj, SUM(proizvodnja.kolicina_proizvoda * proizvod.cena) as ukupno
FROM proizvodna_jedinica
INNER JOIN proizvodnja on proizvodna_jedinica.id_proizvodne_jedinice = proizvodnja.id_proizvodne_jedinice
INNER JOIN proizvod on proizvodnja.id_proizvoda = proizvod.id_proizvoda
WHERE proizvodnja.id_proizvodne_jedinice = 1
HAVING ukupno > 0</textarea>
	<input type="submit" value="Send" style="height:50px;width:100px"/>
</form>
<form action="upit2.php" method="POST" class="formStyle">
	<p>2. Prikazati podatke o skladištima koji su čuvaju najviše različitih proizvoda. Voditi računa ako postoji dva ili više takva skladišta, prikazati podatke o svakom od njih. </p>
	<textarea name="drugi" form="usrform" rows="10" cols="70">
select skladiste.NAZIV_SKLADISTA, skladiste.MESTO_SKLADISTA, stanje_skladista.ID_SKLADISTA, COUNT(stanje_skladista.ID_PROIZVODA)
from stanje_skladista
left JOIN proizvod on stanje_skladista.ID_PROIZVODA = proizvod.ID_PROIZVODA
left join skladiste on stanje_skladista.ID_SKLADISTA = skladiste.ID_SKLADISTA
GROUP BY stanje_skladista.ID_SKLADISTA
HAVING COUNT(stanje_skladista.ID_PROIZVODA) > 1</textarea>
	<input type="submit" value="Send" style="height:50px;width:100px"/>
</form>
<form action="upit3.php" method="POST" class="formStyle">	
	<p>3. Naći podatke o poslednjoj narudžbenici koju je bilo koja proizvodna jedinica uputila nekom skladištu, naziv te proizvodne jedinice, datum narudžbenice, naziv skladišta. </p>
	<textarea name="treci" form="usrform" rows="10" cols="70">SELECT narudzbenica.ID_NARUDZBENICE, narudzbenica.id_proizvodne_jedinice, narudzbenica.ID_SKLADISTA, proizvodna_jedinica.ime_pj, skladiste.naziv_skladista,  narudzbenica.DATUM_SLANJA
from narudzbenica 
inner join proizvodna_jedinica on narudzbenica.id_proizvodne_jedinice = proizvodna_jedinica.id_proizvodne_jedinice
inner join skladiste on narudzbenica.ID_SKLADISTA = skladiste.ID_SKLADISTA
ORDER BY narudzbenica.datum_slanja DESC LIMIT 1</textarea>
	<input type="submit" value="Send" style="height:50px;width:100px"/>
</form>
<form action="upit4.php" method="POST" class="formStyle">	 
	<p>4. Sortirati u opadajućem redosledu prema ceni, sve proizvode koje Fabrika Bambi proizvodi.  </p>
	<textarea name="cetvrti" form="usrform" rows="10" cols="70">SELECT * 
FROM proizvod
ORDER BY proizvod.CENA DESC</textarea>
	<input type="submit" value="Send" style="height:50px;width:100px"/>
</form>
<form action="upit5.php" method="POST" class="formStyle">	
	<p>5. Napraviti statistiku, na dnevnom nivou, za svaki od proizvoda koji je tog dana proizveden u količini od preko 100 kg. Prikazati datum, naziv proizvoda, količinu koja je tog dana proizvedena.  </p>
	<textarea name="cetvrti" form="usrform" rows="10" cols="70">SELECT proizvodnja.datum_proizvodnje, proizvod.NAZIV_PROIZVODA, proizvodnja.kolicina_proizvoda
FROM proizvodnja
INNER JOIN proizvod on proizvodnja.ID_PROIZVODA = proizvod.ID_PROIZVODA
WHERE proizvodnja.kolicina_proizvoda > 100 AND proizvod.jedinica_mere like '%k%g%'
ORDER BY proizvodnja.datum_proizvodnje ASC</textarea>
	<input type="submit" value="Send" style="height:50px;width:100px"/>
</form>
<form action="upit6.php" method="POST" class="formStyle">	
	<p>6. Za skladište u kome ima najviše robe, prikazati podatke o narudzbenicama iz tog skladišta za poslednjih mesec dana. </p>
	<textarea name="peti" form="usrform" rows="14" cols="70">select stanje_skladista.ID_SKLADISTA, COUNT(stanje_skladista.ID_PROIZVODA) as broji, narudzbenica.*
from stanje_skladista
left JOIN proizvod on stanje_skladista.ID_PROIZVODA = proizvod.ID_PROIZVODA
left join skladiste on stanje_skladista.ID_SKLADISTA = skladiste.ID_SKLADISTA
left JOIN narudzbenica on skladiste.id_skladista = narudzbenica.id_skladista
WHERE narudzbenica.datum_slanja BETWEEN (NOW() - INTERVAL 1 MONTH) AND NOW()
GROUP BY stanje_skladista.ID_SKLADISTA
ORDER BY broji DESC LIMIT 1</textarea>
	<input type="submit" value="Send" style="height:50px;width:100px"/>
</form>