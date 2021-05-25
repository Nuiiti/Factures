		<?php
		// Method pour avoir accès aux infos de la bdd
		require_once "method/cons/cons_lignes.php";
		?>

		<div data-role="page" id="page_lignes_add">
			<form method="post" action="ajouter_facture.php">
				<?php
				require_once "vues/card/card_entete_header.php";
				?>
				<!-- Tableau des entêtes de factures -->
				<table id="" class="table table-hover table-striped table-sm">
					<thead>
						<tr>
							<th colspan="7">Facture</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<select name="selectentete" id="id_select_entete">
									<option selected>Choisir une facture</option>;
									<?php foreach ($factures as $facture) : ?>
										<option value="<?= $facture->id ?>"><?= $facture->id ?> <?= $facture->ref ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
				<?php
				require "vues/card/card_footer.php";

				require_once "vues/card/card_ctrl_header.php";
				?>
				<!-- Tableau Contrôle -->
				<table id="id_tab_ctrl" class="table table-hover table-striped table-sm">
					<thead>
						<tr>
							<th colspan="2">Contrôle</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Débit</td>
							<td>
								<input type="text" id="id_debit_ctrl" class="form-control" placeholder="">
							</td>
						</tr>
						<tr>
							<td>Crédit </td>
							<td>
								<input type="text" id="id_credit_ctrl" class="form-control" placeholder="">
							</td>
						</tr>
						<tr>
							<td>Différence</td>
							<td>
								<input type="text" id="id_diff_ctrl" class="form-control " placeholder="">
							</td>
						</tr>
						<tr>
							<td>Nombre de lignes</td>
							<td>
								<input type="text" id="id_nb_lignes" name="nb_lignes" class="form-control " placeholder="">
							</td>
						</tr>
					</tbody>
				</table>

				<?php
				require "vues/card/card_footer.php";

				require_once "vues/card/card_ligne_header.php";
				?>
				
				<!-- Tableau des lignes -->
				<table id="id_tab_od" class="table table-hover table-striped">
					<thead>
						<tr>
							<th colspan="5">Lignes</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Compte</td>
							<td>Libellé</td>
							<td>Débit</td>
							<td>Crédit</td>
							<td>ID Facture</td>
						</tr>

						<tr id="id_model" class="ligne" name="ligne">
							<td>
								<input name="compte" type="text" class="form-control" required>
							</td>
							<td>
								<input name="lib" type="text" class="form-control" required>
							</td>
							<td>
								<input name="debit" type="text" class="form-control debit" name="name_debit" required>
							</td>
							<td>
								<input name="credit" type="text" class="form-control credit" required>
							</td>
							<td>
								<input name="id_facture" type="text" class="form-control id_facture" required>
							</td>
							<td>
								<a><img class='icone2' src='../../img/fermer.png'></a>
							</td>
						</tr>
						<tr id="id_add">
							<td class="centre" id="id_addtd">
								<a><img class="icone" src="../../img/ajouter.png"></a>
							</td>
						</tr>
					</tbody>
				</table>		
				<!-- Bouton ajouter lignes -->
				<input type="submit" id="id_btn_ligne" class="btn btn-success" value="Enregistrer">				

				<?php
					require "vues/card/card_footer.php";
				?>
				<div class="basgauche">
					<!-- Compteur total de lignes -->
					<input type="text" id="id_nb_lignes_all" name="nb_lignes_all" value="">
				</div>							
			</form>


		</div>

		.card_position_ctrl {
	position: absolute; 
	margin: 0 auto;
	top: 170px;
	left: 1200px;
}