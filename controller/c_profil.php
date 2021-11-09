<?php
if (!isset($_SESSION['MAIL'])) {
    header('location: index.php', true);
}

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = Profil;
}

switch ($_REQUEST['action']) {
    case Profil:
        $ligne = getInvestor($_SESSION['MAIL']);
        include('./view/v_profil.php');
        break;

    case Modifier:
        if (isset($_POST["modifierProfil"])) {
            $ligne = getInvestor($_SESSION['MAIL']);
            echo updateInvestor($_POST['p_prenom'], $_POST['p_nom'], $_POST['p_email'], $_POST['p_societe'], $_POST['p_adresse'], $_POST['p_ville'], $_POST['p_codePostal'], $_POST['p_budget'], $ligne['investorId']);
            $lignes = getInvestor($_SESSION['MAIL']);
        }
        include('./view/v_profil.php');
        break;

    case AddFile:
        if (isset($_POST["addFile"])) {
            $ligne = getInvestor($_SESSION['MAIL']);
            echo addFile($_POST['p_file'], $_POST['p_type'], $ligne['investorId']);
        }
        include('./view/v_profil.php');
        break;

    // case DeleteFile:
    //     if (isset($_POST["DeleteFile"])) {
    //     }
    //     include('./view/v_profil.php');
    //     break;
}