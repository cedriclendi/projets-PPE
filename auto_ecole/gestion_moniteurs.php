<?php
if (isset($_SESSION['EMAIL']) && isset($_SESSION['type_user'])  && $_SESSION['type_user'] == "admin"){
    //gestion admin 
    $leMoniteur = null; //classe à modifier 

    if (isset($_GET['action']) && isset($_GET['IDUSER']))
    {
        $action = $_GET['action']; 
        $idmoniteur = $_GET['IDUSER']; 

        switch($action)
        {
            case "sup" : $unControleur->deleteMoniteur($idmoniteur) ; break;
            case "edit" : 
            $leMoniteur = $unControleur->selectWhereMoniteurs ($idmoniteur);
            //var_dump($laMoniteur);
            break; 
        }
    }
    require_once('vue/vue_insert_moniteur.php');

    if (isset($_POST['Valider']))
		{
			$unControleur->insertMoniteur ($_POST); 
		}

		if (isset($_POST['Modifier']))
		{
			$unControleur->updateMoniteur ($_POST); 
			header("Location: index.php?page=4");
		}
 	}// fin de la gestion admin 
	
	if (isset($_POST['Filtrer']))
	{
		$filtre = $_POST['filtre']; 
		$lesMoniteurs = $unControleur->searchAllMoniteurs($filtre);
	}else {

		$lesMoniteurs = $unControleur->selectAllMoniteurs(); 
	}
	require_once ("vue/vue_select_moniteur.php");
?>