<?php

include "../fonction.php";
include "header.php";

$query = "SELECT * FROM chambre";
$stmt = $pdo->query($query);
$chambres = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<h2 class="text-center">Liste des chambres</h2>

<div class="container">
    <div class="row">
        <?php foreach ($chambres as $chambre): ?>
            <div class="col-md-4">
                <div class="card my-1" style="width: 18rem;">
                    <img class="card-img-top" src="../utils/img/<?= htmlspecialchars($chambre['image']); ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($chambre['prix']); ?> €</h5>
                        <p class="card-text"><?= htmlspecialchars($chambre['nbLits']); ?> lit(s)</p>
                        <p class="card-text"><?= htmlspecialchars($chambre['nbPers']); ?> personne(s)</p>
                        <a href="chambre.php?action=detail&id=<?= htmlspecialchars($chambre['numChambre']); ?>" class="btn btn-primary">Détail</a>
                        <a href="listeChbre?action=supprimer&id=<?= htmlspecialchars($chambre['numChambre']); ?>" class="btn btn-danger btnSupprimer">
                            Supprimer
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php


include "footer.php";
