<?php
    require './application/bdd_connection.php';
    $query = $pdo->prepare
    (
        "SELECT admin
        FROM user
        "
    );

    $query->execute();

    $admin = $query->fetch(PDO::FETCH_OBJ)->admin;
    echo $admin;

    if ( empty($admin) || !$admin) {
        header('Location: http://localhost/Blog/src/index.php');
    }
    else {
        $query = $pdo->prepare
        (
            "SELECT number, title, content, user.firstName as firstName, user.lastName as lastName, category
            FROM article
            INNER JOIN user
            ON user_id = user.id
            ORDER BY number DESC"
        );

        $query->execute();

        $articles = $query->fetchAll(PDO::FETCH_ASSOC);

        $template = 'admin';
        require './layout.phtml';
    }
    
    
?>