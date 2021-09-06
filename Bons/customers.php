<?php
    require './bdd.php';
    if (!empty($_POST)) {
        $contactName = $_POST['name'];

        $query = $pdo->prepare
        (
            "SELECT customerNumber, customerName,contactLastName, contactFirstName, country
            FROM customers
            WHERE contactLastName = ?"
        );
        $query->execute([$contactName]);

        $customers = $query->fetchAll(PDO::FETCH_ASSOC);

        require './customers.phtml';
    }
    else {
        header('Location: index.php');
        exit();
    }
?>