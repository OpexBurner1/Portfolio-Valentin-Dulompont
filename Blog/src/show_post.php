<?php
    require './application/bdd_connection.php';

    $id = $_GET['number'];

    $query = $pdo->prepare
    (
        "SELECT title, content,category, date, user.firstName as firstName, user.lastName as lastName
        FROM article
        INNER JOIN user
        ON user_id = user.id
        WHERE number = $id"
    );

    $query->execute();

    $article = $query->fetch(PDO::FETCH_OBJ);

    $query = $pdo->prepare
    (
        "SELECT pseudo, content, comment_id
        FROM comment
        WHERE articleNumber = $id
        ORDER BY comment_id DESC"
    );

    $query->execute();

    $comments = $query->fetchAll(PDO::FETCH_ASSOC);

    $template = 'show_post';
    require 'layout.phtml';
?>