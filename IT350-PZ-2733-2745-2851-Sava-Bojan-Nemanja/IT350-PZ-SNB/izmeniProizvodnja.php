<?php
require_once('connect.php');
$title = "Izmeni Proizvodnju";
include('header.php');
?>
<?php
$result = $conn->prepare("SELECT id_proizvodnje, id_proizvodne_jedinice, id_proizvoda, kolicina_proizvoda, min_kapacitet_proizvodnje, max_kapacitet_proizvodnje, datum_proizvodnje FROM proizvodnja");
$result->execute();

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>id_proizvodnje</th> <th>id_proizvodne_jedinice</th> <th>id_proizvoda</th> <th>kolicina_proizvoda</th> <th>min_kapacitet_proizvodnje</th> <th>max_kapacitet_proizvodnje</th> <th>datum_proizvodnje</th> <th>Edit</th> <th>Delete</th></tr>";
while($row = $result -> fetch()) {
	echo "<tr>";
	echo '<td>' . $row['id_proizvodnje'] . '</td>';
	echo '<td>' . $row['id_proizvodne_jedinice'] . '</td>';
	echo '<td>' . $row['id_proizvoda'] . '</td>';
	echo '<td>' . $row['kolicina_proizvoda'] . '</td>';
	echo '<td>' . $row['min_kapacitet_proizvodnje'] . '</td>';
	echo '<td>' . $row['max_kapacitet_proizvodnje'] . '</td>';
	echo '<td>' . $row['datum_proizvodnje'] . '</td>';
	echo '<td><a href="editProizvodnju.php?id_proizvodnje=' . $row['id_proizvodnje'] . '">Edit</a></td>';
	echo '<td><a href="deleteProizvodnju.php?id_proizvodnje=' . $row['id_proizvodnje'] . '">Delete</a></td>';
	echo "</tr>";
}
echo "</table>";
?>