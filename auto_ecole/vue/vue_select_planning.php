<h3> Liste des Plannings </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre"> 
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1"> 
	<tr>
		<td bgcolor="red"> Id moniteur </td>
        <td bgcolor="red">Id lecon</td>
		<td bgcolor="red"> id candidat </td>
		<td bgcolor="red"> date heure debut </td>
		<td bgcolor="red"> id moniteur </td>
        <td bgcolor="red"> date heure fin </td>
        <td bgcolor="red"> etat </td>
<?php 
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
		echo "<td bgcolor='red'> Opérations </td>"; 
}
?>
	</tr>
	<?php
	if (isset($lesPlannings)){
		foreach ($lesPlannings as $UnPlanning){
			echo "<tr>";
			echo "<td bgcolor='blue'>".$UnPlanning['IDPLANNING']."</td>";
			echo "<td bgcolor='blue'>".$UnPlanning['IDLECON']."</td>";
			echo "<td bgcolor='blue'>".$UnPlanning['IDUSER_1']."</td>";
            echo "<td bgcolor='blue'>".$UnPlanning['DATEHEURDEBUR']."</td>";
            echo "<td bgcolor='blue'>".$UnPlanning['IDUSER_2']."</td>";
            echo "<td bgcolor='blue'>".$UnPlanning['DATEFINHEUR']."</td>";
            echo "<td bgcolor='blue'>".$UnPlanning['ETAT']."</td>";
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
			echo "<td bgcolor='blue'> <a href='index.php?page=8&action=sup&IDPLANNING=".$UnPlanning['IDPLANNING']."'>"; 
			echo "<img src='images/supprimer.png' height='30' witdh='30'> </a>"; 

			echo "<a href='index.php?page=8&action=edit&IDPLANNING=".$UnPlanning['IDPLANNING']."'>"; 
			echo "<img src='images/editer.jpeg' height='30' witdh='30'> </a>";
			echo "</td>"; 
	}
			echo "</tr>";
		}
	}
	?>
</table>