<?php
$title = "Proizvod";
include('header.php');
?>

<form action="sacuvajProizvod.php" method="POST" class="formStyle">
 <input type="text" name="id_tipa_proizvoda" placeholder="tip proizvoda"/><p> 1 - Gotov Proizvod; 2 - Polu-Gotov Proizvod </p> <br><br>
 <input type="text" name="naziv_proizvoda" placeholder="naziv proizvoda"/> <br><br>
 <input type="text" name="jedinica_mere" placeholder="jedinica mere"/> <br><br>
  <input type="text" name="cena" placeholder="cena"/> <br><br>
 <input type="submit" value="Send"/>
</form>