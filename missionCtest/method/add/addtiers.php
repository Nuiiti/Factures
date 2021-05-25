<?php
include_once "connexion/connexionbdd.php";
	if(isset($_POST['tiers'])){
		$tiers_rs = $_POST['tiers'];
	
		$tiers = "INSERT INTO tiers(raison_sociale) VALUES(:raison_sociale)";
		$req = $conn->prepare($tiers);
		$req->execute([':raison_sociale' => $tiers_rs]);
		$message = $tiers_rs." a bien été ajouter";
	}
?>