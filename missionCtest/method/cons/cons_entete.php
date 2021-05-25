<?php
	if(isset($_GET['tiers'])){
		$id_tiers = $_GET['tiers'];
    	$sql = "SELECT entetes.*,tiers.raison_sociale 
					from entetes 
						inner join tiers 
							on entetes.id_tiers=tiers.id 
								where id_tiers=$id_tiers
									order by id";

		$reponse = $conn->prepare($sql);
		$reponse->execute();
		$factures = $reponse->fetchAll(PDO::FETCH_OBJ);
	}else{
		$sql = "SELECT entetes.*,tiers.raison_sociale 
					from entetes 
						inner join tiers 
							on entetes.id_tiers=tiers.id 
								order by id";

		$reponse = $conn->prepare($sql);
		$reponse->execute();
		$factures = $reponse->fetchAll(PDO::FETCH_OBJ);
	}	