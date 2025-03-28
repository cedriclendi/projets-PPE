
<div class="wrapper">
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<form method="POST">
		<h2>Connectez-vous</h2>
		<input type="email" placeholder="Adresse e-mail" name="EMAIL" autocomplete="off">
		<input type="password" placeholder="Mot de passe" name="MDP" autocomplete="off">
		<button type="submit" name="Connexion" value="Connexion">Connexion</button>
		<p>Vous n'avez pas de compte, <a href="inscription.php">créer en un !</a></p>
		<p>Mot de passe oublié ? <a href="#">Cliquer ici.</a></p>
		<?php
	    	if(isset($erreur)) {
	    		echo "<p class= 'Erreur'>".$erreur."</p>"  ;
			}
		?>
	</form>
</div>
