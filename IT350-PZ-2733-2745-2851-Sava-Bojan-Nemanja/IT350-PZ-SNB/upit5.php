<?php
require_once('connect.php');
$title = "upit5";
include('header.php');
?>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>datum_proizvodnje</th><th>NAZIV_PROIZVODA</th><th>kolicina_proizvoda</th></tr>";
  
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
	$stmt1 = $conn->prepare("SELECT proizvodnja.datum_proizvodnje, proizvod.NAZIV_PROIZVODA, proizvodnja.kolicina_proizvoda
FROM proizvodnja
INNER JOIN proizvod on proizvodnja.ID_PROIZVODA = proizvod.ID_PROIZVODA
WHERE proizvodnja.kolicina_proizvoda > 100 AND proizvod.jedinica_mere like '%k%g%'
ORDER BY proizvodnja.datum_proizvodnje ASC"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows1(new RecursiveArrayIterator($stmt1->fetchAll())) as $k1=>$v1) { 
        echo $v1;
    }
echo "</table>";
?>
</body>
</html>