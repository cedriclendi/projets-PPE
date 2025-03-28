<h3>Ajout d'une nouveau moniteur</h3>

<form method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td> photo de profil </td>
            <td><input type="file" name="PHOTO"  id = "PHOTO" accept=".jpg, .jpeg, .png"
            value="<?= ($leMoniteur!=null)?$leMoniteur['PHOTO']:'' ?>"></td>
        </tr>
        <tr>
            <td> Nom </td>
            <td><input type="text" name="NOM"
            value="<?= ($leMoniteur!=null)?$leMoniteur['NOM']:'' ?>"></td>
        </tr>
        <tr>
            <td> prenom </td>
            <td><input type="text" name="PRENOM"
            value="<?= ($leMoniteur!=null)?$leMoniteur['PRENOM']:'' ?>"></td>
        </tr>
        <!--tr>
            <td> Qualification </td>
            <td><input type="text" name="qualification"></td>
        </tr-->
        <!--tr>
            <td> Statut </td>
			<td> 
                <select name="Statut" >
					<option value="Salarié">Salarié</option>
					<option value="Auto entrepreneur">Auto entrepreneur(independant)</option>
				</select>
			</td>
        </tr-->
        <tr>
            <td> email </td>
            <td><input type="email" name="EMAIL"
            value="<?= ($leMoniteur!=null)?$leMoniteur['EMAIL']:'' ?>"></td>
        </tr>
        <tr>
            <td> mdp </td>
            <td><input type="password" name="MDP"
            value="<?= ($leMoniteur!=null)?$leMoniteur['MDP']:'' ?>"></td>
        </tr>
        <tr>
            <td>retapez mdp </td>
            <td><input type="password" name="MDP2"
            value=""></td>
        </tr>
        <tr>
        <td> type d'user </td>
        <td>
            <select name="type_user" id="type_user">
                    <option value="moniteur">moniteur</option>
        </select>
        </td>
        </tr>
        <tr>
            <td> n° tel </td>
            <td><input type="number" name="NUMERO_TELEPHONE"
            value="<?= ($leMoniteur!=null)?$leMoniteur['NUMERO_TELEPHONE']:'' ?>"></td>
        </tr>
        <tr>
            
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit"
            <?= ($leMoniteur!=null)? ' name="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?>></td>
        </tr>
    </table>
    <?= 
	($leMoniteur!=null)?'<input type="hidden" name="IDUSER" value="'.$leMoniteur['IDUSER'].'" >' : ''
	?>
</form>