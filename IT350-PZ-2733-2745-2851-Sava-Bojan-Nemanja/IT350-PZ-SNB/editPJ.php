<?php
require_once('connect.php');
function renderForm($id, $ime_pj, $mesto_pj, $kapacitet,$error)
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


<form action="" method="post">
<input type="hidden" name="id_proizvodne_jedinice" value="<?php echo $id; ?>"/>
<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>
<strong>Ime Proizvodne Jedinice: *</strong> <input type="text" name="ime_pj" value="<?php echo $ime_pj; ?>"/><br/>
<strong>Mesto Proizvodne Jedinice: *</strong> <input type="text" name="mesto_pj" value="<?php echo $mesto_pj; ?>"/><br/>
<strong>Ukupan kapacitet proizvodnje: *</strong> <input type="text" name="ukupan kapacitet proizvodnje" value="<?php echo $kapacitet; ?>"/><br/>

<input type="submit" name="submit" value="Submit">

</div>
</form>
</body>
</html>

<?php

}
if (isset($_POST['submit']))
{
	$sql = "UPDATE proizvodna_jedinica SET 
		ime_pj = :ime_pj, 
		mesto_pj = :mesto_pj, 
		ukupan_kapacitet_proizvodnje = :ukupan_kapacitet_proizvodnje
		WHERE id_proizvodne_jedinice = :id_proizvodne_jedinice";
		
		$stmt = $conn->prepare($sql);   
		    		
		$stmt->bindParam(':ime_pj', $_POST['ime_pj']);       
		$stmt->bindParam(':mesto_pj', $_POST['mesto_pj']);    
		$stmt->bindParam(':ukupan_kapacitet_proizvodnje', $_POST['ukupan_kapacitet_proizvodnje']);
		$stmt->bindParam(':id_proizvodne_jedinice', $_POST['id_proizvodne_jedinice']); 
				
		$stmt->execute();
		header("Location: izmeniProizvodnaJedinica.php");
		
}
else
{
	$id = $_GET['id_proizvodne_jedinice'];
	$result = $conn->prepare("SELECT * FROM proizvodna_jedinica WHERE id_proizvodne_jedinice= $id");
	$result->execute();
	while($row = $result->fetch())
	{

		if($row)
		{
			$ime_pj = $row['ime_pj'];
			$mesto_pj = $row['mesto_pj'];
			$kapacitet = $row['ukupan_kapacitet_proizvodnje'];
			renderForm($id, $ime_pj, $mesto_pj, $kapacitet, '');
		}
		else
		{
		echo "No results!";
		}
	}
}
?>