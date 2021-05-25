<?php

    if(isset($_POST['ligne'])){
	    $id = $_POST['ligne'];
        
        // Supprimer les lignes 
        $sql = "DELETE FROM lignes WHERE id=$id";
        $sth = $conn->prepare($sql);
        $sth->execute();
        $type = "DELETE SUCCESS";
        $message = "Ligne $id supprimée !"; 
   }
?>