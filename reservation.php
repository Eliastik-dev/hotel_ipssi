<?php

include "fonction.php";
include 'vue/header.php';

if (isset($_POST['prenom'])) {
    extract($_POST);

    
    $queryClient = "INSERT INTO client (prenom, nom, tel) VALUES (:prenom, :nom, :tel)";
    $stmtClient = $pdo->prepare($queryClient);
    $stmtClient->execute([
        'prenom' => $prenom,
        'nom' => $nom,
        'tel' => $tel
    ]);
    
    $numClient = $pdo->lastInsertId();

    if (strtotime($dateArrivee) < strtotime($dateDepart)) {
        $queryReservation = "INSERT INTO reservation (dateArrivee, dateDepart, numClient, numChambre) VALUES (:dateArrivee, :dateDepart, :numClient, :numChambre)";
        $stmtReservation = $pdo->prepare($queryReservation);
        $stmtReservation->execute([
            'dateArrivee' => $dateArrivee,
            'dateDepart' => $dateDepart,
            'numClient' => $numClient,
            'numChambre' => $numChambre
        ]);

        echo "Réservation OK";
    } else {
        echo "La date d'arrivée doit être antérieure à la date de départ.";
    }
}

include 'vue/footer.php';
