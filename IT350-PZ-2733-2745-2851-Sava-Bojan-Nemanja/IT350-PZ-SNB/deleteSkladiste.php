<?php
include('header.php');
require_once('connect.php');
if (isset($_GET['id_skladista']) && is_numeric($_GET['id_skladista']))

{
$id = $_GET['id_skladista'];
$stmt = $conn->prepare('DELETE FROM skladiste WHERE id_skladista = ' . $id);
$stmt->execute();
header("Location: izmeniSkladiste.php");
}
else
{
header("Location: izmeniSkladiste.php");
}
?>