<?php

if (!isset($_REQUEST['action'])) {
    if ($_SESSION['TABLE'] == 'admin') {
        $_REQUEST['action'] = Admin;
    } else {
        session_destroy();
        header("location: index.php?request=45");
        exit();
    }
}

switch ($_REQUEST['action']) {
    case Admin:
        include('./view/v_backOffice.php');
        break;
    case AdminManage:
        if (isset($_POST['ChangeStatusSubmit'])) {
            updateStatus($_POST['statut'], $_POST['idInvestor']);
            header('location: index.php?request=1');
        }
        $ligne = getInvestor($_POST['idInvestor']);
        $confirmBudget = $ligne['confirmBudget'];
        include('./view/v_backOfficeManage.php');
        break;
    default:
        //header('location: index.php', true);
        include('./view/v_backOffice.php');
}