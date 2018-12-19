<?php
require_once('connect.php');
$title = "Izmeni Stanje Skladista";
include('header.php');
?>
<?php
$result = $conn->prepare("SELECT id_stanja_skladista, id_skladista, id_proizvoda, trenutna_kolicina FROM stanje_skladista");
$result->execute();

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>id_stanja_skladista</th> <th>id_skladista</th> <th>id_proizvoda</th> <th>trenutna_kolicina</th> <th>Edit</th> <th>Delete</th></tr>";
while($row = $result -> fetch()) {
	echo "<tr>";
	echo '<td>' . $row['id_stanja_skladista'] . '</td>';
	echo '<td>' . $row['id_skladista'] . '</td>';
	echo '<td>' . $row['id_proizvoda'] . '</td>';
	echo '<td>' . $row['trenutna_kolicina'] . '</td>';
	echo '<td><a href="editStanje.php?id_stanja_skladista=' . $row['id_stanja_skladista'] . '">Edit</a></td>';
	echo '<td><a href="deleteStanje.php?id_stanja_skladista=' . $row['id_stanja_skladista'] . '">Delete</a></td>';
	echo "</tr>";
}
echo "</table>";
?>