<?php
require_once('connect.php');
function renderForm($id, $id_proizvodne_jedinice, $id_proizvoda, $kolicina_proizvoda, $min_kapacitet_proizvodnje, $max_kapacitet_proizvodnje, $datum_proizvodnje, $error)
{
?>
<html>
<body>
<?php
	if ($error != '')
	{
		echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
	}
?>


<form action="" method="post" class="formStyle">
<input type="hidden" name="id_proizvodnje" value="<?php echo $id; ?> "/>
<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>
<strong>ID Proizvodne Jedinice: </strong> <input type="text" name="id_proizvodne_jedinice" value="<?php echo $id_proizvodne_jedinice; ?>"/><br/>
<strong>ID Proizvoda: </strong> <input type="text" name="id_proizvoda" value="<?php echo $id_proizvoda; ?>"/><br/>
<strong>Kolicina Proizvoda: </strong> <input type="text" name="kolicina_proizvoda" value="<?php echo $kolicina_proizvoda; ?>"/><br/>
<strong>Min Kapacitet Proizvodnje: </strong> <input type="text" name="min_kapacitet_proizvodnje" value="<?php echo $min_kapacitet_proizvodnje; ?>"/><br/>
<strong>Max Kapacitet Proizvodnje: </strong> <input type="text" name="max_kapacitet_proizvodnje" value="<?php echo $max_kapacitet_proizvodnje; ?>"/><br/>
<strong>Datum Proizvodnje: </strong> <input type="date" name="datum_proizvodnje" value="<?php echo $datum_proizvodnje; ?>"/><br/>


<input type="submit" name="submit" value="Submit">

</div>
</form>
</body>
</html>

<?php

}
if (isset($_POST['submit']))
{
		$sql = "UPDATE proizvodnja SET 
		id_proizvodne_jedinice = :id_proizvodne_jedinice,
		id_proizvoda = :id_proizvoda, 
		kolicina_proizvoda = :kolicina_proizvoda, 
		min_kapacitet_proizvodnje = :min_kapacitet_proizvodnje, 
		max_kapacitet_proizvodnje = :max_kapacitet_proizvodnje, 
		datum_proizvodnje = :datum_proizvodnje 
		WHERE id_proizvodnje = :id_proizvodnje";
		
		$stmt = $conn->prepare($sql);   
		 
		$stmt->bindParam(':id_proizvodne_jedinice', $_POST['id_proizvodne_jedinice']);    		
		$stmt->bindParam(':id_proizvoda', $_POST['id_proizvoda']);       
		$stmt->bindParam(':kolicina_proizvoda', $_POST['kolicina_proizvoda']);    
		$stmt->bindParam(':min_kapacitet_proizvodnje', $_POST['min_kapacitet_proizvodnje']);
		$stmt->bindParam(':max_kapacitet_proizvodnje', $_POST['max_kapacitet_proizvodnje']); 
		$stmt->bindParam(':datum_proizvodnje', $_POST['datum_proizvodnje']);
		$stmt->bindParam(':id_proizvodnje', $_POST['id_proizvodnje']); 
				
		$stmt->execute();
		header("Location: izmeniProizvodnja.php");
}
else
{
	$id = $_GET['id_proizvodnje'];
	$result = $conn->prepare("SELECT * FROM proizvodnja WHERE id_proizvodnje= $id");
	$result->execute();
	while($row = $result->fetch())
	{

		if($row)
		{
			$id_proizvodne_jedinice = $row['id_proizvodne_jedinice'];
			$id_proizvoda = $row['id_proizvoda'];
			$kolicina_proizvoda = $row['kolicina_proizvoda'];
			$min_kapacitet_proizvodnje = $row['min_kapacitet_proizvodnje'];
			$max_kapacitet_proizvodnje = $row['max_kapacitet_proizvodnje'];
			$datum_proizvodnje = $row['datum_proizvodnje'];
			renderForm($id, $id_proizvodne_jedinice,$id_proizvoda, $kolicina_proizvoda, $min_kapacitet_proizvodnje, $max_kapacitet_proizvodnje, $datum_proizvodnje, '');
		}
		else
		{
		echo "No results!";
		}
	}
}

?>