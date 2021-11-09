<?php
if (!isset($_SESSION['MAIL'])) {
    header('location: index.php', true);
}

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = c_profil;
}

switch ($_REQUEST['action']) {
    case c_profil:
        $ligne = getInvestor($_SESSION['ID']);
        $email = $ligne['email'];
        $nom = $ligne['firstName'];
        $prenom = $ligne['lastName'];
        $budget = $ligne['budget'];
        $adresse = $ligne['adresse'];
        $ville = $ligne['ville'];
        $codePostal = $ligne['codePostal'];
        $societe = $ligne['societe'];
        include('./view/v_profil.php');
        break;

    case Modifier:
        if (isset($_POST["SubmitModifierProfil"])) {
            updateInvestor($_POST['p_prenom'], $_POST['p_nom'], $_POST['p_societe'], $_POST['p_adresse'], $_POST['p_ville'], $_POST['p_codePostal'], $_POST['p_budget'], $_SESSION['ID']);
            $ligne = getInvestor($_SESSION['ID']);
            $email = $ligne['email'];
            $nom = $ligne['firstName'];
            $prenom = $ligne['lastName'];
            $budget = $ligne['budget'];
            $adresse = $ligne['adresse'];
            $ville = $ligne['ville'];
            $codePostal = $ligne['codePostal'];
            $societe = $ligne['societe'];
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