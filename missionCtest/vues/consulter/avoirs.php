<?php
	// Method pour avoir accès aux factures
	require_once "method/cons/cons_avoirs.php";
?>

<div data-role="page" id="page_avoirs">
	<?php 
		// card
		require_once "vues/card/card_entete_header.php";
	?>
	<form method="get" action="lignes.php">
		<!-- Tableau des entêtes -->
		<table id="" class="table table-hover table-striped table-sm">
			<thead>
				<tr>
					<th colspan="7">Entête</th>
				</tr>
			</thead>
			<tbody>
			
			<?php if(!empty( $_SESSION['id_facture'])){ ?>
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
						<td td class="id_facture"><?= $facture->id ?></td>
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
				
			<?php }else { ?>
				<tr>
					<td>
						<select id="id_select_fact_avoir" name="select_avoir">
							<option selected>Choisir une facture</option>
							<?php foreach ($factures as $facture) : ?>
							<option value="<?= $facture->id; ?>"><?= $facture->ref; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
			<?php } ?>			
			</tbody>
		</table>
		<?php
		if (isset($id)) { ?>
			<div class='btn-group me-2' role='group' aria-label='Second group'>
				<input type='submit' id='id_btn_od' class='btn btn-secondary' value='Consulter les OD'>
			</div>
		<?php } else { ?>
			<div class='btn-group me-2' role='group' aria-label='Second group'>
				<input type='submit' id='id_btn_od' class='btn btn-secondary' value='Consulter les OD' >
			</div>
		<?php } ?>
	</form>
	<?php
		// Fin card entete
		require "vues/card/card_footer.php";
		
		// Card avoirs
		require_once "vues/card/card_avoir_header.php";
	?>
	<table id="id_avoirs" class="table table-hover table-striped table-sm">
		<thead>
			<tr>
				<th colspan="2">Avoirs</th>
			</tr>
		</thead>
		<tbody class="tbodyavoir">
			<?php if(!empty( $_SESSION['id_facture'])){ ?>
				<?php foreach ($lignes as $uneligne) : ?>
				<?php $avoir = $uneligne->credit - $uneligne->debit ; ?>
					<tr>
					<td>Tiers</td>
					<td><?= $uneligne->raison_sociale ?></td>
					</tr>
					<tr>
						<td>Débit</td>
						<td id="debit"><?= $uneligne->debit ?></td>
					</tr>
					<tr>
						<td>Crédit</td>
						<td id="id_credit"><?= $uneligne->credit ?></td>
					</tr>
					<tr>
						<td>Avoir</td>
						<td id='id_avoir'><?= $avoir ?></td>
					</tr>
				<?php endforeach; ?>
			
			<?php } else { ?>
				<?php foreach ($lignes as $uneligne) : ?>
					<?php $avoir =  $uneligne->credit - $uneligne->debit ?>
					<tr name='av' class='<?= $uneligne->id ?>'>
						<td>Tiers</td>
						<td class='<?= $uneligne->id ?>'><?= $uneligne->raison_sociale ?><td>
					</tr>
					<tr name='av' class='<?= $uneligne->id ?>'>
						<td>Débit</td>
						<td id='debit'class='<?= $uneligne->id ?>'><?= $uneligne->debit ?></td>
					</tr>
					<tr name='av' class='<?= $uneligne->id ?>'>
						<td>Crédit</td>
						<td id='id_debit_credit'class='<?= $uneligne->id ?>'><?= $uneligne->credit ?></td>
					</tr>
					<tr name='av' class='<?= $uneligne->id ?>'>
						<td>Avoir</td>
					
						<td id='id_debit_avoir' class='<?= $uneligne->id ?>'><?= $avoir?></td>
					</tr>
					<tr name='av' class='<?= $uneligne->id ?>'>
					</tr>
					<?php endforeach; ?>
			<?php } ?>
		</tbody>
	</table>
	<?php
		// fin card entete
		require_once "vues/card/card_footer.php";
	?>
</div>
