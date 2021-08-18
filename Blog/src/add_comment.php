<?php

    $postId = $_POST['postId'];
    $nickName = $_POST['nickName'];
    $contents = $_POST['contents'];

    require './bdd_connect/connect.php';

    $query = $pdo->prepare
    (
        "INSERT INTO comment
        (articleNumber,pseudo,content)
        VALUES ('$postId','$nickName','$contents')"
    );
    $query->execute();

    header("Location: http://localhost/Blog/src/show_post.php?number=$postId");
?>