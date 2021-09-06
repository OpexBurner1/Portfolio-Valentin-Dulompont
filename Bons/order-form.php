<?php

/* Requêtes SQL qui vont afficher le détail de chaque commande dans le fichier
 * order-form.phtml dès lors que l'on clique sur le numéro de la commande. On récupère
 * donc les informations du client (entreprise, nom, adresse). Les informations
 * sur la commande (les produits, prix, quantité et prix total).
 */
    require './bdd.php';
 
    $orderNumber = $_GET['orderNumber'];
    
    $query = $pdo->prepare(
        'SELECT productName, priceEach, quantityOrdered, priceEach * quantityOrdered as total 
        FROM orderDetails INNER JOIN products 
        ON orderDetails.productCode = products.productCode 
        WHERE orderNumber = 10100 ');

    $query->execute();

    $order = $query->fetchAll(PDO::FETCH_ASSOC);

    require './order-form.phtml';
 ?>