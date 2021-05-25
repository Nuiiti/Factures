<?php

    $tiers = "select * from tiers order by id";

    
    $reponse = $conn->prepare($tiers);
    $reponse->execute();
    $lestiers = $reponse->fetchAll(PDO::FETCH_OBJ);
?>