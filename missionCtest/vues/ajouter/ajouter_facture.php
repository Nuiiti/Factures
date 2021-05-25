<div>
	<?php
	require_once "connexion/connexionbdd.php";
	if (isset($_POST['date']) && isset($_POST['lib']) && isset($_POST['ref']) && isset($_POST['id_tiers'])) {
		require_once	"method/add/addentete.php";
	} else if (isset($_POST['compte1']) && isset($_POST['lib1']) && isset($_POST['debit1']) && isset($_POST['credit1']) && isset($_POST['id_facture1'])) {
		require_once "method/add/addligne.php";
	}
	?>
		
			
  		

		  
	<div class="container">
			<?php if (isset($message)) { ?>
				<div>	
					<div class="arrondir" id="flip">SUCCESS</div>
					<div class="arrondir" id="panel"><?= $message ?></div>
				</div>
			<?php } ?>
  		<div class="link">
    		<div class="text"><a class="btn btn-secondary" href="http://localhost/missionCtest/ajouter/facture/entete">Ajouter une entête</a></div>
  		</div>
  		<div class="link">
    		<div class="text"><a class="btn btn-secondary" href="http://localhost/missionCtest/ajouter/facture/ligne">Ajouter des lignes</a></div>
  		</div>   
	</div>
	
		
		
			
		
	
	
	
	
	
	
	



