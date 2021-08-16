<?php
    /* Requêtes SQL qui vont nous lister toutes les commandes dans le fichier
    * index.phtml avec numéro de commande, date de commande et de livraison
    * ainsi que le statut.
    */

    require './bdd.php';
    $query = $pdo->prepare(
        'SELECT
            orderNumber,
            orderDate,
            shippedDate,
            status
        FROM orders
        ORDER BY orderDate'
    );

    $query->execute();

    $orders = $query->fetchAll(PDO::FETCH_ASSOC);

    require './index.phtml';
?>