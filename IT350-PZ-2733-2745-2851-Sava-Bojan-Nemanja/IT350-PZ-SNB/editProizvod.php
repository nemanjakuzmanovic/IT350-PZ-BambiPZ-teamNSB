<?php
require_once('connect.php');
function renderForm($id, $id_tipa_proizvoda, $naziv_proizvoda, $jedinica_mere, $cena, $error)
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
<input type="hidden" name="id_proizvoda" value="<?php echo $id; ?> "/>
<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>
<strong>ID Tipa Proizvoda: *</strong> <input type="text" name="id_tipa_proizvoda" value="<?php echo $id_tipa_proizvoda; ?>"/><br/>
<strong>Naziv Proizvoda: *</strong> <input type="text" name="naziv_proizvoda" value="<?php echo $naziv_proizvoda; ?>"/><br/>
<strong>Jedinica Mere: *</strong> <input type="text" name="jedinica_mere" value="<?php echo $jedinica_mere; ?>"/><br/>
<strong>Cena: *</strong> <input type="text" name="cena" value="<?php echo $cena; ?>"/><br/>


<input type="submit" name="submit" value="Submit">

</div>
</form>
</body>
</html>

<?php

}
if (isset($_POST['submit']))
{
	
	$sql = "UPDATE proizvod SET 
		id_tipa_proizvoda = :id_tipa_proizvoda, 
		naziv_proizvoda = :naziv_proizvoda, 
		jedinica_mere = :jedinica_mere, 
		cena = :cena
		WHERE id_proizvoda = :id_proizvoda";
		
		$stmt = $conn->prepare($sql);   
		    		
		$stmt->bindParam(':id_tipa_proizvoda', $_POST['id_tipa_proizvoda']);       
		$stmt->bindParam(':naziv_proizvoda', $_POST['naziv_proizvoda']);    
		$stmt->bindParam(':jedinica_mere', $_POST['jedinica_mere']);
		$stmt->bindParam(':cena', $_POST['cena']); 
		$stmt->bindParam(':id_proizvoda', $_POST['id_proizvoda']); 
				
		$stmt->execute();
		header("Location: izmeniProizvod.php");
}
else
{
$id = $_GET['id_proizvoda'];
	$result = $conn->prepare("SELECT * FROM proizvod WHERE id_proizvoda= $id");
	$result->execute();
	while($row = $result->fetch())
	{

		if($row)
		{
			$id_tipa_proizvoda = $row['id_tipa_proizvoda'];
			$naziv_proizvoda = $row['naziv_proizvoda'];
			$jedinica_mere = $row['jedinica_mere'];
			$cena = $row['cena'];
			renderForm($id, $id_tipa_proizvoda, $naziv_proizvoda, $jedinica_mere, $cena, '');
		}
		else
		{
		echo "No results!";
		}
	}
}

?>