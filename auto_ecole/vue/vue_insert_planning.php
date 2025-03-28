<h3>Ajout d'une nouveau plannings</h3>

<form method="post">
    <table>
        <tr>
            <td> lecon </td>
            <td>
                <select name="IDLECON" id="">
                <?php
				foreach($lesLecons as $UneLecon){
					echo "<option value='".$UneLecon['IDLECON']."'>";
					echo $UneLecon['TYPE_DE_LECON']; 
					echo "</option>";

				}
				?>
                </select>
            </td>
        </tr>
        <tr>
            <td> candidat </td>
            <td>
                <select name="IDUSER_1" id="">
                <?php
				foreach ($lesCandidats as $UnCandidat){
					echo "<option value='".$UnCandidat['IDUSER']."'>";
					echo $UnCandidat['NOM']; 
					echo "</option>";

				}
				?>
                </select>
            </td>
        </tr>
        <tr>
            <td> date et heure debut</td>
            <td><input type="date" name="DATEHEURDEBUR"></td>
        </tr>
        <tr>
            <td> moniteur </td>
            <td>
                <select name="IDUSER_2" id="">
                <?php
				foreach ($lesMoniteurs as $UnMoniteur){
					echo "<option value='".$UnMoniteur['IDUSER']."'>";
					echo $UnMoniteur['NOM']; 
					echo "</option>";

				}
				?>
                </select>
            </td>
        </tr>
        <tr>
            <td> date et heure fin</td>
            <td><input type="date" name="DATEFINHEUR"></td>
        </tr>
        <tr>
            <td> etat </td>
            <td>
                <select name="ETAT" id="">
                    <option value="annule">annule</option>
                    <option value="valide">valide</option>
                    <option value="en attente">en attente</option>
                </select>
            </td>
        </tr>
        <tr>
        <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit"
            <?= ($lePlanning!=null)? ' name="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?>></td>        </tr>
    </table>
    <?= 
	($lePlanning!=null)?'<input type="hidden" name="IDPLANNING" value="'.$lePlanning['IDPLANNING'].'" >' : ''
	?>
</form>