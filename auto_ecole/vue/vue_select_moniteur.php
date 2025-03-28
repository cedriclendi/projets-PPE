<h3> Liste des classes </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre"> 
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1"> 
	<tr>
		<td bgcolor="red"> Id moniteur </td>
		<td bgcolor="red">photo de profil</td>
        <td bgcolor="red">nom</td>
		<td bgcolor="red"> prenom </td>
		<td bgcolor="red"> email </td>
		<td bgcolor="red"> mdp </td>
        <td bgcolor="red"> type d'user </td>
        <td bgcolor="red"> n° tel </td>
<?php 
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
		echo "<td bgcolor='red'> Opérations </td>"; 
}
?>
	</tr>
	<?php
	if (isset($lesMoniteurs)){
		foreach ($lesMoniteurs as $UnMoniteur){
			echo "<tr>";
			echo "<td bgcolor='blue'>".$UnMoniteur['IDUSER']."</td>";
			echo "<td bgcolor='blue'><img src='".$UnMoniteur['PHOTO']."' alt='image-article' height='100px'></td>";
			echo "<td bgcolor='blue'>".$UnMoniteur['NOM']."</td>";
			echo "<td bgcolor='blue'>".$UnMoniteur['PRENOM']."</td>";
            echo "<td bgcolor='blue'>".$UnMoniteur['EMAIL']."</td>";
            echo "<td bgcolor='blue'>".$UnMoniteur['MDP']."</td>";
            echo "<td bgcolor='blue'>".$UnMoniteur['type_user']."</td>";
            echo "<td bgcolor='blue'>".$UnMoniteur['NUMERO_TELEPHONE']."</td>";
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
			echo "<td bgcolor='blue'> <a href='index.php?page=4&action=sup&IDUSER=".$UnMoniteur['IDUSER']."'>"; 
			echo "<img src='images/supprimer.png' height='30' witdh='30'> </a>"; 

			echo "<a href='index.php?page=4&action=edit&IDUSER=".$UnMoniteur['IDUSER']."'>"; 
			echo "<img src='images/editer.jpeg' height='30' witdh='30'> </a>";
			echo "</td>"; 
	}
			echo "</tr>";
		}
	}
	?>
</table>