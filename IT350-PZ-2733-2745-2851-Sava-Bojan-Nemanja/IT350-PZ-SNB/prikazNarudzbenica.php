<?php
require_once('connect.php');
$title = "Prikaz Narudzbenica";
include('header.php');
?>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>id narudzbenice</th><th>proizvod</th><th>skladiste</th><th>proizvodna jedinica</th><th>datum slanja</th><th>kolicina porucenog proizvoda</th></tr>";

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
	$stmt = $conn->prepare("SELECT n.id_narudzbenice, p.naziv_proizvoda, s.naziv_skladista, pj.ime_pj, n.datum_slanja, n.kolicina_porucenog_proizvoda 
	FROM narudzbenica n, proizvod p, skladiste s, proizvodna_jedinica pj
	WHERE n.id_proizvoda = p.id_proizvoda AND n.id_skladista = s.id_skladista AND n.id_proizvodne_jedinice = pj.id_proizvodne_jedinice"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
echo "</table>";
?>
</body>
</html>