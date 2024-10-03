<?php

include "vue/header.php";

if( isset($_GET['action']) ){
    $action = $_GET['action'];

    switch($action){
        case "ajouter": 

            if( isset($_POST['prix']) ){

                //upload img
                if(isset($_FILES['image']['name'])){
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $extensions = ["jpeg", "jpg', png"];
                    var_dump($infoImage['extension']);

                    var_dump($infoImage['extension']);
                    if( in_array($infoImage['extension'], $extensions) ){
                        
                    var_dump($infoImage);
                    }

                }
            }

            include "vue/addChbre.php";
            break;
    }
}

include "vue/footer.php";
