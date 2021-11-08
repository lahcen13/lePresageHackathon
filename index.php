<?php
session_start();
require_once './include/constantes.php';
require_once './model/bdd.php';



if (isset($_POST["Valider"])) {
    $identif = $_POST["Identifiant"];
    $mdp = $_POST["Password"];
    if (siIdentificationExiste($identif, md5($mdp)) == TRUE) {
        echo CreerLesSession($identif, $_SESSION['TABLE']);
        if (verifieSiAdmin($identif) == true && $_SESSION['TABLE'] == "adherent") {
            $_SESSION['STATUT'] = "Admin";
        }

        if (verifieSiAdmin($identif) == false && $_SESSION['TABLE'] == "adherent") {
            $_SESSION['STATUT'] = "Utilisateur";
        }

        if ($_SESSION['TABLE'] == "clients") {
            $_SESSION['STATUT'] = "Clients";
        }

        header("index.php?action=10");
    } else {
        $alert = 'Votre indentifiant et/ou  mot de passe, est/sont incorrect(s).';
    }
}


if (!isset($_REQUEST['request'])) { // Démarrage de l'application.
    $_REQUEST['request'] = Accueil;
}

switch ($_REQUEST['request']) {
    case Register:
        require_once './controler/register.php';
        break;
    case Deconnexion:
        session_destroy();
        header("location: index.php?action=" . Accueil);
        exit();
}