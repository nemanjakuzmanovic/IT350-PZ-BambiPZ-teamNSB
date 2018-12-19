<?php
require_once('connect.php');
function renderForm($id, $naziv_skladista, $mesto_skladista, $ukupan_kapacitet_zaliha_skladista, $error)
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
<input type="hidden" name="id_skladista" value="<?php echo $id; ?> "/>
<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>
<strong>Naziv: </strong> <input type="text" name="naziv_skladista" value="<?php echo $naziv_skladista; ?>"/><br/>
<strong>Mesto: </strong> <input type="text" name="mesto_skladista" value="<?php echo $mesto_skladista; ?>"/><br/>
<strong>Ukupan Kapacitet Zaliha: </strong> <input type="text" name="ukupan_kapacitet_zaliha_skladista" value="<?php echo $ukupan_kapacitet_zaliha_skladista; ?>"/><br/>


<input type="submit" name="submit" value="Submit">

</div>
</form>
</body>
</html>

<?php

}
if (isset($_POST['submit']))
{
	$sql = "UPDATE skladiste SET 
		naziv_skladista = :naziv_skladista, 
		mesto_skladista = :mesto_skladista, 
		ukupan_kapacitet_zaliha_skladista = :ukupan_kapacitet_zaliha_skladista
		WHERE id_skladista = :id_skladista";
		
		$stmt = $conn->prepare($sql);   
		    		
		$stmt->bindParam(':naziv_skladista', $_POST['naziv_skladista']);       
		$stmt->bindParam(':mesto_skladista', $_POST['mesto_skladista']);    
		$stmt->bindParam(':ukupan_kapacitet_zaliha_skladista', $_POST['ukupan_kapacitet_zaliha_skladista']);
		$stmt->bindParam(':id_skladista', $_POST['id_skladista']); 
				
		$stmt->execute();
		header("Location: izmeniSkladiste.php");
}
else
{
$id = $_GET['id_skladista'];
	$result = $conn->prepare("SELECT * FROM skladiste WHERE id_skladista= $id");
	$result->execute();
	while($row = $result->fetch())
	{

		if($row)
		{
			$naziv_skladista = $row['naziv_skladista'];
			$mesto_skladista = $row['mesto_skladista'];
			$ukupan_kapacitet_zaliha_skladista = $row['ukupan_kapacitet_zaliha_skladista'];
			renderForm($id, $naziv_skladista, $mesto_skladista, $ukupan_kapacitet_zaliha_skladista, '');
		}
		else
		{
		echo "No results!";
		}
	}
}

?>