<h3>Ajout d'une nouveau condidats</h3>

<form method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td> photo de profil </td>
            <td><input type="file" name="PHOTO"  id = "PHOTO" accept=".jpg, .jpeg, .png"
            value="<?= ($leCandidat!=null)?$leCandidat['PHOTO']:'' ?>"></td>
        </tr>
        <tr>
            <td> Nom </td>
            <td><input type="text" name="NOM"
            value="<?= ($leCandidat!=null)?$leCandidat['NOM']:'' ?>"></td>
        </tr>
        <tr>
            <td> prenom </td>
            <td><input type="text" name="PRENOM"
            value="<?= ($leCandidat!=null)?$leCandidat['PRENOM']:'' ?>"></td>
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
            value="<?= ($leCandidat!=null)?$leCandidat['EMAIL']:'' ?>"></td>
        </tr>
        <tr>
            <td> mdp </td>
            <td><input type="password" name="MDP"
            value="<?= ($leCandidat!=null)?$leCandidat['MDP']:'' ?>"></td>
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
                <option value="candidat">candidat</option>
            </select>
        </td>
        </tr>
        <tr>
            <td> n° tel </td>
            <td><input type="number" name="NUMERO_TELEPHONE"
            value="<?= ($leCandidat!=null)?$leCandidat['NUMERO_TELEPHONE']:'' ?>"></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit"
            <?= ($leCandidat!=null)? ' name="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?>></td>
        </tr>
    </table>
    <?= 
	($leCandidat!=null)?'<input type="hidden" name="IDUSER" value="'.$leCandidat['IDUSER'].'" >' : ''
	?>
</form>