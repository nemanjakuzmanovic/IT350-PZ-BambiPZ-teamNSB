<?php
include('header.php');
require_once('connect.php');
if (isset($_GET['id_proizvoda']) && is_numeric($_GET['id_proizvoda']))

{
$id = $_GET['id_proizvoda'];
$stmt = $conn->prepare('DELETE FROM proizvod WHERE id_proizvoda = ' . $id);
$stmt->execute();
header("Location: izmeniProizvod.php");
}
else
{
header("Location: izmeniProizvod.php");
}
?>