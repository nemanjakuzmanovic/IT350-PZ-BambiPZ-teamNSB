<?php
require_once('connect.php');
$title = "upit4";
include('header.php');
?>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>id_proizvoda</th><th>id_tipa_proizvoda</th><th>naziv_proizvoda</th><th>jedinica_mere</th><th>cena</th></tr>";
  
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
	$stmt1 = $conn->prepare("SELECT * 
FROM proizvod
ORDER BY proizvod.CENA DESC"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows1(new RecursiveArrayIterator($stmt1->fetchAll())) as $k1=>$v1) { 
        echo $v1;
    }
echo "</table>";
?>
</body>
</html>