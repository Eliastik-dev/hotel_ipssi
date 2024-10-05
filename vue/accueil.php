
<h2 class="text-center">Chambres</h2>

<?php foreach($chambres as $chambre): ?>
    <div class="card my-1" style="width: 18rem;">
        <img class="card-img-top" src="utils/img/<?= $chambre['image'] ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $chambre['prix'] ?>€</h5>
            <p class="card-text"><?= $chambre['nbLits'] ?> lit</p>
            <p class="card-text"><?= $chambre['nbPers'] ?> personne(s)</p>
            <a href="chambre.php?action=detail&id=<?= $chambre['numChambre'] ?>" class="btn btn-primary">Détail</a>
        </div>
    </div>
<?php endforeach; ?>