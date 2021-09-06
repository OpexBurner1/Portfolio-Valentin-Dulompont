<?php
    if ( empty($_GET) ) {
        header('Location: index.php');
        exit();
    }
    else {
        require './bdd.php';
        $customerNumber = $_GET['customerNumber'];

        $query = $pdo->prepare
        (
            "SELECT customerName, contactLastName, contactFirstName, contactLastName, phone, addressLine1, addressLine2, city, state, postalCode, country
            FROM customers
            WHERE customerNumber = ?"
        );
        $query->execute([$customerNumber]);

        $customer = $query->fetch(PDO::FETCH_ASSOC);


        $query = $pdo->prepare
        (
            "SELECT orderNumber, orderDate, shippedDate, status
            FROM orders
            WHERE customerNumber = ?"
        );
        $query->execute([$customerNumber]);

        $orders = $query->fetchAll(PDO::FETCH_ASSOC);

        require './customer.phtml';
    }
?>