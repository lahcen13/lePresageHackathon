<?php

if (!isset($_REQUEST['action'])) {
    if (isset($_SESSION['TABLE'])) {
        $_REQUEST['action'] = c_cagnotte;
    } else {
        session_destroy();
        header("location: index.php?request=45");
        exit();
    }
}

switch ($_REQUEST['action']) {
    case c_cagnotte:
        if (isset($_POST['submitCagnotte'])) {
            updateCagnotte($_POST["cagnotte"]);
        }
        $ligne = selectCagnotte();
        $cagnotte = $ligne['Cagnotte'];
        $ligne = budgetTotal();
        $budgetTotal = $ligne['budgetTotal'];
        echo  $budgetTotal;
        include('./view/v_cagnotte.php');
        break;
}