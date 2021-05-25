
<?php
    if(isset($_POST['facture'])){
	    $id = $_POST['facture'];
        
        $sql = "DELETE FROM entetes WHERE id=$id";
        $sth = $conn->prepare($sql);
        if($sth->execute()){
            $message = "La facture $id a bien été supprimé";
        }
        
        // Supprimer les lignes en fonction de l'id de la facture
        $sql = "DELETE FROM lignes WHERE id_facture=$id";
        $sth = $conn->prepare($sql);
        if($sth->execute()){
            $messagelignes = "Les lignes ont bien été supprimés" ; 
        }
    }
?>