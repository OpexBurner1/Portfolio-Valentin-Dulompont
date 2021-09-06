<?php
    require './bdd_connect/connect.php';

    //Si l'utilisateur n'est pas connecté
    if (!isset($_SESSION)) {

        //Si il n'y a pas d'information de connexion, afficher le formulaire
        if(!isset($_POST) || empty($_POST)){
            $template = 'login';
            require './layout.phtml';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = $pdo->prepare
            (
                "SELECT password, admin
                FROM user
                WHERE username = ?"
            );
            $query->execute([$username]);

            $result = $query->fetch(PDO::FETCH_ASSOC);
            var_dump($result);

            //Si l'utilisateur n'existe pas
            if ($result === false) {
                header('Location: login.php');
                exit();
            }
            else {
                if(strcmp($password,$result['password']) === 0){
                    session_start();

                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['admin'] = $admin;
                    var_dump($_SESSION['username']);
                    var_dump($_SESSION['password']);
                    var_dump($_SESSION['admin']);
                    header('Location: admin.php');
                    exit();
                }
                else{
                    header('Location: index.php');
                    exit();

                }
            }

        }
        //Si l'utilisateur est déjà connecté, le déconnecter
    } else {
        session_destroy();
        header('Location: index.php');
    }
?>