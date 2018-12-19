<?php
require_once('connect.php');
$title = "Narudzbenica";
include('header.php');
?>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>id_skladista</th><th>naziv_skladista</th><th>mesto_skladista</th><th>ukupan_kapacitet_zaliha_skladista</th></tr>";

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
	$stmt = $conn->prepare("SELECT id_skladista, naziv_skladista, mesto_skladista, ukupan_kapacitet_zaliha_skladista FROM skladiste"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
echo "</table>";


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
	$stmt1 = $conn->prepare("SELECT id_proizvoda, id_tipa_proizvoda, naziv_proizvoda, jedinica_mere, cena FROM proizvod"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows1(new RecursiveArrayIterator($stmt1->fetchAll())) as $k1=>$v1) { 
        echo $v1;
    }
echo "</table>";

echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>id_proizvodne_jedinice</th><th>ime_pj</th><th>mesto_pj</th><th>ukupan_kapacitet_proizvodnje</th></tr>";

class TableRows2 extends RecursiveIteratorIterator { 
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
	$stmt2 = $conn->prepare("SELECT id_proizvodne_jedinice, ime_pj, mesto_pj, ukupan_kapacitet_proizvodnje FROM proizvodna_jedinica"); 
    $stmt2->execute();

    $result1 = $stmt2->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows2(new RecursiveArrayIterator($stmt2->fetchAll())) as $k2=>$v2) { 
        echo $v2;
    }
echo "</table>";

?>
<form action="sacuvajNarudzbenicu.php" method="POST" class="formStyle">
 <input type="text" name="id_proizvoda" placeholder="id proizvoda"/> <br><br>
 <input type="text" name="id_skladista" placeholder="id skladista"/> <br><br>
 <input type="text" name="id_proizvodne_jedinice" placeholder="id proizvodne jedinice"/> <br><br>
 <input type="date" name="datum_slanja" placeholder="datum"/> <br><br>
 <input type="text" name="kolicina_porucenog_proizvoda" placeholder="kolicina porucenog proizvoda"/> <br><br>
 <input type="submit" value="Send"/>
</form>

</body>
</html>