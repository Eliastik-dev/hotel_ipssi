<?php
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=ipssi_hotel", "root", "",[
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


function getAll($table){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM " . $table);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getOne($table, $column, $id){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM " . $table ." WHERE ". $column ."=?");
    $stmt->execute([$id]);

    return $stmt->fetch();
}

if(isset($_POST["login"])){
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = ? AND pass = ?");
    $stmt->execute([$_POST['login'], $_POST['mdp']]);

    $_SESSION['user'] = $stmt->fetch();

    header("location: .");
    exit;
}else if( isset($_GET['action']) && $_GET['action'] == "logout" ){
    session_destroy();
    
    header("location: .");
    exit;
}