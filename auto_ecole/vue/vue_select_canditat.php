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
	if (isset($lesCandidats)){
		foreach ($lesCandidats as $UnCandidat){
			echo "<tr>";
			echo "<td bgcolor='blue'>".$UnCandidat['IDUSER']."</td>";
            echo "<td bgcolor='blue'><img src='".$UnCandidat['PHOTO']."' alt='image-article' height='100px'></td>";
			echo "<td bgcolor='blue'>".$UnCandidat['NOM']."</td>";
			echo "<td bgcolor='blue'>".$UnCandidat['PRENOM']."</td>";
            echo "<td bgcolor='blue'>".$UnCandidat['EMAIL']."</td>";
            echo "<td bgcolor='blue'>".$UnCandidat['MDP']."</td>";
            echo "<td bgcolor='blue'>".$UnCandidat['type_user']."</td>";
            echo "<td bgcolor='blue'>".$UnCandidat['NUMERO_TELEPHONE']."</td>";
if (isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin" ) {
			echo "<td bgcolor='blue'> <a href='index.php?page=3&action=sup&IDUSER=".$UnCandidat['IDUSER']."'>"; 
			echo "<img src='images/supprimer.png' height='30' witdh='30'> </a>"; 

			echo "<a href='index.php?page=3&action=edit&IDUSER=".$UnCandidat['IDUSER']."'>"; 
			echo "<img src='images/editer.jpeg' height='30' witdh='30'> </a>";
			echo "</td>"; 
	}
			echo "</tr>";
		}
	}
	?>
</table>