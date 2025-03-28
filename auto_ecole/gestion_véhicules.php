<?php
if (isset($_SESSION['EMAIL']) && isset($_SESSION['type_user'])  && $_SESSION['type_user'] == "admin"){
    //gestion admin 
    $leVehicule = null; //classe à modifier 

    if (isset($_GET['action']) && isset($_GET['IDVEHICULE']))
    {
        $action = $_GET['action']; 
        $idvehicule = $_GET['IDVEHICULE']; 

        switch($action)
        {
            case "sup" : $unControleur->deleteVehicule($idvehicule) ; break;
            case "edit" : 
            $leVehicule = $unControleur->selectWhereVehicules ($idvehicule);
            //var_dump($laMoniteur);
            break; 
        }
    }
    require_once('vue/vue_insert_vehicule.php');

    if (isset($_POST['Valider']))
		{
			$unControleur->insertVehicule ($_POST); 
		}

		if (isset($_POST['Modifier']))
		{
			$unControleur->updateVehicule ($_POST); 
			header("Location: index.php?page=6");
		}
 	}// fin de la gestion admin 
	
	if (isset($_POST['Filtrer']))
	{
		$filtre = $_POST['filtre']; 
		$lesVehicules = $unControleur->searchAllVehicules($filtre);
	}else {

		$lesVehicules = $unControleur->selectAllVehicules(); 
	}
	require_once ("vue/vue_select_vehicule.php");
?>