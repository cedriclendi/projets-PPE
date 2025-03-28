<h3>Ajout d'un nouveau examen</h3>

<form method="post">
    <table>
        <tr>
            <td> date et heure </td>
            <td><input type="date" name="DATE_ET_HEURE_D_EXAMEN"></td>
        </tr>
        <tr>
            <td> vehicule </td>
            <td>
                <select name="VEHICULE" id="">
                    <option value="voiture">voiture</option>
                </select>
            </td>
        </tr>
        <tr>
            <td> type de permis </td>
            <td><input type="text" name="TYPE_DE_PERMIS"
            value="<?= ($lExamen!=null)?$lExamen['TYPE_DE_PERMIS']:'' ?>"></td>
        </tr>
        <!--tr>
            <td> Statut </td>
            <td><input type="text" name="Statut"></td>
        </tr>
        <tr>
            <td> email </td>
            <td><select name="email"></td>
        </tr>
        <tr>
            <td> mdp </td>
            <td><input type="text" name="mdp"></td>
        </tr-->
        <tr>
        <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit"
            <?= ($lExamen!=null)? ' name="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?>></td>        </tr>
    </table>
    <?= 
	($lExamen!=null)?'<input type="hidden" name="IDEXAMEN" value="'.$lExamen['IDEXAMEN'].'" >' : ''
	?>
</form>