<?php
	// Method pour avoir accès aux lignes et aux entetes
	require_once "method/cons/cons_lignes.php";
?>
<div data-role="page" id="page_od_budgétaires">
	
	<form id="id_form_fact" method="post" action="" enctype="multipart/form-data">
		
		<?php 
			// Card Entete
			require_once "vues/card/card_entete_header.php";
		?>
		
		<!-- Tableau des entêtes -->
		<table class="table table-hover table-striped table-sm">
			<thead>
				<tr>
					<th colspan="7">Entête</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>ID</td>
					<td>Date</td>
					<td>Lib</td>
					<td>Ref</td>
					<td>Tiers</td>
					<td>ID_Tiers</td>
					<td></td>
				</tr>
				<?php foreach ($factures as $facture) : ?>
						<tr>
							<td td class="id_facture"><?= $facture->id; ?></td>
							<td><?= $facture->date ?></time></td>
							<td><?= $facture->lib ?></td>
							<td><?= $facture->ref ?></td>
							<td><?= $facture->raison_sociale ?></td>
							<td><?= $facture->id_tiers ?></td>
							<td>
								<div class="form-check"><input class="form-check-input" type="radio" name="facture" checked value="<?= $facture->id ?>"></div>
							</td>
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php
			// fin card entete
			require "vues/card/card_footer.php";
		?>
		<div class="adjust">
			<?php	
				// card ligne
				require_once "vues/card/card_ligne_header.php";
			?>
			<!-- Tableau des lignes -->
			<table id="id_lignes" class="table table-hover table-striped">
				<thead>
					<tr>
						<th colspan="7">Lignes</th>
					</tr>
				</thead>
				<tbody id="id_tab_voir">
					<tr>
						<td>ID</td>
						<td>Compte</td>
						<td>Libellé</td>
						<td>Tiers</td>
						<td>Débit</td>
						<td>Crédit</td>
						<td>ID Facture</td>
					</tr>
					<?php foreach ($lignes as $uneligne) : ?>
							<tr>
								<td><?= $uneligne->id; ?></td>
								<td><?= $uneligne->compte ?></td>
								<td><?= $uneligne->lib ?></td>
								<td><?= $uneligne->raison_sociale ?></td>
								<td><?= $uneligne->debit ?></td>
								<td><?= $uneligne->credit ?></td>
								<td><?= $uneligne->id_facture ?></td>
							</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
					
			<input type='submit' id='id_btn_avoirs' class='btn btn-secondary' value='Consulter les Avoirs' >
			<input  type="button" class="btn btn-secondary" id="export" value="exporter">

		</form>
	
		<?php
			// fin card entete
			require "vues/card/card_footer.php";
		?>
	</div>
</div>
