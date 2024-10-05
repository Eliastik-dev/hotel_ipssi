<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <header class="p-4 bg-secondary mb-3">

        <h1 class=" text-center"><a href=".">Gestion Hôtellerie</a></h1>

        <?php  if(isset($_SESSION['user'])): ?>

            <?php  if($_SESSION['user']['role'] == "administrateur"): ?>
                <a href="chambre.php?action=ajouter" class="btn btn-success">Ajouter</a>
            <?php  endif ?>
            
            <a href="vue/listeReserv.php?action=afficher" class="btn btn-success">Liste Réservation</a>
            <a href="vue/listeChbre.php?action=afficher" class="btn btn-success">Liste Chambres</a>
            <a href="fonction.php?action=logout" class="btn btn-success">Déconnexion</a>
        <?php  else: ?>
            <a href="vue/connexion.php" class="btn btn-success">Connexion</a>
        <?php  endif ?>
    </header>
    <main class="container-fluid">