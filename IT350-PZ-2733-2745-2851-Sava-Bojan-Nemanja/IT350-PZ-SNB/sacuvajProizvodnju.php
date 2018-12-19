<?php
require_once('connect.php');

$id_proizvodne_jedinice = $_POST['id_proizvodne_jedinice'];
$id_proizvoda = $_POST['id_proizvoda'];
$kolicina_proizvoda = $_POST['kolicina_proizvoda'];
$min = $_POST['min_kapacitet_proizvodnje'];
$max = $_POST['max_kapacitet_proizvodnje'];
$datum = $_POST['datum_proizvodnje'];

$stmt = $conn->prepare('INSERT INTO proizvodnja (id_proizvodne_jedinice, id_proizvoda, kolicina_proizvoda, min_kapacitet_proizvodnje, max_kapacitet_proizvodnje, datum_proizvodnje) 
VALUES(:id_proizvodne_jedinice, :id_proizvoda, :kolicina_proizvoda, :min_kapacitet_proizvodnje, :max_kapacitet_proizvodnje, :datum_proizvodnje)');
$stmt->bindParam(":id_proizvodne_jedinice", $id_proizvodne_jedinice);
$stmt->bindParam(":id_proizvoda", $id_proizvoda);
$stmt->bindParam(":kolicina_proizvoda", $kolicina_proizvoda);
$stmt->bindParam(":min_kapacitet_proizvodnje", $min);
$stmt->bindParam(":max_kapacitet_proizvodnje", $max);
$stmt->bindParam(":datum_proizvodnje", $datum);
$stmt->execute();

header('Location: header.php');
?>