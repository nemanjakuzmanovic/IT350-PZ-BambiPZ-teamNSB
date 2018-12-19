<?php
require_once('connect.php');
$title = "Proizvodnja";
include('header.php');
?>

<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>id proizvodnje</th><th>proizvodna jedinica</th><th>proizvod</th><th>kolicina proizvoda</th><th>min kapacitet proizvodnje</th><th>max kapacitet proizvodnje</th><th>datum proizvodnje</th></tr>";

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
	$stmt = $conn->prepare("SELECT p.id_proizvodnje, pj.ime_pj, pr.naziv_proizvoda, p.kolicina_proizvoda, p.min_kapacitet_proizvodnje, p.max_kapacitet_proizvodnje, p.datum_proizvodnje 
	FROM proizvodnja p, proizvod pr, proizvodna_jedinica pj WHERE p.id_proizvodne_jedinice = pj.id_proizvodne_jedinice AND p.id_proizvoda = pr.id_proizvoda"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
echo "</table>";
?>
</body>
</html>