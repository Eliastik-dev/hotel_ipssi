<?php

include "fonction.php";

$chambres = getAll("chambre");


include 'vue/header.php';

include "vue/accueil.php";

include 'vue/footer.php';
