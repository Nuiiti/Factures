<?php
      
    $lignes = $_POST["nb_lignes_all"] ; 
    $nblignes = $_POST["nb_lignes"] ; 
      
    for($i=1;$i<=$lignes;$i++){
      if(!empty($_POST['compte'.$i]) && !empty($_POST['lib'.$i]) && !empty($_POST['debit'.$i]) && !empty($_POST['credit'.$i]) && !empty($_POST['id_facture'.$i])) {
      $compte = $_POST['compte'.$i];
      $lib = $_POST['lib'.$i];
      $debit = $_POST['debit'.$i];
      $credit = $_POST['credit'.$i];
      $id_facture = $_POST['id_facture'.$i]; 
      
      $ligne = [':compte'.$i => $compte,':lib'.$i => $lib,':debit'.$i => $debit,':credit'.$i => $credit,':id_facture'.$i => $id_facture];
      
      $od = "INSERT INTO lignes(compte,lib,debit,credit,id_facture) 
                VALUES
                  (:compte$i,:lib$i,:debit$i,:credit$i,:id_facture$i)";  
      $req = $conn->prepare($od);
      if($req->execute($ligne)){
        $message = $nblignes." ligne/lignes ajoutée(s)";
      } 
    }  
  }
?>  
