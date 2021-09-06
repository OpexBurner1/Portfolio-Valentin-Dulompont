<?php
    require './bdd_connect/connect.php';

    if (isset($_POST) && !empty($_POST)) {
        $title = $_POST['title'];
        $contents = $_POST['contents'];
        $category = $_POST['category'];
        $author = $_POST['author'];

        echo $title;
        echo $contents;
        echo $category;
        echo $author;
        $query = $pdo->prepare
        (
            "INSERT INTO article
            (title,content,Category,user_id)
            VALUES (?,?,?,?)"
        );
        $query->execute([$title,$contents,$category,$author]);

        header('Location: admin.php');
        exit();
    }
    else {
        $query = $pdo->prepare
        (
            "SELECT id, category
            FROM category"
        );
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_ASSOC);

        $query = $pdo->prepare
        (
            "SELECT id, firstName, lastName
            FROM user
            WHERE admin = 1"
        );
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        $template = 'add_post';
        require 'layout.phtml';
    }
?>