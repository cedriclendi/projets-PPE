<h3> Liste des classes </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre"> 
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1"> 
	<tr>
		<td bgcolor="red"> Id examen </td>
        <td bgcolor="red">date et heure examen</td>
		<td bgcolor="red"> vehicule </td>
		<td bgcolor="red"> type permis </td>
<?php 
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
		echo "<td bgcolor='red'> Opérations </td>"; 
}
?>
	</tr>
	<?php
	if (isset($lesExamens)){
		foreach ($lesExamens as $UnExamen){
			echo "<tr>";
			echo "<td bgcolor='blue'>".$UnExamen['IDEXAMEN']."</td>";
			echo "<td bgcolor='blue'>".$UnExamen['DATE_ET_HEURE_D_EXAMEN']."</td>";
			echo "<td bgcolor='blue'>".$UnExamen['VEHICULE']."</td>";
            echo "<td bgcolor='blue'>".$UnExamen['TYPE_DE_PERMIS']."</td>";
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
			echo "<td bgcolor='blue'> <a href='index.php?page=7&action=sup&IDEXAMEN=".$UnExamen['IDEXAMEN']."'>"; 
			echo "<img src='images/supprimer.png' height='30' witdh='30'> </a>"; 

			echo "<a href='index.php?page=7&action=edit&IDEXAMEN=".$UnExamen['IDEXAMEN']."'>"; 
			echo "<img src='images/editer.jpeg' height='30' witdh='30'> </a>";
			echo "</td>"; 
	}
			echo "</tr>";
		}
	}
	?>
</table>