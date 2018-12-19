<?php
require_once('connect.php');

$tip = $_POST['id_tipa_proizvoda'];
$naziv = $_POST['naziv_proizvoda'];
$jedinica_mere = $_POST['jedinica_mere'];
$cena = $_POST['cena'];

$stmt = $conn->prepare('INSERT INTO proizvod (id_tipa_proizvoda, naziv_proizvoda, jedinica_mere, cena) VALUES(:id_tipa_proizvoda, :naziv_proizvoda, :jedinica_mere, :cena)');
$stmt->bindParam(":id_tipa_proizvoda", $tip);
$stmt->bindParam(":naziv_proizvoda", $naziv);
$stmt->bindParam(":jedinica_mere", $jedinica_mere);
$stmt->bindParam(":cena", $cena);
$stmt->execute();

header('Location: header.php');
?>