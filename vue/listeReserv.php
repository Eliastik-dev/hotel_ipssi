<?php
include 'header.php';
include '../fonction.php';

$query = "
    SELECT r.numReservation, r.dateArrivee, r.dateDepart, c.prenom, c.nom, c.tel, ch.numChambre, ch.prix
    FROM reservation r
    JOIN client c ON r.numClient = c.numClient
    JOIN chambre ch ON r.numChambre = ch.numChambre
";
$stmt = $pdo->prepare($query);
$stmt->execute();
$reservations = $stmt->fetchAll();
?>

<div class="container">
    <h2 class="text-center mt-4">Liste des Réservations</h2>

    <?php if (count($reservations) > 0): ?>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Numéro Réservation</th>
                    <th>Client</th>
                    <th>Téléphone</th>
                    <th>Date d'Arrivée</th>
                    <th>Date de Départ</th>
                    <th>Prix par Nuit (€)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?= $reservation['numReservation'] ?></td>
                        <td><?= $reservation['prenom'] . ' ' . $reservation['nom'] ?></td>
                        <td><?= $reservation['tel'] ?></td>
                        <td><?= date('d/m/Y', strtotime($reservation['dateArrivee'])) ?></td>
                        <td><?= date('d/m/Y', strtotime($reservation['dateDepart'])) ?></td>
                        <td><?= $reservation['prix'] ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center mt-4">Aucune réservation trouvée.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
