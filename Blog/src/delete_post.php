<?php
    require './bdd_connect/connect.php';

    $query = $pdo->prepare
    (
        "DELETE FROM comment
        WHERE articleNumber = ?"
    );
    $query->execute([$_GET['number']]);

    $query = $pdo->prepare
    (
        "DELETE FROM article
        WHERE article.number = ?"
    );
    $query->execute([$_GET['number']]);

    header('Location: admin.php');
    exit();
?>