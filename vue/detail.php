
    
    <h2 class="text-center">Détail de la Chambre</h2>

    <p>
        <img class="card-img-top w-25" src="utils/img/<?= $chambre['image'] ?>" alt="Card image cap">
    </p>

    Prix <?= $chambre['prix'] ?>€ par nuit.

    <p>
        <div><?= $chambre['nbLits'] ?> Lit(s)</div>
        <?= $chambre['description'] ?>
    </p>

    <div>
        <form action="reservation.php" method="post">

            <input type="hidden" name="numChambre" value="<?= $_GET['id'] ?>">

            <div class="form-group">
                <label for="">Prénom</label>
                <input type="text" class="form-control" name="prenom">
            </div>
            
            <div class="form-group">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>
            
            <div class="form-group">
                <label for="">Téléphone</label>
                <input type="text" class="form-control" name="tel">
            </div>

            
            <div class="form-group">
                <label for="">Date Arrivée</label>
                <input type="date" class="form-control" name="dateArrivee">
            </div>
            
            <div class="form-group">
                <label for="">Date départ</label>
                <input type="date" class="form-control" name="dateDepart">
            </div>

            <input type="submit" class="btn btn-outline-success mt-2">


        </form>
    </div>