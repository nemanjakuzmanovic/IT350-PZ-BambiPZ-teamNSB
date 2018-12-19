<?php
require_once('connect.php');

$naziv_skladista = $_POST['naziv_skladista'];
$mesto_skladista = $_POST['mesto_skladista'];
$ukupan_kapacitet_zaliha_skladista = $_POST['ukupan_kapacitet_zaliha_skladista'];

$stmt = $conn->prepare('INSERT INTO skladiste (naziv_skladista, mesto_skladista, ukupan_kapacitet_zaliha_skladista) 
VALUES(:naziv_skladista, :mesto_skladista, :ukupan_kapacitet_zaliha_skladista)');
$stmt->bindParam(":naziv_skladista", $naziv_skladista);
$stmt->bindParam(":mesto_skladista", $mesto_skladista);
$stmt->bindParam(":ukupan_kapacitet_zaliha_skladista", $ukupan_kapacitet_zaliha_skladista);
$stmt->execute();

header('Location: header.php');
?>