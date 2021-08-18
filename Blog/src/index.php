<?php
    require './bdd_connect/connect.php';

    if ( !empty($admin) && ($admin)) {
        $template = 'admin';
    }
    else {
        $template = 'index';
    }
    
    $query = $pdo->prepare
    (
        "SELECT number, title, content, user.firstName as firstName, user.lastName as lastName, date
        FROM article
        INNER JOIN user
        ON user_id = user.id
        ORDER BY number DESC"
    );

    $query->execute();

    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    $template = 'index';
    include './layout.phtml';
    
?>