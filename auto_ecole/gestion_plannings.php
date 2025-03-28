<?php
if (isset($_SESSION['EMAIL']) && isset($_SESSION['type_user'])  && $_SESSION['type_user'] == "admin"){
    //gestion admin 
    $lePlanning = null; //classe à modifier 

    if (isset($_GET['action']) && isset($_GET['IDPLANNING']))
    {
        $action = $_GET['action']; 
        $idplanning = $_GET['IDPLANNING']; 

        switch($action)
        {
            case "sup" : $unControleur->deletePlanning($idplanning) ; break;
            case "edit" : 
            $lePlanning = $unControleur->selectWherePlannings ($idplanning);
            //var_dump($laMoniteur);
            break; 
        }
    }


    $lesLecons = $unControleur->selectAllLecons(); 
    $lesMoniteurs = $unControleur->selectAllMoniteurs(); 
    $lesCandidats = $unControleur->selectAllCandidats(); 


    require_once('vue/vue_insert_planning.php');

    if (isset($_POST['Valider']))
		{
			$unControleur->insertPlanning ($_POST); 
		}

		if (isset($_POST['Modifier']))
		{
			$unControleur->updatePlanning ($_POST); 
			header("Location: index.php?page=8");
		}
 	}// fin de la gestion admin 
	
	if (isset($_POST['Filtrer']))
	{
		$filtre = $_POST['filtre']; 
		$lesPlannings = $unControleur->searchAllPlannings($filtre);
	}else {

		$lesPlannings = $unControleur->selectAllPlannings(); 
	}
	require_once ("vue/vue_select_planning.php");
?>