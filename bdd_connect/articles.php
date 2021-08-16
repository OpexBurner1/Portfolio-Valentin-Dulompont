<?php
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=portfolio', 'root', '');
    $pdo->exec("SET NAMES UTF8");
    $query = $pdo->prepare
    (
        "SELECT id, name, description, url
        FROM page
        ORDER BY id DESC"
    );
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>