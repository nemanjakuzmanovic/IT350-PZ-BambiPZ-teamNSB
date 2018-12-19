<?php
require_once('connect.php');

$ime = $_POST['ime_pj'];
$mesto = $_POST['mesto_pj'];
$kapacitet = $_POST['ukupan_kapacitet_proizvodnje'];

$stmt = $conn->prepare('INSERT INTO proizvodna_jedinica (ime_pj, mesto_pj, ukupan_kapacitet_proizvodnje) VALUES(:ime_pj, :mesto_pj, :ukupan_kapacitet_proizvodnje)');
$stmt->bindParam(":ime_pj", $ime);
$stmt->bindParam(":mesto_pj", $mesto);
$stmt->bindParam(":ukupan_kapacitet_proizvodnje", $kapacitet);
$stmt->execute();

header('Location: header.php');
?>