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
        FROM orderdetails INNER JOIN products 
        ON orderdetails.productCode = products.productCode 
        WHERE orderNumber = ? ');

    $query->execute([$orderNumber]);

    $order = $query->fetchAll(PDO::FETCH_ASSOC);
    
    $query = $pdo->prepare
        (
            "SELECT customerName, contactLastName, contactFirstName, contactLastName, phone, addressLine1, addressLine2, city, state, postalCode, country
            FROM customers
            INNER JOIN orders
            ON customers.customerNumber = orders.customerNumber
            WHERE orderNumber = ?"
        );
    
    $query->execute([$orderNumber]);

    $customer = $query->fetch(PDO::FETCH_ASSOC);
    require './order-form.phtml';
 ?>