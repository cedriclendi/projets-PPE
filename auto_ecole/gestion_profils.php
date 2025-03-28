<?php 
if (isset($_SESSION['IDUSER']) && isset($_SESSION['type_user'])){
    //$idmoniteur = $_GET['IDUSER']; 
    //$lUser = $unControleur->selectWhereUsers ($iduser);
    $idusr=$_SESSION['IDUSER'];
    $lUsr=$unControleur->selectWhereUsers($idusr);

    /*$lUser=null;

    if (isset($_GET['actionp']) && isset($_GET['IDUSER']))
    {
        $actionp = $_GET['actionp']; 
        $iduser = $_GET['IDUSER']; 

        switch($actionp)
        {
            case "editp" : 
            $lUser = $unControleur->selectWhereUsers($iduser);
            //require_once ("vue/vue_update_profil.php");
            //var_dump($laClasse);
            break; 
        }
    }*/
    require_once ("vue/vue_profils.php");
    if (isset($_POST['Modifier']))
    {
        $unControleur->updateUser($_POST); 
        header("Location: index.php?page=2");
    }
    require_once ("vue/vue_update_profil.php");
}
?>
