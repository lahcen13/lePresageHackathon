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
            echo var_dump($_POST['statut']);
            // updateStatus($bol, $id);
        }
        $ligne = getInvestor($_SESSION['ID']);
        $confirmBudget = $ligne['confirmBudget'];
        include('./view/v_backOfficeManage.php');
        break;
    default:
        //header('location: index.php', true);
        include('./view/v_backOffice.php');
}