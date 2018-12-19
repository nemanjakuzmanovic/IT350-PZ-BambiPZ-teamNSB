<?php
require_once('connect.php');
$title = "Prikaz Proizvodnih Jedinica";
include('header.php');
?>
<html>
<body>
<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>id_proizvodne_jedinice</th><th>ime_pj</th><th>mesto_pj</th><th>ukupan_kapacitet_proizvodnje</th></tr>";

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
	$stmt = $conn->prepare("SELECT id_proizvodne_jedinice, ime_pj, mesto_pj, ukupan_kapacitet_proizvodnje FROM proizvodna_jedinica");
    $stmt->execute();
	
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
echo "</table>";
?>

</body>
</html>