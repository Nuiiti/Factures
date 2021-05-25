<?php
    if (isset($_POST['id']) && isset($_POST['date']) && isset($_POST['lib']) && isset($_POST['ref']) && isset($_POST['id_tiers'])) {
        
        $id = $_POST['id'];
        $date_fact = $_POST['date'];
        $lib = $_POST['lib'];
        $ref = $_POST['ref'];
        $id_tiers = $_POST['id_tiers'];
    
       $entete = [':id' => $id, ':date_fact' => $date_fact, ':lib' => $lib, ':ref' => $ref, ':id_tiers' => $id_tiers];
    
        $sql = "UPDATE entetes SET id=:id, date=:date_fact, lib=:lib, ref=:ref, id_tiers=:id_tiers where id=:id";
        $req = $conn->prepare($sql);
    
        $req->execute($entete);
        $message = "$ref modifié !";
    }
    ?>