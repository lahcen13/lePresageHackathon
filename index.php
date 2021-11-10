<?php
session_start();
require_once './include/constantes.php';
require_once './model/m_bdd.php';



if (isset($_POST["SubmitConnexion"])) {

    if (siIdentificationExiste($_POST["mail"], md5($_POST["mdp"])) == TRUE) {
        echo CreerLesSession($_POST["mail"], $_SESSION['TABLE']);
        if ($_SESSION['TABLE'] == 'investor') {
            header('location: index.php?request=80', false);
            exit();
        } else {
            header('location: index.php?request=1', false);
            exit();
        }
    } else {
        $alert = 'Votre indentifiant et/ou  mot de passe, est/sont incorrect(s).';
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
    case Profil:
        require_once './controller/c_profil.php';
        break;
    case Admin:
        require_once './controller/c_backOffice.php';
        break;
    case Cagnotte:
        require_once './controller/c_cagnotte.php';
        break;
    case Deconnexion:
        session_destroy();
        header("location: index.php?request=45");
        exit();
}