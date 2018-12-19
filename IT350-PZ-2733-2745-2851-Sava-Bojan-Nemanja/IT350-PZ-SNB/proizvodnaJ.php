<?php
$title = "Proizvodna Jedinica";
include('header.php');
?>
<form action="sacuvajPJ.php" method="POST" class="formStyle">
 <input type="text" name="ime_pj" placeholder="ime jedinice"/> <br><br>
 <input type="text" name="mesto_pj" placeholder="mesto jedinice"/> <br><br>
 <input type="text" name="ukupan_kapacitet_proizvodnje" placeholder="ukupan kapacitet proizvodnje"/> <br><br>
 <input type="submit" value="Send"/>
</form>