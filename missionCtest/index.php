	<?php
	session_start();
	
	// Connexion à la bdd facture
	require_once "connexion/connexionbdd.php";

	// Head
	require_once "vues/head.php";

	// Get l'url
	$url = '';
	if (isset($_GET['url'])) {
		$url = $_GET['url'];
	}
	
	// Gestion du Header
	if ($url == '') {
	}else if ($url == 'consulter') {
	}else if ($url == 'modifier') {
	}else if ($url == 'ajouter') {
	}else{	
		 require_once "vues/header.php";
	}

	// Page d'accueil	
	if ($url == '') {
		require 'vues/home.php';
		
	
	// <  ---------------------- Consulter -------------------------------	> 

	// Page des consultations de factures
	} elseif (preg_match('#consulter/factures#', $url)) {
		require 'vues/consulter/factures.php';

	// Page des consultations d'avoirs	
	} elseif (preg_match('#consulter/avoirs#', $url)) {
		require 'vues/consulter/avoirs.php';

	// Page des consultations des tiers	
	} elseif (preg_match('#consulter/tiers#', $url)) {
		require 'vues/consulter/tiers.php';
	
	} elseif (preg_match('#consulter/lignes#', $url)) {
		require 'vues/consulter/lignes.php';

	// Page de consultation de lignes par rapport à une facture	
	} elseif (preg_match('#consulter/facture/lignes/id_fact/([0-9]+)#', $url, $params)) {
		$id_facture = $params[1];
		$_SESSION['id_facture'] = $id_facture;
		require 'vues/consulter/lignes.php'; 
		

	// Page de consultation des avoirs par rapport à une facture	
	} elseif (preg_match('#consulter/facture/avoirs/id_fact/([0-9]+)#', $url, $params)) {
		$id_facture = $params[1];
		$_SESSION['id_facture'] = $id_facture;
		require 'vues/consulter/avoirs.php'; 	
		
	// <  ----------------------- Modifier -------------------------------  >
	
	// Page de modif des entetes
	} elseif (preg_match('#modifier/facture/entete/id_fact/([0-9]+)#', $url, $params)) {
		$id_facture = $params[1];
		$_SESSION['id_facture'] = $id_facture;
		require 'vues/modifier/modifier_entete.php';	
	
	// Page de modification d'une ligne
	} elseif (preg_match('#modifier/facture/ligne/id_fact/([0-9]+)/id_ligne/([0-9]+)#', $url, $params)) {
		$id_facture = $params[1];
		$id_ligne = $params[2];
		$_SESSION['id_facture'] = $id_facture;
		$_SESSION['id_ligne'] = $id_ligne;
		require 'vues/modifier/modifier_uneligne.php';		

	// Page de selection des lignes à modifier
	} elseif (preg_match('#modifier/facture/ligne/id_fact/([0-9]+)#', $url, $params)) {
		$id_facture = $params[1];
		$_SESSION['id_facture'] = $id_facture;
		require 'vues/modifier/modifier_lignes.php';	

	// Page de modif de factures
	} elseif (preg_match('#modifier/facture#', $url)) {
		require 'vues/modifier/modifier_factures.php';

		


	// <  ----------------------- Ajouter --------------------------------  >
	
	// Page d'ajout d'entêtes
	} elseif (preg_match('#ajouter/facture/entete#', $url)) {
	require 'vues/ajouter/ajouter_entete.php';

	// Page d'ajout de lignes
	} elseif (preg_match('#ajouter/facture/ligne#', $url)) {
	require 'vues/ajouter/ajouter_ligne.php';
	
	// Page d'ajout de factures
	} elseif (preg_match('#ajouter/facture#', $url)) {
		require 'vues/ajouter/ajouter_facture.php';
	
	
	//---------------------------Home ------------------------------------  >	
	
	// Home Consulter
	} elseif (preg_match('#consulter#', $url)) {
		require 'vues/consulter/consulter.php';
		
	// Home Modifier
	} elseif (preg_match('#modifier#', $url)) {
		require 'vues/modifier/modifier.php';
		
	// Home Ajouter
	} elseif (preg_match('#ajouter#', $url)) {
		require 'vues/ajouter/ajouter.php';
		
	} else {
		echo "erreur 404";
	}
	session_destroy();
	
	?>
	</body>

	</html>