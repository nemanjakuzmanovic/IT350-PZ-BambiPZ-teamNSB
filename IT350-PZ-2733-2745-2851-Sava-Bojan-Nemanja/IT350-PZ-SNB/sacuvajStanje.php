<?php
require_once('connect.php');

$id_skladista = $_POST['id_skladista'];
$id_proizvoda = $_POST['id_proizvoda'];
$trenutna_kolicina = $_POST['trenutna_kolicina'];

$stmt = $conn->prepare('INSERT INTO stanje_skladista (id_skladista, id_proizvoda, trenutna_kolicina) 
VALUES(:id_skladista, :id_proizvoda, :trenutna_kolicina)');

$stmt->bindParam(":id_skladista", $id_skladista);
$stmt->bindParam(":id_proizvoda", $id_proizvoda);
$stmt->bindParam(":trenutna_kolicina", $trenutna_kolicina);
$stmt->execute();

header('Location: header.php');
?>