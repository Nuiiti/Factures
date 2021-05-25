<?php

    if(isset($_POST['id1']) && isset($_POST['compte1']) && isset($_POST['lib1']) && isset($_POST['debit1']) && isset($_POST['credit1']) && isset($_POST['id_facture1'])) {

        $id = $_POST['id1'];
        $compte = $_POST['compte1'];
        $lib = $_POST['lib1'];
        $debit = $_POST['debit1'];
        $credit = $_POST['credit1'];
        $id_facture = $_POST['id_facture1'];

        $ligne = [':id' => $id, ':compte' => $compte, ':lib' => $lib, ':debit' => $debit, ':credit' => $credit, ':id_facture' => $id_facture];
        $sql = "UPDATE lignes SET id=:id ,compte=:compte, lib=:lib, debit=:debit, credit=:credit, id_facture=:id_facture where id=:id";
        $req = $conn->prepare($sql);
        $req->execute($ligne);
        $type = "EDIT SUCCESS";
        $message = " La ligne $id a bien été modifiée !";
        
    }
    
    