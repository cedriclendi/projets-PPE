<?php
if (isset($_SESSION['EMAIL']) && isset($_SESSION['type_user'])  && $_SESSION['type_user'] == "admin"){
    //gestion admin 
    $lExamen = null; //classe à modifier 

    if (isset($_GET['action']) && isset($_GET['IDEXAMEN']))
    {
        $action = $_GET['action']; 
        $idexamen = $_GET['IDEXAMEN']; 

        switch($action)
        {
            case "sup" : $unControleur->deleteExamen($idexamen) ; break;
            case "edit" : 
            $lExamen = $unControleur->selectWhereExamens ($idexamen);
            //var_dump($laMoniteur);
            break; 
        }
    }
    require_once('vue/vue_insert_examen.php');

    if (isset($_POST['Valider']))
		{
			$unControleur->insertExamen ($_POST); 
		}

		if (isset($_POST['Modifier']))
		{
			$unControleur->updateExamen ($_POST); 
			header("Location: index.php?page=7");
		}
 	}// fin de la gestion admin 
	
	if (isset($_POST['Filtrer']))
	{
		$filtre = $_POST['filtre']; 
		$lesExamens = $unControleur->searchAllExamens($filtre);
	}else {

		$lesExamens = $unControleur->selectAllExamens(); 
	}
	require_once ("vue/vue_select_examen.php");
?>