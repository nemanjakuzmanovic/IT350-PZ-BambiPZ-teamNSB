<?php
require_once('connect.php');
function renderForm($id, $id_proizvoda, $id_skladista, $id_proizvodne_jedinice, $datum_slanja, $kolicina_porucenog_proizvoda, $error)
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
<input type="hidden" name="id_narudzbenice" value="<?php echo $id; ?> "/>
<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>
<strong>ID Proizvodne Jedinice: </strong> <input type="text" name="id_proizvoda" value="<?php echo $id_proizvoda; ?>"/><br/>
<strong>ID Proizvoda: </strong> <input type="text" name="id_skladista" value="<?php echo $id_skladista; ?>"/><br/>
<strong>Kolicina Proizvoda: </strong> <input type="text" name="id_proizvodne_jedinice" value="<?php echo $id_proizvodne_jedinice; ?>"/><br/>
<strong>Min Kapacitet Proizvodnje: </strong> <input type="text" name="datum_slanja" value="<?php echo $datum_slanja; ?>"/><br/>
<strong>Max Kapacitet Proizvodnje: </strong> <input type="text" name="kolicina_porucenog_proizvoda" value="<?php echo $kolicina_porucenog_proizvoda; ?>"/><br/>


<input type="submit" name="submit" value="Submit">

</div>
</form>
</body>
</html>

<?php

}
if (isset($_POST['submit']))
{
		$sql = "UPDATE narudzbenica SET 
		id_proizvoda = :id_proizvoda,
		id_skladista = :id_skladista, 
		id_proizvodne_jedinice = :id_proizvodne_jedinice, 
		datum_slanja = :datum_slanja, 
		kolicina_porucenog_proizvoda = :kolicina_porucenog_proizvoda
		WHERE id_narudzbenice = :id_narudzbenice";
		
		$stmt = $conn->prepare($sql);   
		 
		$stmt->bindParam(':id_proizvoda', $_POST['id_proizvoda']);    		
		$stmt->bindParam(':id_skladista', $_POST['id_skladista']);       
		$stmt->bindParam(':id_proizvodne_jedinice', $_POST['id_proizvodne_jedinice']);    
		$stmt->bindParam(':datum_slanja', $_POST['datum_slanja']);
		$stmt->bindParam(':kolicina_porucenog_proizvoda', $_POST['kolicina_porucenog_proizvoda']);
		$stmt->bindParam(':id_narudzbenice', $_POST['id_narudzbenice']); 
				
		$stmt->execute();
		header("Location: izmeniNarudzbenica.php");
}
else
{
	$id = $_GET['id_narudzbenice'];
	$result = $conn->prepare("SELECT * FROM narudzbenica WHERE id_narudzbenice= $id");
	$result->execute();
	while($row = $result->fetch())
	{

		if($row)
		{
			$id_proizvoda = $row['id_proizvoda'];
			$id_skladista = $row['id_skladista'];
			$id_proizvodne_jedinice = $row['id_proizvodne_jedinice'];
			$datum_slanja = $row['datum_slanja'];
			$kolicina_porucenog_proizvoda = $row['kolicina_porucenog_proizvoda'];
			renderForm($id, $id_proizvoda,$id_skladista, $id_proizvodne_jedinice, $datum_slanja, $kolicina_porucenog_proizvoda, '');
		}
		else
		{
		echo "No results!";
		}
	}
}

?>