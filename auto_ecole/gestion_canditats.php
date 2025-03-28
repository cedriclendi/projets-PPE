<?php
if (isset($_SESSION['EMAIL']) && isset($_SESSION['type_user'])  && $_SESSION['type_user'] == "admin"){
    //gestion admin 
    $leCandidat = null; //classe à modifier 

    if (isset($_GET['action']) && isset($_GET['IDUSER']))
    {
        $action = $_GET['action']; 
        $idcandidat = $_GET['IDUSER']; 

        switch($action)
        {
            case "sup" : $unControleur->deleteCandidats($idcandidat) ; break;
            case "edit" : 
            $leCandidat = $unControleur->selectWhereCandidats($idcandidat);
            //var_dump($laCandidat);
            break; 
        }
    }
    require_once('vue/vue_insert_canditat.php');

    if (isset($_POST['Valider']))
		{
			$unControleur->insertCandidat ($_POST); 
		}

		if (isset($_POST['Modifier']))
		{
			$unControleur->updateCandidat ($_POST); 
			header("Location: index.php?page=3");
		}
 	}// fin de la gestion admin 
	
	if (isset($_POST['Filtrer']))
	{
		$filtre = $_POST['filtre']; 
		$lesCandidats = $unControleur->searchAllCandidats($filtre);
	}else {

		$lesCandidats = $unControleur->selectAllCandidats(); 
	}
	require_once ("vue/vue_select_canditat.php");
?>