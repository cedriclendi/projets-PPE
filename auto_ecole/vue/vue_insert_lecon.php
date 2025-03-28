<h3>Ajout d'une nouveau lecon</h3>

<form method="post">
    <table>
        <tr>
            <td> type de lecon </td>
            <td><input type="text" name="TYPE_DE_LECON"
			value="<?= ($laLecon!=null)?$laLecon['TYPE_DE_LECON']:'' ?>"></td>
        </tr>
        <tr>
            <td> description </td>
            <td><input type="text" name="DESCRIPTION"
			value="<?= ($laLecon!=null)?$laLecon['DESCRIPTION']:'' ?>"></td>
        </tr>
        <tr>
            <td> titre </td>
            <td><input type="text" name="TITRE"
			value="<?= ($laLecon!=null)?$laLecon['TITRE']:'' ?>"></td>
        </tr>
        <tr>
			<td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit"
            <?= ($laLecon!=null)? ' name="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?>></td>      
		</tr>
    </table>
	<?= 
	($laLecon!=null)?'<input type="hidden" name="IDLECON" value="'.$laLecon['IDLECON'].'" >' : ''
	?>
</form>