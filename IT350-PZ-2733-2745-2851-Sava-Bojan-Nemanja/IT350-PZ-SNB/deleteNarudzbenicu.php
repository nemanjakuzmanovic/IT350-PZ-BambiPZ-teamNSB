<?php
include('header.php');
require_once('connect.php');
if (isset($_GET['id_narudzbenice']) && is_numeric($_GET['id_narudzbenice']))

{
$id = $_GET['id_narudzbenice'];
$stmt = $conn->prepare('DELETE FROM narudzbenica WHERE id_narudzbenice = ' . $id);
$stmt->execute();
header("Location: izmeniNarudzbenica.php");
}
else
{
header("Location: izmeniNarudzbenica.php");
}
?>