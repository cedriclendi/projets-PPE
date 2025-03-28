<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page d'inscription</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper2">
		<div class="square"></div>
		<div class="square"></div>
		<div class="square"></div>
		<div class="square"></div>
		<div class="square"></div>
		<div class="square"></div>
		<div class="square"></div>
		<form method="POST" action="" enctype="multipart/form-data">
			<h2>Inscrivez-vous</h2>
			<input type="file" name="PHOTO"  id = "PHOTO" accept=".jpg, .jpeg, .png" value="">
			<input type="text" placeholder="Nom" name="NOM" autocomplete="off">
			<input type="text" placeholder="Prénom" name="PRENOM" autocomplete="off">
			<input type="email" placeholder="Adresse e-mail" name="EMAIL" autocomplete="off">
			<!--input type="email" placeholder="s'inscrire en tant que" name="email" autocomplete="off"-->
			<select name="type_user" id="type_user">
                <option value="candidat">candidat</option>
				<option value="moniteur">moniteur</option>
            </select>
			<input type="password" placeholder="Mot de passe" name="MDP" autocomplete="off">
			<input type="password" placeholder="Confirmer" name="MDP2" autocomplete="off">
			<button type="submit" name="suivant">Suivant</button>
			<p>Pour se connecter à un compte existant, <a href="index.php">cliquer ici.</a></p>
			<?php
	        	if(isset($erreur)) {
	        		echo "<p class= 'Erreur'>".$erreur."</p>"  ;
		    	}
			?>
		</form>
	</div>
</body>
</html>