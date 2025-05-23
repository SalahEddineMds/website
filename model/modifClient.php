<?php
    include("connexionbd.php");
    if (!empty($_POST["nom"])
        && !empty($_POST["prenom"])
        && !empty($_POST["telephone"])
        && !empty($_POST["adresse"])
        && !empty($_POST["id"])) {

            // check client si client par default
            if ($_POST["id"] == 1 && $_POST["nom"] == "Client" && $_POST["prenom"] == "Default") {
                $_SESSION["message"]["text"] = "Le client par défaut ne peut pas être modifié.";
                $_SESSION["message"]["type"] = "danger";
                header("Location: ../vue/client.php");
                exit;
            }

        $sql = "UPDATE client SET nom=?, prenom=?, telephone=?, adresse=?
                WHERE id=?";
            $req = $connexion->prepare($sql);

            $req->execute(array(
                $_POST["nom"],
                $_POST["prenom"],
                $_POST["telephone"],
                $_POST["adresse"],
                $_POST["id"]
                ));

                if ($req->rowCount()!=0) {
                    $_SESSION["message"]["text"] = "Client modifié avec succès";
                    $_SESSION["message"]["type"] = "success";
                } else {
                    $_SESSION["message"]["text"] = "Rien a été modifié";
                    $_SESSION["message"]["type"] = "warning";
                }
                
    } else {
        $_SESSION["message"]["text"] = "Une information obligatoire non renseignée";
        $_SESSION["message"]["type"] = "danger";
    }

    header("Location: ../vue/client.php");
?>