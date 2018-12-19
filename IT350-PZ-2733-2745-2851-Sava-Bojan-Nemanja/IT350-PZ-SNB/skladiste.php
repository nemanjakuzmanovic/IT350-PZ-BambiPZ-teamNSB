<?php
$title = "skladiste";
include('header.php');
?>

<form action="sacuvajSkladiste.php" method="POST" class="formStyle">
 <input type="text" name="naziv_skladista" placeholder="naziv skladista"/> <br><br>
 <input type="text" name="mesto_skladista" placeholder="mesto skladista"/> <br><br>
 <input type="text" name="ukupan_kapacitet_zaliha_skladista" placeholder="zaliha skladista"/> <br><br>
 <input type="submit" value="Send"/>
</form>