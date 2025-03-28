<div class="updtuser hide" id="updtuser">
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td> photo de profil </td>
                <td><input type="file" name="PHOTO"  id = "PHOTO" accept=".jpg, .jpeg, .png"
                value="<?= ($lUsr!=null)?$lUsr['PHOTO']:'' ?>"></td>
            </tr>
            <tr>
                <td> Nom </td>
                <td><input type="text" name="NOM"
                value="<?= ($lUsr!=null)?$lUsr['NOM']:'' ?>"></td>
            </tr>
            <tr>
                <td> prenom </td>
                <td><input type="text" name="PRENOM"
                value="<?= ($lUsr!=null)?$lUsr['PRENOM']:'' ?>"></td>
            </tr>
            <tr>
                <td> email </td>
                <td><input type="email" name="EMAIL"
                value="<?= ($lUsr!=null)?$lUsr['EMAIL']:'' ?>"></td>
            </tr>
            <tr>
                <td> mdp </td>
                <td><input type="password" name="MDP"
                value="<?= ($lUsr!=null)?$lUsr['MDP']:'' ?>"></td>
            </tr>
            <tr>
            <td> type d'user </td>
            <td>
                <select name="type_user" id="type_user">
                    <option value="<?= ($lUsr!=null)?$lUsr['type_user']:'' ?>"><?= ($lUsr!=null)?$lUsr['type_user']:'' ?></option>
                </select>
            </td>
            </tr>
            <tr>
                <td> n° tel </td>
                <td><input type="number" name="NUMERO_TELEPHONE"
                value="<?= ($lUsr!=null)?$lUsr['NUMERO_TELEPHONE']:'' ?>"></td>
            </tr>
            <tr>
                <td><input type="reset" name="Annuler" value="Annuler"></td>
                <td><input type="submit"
                <?= ($lUsr!=null)? ' name="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?>></td>
            </tr>
        </table>
        <?= 
        ($lUsr!=null)?'<input type="hidden" name="IDUSER" value="'.$lUsr['IDUSER'].'" >' : ''
        ?>
    </form>
</div>