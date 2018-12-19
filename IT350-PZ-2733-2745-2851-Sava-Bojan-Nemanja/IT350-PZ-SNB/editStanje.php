<?php
require_once('connect.php');
function renderForm($id, $id_skladista, $id_proizvoda, $trenutna_kolicina, $error)
{
?>

<?php
	if ($error != '')
	{
		echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
	}
?>


<form action="" method="post">
<input type="hidden" name="id_stanja_skladista" value="<?php echo $id; ?>"/>


<p><strong>ID:</strong> <?php echo $id; ?></p>
<strong>ID Skladista: *</strong> <input type="text" name="id_skladista" value="<?php echo $id_skladista; ?>"/><br/>
<strong>ID Proizvoda: *</strong> <input type="text" name="id_proizvoda" value="<?php echo $id_proizvoda; ?>"/><br/>
<strong>Trenutna Kolicina: *</strong> <input type="text" name="trenutna_kolicina" value="<?php echo $trenutna_kolicina; ?>"/><br/>

<input type="submit" name="submit" value="Submit">

</form>

<?php

}
if (isset($_POST['submit']))
{
	if (is_numeric($_POST['id_stanja_skladista']))
	{
		$id = $_POST['id_stanja_skladista'];
		$id_skladista = $_POST['id_skladista'];
		$id_proizvoda = $_POST['id_proizvoda'];
		$trenutna_kolicina = $_POST['trenutna_kolicina'];

		$stmt = $conn->prepare("UPDATE stanje_skladista SET id_skladista='$id_skladista', id_proizvoda='$id_proizvoda', trenutna_kolicina='$trenutna_kolicina' WHERE id_stanja_skladista='$id'");
			$stmt->execute();
			header("Location: izmeniStanja.php");
		
	}
	else
	{
		echo 'Error!';
	}
}
else
{
if (isset($_GET['id_stanja_skladista']) && is_numeric($_GET['id_stanja_skladista']) && $_GET['id_stanja_skladista'] > 0)
{
	$id = $_GET['id_stanja_skladista'];
	$result = $conn->prepare("SELECT * FROM stanje_skladista WHERE id_stanja_skladista= $id");
	$result->execute();
	while($row = $result->fetch())
	{

		if($row)
		{
			$id_skladista = $row['id_skladista'];
			$id_proizvoda = $row['id_proizvoda'];
			$trenutna_kolicina = $row['trenutna_kolicina'];
			renderForm($id, $id_skladista, $id_proizvoda, $trenutna_kolicina, '');
		}
		else
		{
		echo "No results!";
		}
	}
}
else
{
echo 'Error!';
}
}
?>