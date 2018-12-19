<?php
include('header.php');
require_once('connect.php');
if (isset($_GET['id_proizvodnje']) && is_numeric($_GET['id_proizvodnje']))

{
$id = $_GET['id_proizvodnje'];
$stmt = $conn->prepare('DELETE FROM proizvodnja WHERE id_proizvodnje = ' . $id);
$stmt->execute();
header("Location: izmeniProizvodnja.php");
}
else
{
header("Location: izmeniProizvodnja.php");
}
?>