<?php
require_once("controleur/controleur.class.php");
$unControleur = new Controleur ();
if (isset($_POST['suivant'])) {
	$unControleur->insertUser ($_POST); 

	/*if (!empty($_POST['photo']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp'])!empty($_POST['type_user']) AND !empty($_POST['NUMERO_TELEPHONE'])) {
		$prenom = $_POST['prenom'];
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$email = $_POST['email'];
		$mdp = $_POST['mdp'];
		$erreur = "";

		$insertUser = $bdd->prepare('INSERT INTO USER (prenom, nom, email, mdp) VALUES (?, ?, ?, ?)');
		$insertUser->execute(array($prenom, $nom, $email, $mdp));

		$recupUser = $bdd->prepare('SELECT * FROM USER WHERE prenom = ? AND nom = ? AND email = ? AND mdp = ?');
		$recupUser->execute(array($prenom, $nom, $email, $mdp));
		if ($recupUser->rowCount() > 0) {
			$_SESSION['prenom'] = $prenom;
			$_SESSION['nom'] = $nom;
			$_SESSION['email'] = $email;
			$_SESSION['mdp'] = $mdp;*/

			/*$erreur = "Félicitation, votre compte a bien été créé.";
			session_destroy();*/
		}
		
	/*}else {
		$erreur = "Veuillez compléter tous les champs...";
	}
}*/
?>