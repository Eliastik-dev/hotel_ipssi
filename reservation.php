<?php

include "fonction.php";



include 'vue/header.php';

if( isset($_POST['prenom']) ){
    extract($_POST);

    //insertion client;

    //   $numClient = $pdo->lastInsertId();


    //insertion réservation
    /*
    date arr
    date dep
    num chambre
    num client
    */

    echo "Réservation OK";
}


include 'vue/footer.php';