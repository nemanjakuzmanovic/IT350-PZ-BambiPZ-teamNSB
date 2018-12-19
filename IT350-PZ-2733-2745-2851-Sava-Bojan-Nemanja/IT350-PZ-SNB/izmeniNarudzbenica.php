<?php
require_once('connect.php');
$title = "Izmeni Narudzbenicu";
include('header.php');
?>
<?php
$result = $conn->prepare("SELECT id_narudzbenice, id_proizvoda, id_skladista, id_proizvodne_jedinice, datum_slanja, kolicina_porucenog_proizvoda FROM narudzbenica");
$result->execute();

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>id_narudzbenice</th> <th>id_proizvoda</th> <th>id_skladista</th> <th>id_proizvodne_jedinice</th> <th>datum_slanja</th> <th>kolicina_porucenog_proizvoda</th> <th>Edit</th> <th>Delete</th></tr>";
while($row = $result -> fetch()) {
	echo "<tr>";
	echo '<td>' . $row['id_narudzbenice'] . '</td>';
	echo '<td>' . $row['id_proizvoda'] . '</td>';
	echo '<td>' . $row['id_skladista'] . '</td>';
	echo '<td>' . $row['id_proizvodne_jedinice'] . '</td>';
	echo '<td>' . $row['datum_slanja'] . '</td>';
	echo '<td>' . $row['kolicina_porucenog_proizvoda'] . '</td>';
	echo '<td><a href="editNarudzbenicu.php?id_narudzbenice=' . $row['id_narudzbenice'] . '">Edit</a></td>';
	echo '<td><a href="deleteNarudzbenicu.php?id_narudzbenice=' . $row['id_narudzbenice'] . '">Delete</a></td>';
	echo "</tr>";
}
echo "</table>";
?>