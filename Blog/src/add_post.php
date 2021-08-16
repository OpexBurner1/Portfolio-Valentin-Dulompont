<?php
    require './application/bdd_connection.php';

    if (empty($_POST)) {
        $query = $pdo->prepare
        (
            "SELECT id, firstName, lastName
            FROM user
            WHERE admin = 1"
        );
        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        $query = $pdo->prepare
        (
            "SELECT id, category
            FROM category"
        );

        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_ASSOC);

        $template = 'add_post';
        require 'layout.phtml';
    }
    else () {
        $query = $pdo->prepare
        (
            "INSERT INTO article
            (title,content,user_id,category)
            VALUES (?,?,?,?)"
        );

        $query->execute([$_POST['title'], $_POST['contents'], $_POST['author'], $_POST['category']]);

        header('Location: admin.php');
        exit();
    }
?>