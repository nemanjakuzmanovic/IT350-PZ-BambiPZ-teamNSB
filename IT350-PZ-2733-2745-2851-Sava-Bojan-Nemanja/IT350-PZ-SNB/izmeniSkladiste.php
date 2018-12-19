<?php
require_once('connect.php');
$title = "Izmeni Skladiste";
include('header.php');
?>
<?php
$result = $conn->prepare("SELECT id_skladista, naziv_skladista, mesto_skladista, ukupan_kapacitet_zaliha_skladista FROM skladiste");
$result->execute();

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>id_skladista</th> <th>naziv_skladista</th> <th>mesto_skladista</th> <th>ukupan_kapacitet_zaliha_skladista</th> <th>Edit</th> <th>Delete</th></tr>";
while($row = $result -> fetch()) {
	echo "<tr>";
	echo '<td>' . $row['id_skladista'] . '</td>';
	echo '<td>' . $row['naziv_skladista'] . '</td>';
	echo '<td>' . $row['mesto_skladista'] . '</td>';
	echo '<td>' . $row['ukupan_kapacitet_zaliha_skladista'] . '</td>';
	echo '<td><a href="editSkladiste.php?id_skladista=' . $row['id_skladista'] . '">Edit</a></td>';
	echo '<td><a href="deleteSkladiste.php?id_skladista=' . $row['id_skladista'] . '">Delete</a></td>';
	echo "</tr>";
}
echo "</table>";
?>