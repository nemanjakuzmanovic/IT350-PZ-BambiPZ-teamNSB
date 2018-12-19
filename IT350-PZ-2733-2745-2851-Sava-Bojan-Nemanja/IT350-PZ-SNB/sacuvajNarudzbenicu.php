<?php
require_once('connect.php');

$id_proizvoda = $_POST['id_proizvoda'];
$id_skladista = $_POST['id_skladista'];
$id_proizvodne_jedinice = $_POST['id_proizvodne_jedinice'];
$datum_slanja = $_POST['datum_slanja'];
$kolicina_porucenog_proizvoda = $_POST['kolicina_porucenog_proizvoda'];

$stmt = $conn->prepare('INSERT INTO narudzbenica (id_proizvoda, id_skladista, id_proizvodne_jedinice, datum_slanja, kolicina_porucenog_proizvoda) 
VALUES(:id_proizvoda, :id_skladista, :id_proizvodne_jedinice, :datum_slanja, :kolicina_porucenog_proizvoda)');
$stmt->bindParam(":id_proizvoda", $id_proizvoda);
$stmt->bindParam(":id_skladista", $id_skladista);
$stmt->bindParam(":id_proizvodne_jedinice", $id_proizvodne_jedinice);
$stmt->bindParam(":datum_slanja", $datum_slanja);
$stmt->bindParam(":kolicina_porucenog_proizvoda", $kolicina_porucenog_proizvoda);
$stmt->execute();

header('Location: header.php');
?>