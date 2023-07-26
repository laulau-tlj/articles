<?php
// On dit au navigateur qu'il s'agit d'un fichier json
header('Content-Type: application/json');

// Connexion à la base de données 
try {
    $pdo = new PDO('mysql:host=localhost;dbname=articles;charset=utf8','root','');
    $retour["success"] = true;
    $retour["message"] = "Connexion à la base de donnée réussie";
} catch (Exception $e) {
    $retour["success"] = false;
    $retour["message"] = "Connexion à la base de donnée impossible";
}

// // // Requete pour récuperer les données par l'id
// $all_article = $pdo->prepare("SELECT * FROM `all_articles` WHERE `id`=$id");
// $all_article->execute();


// Requete pour récuperer les données
$all_article = $pdo->prepare("SELECT * FROM `all_articles`");
$all_article->execute();

// On récupère tous les champs de la table
$retour["success"] = true;
$retour["message"] = "Voici tous les articles";
$retour["results"] ["articles"] = $all_article->fetchAll();

echo json_encode($retour);

?>