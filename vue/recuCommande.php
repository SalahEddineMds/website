<?php 
    include("entete.php");

    if (!empty($_GET["id"])) {
        $commandes = getCommande($_GET["id"]);
    }
?>

<div class="home-content">

        <button class="hidden-print" id="btnPrint" style="position:relative; left:42%;"><i class='bx bx-printer' ></i> Imprimer</button>

    <div class="page">
        <div class="cote-a-cote">
            <h2>MonStock stock</h2>
            <div>
                <p>Reçu N° #: <?= $commandes["id"]?> </p>
                <p>Date: <?= date("d/m/Y H:i:s", strtotime($commandes["date_commande"]))?> </p>
            </div>
        </div>
        <div class="cote-a-cote" style="width: 50%;">
            <p>Nom: </p>
            <p><?=$commandes["nom"]. " ".$commandes["prenom"] ?></p>
        </div>
        <div class="cote-a-cote" style="width: 50%;">
            <p>Téléphone: </p>
            <p><?=$commandes["telephone"]?></p>
        </div>
        <div class="cote-a-cote" style="width: 50%;">
            <p>Adresse: </p>
            <p><?=$commandes["adresse"]?></p>
        </div>

        <br>

        <table class="mtable">
                <tr>
                    <th>Désignation</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Prix total</th>
                </tr>
                    <tr>
                        <td><?=$commandes["nom_article"]?></td>
                        <td><?=$commandes["quantite"]?></td>
                        <td><?=$commandes["prix_unitaire"]?></td>
                        <td><?=$commandes["prix"]?></td>
                    </tr>    
            </table>
    </div>
    
</div>

</section>

<?php 
    include("pied.php");
?>

<script>
    var btnPrint =document.querySelector("#btnPrint");
    btnPrint.addEventListener("click", () => {
       window.print(); 
    });

    function setPrix() {
        var article = document.querySelector("#id_article");
        var quantite = document.querySelector("#quantite");
        var prix = document.querySelector("#prix");

        var prixUnitaire = article.options[article.selectedIndex].getAttribute("data-prix");

        prix.value = Number(quantite.value) * Number(prixUnitaire);
    }
</script>