<?php
    
    if(!isset($_SESSION)){ session_start(); };
    if (empty($_SESSION) || $_SESSION['admin'] === 0 ) {
        session_destroy();
        header('Location: index.php');
    }
    else {
        require './bdd_connect/connect.php';
        $query = $pdo->prepare
        (
            "SELECT number, title, content, user.firstName as firstName, user.lastName as lastName, category.category as categoryA
            FROM article
            INNER JOIN user
            ON user_id = user.id
            INNER JOIN category
            ON article.category = category.id
            ORDER BY number DESC"
        );

        $query->execute();

        $articles = $query->fetchAll(PDO::FETCH_ASSOC);

        //On récupère les différentes catégories
        $query = $pdo->prepare
        (
            "SELECT id, category
            FROM category"
        );
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);

        $template = 'admin';
        require './layout.phtml';
    }
    
    
?>