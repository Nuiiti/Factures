
<?php

	// Method pour voir les factures
	require_once "method/cons/cons_entete.php";
	
	// Method pour voir les tiers
	require_once "method/cons/cons_tiers.php";

	
	//Method pour ajouter à la bdd
	require_once "method/add/addtiers.php";
	
?>

	
	<div data-role="page">
		<?php 
			require_once "vues/card/card_entete_header.php"
		?>
		<form method="post" action="ajouter_facture.php" enctype="multipart/form-data">
			<table id="id_facture_fournisseurs" class="table table-hover table-striped table-sm">
				<thead>
					<tr>
						<th colspan="2">Entête</th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<td>Date</td>
						<td>
							<input type="date" name="date" id="id_date_fact" class="form-control " placeholder="" required>
						</td>
					</tr>
					<tr>
						<td>Libellé</td>
						<td>
							<input type="text" name="lib" id="id_lib_fact" class="form-control " placeholder="" required>
						</td>
					</tr>
					<tr>
						<td>Référence</td>
						<td>
							<input type="text" name="ref" id="id_ref_fact" class="form-control " placeholder="" required>
						</td>
					</tr>
					<tr>
						<td>ID Tiers</td>
						<td>
							<input type="text" name="id_tiers" id="id_id_tiers_fact" class="form-control " placeholder="" required>
						</td>
					</tr>
					<tr>
						<td>
							<div class="btn-group me-2" role="group" aria-label="Second group">
								<input type="submit" id="id_btn" class="btn btn-success" value="Enregistrer une entete">
							</div>
						</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</form>
		<?php
			// Fin card entête
			require "vues/card/card_footer.php";

			// Card tiers
			require_once "vues/card/card_tiers_header.php";

		?>

		<!-- Tableau des Tiers -->
		<form method="post" action="#" enctype="multipart/form-data">
			<table id="" class="table table-hover table-striped table-sm">
				<thead>
					<th colspan="2">Tiers</th>
				</thead>
				<tbody>
					<tr>
						<td>
							<label for="choix_tiers">Ajouter/List des tiers:</label>
							<input type="text" list="mesTiers" name="tiers" name="choix_tiers" id="choix_tiers" class="form-control" placeholder="id tiers" required>

							<datalist id="mesTiers">

								<?php foreach ($lestiers as $untiers) : ?>
									<option><?= $untiers->id; ?> <?= $untiers->raison_sociale ?></option>
								<?php endforeach; ?>
							</datalist>
						</td>
						<td>
							<label for="choix_entetes">Liste des entetes:</label>
							<input type="text" list="mesentetes" name="choix_entetes" id="choix_entetes" class="form-control" placeholder="id date lib tiers id_tiers">

							<datalist id="mesentetes">
								<?php foreach ($factures as $facture) :?>
									<option><?= $facture->id; ?> <?= $facture->date ?> <?= $facture->lib ?> <?= $facture->raison_sociale ?> <?= $facture->id_tiers ?></option>
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
		<?php 
			//Fin card Tiers
			require "vues/card/card_footer.php";
		?>
	</div>


