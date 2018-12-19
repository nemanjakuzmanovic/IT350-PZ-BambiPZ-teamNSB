<?php
require_once('connect.php');
$title = "upit1";
include('header.php');
?>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>id_proizvodne_jedinice</th><th>ime_pj</th><th>mesto_pj</th><th>ukupno</th></tr>";
  
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
	$stmt1 = $conn->prepare("SELECT proizvodna_jedinica.id_proizvodne_jedinice, proizvodna_jedinica.ime_pj, proizvodna_jedinica.mesto_pj, SUM(proizvodnja.kolicina_proizvoda * proizvod.cena) as ukupno
FROM proizvodna_jedinica
INNER JOIN proizvodnja on proizvodna_jedinica.id_proizvodne_jedinice = proizvodnja.id_proizvodne_jedinice
INNER JOIN proizvod on proizvodnja.id_proizvoda = proizvod.id_proizvoda
WHERE proizvodnja.id_proizvodne_jedinice = 1
HAVING ukupno > 0"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows1(new RecursiveArrayIterator($stmt1->fetchAll())) as $k1=>$v1) { 
        echo $v1;
    }
echo "</table>";
?>
</body>
</html>