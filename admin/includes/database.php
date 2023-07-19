<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=articles;charset=utf8','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    return $db;
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données".$e->getMessage();
}
?>