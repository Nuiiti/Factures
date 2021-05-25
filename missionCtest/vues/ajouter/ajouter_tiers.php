<!DOCTYPE html>
<html>
<?php
// Head
require_once "../head.php";

// Method pour ajouter un tiers
require_once "../../method/add/addtiers.php";

// Method pour voir les factures
require_once "../../method/cons/facturescons.php";

// Header
require_once "../header.php";
?>
<table class="tablesuccess">
	<tbody>
		<tr>
			<td><a class="btn btn-secondary" href="../ajouter/ajouter_entete.php">Ajouter une entête</a></td>
			<td><a class="btn btn-secondary" href="../ajouter/ajouter_ligne.php">Ajouter une/des ligne(s)</a></td>
		</tr>	
		<?php
			if (isset($message)) {
				echo '<tr>';
				echo 	'<td colspan="2">';
				echo		'<div class="arrondir" id="flip">SUCCESS</div>';
				echo		'<div class="arrondir" id="panel">'.$message.'</div>';	
				echo	'</td>';
				echo '</tr> ';
			}
		?>
	</tbody>
</table>
<form method="post" action="#" enctype="multipart/form-data">
	<table id="" class="table table-hover table-striped dimtab table-sm">
		<thead>
			<th colspan="2">Tiers</th>
		</thead>
		<tbody>
			<tr>
				<td>
					<label for="choix_tiers">Ajouter un tiers:</label>
					<input type="text" list="mesTiers" name="tiers" name="choix_tiers" id="choix_tiers" class="form-control" placeholder="id tiers" required>
					<datalist id="mesTiers">
						<?php foreach ($factures as $facture) : ?>
							<option><?= $facture->id_tiers; ?> <?= $facture->raison_sociale ?></option>
						<?php endforeach; ?>
					</datalist>
				</td>
			</tr>
			<tr>
				<td>

					<input type="submit" id="id_btn_add_tiers" class="btn btn-success" value="Ajouter tiers">

				</td>
			</tr>
		</tbody>
	</table>
</form>
</div>



</body>

</html>