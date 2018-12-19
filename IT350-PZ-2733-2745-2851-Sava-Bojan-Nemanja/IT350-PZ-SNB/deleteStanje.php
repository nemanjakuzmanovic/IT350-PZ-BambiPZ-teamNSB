<?php
include('header.php');
require_once('connect.php');
if (isset($_GET['id_stanja_skladista']) && is_numeric($_GET['id_stanja_skladista']))

{
$id = $_GET['id_stanja_skladista'];
$stmt = $conn->prepare('DELETE FROM stanje_skladista WHERE id_stanja_skladista = ' . $id);
$stmt->execute();
header("Location: izmeniStanja.php");
}
else
{
header("Location: izmeniStanja.php");
}
?>
