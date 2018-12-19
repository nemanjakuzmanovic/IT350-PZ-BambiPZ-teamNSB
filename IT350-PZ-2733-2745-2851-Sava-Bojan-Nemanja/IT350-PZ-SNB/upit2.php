<?php
require_once('connect.php');
$title = "upit2";
include('header.php');
?>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>NAZIV_SKLADISTA</th><th>MESTO_SKLADISTA</th><th>ID_SKLADISTA</th><th>ukupno_proizvoda</th></tr>";
  
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
	$stmt1 = $conn->prepare("select skladiste.NAZIV_SKLADISTA, skladiste.MESTO_SKLADISTA, stanje_skladista.ID_SKLADISTA, COUNT(stanje_skladista.ID_PROIZVODA)
from stanje_skladista
left JOIN proizvod on stanje_skladista.ID_PROIZVODA = proizvod.ID_PROIZVODA
left join skladiste on stanje_skladista.ID_SKLADISTA = skladiste.ID_SKLADISTA
GROUP BY stanje_skladista.ID_SKLADISTA
HAVING COUNT(stanje_skladista.ID_PROIZVODA) > 1"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows1(new RecursiveArrayIterator($stmt1->fetchAll())) as $k1=>$v1) { 
        echo $v1;
    }
echo "</table>";
?>
</body>
</html>