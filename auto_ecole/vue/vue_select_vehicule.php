<h3> Liste des classes </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre"> 
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1"> 
	<tr>
		<td bgcolor="red"> Id vehicule </td>
        <td bgcolor="red">image</td>
		<td bgcolor="red"> marque </td>
		<td bgcolor="red"> modele </td>
        <td bgcolor="red"> imatriculation </td>
<?php 
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
		echo "<td bgcolor='red'> Opérations </td>"; 
}
?>
	</tr>
	<?php
	if (isset($lesVehicules)){
		foreach ($lesVehicules as $UnVehicule){
			echo "<tr>";
			echo "<td bgcolor='blue'>".$UnVehicule['IDVEHICULE']."</td>";
            echo "<td bgcolor='blue'><img src='".$UnVehicule['IMGVEHICULE']."' alt='image-article' height='100px'></td>";
			echo "<td bgcolor='blue'>".$UnVehicule['MARQUE']."</td>";
			echo "<td bgcolor='blue'>".$UnVehicule['MODELE']."</td>";
            echo "<td bgcolor='blue'>".$UnVehicule['IMMATRICULATION']."</td>";
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
			echo "<td bgcolor='blue'> <a href='index.php?page=6&action=sup&IDVEHICULE=".$UnVehicule['IDVEHICULE']."'>"; 
			echo "<img src='images/supprimer.png' height='30' witdh='30'> </a>"; 

			echo "<a href='index.php?page=6&action=edit&IDVEHICULE=".$UnVehicule['IDVEHICULE']."'>"; 
			echo "<img src='images/editer.jpeg' height='30' witdh='30'> </a>";
			echo "</td>"; 
	}
			echo "</tr>";
		}
	}
	?>
</table>