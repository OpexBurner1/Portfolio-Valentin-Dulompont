<?php
    require './bdd_connect/connect.php';

    if (empty($_POST) || !isset($_POST)) {
        $articleID = $_GET['number'];
        $query = $pdo->prepare
        (
            "SELECT number, title, content
            FROM article
            INNER JOIN category
            ON article.category = category.id
            WHERE number = $articleID"
        );
        $query->execute();
        $article = $query->fetch(PDO::FETCH_ASSOC);

        $template = 'edit_post';
        require './layout.phtml';
    }
    else {

        $query = $pdo->prepare
        (
            "UPDATE article
            SET title = ?, content = ?
            WHERE number = ?"
        );
        $query->execute([$_POST['title'], $_POST['contents'], $_POST['postId']]);

        header('Location: admin.php');
        exit();
    }
?>