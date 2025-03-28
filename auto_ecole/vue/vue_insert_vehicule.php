<h3>Ajout d'une nouvelle Vehicule</h3>

<form method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td> image </td>
            <td><input type="file" name="IMGVEHICULE"  id = "IMGVEHICULE" accept=".jpg, .jpeg, .png"
            value="<?= ($leVehicule!=null)?$leVehicule['IMGVEHICULE']:'' ?>"></td>
        </tr>
        <tr>
            <td> marque </td>
            <td><input type="text" name="MARQUE"
            value="<?= ($leVehicule!=null)?$leVehicule['MARQUE']:'' ?>"></td>
        </tr>
        <tr>
            <td> modele </td>
            <td><input type="text" name="MODELE"
            value="<?= ($leVehicule!=null)?$leVehicule['MODELE']:'' ?>"></td>
        </tr>
        <tr>
            <td> immatriculation </td>
            <td><input type="text" name="IMMATRICULATION"
            value="<?= ($leVehicule!=null)?$leVehicule['IMMATRICULATION']:'' ?>"></td>
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
            <?= ($leVehicule!=null)? ' name="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?>></td>
        </tr>
    </table>
    <?= 
	($leVehicule!=null)?'<input type="hidden" name="IDVEHICULE" value="'.$leVehicule['IDVEHICULE'].'" >' : ''
	?>
</form>