<?php
    if(isset($_SESSION['id_facture']) && isset($_SESSION['id_ligne'])){
		$id_facture = $_SESSION['id_facture'] ;
		$id_ligne = $_SESSION['id_ligne'];
		
		$sql = "SELECT entetes.*,tiers.raison_sociale 
					from entetes 
						inner join tiers 
							on entetes.id_tiers=tiers.id 
							where entetes.id=$id_facture
								order by id";
		$reponse = $conn->prepare($sql);
		$reponse->execute();
		$factures = $reponse->fetchAll(PDO::FETCH_OBJ);
		
		$od ="SELECT lignes.*,tiers.raison_sociale 
				from lignes 
					inner join entetes 
						on lignes.id_facture=entetes.id 
							inner join tiers	
								on entetes.id_tiers=tiers.id
									where lignes.id = $id_ligne ";
		$reponse_od = $conn->prepare($od);	
		$reponse_od->execute();
		$lignes = $reponse_od->fetchAll(PDO::FETCH_OBJ);										

    }else if(isset($_SESSION['id_facture'])){
            $id_facture = $_SESSION['id_facture'] ;
            $sql = "SELECT entetes.*,tiers.raison_sociale 
		    			from entetes 
		    				inner join tiers 
		    					on entetes.id_tiers=tiers.id 
		    					where entetes.id=$id_facture
		    						order by id";

		    $reponse = $conn->prepare($sql);
		    $reponse->execute();
		    $factures = $reponse->fetchAll(PDO::FETCH_OBJ);

            $od ="SELECT lignes.*,tiers.raison_sociale 
		    		from lignes 
		    			inner join entetes 
		    				on lignes.id_facture=entetes.id 
		    					inner join tiers	
		    						on entetes.id_tiers=tiers.id
		    							where id_facture = $id_facture ";

		    $reponse_od = $conn->prepare($od);	
		    $reponse_od->execute();
		    $lignes = $reponse_od->fetchAll(PDO::FETCH_OBJ);		
	
		}else {
        $sql = "SELECT entetes.*,tiers.raison_sociale 
		    			from entetes 
		    				inner join tiers 
		    					on entetes.id_tiers=tiers.id 
		    						order by id";

		    $reponse = $conn->prepare($sql);
		    $reponse->execute();
		    $factures = $reponse->fetchAll(PDO::FETCH_OBJ);

            $od ="SELECT lignes.*,tiers.raison_sociale 
		    		from lignes 
		    			inner join entetes 
		    				on lignes.id_facture=entetes.id 
		    					inner join tiers	
		    						on entetes.id_tiers=tiers.id";

		    $reponse_od = $conn->prepare($od);	
		    $reponse_od->execute();
		    $lignes = $reponse_od->fetchAll(PDO::FETCH_OBJ);
    }
