<?php
	session_start();
	require_once("controleur/controleur.class.php");
    $unControleur = new Controleur ();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Castellane </title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		if ( ! isset($_SESSION['EMAIL'])){
			require_once ("vue/vue_connexion.php");
		}
		if(isset($_POST['Connexion'])){
			$email = $_POST['EMAIL'];
			$mdp = $_POST['MDP'];
			$unUser = $unControleur->verifConnexion($email, $mdp); 
			if ($unUser != null){
				//enregistrement dans la SESSION 
				$_SESSION['IDUSER'] = $unUser['IDUSER'];
				$_SESSION['PHOTO'] = $unUser['PHOTO']; 
				$_SESSION['NOM'] = $unUser['NOM']; 
				$_SESSION['PRENOM'] = $unUser['PRENOM']; 
				$_SESSION['EMAIL'] = $unUser['EMAIL'];
				$_SESSION['type_user'] = $unUser['type_user']; 
				$_SESSION['NUMERO_TELEPHONE'] = $unUser['NUMERO_TELEPHONE'];
				//$unUser['IDUSER'] = $_SESSION['IDUSER'];
				/*$unUser['PHOTO'] = $_SESSION['PHOTO']; 
				$unUser['NOM'] = $_SESSION['NOM']; 
				$unUser['PRENOM'] = $_SESSION['PRENOM']; 
				$unUser['EMAIL'] = $_SESSION['EMAIL'];
				$unUser['type_user'] = $_SESSION['type_user']; 
				$unUser['NUMERO_TELEPHONE'] = $_SESSION['NUMERO_TELEPHONE'];*/
				header("Location: index.php?page=1");
			}else{
				echo '</br> Votre adresse e-mail ou mot de passe est incorrecte.';
			}		
		}

		if(isset($_SESSION['EMAIL']) && isset($_SESSION['type_user'])  && $_SESSION['type_user'] == "admin"){
			echo'
				<div class="navbar">
					<a href="index.php?page=1">
						<img src="images/logo.png" class="logo"></a>
					<ul>
						<li><a href="index.php?page=2">Profils</a></li>
						<li><a href="index.php?page=3">Candidats</a></li>
						<li><a href="index.php?page=4">Moniteurs</a></li>
						<li><a href="index.php?page=5">Leçons</a></li>
						<li><a href="index.php?page=6">Véhicules</a></li>
						<li><a href="index.php?page=7">Examens</a></li>
						<li><a href="index.php?page=8">Plannings</a></li>
						<li><a href="index.php?page=9">Statistiques</a></li>
						<a href="index.php?page=10"><button>Se déconnecter</button></a>
					</ul>
				</div>';
			
			echo'<div class="insrt">';
	    	if(isset($_GET['page'])){
            	$page = $_GET['page'];
        	}else{
            	$page = 1;
        	}
        	switch ($page){
				case 1 : require_once ("home.php"); break;
            	case 2 : require_once ("gestion_profils.php"); break;
            	case 3 : require_once ("gestion_canditats.php"); break;
            	case 4 : require_once ("gestion_moniteurs.php"); break;
            	case 5 : require_once ("gestion_lecons.php"); break;
            	case 6 : require_once ("gestion_véhicules.php"); break;
				case 7 : require_once ("gestion_examens.php"); break;
				case 8 : require_once ("gestion_plannings.php"); break;
            	case 9 : require_once ("gestion_statistiques.php"); break;
				case 10 : session_destroy();unset($_SESSION['EMAIL']);
					header ("Location: index.php");break;
            	default : require_once ("erreur.php"); break;
        	}
			echo'</div>';
		}
		if(isset($_SESSION['EMAIL']) && isset($_SESSION['type_user'])  && $_SESSION['type_user'] == "candidat"){
			echo'
				<div class="navbar">
					<a href="index.php?page=1">
						<img src="images/logo.png" class="logo"></a>
					<ul>
						<li><a href="index.php?page=2">Profils</a></li>
						<li><a href="index.php?page=3">Plannings</a></li>
						<a href="index.php?page=4"><button>Se déconnecter</button></a>
					</ul>
				</div>';
			echo'<div class="insrt">';
			if(isset($_GET['page'])){
            	$page = $_GET['page'];
        	}else{
            	$page = 1;
        	}
			switch ($page){
				case 1 : require_once ("home.php"); break;
            	case 2 : require_once ("gestion_profils.php"); break;
				case 3 : require_once ("candidat_planing.php"); break;
				case 4 : session_destroy();unset($_SESSION['EMAIL']);
					header ("Location: index.php");break;
        	}
			echo'</div>';
		}
		if(isset($_SESSION['EMAIL']) && isset($_SESSION['type_user'])  && $_SESSION['type_user'] == "moniteur"){
			echo'
				<div class="navbar">
					<a href="index.php?page=1">
						<img src="images/logo.png" class="logo"></a>
					<ul>
						<li><a href="index.php?page=2">Profils</a></li>
						<a href="index.php?page=3"><button>Se déconnecter</button></a>
					</ul>
				</div>';
			echo'<div class="insrt">';
			if(isset($_GET['page'])){
            	$page = $_GET['page'];
        	}else{
            	$page = 1;
        	}
			switch ($page){
				case 1 : require_once ("home.php"); break;
            	case 2 : require_once ("gestion_profils.php"); break;
				case 3 : session_destroy();unset($_SESSION['EMAIL']);
					header ("Location: index.php");break;
        	}
			echo'</div>';
		}
	?>
	<script>
		let updtuser = document.querySelector(".updtuser");
		let isShow = true;

		function showupdt(){
			/*if(isShow){
				updtuser.style.display = "none";
				isShow = false;
			}else{
				usersSection.style.display = "block";
				isShow = true;
			}*/
            isShow=!isShow;
            updtuser.classList.toggle("hide",isShow);
			
		}
        /*function toggle(){
            var x=document.getElementById("updtuser");
            if(x.style.display==="block"){
                x.style.display="none";
            }
            else{
                x.style.display="block";
            }
        }*/
    </script>
</body>
</html>