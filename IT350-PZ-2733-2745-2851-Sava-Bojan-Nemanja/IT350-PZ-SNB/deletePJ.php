<?php
include('header.php');
require_once('connect.php');
if (isset($_GET['id_proizvodne_jedinice']) && is_numeric($_GET['id_proizvodne_jedinice']))
{
	$id = $_GET['id_proizvodne_jedinice'];
	$stmt = $conn->prepare('DELETE FROM proizvodna_jedinica WHERE id_proizvodne_jedinice = ' . $id);
	$stmt->execute();
	header("Location: izmeniProizvodnaJedinica.php");
}
else
{
	header("Location: izmeniProizvodnaJedinica.php");
}
?>