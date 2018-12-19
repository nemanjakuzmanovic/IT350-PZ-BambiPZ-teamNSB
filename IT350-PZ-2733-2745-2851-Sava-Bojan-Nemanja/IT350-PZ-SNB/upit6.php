<?php
require_once('connect.php');
$title = "upit6";
include('header.php');
?>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>ID_SKLADISTA</th><th>broji</th><th>id_narudzbenice</th><th>id_proizvoda</th><th>id_skladista</th><th>id_proizvodne_jedinice</th><th>datum_slanja</th><th>kolicina_porucenog_proizvoda</th></tr>";
  
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
	$stmt1 = $conn->prepare("select stanje_skladista.ID_SKLADISTA, COUNT(stanje_skladista.ID_PROIZVODA) as broji, narudzbenica.*
from stanje_skladista
left JOIN proizvod on stanje_skladista.ID_PROIZVODA = proizvod.ID_PROIZVODA
left join skladiste on stanje_skladista.ID_SKLADISTA = skladiste.ID_SKLADISTA
left JOIN narudzbenica on skladiste.id_skladista = narudzbenica.id_skladista
WHERE narudzbenica.datum_slanja BETWEEN (NOW() - INTERVAL 1 MONTH) AND NOW()
GROUP BY stanje_skladista.ID_SKLADISTA
ORDER BY broji DESC LIMIT 1"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows1(new RecursiveArrayIterator($stmt1->fetchAll())) as $k1=>$v1) { 
        echo $v1;
    }
echo "</table>";
?>
</body>
</html>