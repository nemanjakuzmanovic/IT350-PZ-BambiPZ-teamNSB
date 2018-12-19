<?php
require_once('connect.php');
$title = "upit3";
include('header.php');
?>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>ID_NARUDZBENICE</th><th>id_proizvodne_jedinice</th><th>ID_SKLADISTA</th><th>ime_pj</th><th>naziv_skladista</th><th>DATUM_SLANJA</th></tr>";
  
class TableRows1 extends RecursiveIteratorIterator { 
     function __construct($it1) { 
         parent::__construct($it1, self::LEAVES_ONLY); 
     }

     function current() {
         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
     }

     function beginChildren() { 
         echo "<tr>"; 
     } 

     function endChildren() { 
         echo "</tr>" . "\n";
     } 
} 
	$stmt1 = $conn->prepare("SELECT narudzbenica.ID_NARUDZBENICE, narudzbenica.id_proizvodne_jedinice, narudzbenica.ID_SKLADISTA, proizvodna_jedinica.ime_pj, skladiste.naziv_skladista,  narudzbenica.DATUM_SLANJA
from narudzbenica 
inner join proizvodna_jedinica on narudzbenica.id_proizvodne_jedinice = proizvodna_jedinica.id_proizvodne_jedinice
inner join skladiste on narudzbenica.ID_SKLADISTA = skladiste.ID_SKLADISTA
ORDER BY narudzbenica.datum_slanja DESC LIMIT 1"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows1(new RecursiveArrayIterator($stmt1->fetchAll())) as $k1=>$v1) { 
        echo $v1;
    }
echo "</table>";
?>
</body>
</html>