
    <?php
    include_once "connexion/connexionbdd.php";

    if (isset($_POST['date']) && isset($_POST['lib']) && isset($_POST['ref']) && isset($_POST['id_tiers'])) {

        $date_fact = $_POST['date'];
        $lib = $_POST['lib'];
        $ref = $_POST['ref'];
        $id_tiers = $_POST['id_tiers'];

        $entete = [':date_fact' => $date_fact, ':lib' => $lib, ':ref' => $ref, ':id_tiers' => $id_tiers];

        $sql = "INSERT INTO entetes(date,lib,ref,id_tiers) VALUES(:date_fact,:lib,:ref,:id_tiers)";
        $req = $conn->prepare($sql);

        if ($req->execute($entete)) {
            $message = "$ref ajoutée !";
            
        }
    }
    ?>
