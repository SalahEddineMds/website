<?php
include("connexionbd.php");

// Create a new sale with no client assigned yet
$sql = "INSERT INTO vente (id_client, total, date_vente, etat) VALUES (3, 0, NOW(), 1)";
$req = $connexion->prepare($sql);
$req->execute();

if ($req->rowCount() > 0) {
    $id_vente = $connexion->lastInsertId();
    header("Location: ../vue/vente.php?id_vente=" . $id_vente);
    exit;
} else {
    $_SESSION["message"]["text"] = "Erreur lors de la création de la vente.";
    $_SESSION["message"]["type"] = "danger";
    header("Location: ../vue/vente.php");
    exit;
}
?>
