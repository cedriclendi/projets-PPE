<?php
	// Vérifie si une photo de profil est définie dans la session
    if (isset($lUsr['PHOTO']) && !empty($lUsr['PHOTO']) && file_exists($_SESSION['PHOTO'])) {
        echo '<table>';
        echo '  <tr>';
        echo '      <td><img src="'.$lUsr['PHOTO'].'" alt="image-article" height="100px"></td>';
        echo '</tr>';
        echo '</table>';
    } else {
        // Affiche une image par défaut si aucune photo n'est définie ou si le fichier n'existe pas
        echo '<table><tr><td><img src="images/imgsql/default-avatar.png" alt="image-article" height="100px"></td></tr></table>';
    }

    echo "<h1>Bonjour ".$lUsr['PRENOM']."!</h1>";
    echo "<table>"; 
    echo "    <tr>";
    echo "        <td> nom: </td>";
    echo "        <td>".$lUsr['NOM']."</td>";
    echo "    </tr>";
    echo "    <tr>";
    echo "        <td> prénom:  </td>";
    echo "        <td>".$lUsr['PRENOM']."</td>";
    echo "    </tr>";
    echo "    <tr>";
    echo "        <td> email: </td>";
    echo "        <td>".$lUsr['EMAIL']."</td>";
    echo "    </tr>";
    echo "    <tr>";
    echo "        <td> type user:</td>";
    echo '        <td style="color:red;">'.$lUsr['type_user'].'</td>';
    echo "    </tr>";
    // Affiche le numéro de téléphone si disponible
    echo "    <tr>";
    echo "        <td> n° téléphone: </td>";
    echo "        <td>".$lUsr['NUMERO_TELEPHONE']."</td>";
    echo "    </tr>";
    echo "</table>";
    //echo "<a href='index.php?page=2&actionp=editp&IDUSER=".$lUsr['IDUSER']."'><button onclick='showupdt()'>modifier</button></a>";
    echo "<button onclick='showupdt()'>modifier</button>";
    //echo "<h1 color='red'>n°".$lUsr['IDUSER']."!</h1>";
    /*var_dump($_SESSION['PRENOM']);
    echo"<br>";
    var_dump($_SESSION['IDUSER']);
    echo"<br>";
    var_dump($lUser);*/
?>