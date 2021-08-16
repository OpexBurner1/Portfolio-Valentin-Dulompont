<?php
    require './bdd_connect/articles.php';

    $query = $pdo->prepare
    (
        "SELECT id, subject
        FROM sujetscontact"
    );

    $query->execute();

    $subjects = $query->fetchAll(PDO::FETCH_ASSOC);

    if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) ) {
        $position_arobase = strpos($_POST['email'],'@');

        if($position_arobase){
            $retour = mail('valentin.dulompont@gmail.com', 'Envoi depuis la page Contact: ' . $_POST['subject'], $_POST['message'], 'FROM: ' . $_POST['email']);
            if ($retour) {
                echo '<p class="success">Le message a bien été envoyé.<p>';
            }
            else {
                echo '<p class="error">Erreur.</p>';
            }
        }
    }

    $template = 'contact';
    require 'layout.phtml';
?>