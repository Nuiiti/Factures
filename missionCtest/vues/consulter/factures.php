<?php
	// Method pour avoir accès aux factures
	require_once "method/cons/cons_entete.php";
?>
<div data-role="page" id="page_factures">
	<?php 
		// card
		require_once "vues/card/card_entete_header.php";
	?>
	<form id="id_form_fact" method="get" action="" enctype="multipart/form-data">
		<table id='id_liste_entetes' class='table table-hover table-striped table-sm'>
			<thead>
				<tr>
					<th colspan='7'>Liste des factures</th>
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
				<?php if (isset($_GET['tiers'])) { ?>
					<!-- Afficher factures par rapport venant de la page tiers -->
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
				<?php } else { ?>
					<!-- Consulter Facture -->
					<?php foreach ($factures as $facture) : ?>
						<tr>
							<td td class="id_facture"><?= $facture->id; ?></td>
							<td><?= $facture->date ?></time></td>
							<td><?= $facture->lib ?></td>
							<td><?= $facture->ref ?></td>
							<td><?= $facture->raison_sociale ?></td>
							<td><?= $facture->id_tiers ?></td>
							<td>
								<div class="form-check"><input class="form-check-input" type="radio" name="facture" value="<?= $facture->id ?>"></div>
							</td>
						</tr>
					<?php endforeach;?>
				<?php } ?>
			</tbody>
		</table>
			<table>
				<tr>
					<td><a href="" id='id_btn_od' class='btn btn-secondary'>Consulter les lignes</a></td>
					<td></td>
					<td><a href="" id='id_btn_avoirs' class='btn btn-secondary'>Consulter les Avoirs</a></td>
				</tr>
			</table>
		
	</form>
</div>
<?php
	require "vues/card/card_footer.php";
?>
