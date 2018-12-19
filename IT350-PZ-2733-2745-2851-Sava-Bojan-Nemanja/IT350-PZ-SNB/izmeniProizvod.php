<?php
require_once('connect.php');
$title = "Izmeni Proizvod";
include('header.php');
?>
<?php
$result = $conn->prepare("SELECT id_proizvoda, id_tipa_proizvoda, naziv_proizvoda, jedinica_mere, cena FROM proizvod");
$result->execute();

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>id proizvoda</th> <th>id tipa proizvoda</th> <th>naziv proizvoda</th> <th>jedinica mere</th> <th>cena</th> <th>Edit</th> <th>Delete</th></tr>";
while($row = $result -> fetch()) {
	echo "<tr>";
	echo '<td>' . $row['id_proizvoda'] . '</td>';
	echo '<td>' . $row['id_tipa_proizvoda'] . '</td>';
	echo '<td>' . $row['naziv_proizvoda'] . '</td>';
	echo '<td>' . $row['jedinica_mere'] . '</td>';
	echo '<td>' . $row['cena'] . '</td>';
	echo '<td><a href="editProizvod.php?id_proizvoda=' . $row['id_proizvoda'] . '">Edit</a></td>';
	echo '<td><a href="deleteProizvod.php?id_proizvoda=' . $row['id_proizvoda'] . '">Delete</a></td>';
	echo "</tr>";
}
echo "</table>";
?>