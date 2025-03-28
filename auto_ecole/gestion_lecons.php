<?php
if (isset($_SESSION['EMAIL']) && isset($_SESSION['type_user'])  && $_SESSION['type_user'] == "admin"){
    //gestion admin 
    $laLecon = null; //classe à modifier 

    if (isset($_GET['action']) && isset($_GET['IDUSER']))
    {
        $action = $_GET['action']; 
        $idlecon = $_GET['IDUSER']; 

        switch($action)
        {
            case "sup" : $unControleur->deleteLecon($idlecon) ; break;
            case "edit" : 
            $laLecon = $unControleur->selectWhereLecons ($idlecon);
            //var_dump($laMoniteur);
            break; 
        }
    }
    require_once('vue/vue_insert_lecon.php');

    if (isset($_POST['Valider']))
		{
			$unControleur->insertLecon ($_POST); 
		}

		if (isset($_POST['Modifier']))
		{
			$unControleur->updateLecon ($_POST); 
			header("Location: index.php?page=5");
		}
 	}// fin de la gestion admin 
	
	if (isset($_POST['Filtrer']))
	{
		$filtre = $_POST['filtre']; 
		$lesLecons = $unControleur->searchAllLecons($filtre);
	}else {

		$lesLecons = $unControleur->selectAllLecons(); 
	}
	require_once ("vue/vue_select_lecon.php");
?>