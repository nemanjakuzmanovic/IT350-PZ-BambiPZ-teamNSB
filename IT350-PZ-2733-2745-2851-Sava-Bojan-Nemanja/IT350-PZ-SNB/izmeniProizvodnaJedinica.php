<?php
require_once('connect.php');
$title = "Izmeni Proizvodnu jedinicu";
include('header.php');
?>
<?php
$result = $conn->prepare("SELECT id_proizvodne_jedinice, ime_pj, mesto_pj, ukupan_kapacitet_proizvodnje FROM proizvodna_jedinica");
$result->execute();

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>id_proizvodne_jedinice</th> <th>ime_pj</th> <th>mesto_pj</th> <th>ukupan_kapacitet_proizvodnje</th> <th>Edit</th> <th>Delete</th></tr>";
while($row = $result -> fetch()) {
	echo "<tr>";
	echo '<td>' . $row['id_proizvodne_jedinice'] . '</td>';
	echo '<td>' . $row['ime_pj'] . '</td>';
	echo '<td>' . $row['mesto_pj'] . '</td>';
	echo '<td>' . $row['ukupan_kapacitet_proizvodnje'] . '</td>';
	echo '<td><a href="editPJ.php?id_proizvodne_jedinice=' . $row['id_proizvodne_jedinice'] . '">Edit</a></td>';
	echo '<td><a href="deletePJ.php?id_proizvodne_jedinice=' . $row['id_proizvodne_jedinice'] . '">Delete</a></td>';
	echo "</tr>";
}
echo "</table>";
?>