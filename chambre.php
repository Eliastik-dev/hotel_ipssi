<?php

include "fonction.php";

include "vue/header.php";


if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case "ajouter":

            if (isset($_POST['prix'])) {

                //produit des variables sur les "name" du formulaire
                extract($_POST);

                //upload img
                //test si fichier existe
                if (isset($_FILES['image']['name'])) {
                    //pathinfo renvoie les infos du fichier uploader
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $fileName = $_FILES['image']['name'];
                    //On crée une liste d'extensions autorisées
                    $extensions = ["jpeg", "jpg', png"];

                    //test si l'extension du fichier est autorisée
                    if (in_array($infoImage['extension'], $extensions)) {

                        //envoie du fichier à sa destination
                        move_uploaded_file($_FILES['image']['tmp_name'], "utils/img/" . $fileName);
                    }
                }

                $query = "INSERT INTO chambre VALUES(NULL, :prix, :lit, :cap, :img, :desc)";

                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    "prix"  => $prix,
                    "lit"   => $nbLits,
                    "cap"   => $nbPers,
                    "img"   => $fileName,
                    "desc"  => $description
                ]);
                header("location: .");
                exit;
            }

            include "vue/addChbre.php";
            break;

        case "detail":
            $chambre = getOne("chambre", "numChambre", $_GET['id']);

            include "vue/detail.php";
            break;

        case "supprimer":
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = (int)$_GET['id'];

                $checkQuery = "SELECT COUNT(*) FROM chambre WHERE numChambre = :id";
                $checkStmt = $pdo->prepare($checkQuery);
                $checkStmt->execute(['id' => $id]);
                $chambreExiste = $checkStmt->fetchColumn();

                if ($chambreExiste) {
                    $query = "DELETE FROM chambre WHERE numChambre = :id";
                    $stmt = $pdo->prepare($query);
                    if ($stmt->execute(['id' => $id])) {
                        header("Location: listeChbre.php");
                        exit;
                    } else {
                        echo "<div class='alert alert-danger'>Échec de la suppression de la chambre.</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning'>La chambre avec l'ID $id n'existe pas.</div>";
                }
            } else {
                echo "<div class='alert alert-warning'>ID invalide.</div>";
            }
            break;

        default:
            echo "<div class='alert alert-warning'>Action non reconnue.</div>";
            break;
    }
}

include "vue/footer.php";
