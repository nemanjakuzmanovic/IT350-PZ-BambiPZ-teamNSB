<?php
require_once('connect.php');
$title = "stanje";
include('header.php');
?>

<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>id stanja skladista</th><th>skladiste</th><th>proizvod</th><th>trenutna kolicina</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
         parent::__construct($it, self::LEAVES_ONLY); 
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
	$stmt = $conn->prepare("SELECT s.id_stanja_skladista, sk.naziv_skladista, p.naziv_proizvoda, s.trenutna_kolicina
	FROM stanje_skladista s, skladiste sk, proizvod p WHERE s.id_skladista = sk.id_skladista AND s.id_proizvoda = p.id_proizvoda"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
echo "</table>";
?>
</body>
</html>