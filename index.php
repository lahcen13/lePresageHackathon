<?php
session_start();
require_once './include/constantes.php';
require_once './model/m_bdd.php';

if (isset($_POST["confirmationCode"])) {
    if (siIdentificationExiste($_POST["mail"], md5($_POST["mdp"])) == TRUE) {
        echo CreerLesSession($_POST["mail"], $_SESSION['TABLE']);
        header('location: index.php?request=30', true);
        exit();
    } else {
        $alert = 'Votre indentifiant et/ou  mot de passe, est/sont incorrect(s).';
        echo $alert;
    }
}
require_once './view/v_head.html';

if (!isset($_REQUEST['request'])) { // Démarrage de l'application.
    $_REQUEST['request'] = Connexion;
}

switch ($_REQUEST['request']) {
    case Register:
        require_once './controller/c_register.php';
        break;
    case Connexion:
        require_once './view/connexion.php';
        break;

        // case Deconnexion:
        //     session_destroy();
        //     header("location: index.php?action=" . Accueil);
        //     exit();
}