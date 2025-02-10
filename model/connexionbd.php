<?php

    $nom_serveur = "localhost";
    $nom_base_de_donnes = "gestion_stock";
    $utilisateur = "root";
    $motpass = "";

    try {
        $connexion = new PDO("mysql:host$nom_serveur;dbname=$nom_base_de_donnes", $utilisateur, $motpass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connexion;
    } catch (Exception $e) {
        die("Erreur de connexion : ". $e->getMessage());
    }
?>