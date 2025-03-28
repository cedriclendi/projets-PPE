<h3> Liste des lecons </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre"> 
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1"> 
	<tr>
		<td bgcolor="red"> Id lecon </td>
        <td bgcolor="red">type de lecon</td>
		<td bgcolor="red"> description </td>
		<td bgcolor="red"> titre </td>
<?php 
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
		echo "<td bgcolor='red'> Opérations </td>"; 
}
?>
	</tr>
	<?php
	if (isset($lesLecons)){
		foreach ($lesLecons as $UneLecon){
			echo "<tr>";
			echo "<td bgcolor='blue'>".$UneLecon['IDLECON']."</td>";
			echo "<td bgcolor='blue'>".$UneLecon['TYPE_DE_LECON']."</td>";
			echo "<td bgcolor='blue'>".$UneLecon['DESCRIPTION']."</td>";
            echo "<td bgcolor='blue'>".$UneLecon['TITRE']."</td>";
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
			echo "<td bgcolor='blue'> <a href='index.php?page=5&action=sup&IDUSER=".$UneLecon['IDLECON']."'>"; 
			echo "<img src='images/supprimer.png' height='30' witdh='30'> </a>"; 

			echo "<a href='index.php?page=5&action=edit&IDUSER=".$UneLecon['IDLECON']."'>"; 
			echo "<img src='images/editer.jpeg' height='30' witdh='30'> </a>";
			echo "</td>"; 
	}
			echo "</tr>";
		}
	}
	?>
</table>