
<?php
	// Method pour avoir accès aux factures
	require_once "method/cons/cons_tiers.php";
?>


<div data-role="page" id="page_tiers">
	<?php 
		// Card Tiers
		require_once "vues/card/card_entete_header.php";

	?>
	<form id="id_form_fact" method="get" action="" enctype="multipart/form-data">
		<table id='id_liste_entetes' class='table table-hover table-striped table-sm'>
			<thead>
				<tr>
					<th colspan='3'>Liste des Tiers</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>ID</td>
					<td>Raison Sociale</td>
					<td></td>

				</tr>
				<?php foreach ($lestiers as $untiers) : ?>
					<tr>
						<td td class="id_facture"><?= $untiers->id; ?></td>
						<td><?= $untiers->raison_sociale ?></td>
						<td>
							<div class="form-check"><input class="form-check-input" type="radio" name="tiers" value="<?= $untiers->id ?>"></div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class='btn-group me-2' role='group' aria-label='Second group'>
			<input type='submit' id='id_btn_tiers_fact' class='btn btn-secondary' value="Consulter les factures" disabled>
		</div>
		<div class='btn-group me-2' role='group' aria-label='Second group'>
			<input type='submit' id='id_btn_tiers_avoirs' class='btn btn-secondary' value="Consulter les Avoirs" disabled>
		</div>
	</form>
	<?php 
		// Fin card entete
		require_once "vues/card/card_footer.php";

	?>
</div>
